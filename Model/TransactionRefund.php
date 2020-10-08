<?php

namespace Mpp\LemonWayClientBundle\Model;

class TransactionRefund
{
    const STATUS_SUCCESS = 0;
    const STATUS_PENDING = 4;
    const STATUS_PSP_ERROR = 6;

    /**
     * @var string|null
     */
    private $senderAccountId;

    /**
     * @var int|null
     */
    private $debitAmount;

    /**
     * @var int|null
     */
    private $ibanId;

    /**
     * @var string|null
     */
    private $maskedLabel;

    /**
     * @var string|null
     */
    private $bankStatus;

    /**
     * @var PSP|null
     */
    private $PSP;

    /**
     * @var string|null
     */
    private $originId;

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
     * @method getIbanId
     *
     * @return int|null
     */
    public function getIbanId(): ?int
    {
        return $this->ibanId;
    }

    /**
     * @method setIbanId
     *
     * @param int|null $ibanId
     *
     * @return self
     */
    public function setIbanId(?int $ibanId): self
    {
        $this->ibanId = $ibanId;

        return $this;
    }

    /**
     * @method getMaskedLabel
     *
     * @return string|null
     */
    public function getMaskedLabel(): ?string
    {
        return $this->maskedLabel;
    }

    /**
     * @method setMaskedLabel
     *
     * @param string|null $maskedLabel
     *
     * @return self
     */
    public function setMaskedLabel(?string $maskedLabel): self
    {
        $this->maskedLabel = $maskedLabel;

        return $this;
    }

    /**
     * @method getBankStatus
     *
     * @return string|null
     */
    public function getBankStatus(): ?string
    {
        return $this->bankStatus;
    }

    /**
     * @method setBankStatus
     *
     * @param string|null $bankStatus
     *
     * @return self
     */
    public function setBankStatus(?string $bankStatus): self
    {
        $this->bankStatus = $bankStatus;

        return $this;
    }

    /**
     * @method getPSP
     *
     * @return PSP|null
     */
    public function getPSP(): ?PSP
    {
        return $this->PSP;
    }

    /**
     * @method setPSP
     *
     * @param PSP|null $PSP
     *
     * @return self
     */
    public function setPSP(?PSP $PSP): self
    {
        $this->PSP = $PSP;

        return $this;
    }

    /**
     * @method getRefundAmount
     *
     * @return float|null
     */
    public function getRefundAmount(): ?float
    {
        return $this->refundAmount;
    }

    /**
     * @method setRefundAmount
     *
     * @param float|null $refundAmount
     *
     * @return self
     */
    public function setRefundAmount(?float $refundAmount): self
    {
        $this->refundAmount = $refundAmount;

        return $this;
    }

    /**
     * @method getOriginId
     *
     * @return string|null
     */
    public function getOriginId(): ?string
    {
        return $this->originId;
    }

    /**
     * @method setOriginId
     *
     * @param string|null $originId
     *
     * @return self
     */
    public function setOriginId(?string $originId): self
    {
        $this->originId = $originId;

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
