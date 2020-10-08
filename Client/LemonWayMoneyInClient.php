<?php

namespace Mpp\LemonWayClientBundle\Client;

use Mpp\LemonWayClientBundle\Model\ACS;
use Mpp\LemonWayClientBundle\Model\Card;
use Mpp\LemonWayClientBundle\Model\Error;
use Mpp\LemonWayClientBundle\Model\EuPagoInit;
use Mpp\LemonWayClientBundle\Model\Links;
use Mpp\LemonWayClientBundle\Model\PaymentFormDetails;
use Mpp\LemonWayClientBundle\Model\SddMandate;
use Mpp\LemonWayClientBundle\Model\TransactionIn;
use Mpp\LemonWayClientBundle\Model\Transactions_TransactionIn;
use Mpp\LemonWayClientBundle\OptionsResolver\LemonWayMoneyInClientOptionsResolver;

class LemonWayMoneyInClient implements LemonWayClientInterface
{
    /**
     * GET /v2/moneyins/{accountId}/card
     * Retrieve the cards associated to an account.
     *
     * @method getCard
     *
     * @param string $accountId
     *
     * @return array
     */
    public function getAccountCards(string $accountId): array
    {
        $classNameMapping = [
            'cards' => sprintf('%s[]', Card::class),
            'error' => Error::class,
        ];

        return $this->requestAndPopulate($classNameMapping, 'GET', sprintf('/%s/card', $accountId));
    }

    /**
     * GET /v2/moneyins/{accountId}/mandate
     * Retrieve the manadates associated to an account.
     *
     * @method getMandate
     *
     * @param string $accountId
     *
     * @return array
     */
    public function getAccountMandates(string $accountId): array
    {
        $classNameMapping = [
            'mandates' => sprintf('%s[]', SddMandate::class),
            'error' => Error::class,
        ];

        return $this->requestAndPopulate($classNameMapping, 'GET', sprintf('/%s/mandate', $accountId));
    }

    /**
     * GET /v2/moneyins/paymentform/{formId}/completed
     * Retrieve details of a completed form.
     *
     * @method getCompletedPaymentForm
     *
     * @param string $formId
     *
     * @return array
     */
    public function getCompletedPaymentForm(string $formId): array
    {
        $classNameMapping = [
            'form' => PaymentFormDetails::class,
            'error' => Error::class,
        ];

        return $this->requestAndPopulate($classNameMapping, 'GET', sprintf('/%s/mandate', $accountId));
    }

    /**
     * GET /v2/moneyins/{accountId}/mandate/{mandateId}/document
     * Download a mandate document associated to an account.
     *
     * @method getMandateDocument
     *
     * @param string $accountId
     * @param string $mandateId
     *
     * @return array
     */
    public function getMandateDocument(string $accountId, string $mandateId): array
    {
        $classNameMapping = [
            'document' => 'string',
            'name' => 'string',
            'error' => Error::class,
        ];

        return $this->requestAndPopulate($classNameMapping, 'GET', sprintf('/%s/mandate/%s/document', $accountId, $mandateId));
    }

    /**
     * GET /v2/moneyins/sdd
     * List money ins by sdd.
     *
     * @method listBySdd
     *
     * @param array $options
     *
     * @return array
     */
    public function listBySdd(array $options): array
    {
        $classNameMapping = [
            'transactions' => Transactions_TransactionIn::class,
            '_links' => Links::class,
            'error' => Error::class,
        ];

        return $this->requestAndPopulate($classNameMapping, 'GET', '/sdd', [
            'query' => LemonWayMoneyInClientOptionsResolver::resolveListBySddOptions($options),
        ]);
    }

