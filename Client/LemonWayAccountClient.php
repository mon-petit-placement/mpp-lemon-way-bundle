<?php

namespace Mpp\LemonWayClientBundle\Client;

use Mpp\LemonWayClientBundle\Model\AccountBlock;
use Mpp\LemonWayClientBundle\Model\AccountDetails;
use Mpp\LemonWayClientBundle\Model\AccountKycStatus;
use Mpp\LemonWayClientBundle\Model\Document;
use Mpp\LemonWayClientBundle\Model\Error;
use Mpp\LemonWayClientBundle\Model\IndividualAccount;
use Mpp\LemonWayClientBundle\Model\LegalAccount;
use Mpp\LemonWayClientBundle\Model\Links;
use Mpp\LemonWayClientBundle\Model\Transactions_TransactionAccount;
use Mpp\LemonWayClientBundle\Model\UltimateBeneficialOwner;
use Mpp\LemonWayClientBundle\Model\UpdateAccountStatus;
use Mpp\LemonWayClientBundle\Model\UploadDocument;
use Mpp\LemonWayClientBundle\OptionsResolver\LemonWayAccountClientOptionsResolver;

class LemonWayAccountClient implements LemonWayClientInterface
{
    /**
     * GET /v2/accounts/{accountId}
     * Retrieve account data by its id.
     *
     * @method get
     *
     * @param string $accountId
     *
     * @return array
     */
    public function get(string $accountId): array
    {
        $classNameMapping = [
            'account' => AccountDetails::class,
            'error' => Error::class,
        ];

        return $this->requestAndPopulate($classNameMapping, 'GET', sprintf('/%s', $accountId));
    }

    /**
     * GET /v2/accounts/{accountId}/documents
     * Retrieve account documents by its id.
     *
     * @method getDocuments
     *
     * @param string $accountId
     *
     * @return array
     */
    public function getDocuments(string $accountId): array
    {
        $classNameMapping = [
            'documents' => sprintf('%s[]', Document::class),
            'error' => Error::class,
        ];

        return $this->requestAndPopulate($classNameMapping, 'GET', sprintf('/%s/documents', $accountId));
    }

    /**
     * GET /v2/accounts/{accountId}/ultimateBeneficialOwner
     * Retrieve account ultimate beneficial owner by its id.
     *
     * @method getUltimateBeneficialOwners
     *
     * @param string $accountId
     *
     * @return array
     */
    public function getUltimateBeneficialOwners(string $accountId): array
    {
        $classNameMapping = [
            'ultimateBeneficialOwners' => sprintf('%s[]', UltimateBeneficialOwner::class),
            'error' => Error::class,
        ];

        return $this->requestAndPopulate($classNameMapping, 'GET', sprintf('/%s/ultimateBeneficialOwner', $accountId));
    }

    /**
     * GET /v2/accounts/{accountId}/balances/history
     * Retrieve account balance by its id.
     *
     * @method getBalance
     *
     * @param string $accountId
     * @param array  $options
     *
     * @return array
     */
    public function getBalance(string $accountId, array $options = []): array
    {
        $classNameMapping = [
            'balance' => float,
            'error' => Error::class,
        ];

        return $this->requestAndPopulate($classNameMapping, 'GET', sprintf('/%s/balances/history', $accountId), [
            'query' => LemonWayAccountClientOptionsResolver::resolveGetBalanceOptions($options),
        ]);
    }

    /**
     * GET /v2/accounts/kycstatus
     * Retrieve all accounts kyc statuses since an update date.
     *
     * @method getKycStatuses
     *
     * @param array $options
     *
     * @return array
     */
    public function getKycStatuses(array $options = []): array
    {
        $classNameMapping = [
            'accounts' => sprintf('%s[]', AccountKycStatus::class),
            '_links' => Links::class,
            'error' => Error::class,
        ];

        return $this->requestAndPopulate($classNameMapping, 'GET', '/kycstatus', [
            'query' => LemonWayAccountClientOptionsResolver::resolveGetKycStatusesOptions($options),
        ]);
    }

    /**
     * GET /v2/accounts/balances
     * Retrieve all accounts balances.
     *
     * @method getBalances
     *
     * @param array $options
     *
     * @return array
     */
    public function getBalances(array $options = []): array
    {
        $classNameMapping = [
            'accounts' => sprintf('%s[]', AccountBalance::class),
            '_links' => Links::class,
            'error' => Error::class,
        ];

        return $this->requestAndPopulate($classNameMapping, 'GET', '/balances', [
            'query' => LemonWayAccountClientOptionsResolver::resolveGetBalancesOptions($options),
        ]);
    }

