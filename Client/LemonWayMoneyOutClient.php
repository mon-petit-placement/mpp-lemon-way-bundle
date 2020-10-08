<?php

namespace Mpp\LemonWayClientBundle\Client;

use Mpp\LemonWayClientBundle\Model\Error;
use Mpp\LemonWayClientBundle\Model\Iban;
use Mpp\LemonWayClientBundle\Model\TransactionOut;
use Mpp\LemonWayClientBundle\Model\Transactions_TransactionOut;
use Mpp\LemonWayClientBundle\OptionsResolver\LemonWayMoneyOutClientOptionsResolver;

class LemonWayMoneyOutClient implements LemonWayClientInterface
{
    /**
     * GET /v2/moneyouts/{accountId}/iban
     * Retrieve a list of ibans associated to an account.
     *
     * @method getIbans
     *
     * @param string $accountId
     *
     * @return array
     */
    public function getIbans(string $accountId): array
    {
        $classNameMapping = [
            'ibans' => sprintf('%s[]', Iban::class),
            'error' => Error::class,
        ];

        return $this->requestAndPopulate($classNameMapping, 'GET', sprintf('/%s/iban', $accountId));
    }

    /**
     * GET /v2/moneyouts
     * Retrieve a list of money out.
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
            'error' => Error::class,
        ];

        return $this->requestAndPopulate($classNameMapping, 'GET', '', [
            'query' => LemonWayMoneyOutClientOptionsResolver::resolveListOptions($options),
        ]);
    }

    /**
     * POST /v2/moneyouts
     * External fund transfer from a payment account to a bank account.
     *
     * @method create
     *
     * @param array $options
     *
     * @return array
     */
    public function create(array $options): array
    {
        $classNameMapping = [
            'transaction' => TransactionOut::class,
            'error' => Error::class,
        ];

        return $this->requestAndPopulate($classNameMapping, 'POST', '', [
            'body' => $this->serialize(LemonWayMoneyOutClientOptionsResolver::resolveCreateOptions($options)),
        ]);
    }

    /**
     * PUT /v2/moneyouts/{transactionId}/cancel
     * Cancel a money out.
     *
     * @method cancel
     *
     * @param int   $transactionId
     * @param array $options
     *
     * @return array
     */
    public function cancel(int $transactionId, array $options = []): array
    {
        $classNameMapping = [
            'transaction' => TransactionOut::class,
            'error' => Error::class,
        ];

        return $this->requestAndPopulate($classNameMapping, 'PUT', sprintf('/%s/cancel', $transactionId), [
            'body' => $this->serialize(LemonWayMoneyOutClientOptionsResolver::resolveCancelOptions($options)),
        ]);
    }

    /**
     * PUT /v2/moneyouts/iban/{ibanId}/unregister
     * Unregister iban from a payment account.
     *
     * @method disableIban
     *
     * @param int   $ibanId
     * @param array $options
     *
     * @return array
     */
    public function disableIban(int $ibanId, array $options): array
    {
        $classNameMapping = [
            'id' => int,
            'error' => Error::class,
        ];

        return $this->requestAndPopulate($classNameMapping, 'PUT', sprintf('/iban/%s/unregister', $transactionId), [
            'body' => $this->serialize(LemonWayMoneyOutClientOptionsResolver::resolveDisableIbanOptions($options)),
        ]);
    }

    /**
     * POST /v2/moneyouts/iban
     * Add an IBAN to a payment account.
     *
     * @method addAccountIban
     *
     * @param array $options
     *
     * @return array
     */
    public function addAccountIban(array $options): array
    {
        $classNameMapping = [
            'id' => int,
            'error' => Error::class,
        ];

        return $this->requestAndPopulate($classNameMapping, 'POST', sprintf('/iban', $transactionId), [
            'body' => $this->serialize(LemonWayMoneyOutClientOptionsResolver::resolveCreateIbanOptions($options)),
        ]);
    }

    /**
     * POST /v2/moneyouts/iban/extended
     * Add bank account details to a payment account.
     *
     * @method addAccountBankDetails
     *
     * @param array $options
     *
     * @return array
     */
    public function addAccountBankDetails(array $options): array
    {
        $classNameMapping = [
            'ibanId' => int,
            'status' => int,
            'error' => Error::class,
        ];

        return $this->requestAndPopulate($classNameMapping, 'POST', sprintf('/iban/extended', $transactionId), [
            'body' => $this->serialize(LemonWayMoneyOutClientOptionsResolver::resolveAddAccountBankDetailsOptions($options)),
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
        return '/v2/moneyouts';
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
        return 'money_out';
    }
}