    /**
     * GET /v2/moneyins/bankwire
     * List money ins by fund transfer.
     *
     * @method listByFundTransfer
     *
     * @param array $options
     *
     * @return array
     */
    public function listByFundTransfer(array $options): array
    {
        $classNameMapping = [
            'transactions' => Transactions_TransactionIn::class,
            '_links' => Links::class,
            'error' => Error::class,
        ];

        return $this->requestAndPopulate($classNameMapping, 'GET', '/bankwire', [
            'query' => LemonWayMoneyInClientOptionsResolver::resolveListByFundTransferOptions($options),
        ]);
    }

    /**
     * GET /v2/moneyins/cheque
     * List money ins by cheque.
     *
     * @method listByCheque
     *
     * @param array $option
     *
     * @return array
     */
    public function listByCheque(array $option): array
    {
        $classNameMapping = [
            'transactions' => Transactions_TransactionIn::class,
            '_links' => Links::class,
            'error' => Error::class,
        ];

        return $this->requestAndPopulate($classNameMapping, 'GET', '/cheque', [
            'query' => LemonWayMoneyInClientOptionsResolver::resolveListByChequeOptions($options),
        ]);
    }

    /**
     * GET /v2/moneyins.
     * List money ins.
     *
     * @method list
     *
     * @param array $options
     *
     * @return array
     */
    public function list(array $options): array
    {
        $classNameMapping = [
            'transactions' => Transactions_TransactionIn::class,
            '_links' => Links::class,
            'error' => Error::class,
        ];

        return $this->requestAndPopulate($classNameMapping, 'GET', '/cheque', [
            'query' => LemonWayMoneyInClientOptionsResolver::resolveListOptions($options),
        ]);
    }

    /**
     * PUT /v2/moneyins/{transactionId}/cancel.
     * Cancel a money in.
     *
     * @method cancel
     *
     * @param int   $transactionId
     * @param array $options
     *
     * @return array
     */
    public function cancel(int $transactionId, array $options): array
    {
        $classNameMapping = [
            'transaction' => TransactionIn::class,
            'error' => Error::class,
        ];

        return $this->requestAndPopulate($classNameMapping, 'PUT', sprintf('/%s/cancel', $transactionId), [
            'body' => $this->serialize(LemonWayMoneyInClientOptionsResolver::resolveCancelOptions($options)),
        ]);
    }

    /**
     * PUT /v2/moneyins/card/{cardId}/unregister
     * Unregister a card from an account.
     *
     * @method unregister
     *
     * @param int   $cardId
     * @param array $options
     *
     * @return array
     */
    public function unregisterCard(int $cardId, array $options): array
    {
        $classNameMapping = [
            'cardId' => 'int',
            'error' => Error::class,
        ];

        return $this->requestAndPopulate($classNameMapping, 'PUT', sprintf('/card/%s/unregister', $cardId), [
            'body' => $this->serialize(LemonWayMoneyInClientOptionsResolver::resolveUnregisterOptions($options)),
        ]);
    }

    /**
     * PUT /v2/moneyins/{transactionId}/validate
     * Validate a money in (for deferred payment).
     *
     * @method validate
     *
     * @param int   $transactionId
     * @param array $options
     *
     * @return array
     */
    public function validate(int $transactionId, array $options): array
    {
        $classNameMapping = [
            'transaction' => TransactionIn::class,
            'error' => Error::class,
        ];

        return $this->requestAndPopulate($classNameMapping, 'PUT', sprintf('/%s/validate', $transactionId), [
            'body' => $this->serialize(LemonWayMoneyInClientOptionsResolver::resolveValidateOptions($options)),
        ]);
    }

    /**
     * PUT /v2/moneyins/paymentform/{formId}/disable
     * Disable a payment form.
     *
     * @method disablePaymentForm
     *
     * @param string $formId
     *
     * @return array
     */
    public function disablePaymentForm(string $formId): array
    {
        $classNameMapping = [
            'message' => 'string',
            'error' => Error::class,
        ];

        return $this->requestAndPopulate($classNameMapping, 'PUT', sprintf('/paymentform/%s/disable', $formId));
    }

