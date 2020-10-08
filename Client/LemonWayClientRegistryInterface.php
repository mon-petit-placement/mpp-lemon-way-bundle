<?php

namespace Mpp\LemonWayClientBundle\Client;

interface LemonWayClientRegistryInterface
{
    /**
     * Check if the lemon way client alias is registered in the registry.
     *
     * @method has
     *
     * @param string $alias
     *
     * @return bool
     */
    public function has(string $alias): bool;

    /**
     * Register the lemon way client with the given alias.
     *
     * @method set
     *
     * @param string                  $alias
     * @param LemonWayClientInterface $client
     *
     * @return LemonWayClientRegistryInterface
     */
    public function set(string $alias, LemonWayClientInterface $client): LemonWayClientRegistryInterface;

    /**
     * Get the lemon way client domain by its alias.
     *
     * @method get
     *
     * @param string $alias
     *
     * @return LemonWayClientInterface
     */
    public function get(string $alias): LemonWayClientInterface;

    /**
     * Retrieve all lemon way client domains from the registry.
     *
     * @method all
     *
     * @return array
     */
    public function all(): array;
}
