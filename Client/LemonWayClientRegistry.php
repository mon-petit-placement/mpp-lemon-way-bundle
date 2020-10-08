<?php

namespace Mpp\LemonWayClientBundle\Client;

class LemonWayClientRegistry implements LemonWayClientRegistryInterface
{
    /**
     * @var array
     */
    private $clients;

    /**
     * {@inheritdoc}
     */
    public function has(string $alias): bool
    {
        return isset($this->clients[$alias]);
    }

    /**
     * {@inheritdoc}
     */
    public function set(string $alias, LemonWayClientInterface $client): LemonWayClientRegistryInterface
    {
        $this->clients[$alias] = $client;

        return $this;
    }

    /**
     * {@inheritdoc}
     *
     * @throws \UnexpectedValueException If no lemon way client is registered with the given alias
     */
    public function get(string $alias): LemonWayClientInterface
    {
        if (!isset($this->clients[$alias])) {
            throw new \UnexpectedValueException(sprintf('Could not retrieve lemon way client with alias %s', $alias));
        }

        return $this->clients[$alias];
    }

    /**
     * {@inheritdoc}
     */
    public function all(): array
    {
        return $this->clients;
    }
}
