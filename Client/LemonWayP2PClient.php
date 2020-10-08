<?php

namespace Mpp\LemonWayClientBundle\Client;

use Mpp\LemonWayClientBundle\Model\Error;
use Mpp\LemonWayClientBundle\Model\Links;
use Mpp\LemonWayClientBundle\Model\TransactionP2P;
use Mpp\LemonWayClientBundle\Model\Transactions_TransactionP2P;
use Mpp\LemonWayClientBundle\OptionsResolver\LemonWayP2PClientOptionsResolver;

class LemonWayP2PClient implements LemonWayClientInterface
{
    /**
     * GET /v2/p2p/{transactionid}
     * Retrieve the list of payment between accounts.
     *
     * @method list
     *
     * @param string $transactionId
     * @param array  $options
     *
     * @return array
     */
    public function list(string $transactionId, array $options = []): array
    {
        $classNameMapping = [
            'transactions' => Transactions_TransactionP2P::class,
            '_links' => Links::class,
            'error' => Error::class,
        ];

        return $this->requestAndPopulate($classNameMapping, 'GET', sprintf('/%s', $transactionId), [
            'query' => LemonWayP2PClientOptionsResolver::resolveListOptions($options),
        ]);
    }

    /**
     * POST /v2/p2p
     * Create and execute P2P transaction.
     *
     * @method create
     *
     * @param array $options
     *
     * @return array
     */
    public function create(array $options = []): array
    {
        $classNameMapping = [
            'transaction' => TransactionP2P::class,
            'error' => Error::class,
        ];

        return $this->requestAndPopulate($classNameMapping, 'POST', '', [
            'body' => $this->serialize(LemonWayP2PClientOptionsResolver::resolveCreateOptions($options)),
        ]);
    }

    /**
     * Retrieve the url base path.
     *
     * @method getBasePath
     *
     * @return string
     */
    public function getBasePath(): string
    {
        return '/v2/p2p';
    }

    /**
     * Retrieve the client alias.
     *
     * @method getClientAlias
     *
     * @return string
     */
    public static function getClientAlias(): string
    {
        return 'p2p';
    }
}
