<?php

namespace Mpp\LemonWayClientBundle\Model;

class TransactionP2P
{
    const STATUS_SUCCESS = 0;
    const STATUS_LEMON_WAY_ERROR = 3;
    const STATUS_PENDING = 4;
    const STATUS_PSP_ERROR = 6;
    const STATUS_CANCELED = 7;
    const STATUS_VALIDATION_PENDING = 16;

    /**
     * @var string|null
     */
    private $senderAccountId;

    /**
     * @var string|null
     */
    private $receiverAccountId;

    /**
     * @var int|null
     */
    private $debitAmount;

    /**
     * @var int|null
     */
    private $creditAmount;

    /**
     * @var PrivateData|null
     */
    private $privateData;

    /**
     * @var string|null
     */
    private $scheduledDate;

    /**
     * @var bool|null
     */
    private $isFee;

    /**
     * @var int|null
     */
    private $feeReference;

    /**
     * @var int|null
     */
    private $id;

    /**
     * @var int|null
     */
    private $date;

    /**
     * @var int|null
     */
    private $commissionAmount;

    /**
     * @var string|null
     */
    private $comment;

    /**
     * @var int|null
     */
    private $status;

    /**
     * @var int|null
     */
    private $executionDate;

    /**
     * @var LemonWayCommission|null
     */
    private $lemonWayCommission;

    /**
     * @method getSenderAccountId
     *
     * @return string|null
     */
    public function getSenderAccountId(): ?string
    {
        return $this->senderAccountId;
    }

    /**
     * @method setSenderAccountId
     *
     * @param string|null $senderAccountId
     *
     * @return self
     */
    public function setSenderAccountId(?string $senderAccountId): self
    {
        $this->senderAccountId = $senderAccountId;

        return $this;
    }

    /**
     * @method getReceiverAccountId
     *
     * @return string|null
     */
    public function getReceiverAccountId(): ?string
    {
        return $this->receiverAccountId;
    }

    /**
     * @method setReceiverAccountId
     *
     * @param string|null $receiverAccountId
     *
     * @return self
     */
    public function setReceiverAccountId(?string $receiverAccountId): self
    {
        $this->receiverAccountId = $receiverAccountId;

        return $this;
    }

    /**
     * @method getDebitAmount
     *
     * @return int|null
     */
    public function getDebitAmount(): ?int
    {
        return $this->debitAmount;
    }

    /**
     * @method setDebitAmount
     *
     * @param int|null $debitAmount
     *
     * @return self
     */
    public function setDebitAmount(?int $debitAmount): self
    {
        $this->debitAmount = $debitAmount;

        return $this;
    }

    /**
     * @method getCreditAmount
     *
     * @return int|null
     */
    public function getCreditAmount(): ?int
    {
        return $this->creditAmount;
    }

    /**
     * @method setCreditAmount
     *
     * @param int|null $creditAmount
     *
     * @return self
     */
    public function setCreditAmount(?int $creditAmount): self
    {
        $this->creditAmount = $creditAmount;

        return $this;
    }

    /**
     * @method getPrivateData
     *
     * @return PrivateData|null
     */
    public function getPrivateData(): ?PrivateData
    {
        return $this->privateData;
    }

    /**
     * @method setPrivateData
     *
     * @param PrivateData|null $privateData
     *
     * @return self
     */
    public function setPrivateData(?PrivateData $privateData): self
    {
        $this->privateData = $privateData;

        return $this;
    }

    /**
     * @method getScheduledDate
     *
     * @return string|null
     */
    public function getScheduledDate(): ?string
    {
        return $this->scheduledDate;
    }

    /**
     * @method setScheduledDate
     *
     * @param string|null $scheduledDate
     *
     * @return self
     */
    public function setScheduledDate(?string $scheduledDate): self
    {
        $this->scheduledDate = $scheduledDate;

        return $this;
    }

    /**
     * @method isFee
     *
     * @return bool|null
     */
    public function isFee(): ?bool
    {
        return $this->isFee;
    }

    /**
     * @method setIsFee
     *
     * @param bool|null $isFee
     *
     * @return self
     */
    public function setIsFee(?bool $isFee): self
    {
        $this->isFee = $isFee;

        return $this;
    }

    /**
     * @method getFeeReference
     *
     * @return int|null
     */
    public function getFeeReference(): ?int
    {
        return $this->feeReference;
    }

    /**
     * @method setFeeReference
     *
     * @param int|null $feeReference
     *
     * @return self
     */
    public function setFeeReference(?int $feeReference): self
    {
        $this->feeReference = $feeReference;

        return $this;
    }

    /**
     * @method getId
     *
     * @return int|null
     */
    public function getId(): ?int
    {
        return $this->id;
    }

    /**
     * @method setId
     *
     * @param int|null $id
     *
     * @return self
     */
    public function setId(?int $id): self
    {
        $this->id = $id;

        return $this;
    }

    /**
     * @method getDate
     *
     * @return int|null
     */
    public function getDate(): ?int
    {
        return $this->date;
    }

    /**
     * @method setDate
     *
     * @param int|null $date
     *
     * @return self
     */
    public function setDate(?int $date): self
    {
        $this->date = $date;

        return $this;
    }

    /**
     * @method getCommissionAmount
     *
     * @return int|null
     */
    public function getCommissionAmount(): ?int
    {
        return $this->commissionAmount;
    }

    /**
     * @method setCommissionAmount
     *
     * @param int|null $commissionAmount
     *
     * @return self
     */
    public function setCommissionAmount(?int $commissionAmount): self
    {
        $this->commissionAmount = $commissionAmount;

        return $this;
    }

    /**
     * @method getComment
     *
     * @return string|null
     */
    public function getComment(): ?string
    {
        return $this->comment;
    }

    /**
     * @method setComment
     *
     * @param string|null $comment
     *
     * @return self
     */
    public function setComment(?string $comment): self
    {
        $this->comment = $comment;

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
     * @method getExecutionDate
     *
     * @return int|null
     */
    public function getExecutionDate(): ?int
    {
        return $this->executionDate;
    }

    /**
     * @method setExecutionDate
     *
     * @param int|null $executionDate
     *
     * @return self
     */
    public function setExecutionDate(?int $executionDate): self
    {
        $this->executionDate = $executionDate;

        return $this;
    }

    /**
     * @method getLemonWayCommission
     *
     * @return LemonWayCommission|null
     */
    public function getLemonWayCommission(): ?LemonWayCommission
    {
        return $this->lemonWayCommission;
    }

    /**
     * @method setLemonWayCommission
     *
     * @param LemonWayCommission|null $lemonWayCommission
     *
     * @return self
     */
    public function setLemonWayCommission(?LemonWayCommission $lemonWayCommission): self
    {
        $this->lemonWayCommission = $lemonWayCommission;

        return $this;
    }
}
