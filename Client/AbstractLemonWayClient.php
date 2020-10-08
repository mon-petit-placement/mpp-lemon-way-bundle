<?php

namespace Mpp\LemonWayClientBundle\Client;

use GuzzleHttp\ClientInterface;
use GuzzleHttp\Exception\ClientException;
use GuzzleHttp\Psr7\Response as GuzzleResponse;
use Mpp\LemonWayClientBundle\Exception\LemonWayException;
use Mpp\LemonWayClientBundle\Model\Bearer;
use Psr\Log\LoggerInterface;
use Symfony\Component\Cache\Adapter\AdapterInterface;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Serializer\Exception\ExceptionInterface;
use Symfony\Component\Serializer\SerializerInterface;

abstract class AbstractLemonWayClientDomain implements LemonWayClientInterface
{
    /**
     * @var LoggerInterface
     */
    protected $logger;

    /**
     * @var SerializerInterface
     */
    protected $serializer;

    /**
     * @var ClientInterface
     */
    protected $httpClient;

    /**
     * @var AdapterInterface
     */
    protected $cache;

    /**
     * @var string
     */
    private $basicAuthToken;

    /**
     * @var string
     */
    private $basicAuthTokenUrl;

    public function __construct(
        LoggerInterface $logger,
        SerializerInterface $serializer,
        ClientInterface $httpClient,
        ?AdapterInterface $cache = null,
        string $basicAuthToken,
        string $basicAuthTokenUrl
    ) {
        $this->logger = $logger;
        $this->serializer = $serializer;
        $this->httpClient = $httpClient;
        $this->basicAuthToken = $basicAuthToken;
        $this->basicAuthTokenUrl = $basicAuthTokenUrl;
        $this->setCache($cache);
    }

    /**
     * Retrieve logger.
     *
     * @method getLogger
     *
     * @return LoggerInterface
     */
    public function getLogger(): LoggerInterface
    {
        return $this->logger;
    }

    /**
     * Retrieve serializer.
     *
     * @method getSerializer
     *
     * @return SerializerInterface
     */
    public function getSerializer(): SerializerInterface
    {
        return $this->serializer;
    }

    /**
     * Retrieve http client.
     *
     * @method getHttpClient
     *
     * @return ClientInterface
     */
    public function getHttpClient(): ClientInterface
    {
        return $this->httpClient;
    }

    /**
     * Retrieve cache adapter if set.
     *
     * @method getCache
     *
     * @return AdapterInterface|null
     */
    public function getCache(): ?AdapterInterface
    {
        return $this->cache;
    }

    /**
     * Set the cache adapter.
     *
     * @method setCache
     *
     * @param AdapterInterface|null $cache
     *
     * @throws \RuntimeException         If the "symfony/cache" package is not installed
     * @throws \UnexpectedValueException If the given cache doesn't implement symfony cache AdapterInterface
     */
    public function setCache($cache)
    {
        if (null !== $cache) {
            if (!interface_exists(AdapterInterface::class)) {
                throw new \RuntimeException('AbstractLemonWayClientDomain cache requires "symfony/cache" package');
            }

            if (!$cache instanceof AdapterInterface) {
                throw new \UnexpectedValueException(
                    sprintf('The client\'s cache must implement %s.', AdapterInterface::class)
                );
            }

            $this->cache = $cache;
        }
    }

    /**
     * Build and return the bearer token hash.
     *
     * @method getBearerTokenHash
     *
     * @return string
     */
    protected function getBearerTokenHash(): string
    {
        return sprintf('mpp.lemon_way_client.bearer_token.%s', md5($this->basicAuthToken));
    }

