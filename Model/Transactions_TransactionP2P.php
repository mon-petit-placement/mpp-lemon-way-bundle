<?php

namespace Mpp\LemonWayClientBundle\Model;

class Transactions_TransactionP2P
{
    /**
     * @var array<TransactionP2P>|null
     */
    private $value;

    /**
     * @method getValue
     *
     * @return array<TransactionP2P>|null
     */
    public function getValue(): ?array
    {
        return $this->value;
    }

    /**
     * @method setValue
     *
     * @param array<TransactionP2P>|null $value
     *
     * @return self
     */
    public function setValue(?array $value): self
    {
        $this->value = $value;

        return $this;
    }
}
