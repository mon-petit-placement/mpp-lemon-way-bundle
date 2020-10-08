<?php

namespace Mpp\LemonWayClientBundle\Model;

class AccountBalance
{
    const STATUS_REGISTERED_KYC_INCOMPLETE = 2;
    const STATUS_REGISTERED_KYC_REJECTED = 3;
    const STATUS_REGISTERED_KYC_1 = 5;
    const STATUS_REGISTERED_KYC_2 = 6;
    const STATUS_REGISTERED_KYC_3 = 7;
    const STATUS_REGISTERED_KYC_EXPIRED = 8;
    const STATUS_BLOCKED = 10;
    const STATUS_CLOSED = 12;
    const STATUS_REGISTERED_KYC_UPDATED = 13;
    const STATUS_ONE_TIME_CUSTOMER = 14;
    const STATUS_SPECIAL_ACCOUNT_FOR_CROWDLENDING = 15;
    const STATUS_TECHNICAL_ACCOUNT = 16;

    /**
     * @var string|null
     */
    private $id;

    /**
     * @var int|null
     */
    private $balance;

    /**
     * @var int|null
     */
    private $status;

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
     * @method getBalance
     *
     * @return int|null
     */
    public function getBalance(): ?int
    {
        return $this->balance;
    }

    /**
     * @method setBalance
     *
     * @param int|null $balance
     *
     * @return self
     */
    public function setBalance(?int $balance): self
    {
        $this->balance = $balance;

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
}
