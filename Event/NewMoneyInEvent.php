<?php

namespace Mpp\LemonWayClientBundle\Event;

abstract class NewMoneyInEvent extends AbstractWebHookEvent
{
    /**
     * @var int
     */
    protected $idTransaction;

    /**
     * @var float
     */
    protected $amount;

    /**
     * @var int
     */
    protected $status;

    /**
     * @var string
     */
    protected $subscriptionId;

    /**
     * @var int
     */
    protected $scheduledNumber;

    /**
     * @method getIdTransaction
     *
     * @return string
     */
    public function getIdTransaction(): string
    {
        return $this->idTransaction;
    }

    /**
     * @method setIdTransaction
     *
     * @param string $idTransaction
     *
     * @return self
     */
    public function setIdTransaction(string $idTransaction): self
    {
        $this->idTransaction = $idTransaction;

        return $this;
    }

    /**
     * @method getAmount
     *
     * @return float
     */
    public function getAmount(): float
    {
        return $this->amount;
    }

    /**
     * @method setAmount
     *
     * @param int $amount
     *
     * @return self
     */
    public function setAmount(int $amount): self
    {
        $this->amount = $amount;

        return $this;
    }

    /**
     * @method getStatus
     *
     * @return int
     */
    public function getStatus(): int
    {
        return $this->status;
    }

    /**
     * @method setStatus
     *
     * @param int $status
     *
     * @return self
     */
    public function setStatus(int $status): self
    {
        $this->status = $status;

        return $this;
    }

    /**
     * @method getSubscriptionId
     *
     * @return string
     */
    public function getSubscriptionId(): string
    {
        return $this->subscriptionId;
    }

    /**
     * @method setSubscriptionId
     *
     * @param string $subscriptionId
     *
     * @return self
     */
    public function setSubscriptionId(string $subscriptionId): self
    {
        $this->subscriptionId = $subscriptionId;

        return $this;
    }

    /**
     * @method getScheduledNumber
     *
     * @return string
     */
    public function getScheduledNumber(): string
    {
        return $this->scheduledNumber;
    }

    /**
     * @method setScheduledNumber
     *
     * @param string $scheduledNumber
     *
     * @return self
     */
    public function setScheduledNumber(string $scheduledNumber): self
    {
        $this->scheduledNumber = $scheduledNumber;

        return $this;
    }
}
