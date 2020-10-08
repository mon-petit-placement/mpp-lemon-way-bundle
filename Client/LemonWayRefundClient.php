<?php

namespace Mpp\LemonWayClientBundle\Client;

use Mpp\LemonWayClientBundle\Model\Error;
use Mpp\LemonWayClientBundle\Model\TransactionRefund;
use Mpp\LemonWayClientBundle\OptionsResolver\LemonWayRefundClientOptionsResolver;

class LemonWayRefundClient implements LemonWayClientInterface
{
    /**
     * PUT /v2/refund/{transactionid}.
     * Refund a money in transaction.
     *
     * @method refund
     *
     * @param int   $transactionId
     * @param array $options
     *
     * @return array
     */
    public function refund(int $transactionId, array $options = []): array
    {
        $classNameMapping = [
            'transaction' => TransactionRefund::class,
            'error' => Error::class,
        ];

        return $this->requestAndPopulate($classNameMapping, 'PUT', sprintf('/%s', $transactionId), [
            'body' => $this->serialize(LemonWayRefundClientOptionsResolver::resolveRefundOptions($options)),
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
        return '/v2/refund';
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
        return 'refund';
    }
}
