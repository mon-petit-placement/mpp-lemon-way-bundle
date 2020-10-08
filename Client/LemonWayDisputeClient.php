<?php

namespace Mpp\LemonWayClientBundle\Client;

use Mpp\LemonWayClientBundle\Model\Error;
use Mpp\LemonWayClientBundle\Model\Links;
use Mpp\LemonWayClientBundle\Model\Transactions_TransactionOut;
use Mpp\LemonWayClientBundle\OptionsResolver\LemonWayDisputeClientOptionsResolver;

class LemonWayDisputeClient implements LemonWayClientInterface
{
    /**
     * GET /v2/disputes.
     * Retrieve a list of dispute.
     *
     * @method list
     *
     * @param array $options
     *
     * @return array
     */
    public function list(array $options = []): array
    {
        $classNameMapping = [
            'transactions' => Transactions_TransactionOut::class,
            '_links' => Links::class,
            'error' => Error::class,
        ];

        return $this->requestAndPopulate($classNameMapping, 'GET', '', [
            'query' => LemonWayDisputeClientOptionsResolver::resolveListOptions($options),
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
        return '/v2/disputes';
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
        return 'dispute';
    }
}
