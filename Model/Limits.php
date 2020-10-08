<?php

namespace Mpp\LemonWayClientBundle\Model;

class Limits
{
    /**
     * @var int|null
     */
    private $totalMoneyInAllowed;

    /**
     * @var float|null
     */
    private $amountMoneyInAllowed;

    /**
     * @method getTotalMoneyInAllowed
     *
     * @return int|null
     */
    public function getTotalMoneyInAllowed(): ?int
    {
        return $this->totalMoneyInAllowed;
    }

    /**
     * @method setTotalMoneyInAllowed
     *
     * @param int|null $totalMoneyInAllowed
     *
     * @return self
     */
    public function setTotalMoneyInAllowed(?int $totalMoneyInAllowed): self
    {
        $this->totalMoneyInAllowed = $totalMoneyInAllowed;

        return $this;
    }

    /**
     * @method getAmountMoneyInAllowed
     *
     * @return float|null
     */
    public function getAmountMoneyInAllowed(): ?float
    {
        return $this->amountMoneyInAllowed;
    }

    /**
     * @method setAmountMoneyInAllowed
     *
     * @param float|null $amountMoneyInAllowed
     *
     * @return self
     */
    public function setAmountMoneyInAllowed(?float $amountMoneyInAllowed): self
    {
        $this->amountMoneyInAllowed = $amountMoneyInAllowed;

        return $this;
    }
}
