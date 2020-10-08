<?php

namespace Mpp\LemonWayClientBundle\Client;

interface LemonWayClientInterface
{
    /**
     * Retrieve the url base path.
     *
     * @method getBasePath
     *
     * @return string
     */
    public function getBasePath(): string;

    /**
     * Retrieve the client alias.
     *
     * @method getClientAlias
     *
     * @return string
     */
    public static function getClientAlias(): string;
}