    protected function getBearerToken(): Bearer
    {
        try {
            if (null !== $this->cache && $this->cache->hasItem($this->getBearerTokenHash())) {
                $jsonToken = $this->cache->getItem($this->getBearerTokenHash())->get();

                return $this->deserialize(Bearer::class, $jsonToken);
            }

            $response = $this->httpClient->request('POST', $this->basicAuthTokenUrl, [
                'headers' => [
                    'Authorization' => sprintf('Basic %s', $this->basicAuthToken),
                ],
                'form_params' => [
                    'grant_type' => 'client_credentials',
                ],
            ]);

            $bearerToken = $this->deserialize(Bearer::class, $response->getBody()->getContents());

            if (null !== $this->cache) {
                $item = $this->cache->getItem($this->getBearerTokenHash());

                $item->set($response->getBody()->getContents());
                $item->expiresAfter($bearerToken->getExpiresIn());

                $this->cache->save($item);
            }

            return $bearerToken;
        } catch (ClientException | ServerException $e) {
            throw new LemonWayException(
                sprintf('Could not retrieve the bearer token: %s', $e->getResponse()->getBody()->getContents()),
                Response::HTTP_UNAUTHORIZED
            );
        }
    }

    /**
     * Make a guzzle request.
     *
     * @method request
     *
     * @param string $method
     * @param string $path
     * @param array  $options
     *
     * @return GuzzleResponse
     *
     * @throws LemonWayException
     */
    public function request(string $method, string $path, array $options = []): GuzzleResponse
    {
        try {
            $fullPath = sprintf('%s%s', $this->getBasePath(), $path);
            $url = sprintf('%s%s', $this->httpClient->getConfig('base_uri'), $fullPath);
            $className = (new \ReflectionClass($this))->getName();
            $bearerToken = $this->getBearerToken();
            $options['headers'] = [
                'Authorization' => sprintf('%s %s', $bearerToken->getTokenType(), $bearerToken->getAccessToken()),
            ];
            $headers = array_merge($this->httpClient->getConfig('headers'), $options['headers']);

            $this->logger->info(sprintf('%s api call', $className), [
                'method' => $method,
                'url' => $url,
                'headers' => $headers,
            ]);

            return $this->httpClient->request($method, $url, $options);
        } catch (ClientException | ServerException $e) {
            $this->logger->error(sprintf('%s error', $className), [
                'method' => $method,
                'url' => $url,
                'headers' => $headers,
                'boby' => $e->getRequest()->getBody(),
                'response_code' => $e->getResponse()->getStatusCode(),
            ]);

            $error = (new Error())
                ->setMessage($e->getResponse()->getBody()->getContents())
                ->setCode($e->getResponse()->getStatusCode())
            ;

            throw $error->getException();
        }
    }

    /**
     * Make a request and deserialize the Guzzle response to an object of the given class name.
     *
     * @method requestAndPopulate
     *
     * @param string $className
     * @param string $method
     * @param string $path
     * @param array  $options
     *
     * @return mixed
     */
    public function requestAndPopulate(array $classNameMapping, string $method, string $path, array $options = [])
    {
        $response = $this->request($method, $path, $options)->getBody()->getContents();

        try {
            $arrayResponse = $this->deserialize('array', $response);

            foreach ($classNameMapping as $parameterName => $className) {
                $arrayResponse[$parameterName] = $this->deserialize($className, json_encode($arrayResponse[$parameterName]));
            }
        } catch (ExceptionInterface $e) {
            $this->logger->error(sprintf('Error during deserialization: %s', $e->getMessage()));
        }
    }

    protected function deserialize(string $className, string $json)
    {
        switch ($className) {
            case 'bool':
                return filter_var($json, FILTER_VALIDATE_BOOLEAN, FILTER_NULL_ON_FAILURE);
            case 'string':
                return (string) $className;
            case 'int':
                return (int) $className;
            case 'float':
                return (float) $className;
            case 'array':
                return json_decode($json, true);
            default:
                return $this->serializer->deserialize($json, $className, 'json');
        }
    }

    /**
     * {@inheritdoc}
     */
    abstract public static function getClientAlias(): string;

    /**
     * {@inheritdoc}
     */
    abstract public function getBasePath(): string;
}
