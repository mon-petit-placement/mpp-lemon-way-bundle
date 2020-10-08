<?php

namespace Mpp\LemonWayClientBundle\Model;

class Transactions_TransactionAccount
{
    /**
     * @var array<TransactionAccount>|null
     */
    private $value;

    /**
     * @method getValue
     *
     * @return array<TransactionAccount>|null
     */
    public function getValue(): ?array
    {
        return $this->value;
    }

    /**
     * @method setValue
     *
     * @param array<TransactionAccount>|null $value
     *
     * @return self
     */
    public function setValue(?array $value): self
    {
        $this->value = $value;

        return $this;
    }
}
