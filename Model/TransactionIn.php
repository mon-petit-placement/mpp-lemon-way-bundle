<?php

namespace Mpp\LemonWayClientBundle\Model;

class TransactionIn
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
    private $receiverAccountId;

    /**
     * @var int|null
     */
    private $creditAmount;

    /**
     * @var string|null
     */
    private $scheduledDate;

    /**
     * @var string|null
     */
    private $scheduledNumber;

    /**
     * @var int|null
     */
    private $method;

    /**
     * @var string|null
     */
    private $maskedLabel;

    /**
     * @var PSP|null
     */
    private $PSP;

    /**
     * @var Card|null
     */
    private $card;

    /**
     * @var string|null
     */
    private $bankStatus;

    /**
     * @var float|null
     */
    private $refundAmount;

    /**
     * @var string|null
     */
    private $bankReference;

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
     * @method getScheduledNumber
     *
     * @return string|null
     */
    public function getScheduledNumber(): ?string
    {
        return $this->scheduledNumber;
    }

    /**
     * @method setScheduledNumber
     *
     * @param string|null $scheduledNumber
     *
     * @return self
     */
    public function setScheduledNumber(?string $scheduledNumber): self
    {
        $this->scheduledNumber = $scheduledNumber;

        return $this;
    }

    /**
     * @method getMethod
     *
     * @return int|null
     */
    public function getMethod(): ?int
    {
        return $this->method;
    }

    /**
     * @method setMethod
     *
     * @param int|null $method
     *
     * @return self
     */
    public function setMethod(?int $method): self
    {
        $this->method = $method;

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
     * @method getCard
     *
     * @return Card|null
     */
    public function getCard(): ?Card
    {
        return $this->card;
    }

    /**
     * @method setCard
     *
     * @param Card|null $card
     *
     * @return self
     */
    public function setCard(?Card $card): self
    {
        $this->card = $card;

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
     * @method getBankReference
     *
     * @return string|null
     */
    public function getBankReference(): ?string
    {
        return $this->bankReference;
    }

    /**
     * @method setBankReference
     *
     * @param string|null $bankReference
     *
     * @return self
     */
    public function setBankReference(?string $bankReference): self
    {
        $this->bankReference = $bankReference;

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