    /**
     * GET /v2/accounts/{accountId}/transactions
     * Retrieve account transaction by its id.
     *
     * @method getTransactions
     *
     * @param string $accountId
     * @param array  $options
     *
     * @return array
     */
    public function getTransactions(string $accountId, array $options = []): array
    {
        $classNameMapping = [
            'transactions' => Transactions_TransactionAccount::class,
            '_links' => Links::class,
            'error' => Error::class,
        ];

        return $this->requestAndPopulate($classNameMapping, 'GET', sprintf('/%s/transactions', $accountId), [
            'query' => LemonWayAccountClientOptionsResolver::resolveGetTransactionsOptions($options),
        ]);
    }

    /**
     * PUT /v2/accounts/legal/{accountid}
     * Update account legal data by its id.
     *
     * @method updateLegalData
     *
     * @param string $accountId
     * @param array  $options
     *
     * @return array
     */
    public function updateLegalData(string $accountId, array $options = []): array
    {
        $classNameMapping = [
            'account' => LegalAccount::class,
            'error' => Error::class,
        ];

        return $this->requestAndPopulate($classNameMapping, 'PUT', sprintf('/legal/%s', $accountId), [
            'body' => $this->serialize(LemonWayAccountClientOptionsResolver::resolveUpdateLegalDataOptions($options)),
        ]);
    }

    /**
     * PUT /v2/accounts/{accountid}/blocked
     * Update account block status by its id.
     *
     * @method updateBlockStatus
     *
     * @param string $accountId
     * @param array  $options
     *
     * @return array
     */
    public function updateBlockStatus(string $accountId, array $options = []): array
    {
        $classNameMapping = [
            'account' => AccountBlock::class,
            'error' => Error::class,
        ];

        return $this->requestAndPopulate($classNameMapping, 'PUT', sprintf('/%s/blocked', $accountId), [
            'body' => $this->serialize(LemonWayAccountClientOptionsResolver::resolveUpdateBlockStatusOptions($options)),
        ]);
    }

    /**
     * PUT /v2/accounts/kycstatus/{accountid}
     * Update account status by its id.
     *
     * @method updateStatus
     *
     * @param string $accountId
     * @param array  $options
     *
     * @return array
     */
    public function updateStatus(string $accountId, array $options = []): array
    {
        $classNameMapping = [
            'account' => UpdateAccountStatus::class,
            'error' => Error::class,
        ];

        return $this->requestAndPopulate($classNameMapping, 'PUT', sprintf('/kycstatus/%s', $accountId), [
            'body' => $this->serialize(LemonWayAccountClientOptionsResolver::resolveUpdateStatusOptions($options)),
        ]);
    }

    /**
     * PUT /v2/accounts/individual/{accountid}
     * Update account individual data by its id.
     *
     * @method updateIndividualData
     *
     * @param string $accountId
     * @param array  $options
     *
     * @return array
     */
    public function updateIndividualData(string $accountId, array $options): array
    {
        $classNameMapping = [
            'account' => IndividualAccount::class,
            'error' => Error::class,
        ];

        return $this->requestAndPopulate($classNameMapping, 'PUT', sprintf('/individual/%s', $accountId), [
            'body' => $this->serialize(LemonWayAccountClientOptionsResolver::resolveUpdateIndividualDataOptions($options)),
        ]);
    }

    /**
     * PUT /v2/accounts/{accountId}/ultimateBeneficialOwner/{UltimateBeneficialOwnerId}
     * Update ultimate beneficial owner data.
     *
     * @method updateUltimateBeneficialOwner
     *
     * @param string $accountId
     * @param int    $ultimateBeneficialOwnerId
     * @param array  $options
     *
     * @return array
     */
    public function updateUltimateBeneficialOwner(string $accountId, int $ultimateBeneficialOwnerId, array $options = []): array
    {
        $classNameMapping = [
            'ultimateBeneficialOwnerId' => int,
            'error' => Error::class,
        ];

        return $this->requestAndPopulate($classNameMapping, 'PUT', sprintf('/%s/ultimateBeneficialOwner/%s', $accountId, $ultimateBeneficialOwnerId), [
            'body' => $this->serialize(LemonWayAccountClientOptionsResolver::resolveUpdateUltimateBeneficialOwnerOptions($options)),
        ]);
    }