    /**
     * PUT /v2/moneyins/ideal/{transactionId}/confirm.
     * Finalize a iDeal payment.
     *
     * @method confirmIDealPayment
     *
     * @param int $transactionId
     *
     * @return array
     */
    public function confirmIDealPayment(int $transactionId): array
    {
        $classNameMapping = [
            'transactions' => TransactionIn::class,
            'error' => Error::class,
        ];

        return $this->requestAndPopulate($classNameMapping, 'PUT', sprintf('/ideal/%s/confirm', $transactionId));
    }

    /**
     * PUT /v2/moneyins/sdd/mandate/{mandatId}/unregister
     * Desactivate a mandate.
     *
     * @method unregisterMandate
     *
     * @param int   $mandateId
     * @param array $option
     *
     * @return array
     */
    public function unregisterMandate(int $mandateId, array $option): array
    {
        $classNameMapping = [
            'SDDMandate' => SddMandate::class,
            'error' => Error::class,
        ];

        return $this->requestAndPopulate($classNameMapping, 'PUT', sprintf('/sdd/mandate/%s/unregister', $transactionId), [
            'body' => $this->serialize(LemonWayMoneyInClientOptionsResolver::resolveUnregisterMandateOptions($options)),
        ]);
    }

    /**
     * PUT /v2/moneyins/card/direct/{transactionId}/3dconfirm.
     *
     * @method confirm3D
     *
     * @param int   $transactionId
     * @param array $options
     *
     * @return array
     */
    public function confirm3D(int $transactionId, array $options = []): array
    {
        $classNameMapping = [
            'SDDMandate' => SddMandate::class,
            'error' => Error::class,
        ];

        return $this->requestAndPopulate($classNameMapping, 'PUT', sprintf('/card/direct/%s/3dconfirm', $transactionId), [
            'body' => $this->serialize(LemonWayMoneyInClientOptionsResolver::resolveConfirm3DOptions($options)),
        ]);
    }

    /**
     * POST /v2/moneyins/sdd/init
     * Init direct debit.
     *
     * @method initSdd
     *
     * @param array $option
     *
     * @return array
     */
    public function initSdd(array $option): array
    {
        $classNameMapping = [
            'transaction' => TransactionIn::class,
            'error' => Error::class,
        ];

        return $this->requestAndPopulate($classNameMapping, 'POST', '/sdd/init', [
            'body' => $this->serialize(LemonWayMoneyInClientOptionsResolver::resolveInitSddOptions($options)),
        ]);
    }

    /**
     * POST /v2/moneyins/ideal/init
     * Init iDeal payment.
     *
     * @method initIDeal
     *
     * @param array $options
     *
     * @return array
     */
    public function initIDeal(array $options): array
    {
        $classNameMapping = [
            'id' => 'int',
            'actionUrl' => 'string',
            'error' => Error::class,
        ];

        return $this->requestAndPopulate($classNameMapping, 'POST', '/ideal/init', [
            'body' => $this->serialize(LemonWayMoneyInClientOptionsResolver::resolveInitIDealOptions($options)),
        ]);
    }

    /**
     * POST /v2/moneyins/mbway/init
     * Init MB Way payment.
     *
     * @method initMBWay
     *
     * @param array $options
     *
     * @return array
     */
    public function initMBWay(array $options): array
    {
        $classNameMapping = [
            'euPagoInit' => EuPagoInit::class,
            'error' => Error::class,
        ];

        return $this->requestAndPopulate($classNameMapping, 'POST', '/mbway/init', [
            'body' => $this->serialize(LemonWayMoneyInClientOptionsResolver::resolveInitMBWayOptions($options)),
        ]);
    }

