<?php

namespace Mpp\LemonWayClientBundle\Model;

class Transactions_TransactionOut
{
    /**
     * @var array<TransactionOut>|null
     */
    private $value;

    /**
     * @method getValue
     *
     * @return array<TransactionOut>|null
     */
    public function getValue(): ?array
    {
        return $this->value;
    }

    /**
     * @method setValue
     *
     * @param array<TransactionOut>|null $value
     *
     * @return self
     */
    public function setValue(?array $value): self
    {
        $this->value = $value;

        return $this;
    }
}