    /**
     * POST /v2/accounts/legal
     * Create legal account.
     *
     * @method createLegal
     *
     * @param array $options
     *
     * @return array
     */
    public function createLegal(array $options = []): array
    {
        $classNameMapping = [
            'legalAccount' => LegalAccount::class,
            'error' => Error::class,
        ];

        return $this->requestAndPopulate($classNameMapping, 'POST', '/legal', [
            'body' => $this->serialize(LemonWayAccountClientOptionsResolver::resolveCreateLegalOptions($options)),
        ]);
    }

    /**
     * POST /v2/accounts/individual
     * Create individual account.
     *
     * @method createIndividual
     *
     * @param array $options
     *
     * @return array
     */
    public function createIndividual(array $options = []): array
    {
        $classNameMapping = [
            'account' => IndividualAccount::class,
            'error' => Error::class,
        ];

        return $this->requestAndPopulate($classNameMapping, 'POST', '/individual', [
            'body' => $this->serialize(LemonWayAccountClientOptionsResolver::resolveCreateIndividualOptions($options)),
        ]);
    }

    /**
     * POST /v2/accounts/retrieve
     * Retrieve detailed accounts data.
     *
     * @method retrieve
     *
     * @param array $options
     *
     * @return array
     */
    public function retrieve(array $options = []): array
    {
        $classNameMapping = [
            'accounts' => sprintf('%s[]', AccountDetails::class),
            'error' => Error::class,
        ];

        return $this->requestAndPopulate($classNameMapping, 'POST', '/retrieve', [
            'body' => $this->serialize(LemonWayAccountClientOptionsResolver::resolveRetrieveOptions($options)),
        ]);
    }

    /**
     * POST /v2/accounts/{accountid}/enrolment/init
     * Initialize enrolment for an account by its id.
     *
     * @method initEnrolment
     *
     * @param string $accountId
     * @param array  $options
     *
     * @return array
     */
    public function initEnrolment(string $accountId, array $options = []): array
    {
        $classNameMapping = [
            'redirectUrl' => string,
            'error' => Error::class,
        ];

        return $this->requestAndPopulate($classNameMapping, 'POST', sprintf('/%s/enrolment/init', $accountId), [
            'body' => $this->serialize(LemonWayAccountClientOptionsResolver::resolveInitEnrolmentOptions($options)),
        ]);
    }

    /**
     * POST /v2/accounts/{accountid}/documents/upload
     * Upload documents to an account by its id.
     *
     * @method uploadDocuments
     *
     * @param string $accountId
     * @param array  $options
     *
     * @return array
     */
    public function uploadDocuments(string $accountId, array $options = []): array
    {
        $multipart = [];
        foreach ($options['documents'] as $index => $document) {
            $multipart[] = [
                'name' => $document->getName(),
                'contents' => $document->getContent(),
            ];
        }

        $classNameMapping = [
            'uploadDocument' => UploadDocument::class,
            'error' => Error::class,
        ];

        return $this->requestAndPopulate($classNameMapping, 'POST', sprintf('/%s/documents/upload', $accountId), [
            'body' => $this->serialize(LemonWayAccountClientOptionsResolver::resolveUploadDocumentsOptions($options)),
            'multipart' => $multipart,
        ]);

        return [
        ];
    }

    /**
     * POST /v2/accounts/{accountid}/ultimateBeneficialOwner
     * Create untimate beneficial owner.
     *
     * @method createUltimateBeneficialOwner
     *
     * @param string $accountId
     * @param array  $options
     *
     * @return array
     */
    public function createUltimateBeneficialOwner(string $accountId, array $options = []): array
    {
        $classNameMapping = [
            'ultimateBeneficialOwnerId' => int,
            'error' => Error::class,
        ];

        return $this->requestAndPopulate($classNameMapping, 'POST', sprintf('/%s/ultimateBeneficialOwner', $accountId), [
            'body' => $this->serialize(LemonWayAccountClientOptionsResolver::resolveCreateUltimateBeneficialOwnerOptions($options)),
        ]);
    }

    /**
     * POST /v2/accounts/{accountid}/documents/{documentid}/signinit
     * Generate electronical signature for an account document.
     *
     * @method signDocument
     *
     * @param string $accountId
     * @param int    $documentId
     * @param array  $options
     *
     * @return array
     */
    public function signDocument(string $accountId, int $documentId, array $options = []): array
    {
        $classNameMapping = [
            'signDocument' => string,
            'error' => Error::class,
        ];

        return $this->requestAndPopulate($classNameMapping, 'POST', sprintf('/%s/documents/%s/signinit', $accountId, $documentId), [
            'body' => $this->serialize(LemonWayAccountClientOptionsResolver::resolveSignDocumentOptions($options)),
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
        return '/v2/accounts';
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
        return 'account';
    }
}
