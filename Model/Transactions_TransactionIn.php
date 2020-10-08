<?php

namespace Mpp\LemonWayClientBundle\Model;

class Transactions_TransactionIn
{
    /**
     * @var array<TransactionIn>|null
     */
    private $value;

    /**
     * @method getValue
     *
     * @return array<TransactionIn>|null
     */
    public function getValue(): ?array
    {
        return $this->value;
    }

    /**
     * @method setValue
     *
     * @param array<TransactionIn>|null $value
     *
     * @return self
     */
    public function setValue(?array $value): self
    {
        $this->value = $value;

        return $this;
    }
}
