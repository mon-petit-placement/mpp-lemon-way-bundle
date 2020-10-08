<?php

namespace Mpp\LemonWayClientBundle\Model;

class AccountKycStatus
{
    const STATUS_REGISTERED_INCOMPLETE_KYC = 2;
    const STATUS_REGISTERED_REJECTED_KYC = 3;
    const STATUS_REGISTERED_KYC_1 = 5;
    const STATUS_REGISTERED_KYC_2 = 6;
    const STATUS_REGISTERED_KYC_3 = 7;
    const STATUS_REGISTERED_EXPIRED_KYC = 8;
    const STATUS_BLOCKED = 10;
    const STATUS_CLOSED = 12;
    const STATUS_REGISTERED_STATUS_UPDATED = 13;
    const STATUS_ONE_TIME_CUSTOMER = 14;
    const STATUS_SPECIAL_ACCOUNT_CROWDLENDING = 15;
    const STATUS_TECHNICAL_ACCOUNT = 16;

    /**
     * @var string|null
     */
    private $id;

    /**
     * @var int|null
     */
    private $status;

    /**
     * @var string|null
     */
    private $date;

    /**
     * @var array<Document>|null
     */
    private $documents;

    /**
     * @var array<Iban>|null
     */
    private $ibans;

    /**
     * @var array<SddMandate>|null
     */
    private $sddMandates;

    /**
     * @method getId
     *
     * @return string|null
     */
    public function getId(): ?string
    {
        return $this->id;
    }

    /**
     * @method setId
     *
     * @param string|null $id
     *
     * @return self
     */
    public function setId(?string $id): self
    {
        $this->id = $id;

        return $this;
    }

    /**
     * @method getStatus
     *
     * @return int|null
     */
    public function getStatus(): ?int
    {
        return $this->status;
    }

    /**
     * @method setStatus
     *
     * @param int|null $status
     *
     * @return self
     */
    public function setStatus(?int $status): self
    {
        $this->status = $status;

        return $this;
    }

    /**
     * @method getDate
     *
     * @return string|null
     */
    public function getDate(): ?string
    {
        return $this->date;
    }

    /**
     * @method setDate
     *
     * @param string|null $date
     *
     * @return self
     */
    public function setDate(?string $date): self
    {
        $this->date = $date;

        return $this;
    }

    /**
     * @method getDocuments
     *
     * @return array<Document>|null
     */
    public function getDocuments(): ?array
    {
        return $this->documents;
    }

    /**
     * @method setDocuments
     *
     * @param array<Document>|null $documents
     *
     * @return self
     */
    public function setDocuments(?array $documents): self
    {
        $this->documents = $documents;

        return $this;
    }

    /**
     * @method getIbans
     *
     * @return array<Iban>|null
     */
    public function getIbans(): ?array
    {
        return $this->ibans;
    }

    /**
     * @method setIbans
     *
     * @param array<Iban>|null $ibans
     *
     * @return self
     */
    public function setIbans(?array $ibans): self
    {
        $this->ibans = $ibans;

        return $this;
    }

    /**
     * @method getSddMandates
     *
     * @return array<SddMandate>|null
     */
    public function getSddMandates(): ?array
    {
        return $this->sddMandates;
    }

    /**
     * @method setSddMandates
     *
     * @param array<SddMandate>|null $sddMandates
     *
     * @return self
     */
    public function setSddMandates(?array $sddMandates): self
    {
        $this->sddMandates = $sddMandates;

        return $this;
    }
}
