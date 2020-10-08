<?php

namespace Mpp\LemonWayClientBundle\Event;

class MoneyOutCanceledEvent extends AbstractWebHookEvent
{
    /**
     * @var int
     */
    private $idTransaction;

    /**
     * @var float
     */
    private $amount;

    /**
     * @var int
     */
    private $status;

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
     * {@inheritdoc}
     */
    public static function getEventName(): string
    {
        return WebHooksEvents::MONEY_OUT_CANCELED;
    }
}