    /**
     * POST /v2/moneyins/card/create
     * Credit an account with moneyIn with card without PSP process.
     *
     * @method creditAccountWithCard
     *
     * @param array $options
     *
     * @return array
     */
    public function creditAccountWithCard(array $options): array
    {
        $classNameMapping = [
            'transaction' => TransactionIn::class,
            'error' => Error::class,
        ];

        return $this->requestAndPopulate($classNameMapping, 'POST', '/card/create', [
            'body' => $this->serialize(LemonWayMoneyInClientOptionsResolver::resolveCreditAccountWithCardOptions($options)),
        ]);
    }

    /**
     * POST /v2/moneyins/card/direct
     * Credit an account with a non 3D Secure card payment.
     *
     * @method creditAccountWithNon3DSecureCard
     *
     * @param array $options
     *
     * @return array
     */
    public function creditAccountWithNon3DSecureCard(array $options): array
    {
        $classNameMapping = [
            'transaction' => TransactionIn::class,
            'error' => Error::class,
        ];

        return $this->requestAndPopulate($classNameMapping, 'POST', '/card/direct', [
            'body' => $this->serialize(LemonWayMoneyInClientOptionsResolver::resolveCreditAccountWithNon3DSecureCardOptions($options)),
        ]);
    }

    /**
     * POST /v2/moneyins/cheque/init
     * Init cheque payment.
     *
     * @method initCheque
     *
     * @param array $options
     *
     * @return array
     */
    public function initCheque(array $options): array
    {
        $classNameMapping = [
            'transaction' => TransactionIn::class,
            'error' => Error::class,
        ];

        return $this->requestAndPopulate($classNameMapping, 'POST', '/cheque/init', [
            'body' => $this->serialize(LemonWayMoneyInClientOptionsResolver::resolveInitChequeOptions($options)),
        ]);
    }

    /**
     * POST /v2/moneyins/sdd/mandate
     * Register a SDD mandate.
     *
     * @method registerSddMandate
     *
     * @param array $options
     *
     * @return array
     */
    public function registerSddMandate(array $options): array
    {
        $classNameMapping = [
            'SDDMandate' => SddMandate::class,
            'error' => Error::class,
        ];

        return $this->requestAndPopulate($classNameMapping, 'POST', '/sdd/mandate', [
            'body' => $this->serialize(LemonWayMoneyInClientOptionsResolver::resolveRegisterSddMandateOptions($options)),
        ]);
    }

    /**
     * POST /v2/moneyins/sofort/init
     * Initialize Sofort payment.
     *
     * @method initSofort
     *
     * @param array $options
     *
     * @return array
     */
    public function initSofort(array $options): array
    {
        $classNameMapping = [
            'id' => 'int',
            'actionUrl' => 'string',
            'error' => Error::class,
        ];

        return $this->requestAndPopulate($classNameMapping, 'POST', '/sofort/init', [
            'body' => $this->serialize(LemonWayMoneyInClientOptionsResolver::resolveInitSofortOptions($options)),
        ]);
    }

    /**
     * POST /v2/moneyins/card/webinit
     * Init a money in to use LemonWay card payment web pages.
     *
     * @method initWeb
     *
     * @param array $options
     *
     * @return array
     */
    public function initWeb(array $options): array
    {
        $classNameMapping = [
            'webKitToken' => 'string',
            'id' => 'int',
            'cardId' => 'int',
            'error' => Error::class,
        ];

        return $this->requestAndPopulate($classNameMapping, 'POST', '/card/webinit', [
            'body' => $this->serialize(LemonWayMoneyInClientOptionsResolver::resolveInitWebOptions($options)),
        ]);
    }

    /**
     * POST /v2/moneyins/payshop/init
     * Init Payshop payment.
     *
     * @method initPayshop
     *
     * @param array $options
     *
     * @return array
     */
    public function initPayshop(array $options): array
    {
        $classNameMapping = [
            'euPagoInit' => EuPagoInit::class,
            'error' => Error::class,
        ];

        return $this->requestAndPopulate($classNameMapping, 'POST', '/payshop/init', [
            'body' => $this->serialize(LemonWayMoneyInClientOptionsResolver::resolveInitPayshopOptions($options)),
        ]);
    }

