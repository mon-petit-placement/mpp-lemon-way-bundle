<?php

namespace Mpp\LemonWayClientBundle\Model;

class TransactionAccount
{
    /**
     * @var TransactionIn|null
     */
    private $transactionIn;

    /**
     * @var TransactionOut|null
     */
    private $transactionOut;

    /**
     * @var TransactionP2P|null
     */
    private $transactionP2P;

    /**
     * @method getTransactionIn
     *
     * @return TransactionIn|null
     */
    public function getTransactionIn(): ?TransactionIn
    {
        return $this->transactionIn;
    }

    /**
     * @method setTransactionIn
     *
     * @param TransactionIn|null $transactionIn
     *
     * @return self
     */
    public function setTransactionIn(?TransactionIn $transactionIn): self
    {
        $this->transactionIn = $transactionIn;

        return $this;
    }

    /**
     * @method getTransactionOut
     *
     * @return TransactionOut|null
     */
    public function getTransactionOut(): ?TransactionOut
    {
        return $this->transactionOut;
    }

    /**
     * @method setTransactionOut
     *
     * @param TransactionOut|null $transactionOut
     *
     * @return self
     */
    public function setTransactionOut(?TransactionOut $transactionOut): self
    {
        $this->transactionOut = $transactionOut;

        return $this;
    }

    /**
     * @method getTransactionP2P
     *
     * @return TransactionP2P|null
     */
    public function getTransactionP2P(): ?TransactionP2P
    {
        return $this->transactionP2P;
    }

    /**
     * @method setTransactionP2P
     *
     * @param TransactionP2P|null $transactionP2P
     *
     * @return self
     */
    public function setTransactionP2P(?TransactionP2P $transactionP2P): self
    {
        $this->transactionP2P = $transactionP2P;

        return $this;
    }
}