    /**
     * POST /v2/moneyins/trusly/init
     * Init Trustly payment.
     *
     * @method initTrustly
     *
     * @param array $options
     *
     * @return array
     */
    public function initTrustly(array $options): array
    {
        $classNameMapping = [
            'id' => 'int',
            'actionUrl' => 'string',
            'error' => Error::class,
        ];

        return $this->requestAndPopulate($classNameMapping, 'POST', '/trusly/init', [
            'body' => $this->serialize(LemonWayMoneyInClientOptionsResolver::resolveInitTrustlyOptions($options)),
        ]);
    }

    /**
     * POST /v2/moneyins/card/register
     * Register a card to an account.
     *
     * @method registerCard
     *
     * @param array $options
     *
     * @return array
     */
    public function registerCard(array $options): array
    {
        $classNameMapping = [
            'card' => Card::class,
            'error' => Error::class,
        ];

        return $this->requestAndPopulate($classNameMapping, 'POST', '/card/register', [
            'body' => $this->serialize(LemonWayMoneyInClientOptionsResolver::resolveRegisterCardOptions($options)),
        ]);
    }

    /**
     * POST /v2/moneyins/paytrail/init.
     *
     * @method initPayTrail
     *
     * @param array $options
     *
     * @return array
     */
    public function initPayTrail(array $options): array
    {
        $classNameMapping = [
            'id' => 'int',
            'actionUrl' => 'string',
            'error' => Error::class,
        ];

        return $this->requestAndPopulate($classNameMapping, 'POST', '/paytrail/init', [
            'body' => $this->serialize(LemonWayMoneyInClientOptionsResolver::resolveInitPayTrailOptions($options)),
        ]);
    }

    /**
     * POST /v2/moneyins/mobilePay/init.
     *
     * @method initMobilePay
     *
     * @param array $options
     *
     * @return array
     */
    public function initMobilePay(array $options): array
    {
        $classNameMapping = [
            'id' => 'int',
            'actionUrl' => 'string',
            'error' => Error::class,
        ];

        return $this->requestAndPopulate($classNameMapping, 'POST', '/mobilePay/init', [
            'body' => $this->serialize(LemonWayMoneyInClientOptionsResolver::resolveInitMobilePayOptions($options)),
        ]);
    }

    /**
     * POST /v2/moneyins/multibanco/init.
     *
     * @method initMultibanco
     *
     * @param array $options
     *
     * @return array
     */
    public function initMultibanco(array $options): array
    {
        $classNameMapping = [
            'id' => 'int',
            'actionUrl' => 'string',
            'error' => Error::class,
        ];

        return $this->requestAndPopulate($classNameMapping, 'POST', '/multibanco/init', [
            'body' => $this->serialize(LemonWayMoneyInClientOptionsResolver::resolveInitMultibancoOptions($options)),
        ]);
    }

    /**
     * POST /v2/moneyins/card/paymentform
     * Create payment form.
     *
     * @method createPaymentForm
     *
     * @param array $options
     *
     * @return array
     */
    public function createPaymentForm(array $options = []): array
    {
        $classNameMapping = [
            'form' => PaymentForm::class,
            'error' => Error::class,
        ];

        return $this->requestAndPopulate($classNameMapping, 'POST', '/card/paymentform', [
            'body' => $this->serialize(LemonWayMoneyInClientOptionsResolver::resolveCreatePaymentFormOptions($options)),
        ]);
    }

    /**
     * POST /v2/moneyins/card/direct/3dinit
     * Credit an account with a 3D Secure card payment.
     *
     * @method creditAccountWith3DSecureCard
     *
     * @param array $options
     *
     * @return array
     */
    public function creditAccountWith3DSecureCard(array $options): array
    {
        $classNameMapping = [
            'acs' => ACS::class,
            'transaction' => TransactionIn::class,
            'error' => Error::class,
        ];

        return $this->requestAndPopulate($classNameMapping, 'POST', '/card/direct/3dinit', [
            'body' => $this->serialize(LemonWayMoneyInClientOptionsResolver::resolveCreditAccountWith3DSecureCardOptions($options)),
        ]);
    }

    /**
     * POST /v2/moneyins/bankwire/iban/create
     * Create an iban for an account.
     *
     * @method createIban
     *
     * @param array $options
     *
     * @return array
     */
    public function createIban(array $options): array
    {
        $classNameMapping = [
            'id' => 'int',
            'iban' => 'string',
            'bic' => 'string',
            'holder' => 'string',
            'domiciliation' => 'string',
            'status' => 'int',
            'maxAvailableIbanPerWallet' => 'int',
            'maxAvailableIban' => 'int',
            'pdf' => 'string',
            'qrCode' => 'string',
            'error' => Error::class,
        ];

        return $this->requestAndPopulate($classNameMapping, 'POST', '/banwire/iban/create', [
            'body' => $this->serialize(LemonWayMoneyInClientOptionsResolver::resolveCreateIbanOptions($options)),
        ]);
    }

    /**
     * POST /v2/moneyins/card/{cardId}/rebill
     * Credit an account with a tokenized card.
     *
     * @method creditAccountWithAccountCard
     *
     * @param int   $cardId
     * @param array $options
     *
     * @return array
     */
    public function creditAccountWithAccountCard(int $cardId, array $options): array
    {
        $classNameMapping = [
            'transaction' => TransactionIn::class,
            'error' => Error::class,
        ];

        return $this->requestAndPopulate($classNameMapping, 'POST', sprintf('/card/%s/rebill', $cardId), [
            'body' => $this->serialize(LemonWayMoneyInClientOptionsResolver::resolveCreditAccountWithAccountCardOptions($options)),
        ]);
    }

    /**
     * POST /v2/moneyins/card/{cardId}/subscription
     * Credit an account with montly subscription.
     *
     * @method creditAccountWithMontlySubscription
     *
     * @param int   $cardId
     * @param array $options
     *
     * @return array
     */
    public function creditAccountWithMontlySubscription(int $cardId, array $options): array
    {
        $classNameMapping = [
            'transactions' => Transactions_TransactionIn::class,
            'error' => Error::class,
        ];

        return $this->requestAndPopulate($classNameMapping, 'POST', sprintf('/card/%s/subscription', $cardId), [
            'body' => $this->serialize(LemonWayMoneyInClientOptionsResolver::resolveCreditAccountWithMontlySubscriptionOptions($options)),
        ]);
    }

    /**
     * POST /v2/moneyins/bankwire/iban/{ibanId}/disable
     * Disable an iban for an account.
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
            'id' => 'int',
            'status' => 'int',
            'error' => Error::class,
        ];

        return $this->requestAndPopulate($classNameMapping, 'POST', sprintf('/card/%s/subscription', $ibanId), [
            'body' => $this->serialize(LemonWayMoneyInClientOptionsResolver::resolveDisableIbanOptions($options)),
        ]);
    }

    /**
     * POST /v2/moneyins/card/direct/{transactionid}/3dauthenticate
     * Check moneyin 3D secure status.
     *
     * @method check3DSecureStatus
     *
     * @param int   $transactionId
     * @param array $options
     *
     * @return array
     */
    public function check3DSecureStatus(int $transactionId, array $options): array
    {
        $classNameMapping = [
            'Operation3DCode' => string,
            'error' => Error::class,
        ];

        return $this->requestAndPopulate($classNameMapping, 'POST', sprintf('/card/direct/%s/3dauthenticate', $transactionId), [
            'body' => $this->serialize(LemonWayMoneyInClientOptionsResolver::resolveCheck3DSecureStatusOptions($options)),
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
        return '/v2/moneyins';
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
        return 'money_in';
    }
}
