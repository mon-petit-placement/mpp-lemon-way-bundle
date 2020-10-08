<?php

namespace Mpp\LemonWayClientBundle\Model;

class UpdateAccountStatus
{
    const STATUS_UNKNOWN = 0;
    const STATUS_NOT_OPENED = 1;
    const STATUS_OPENED_DOCUMENT_INCOMPLETE = 2;
    const STATUS_OPENED_DOCUMENT_REJECTED = 3;
    const STATUS_OPENED_KYC_1 = 5;
    const STATUS_OPENED_KYC_2 = 6;
    const STATUS_OPENED_KYC_3 = 7;
    const STATUS_OPENED_DOCUMENT_EXPIRED = 8;
    const STATUS_FROZEN = 9;
    const STATUS_BLOCKED = 10;
    const STATUS_LOCKED = 11;
    const STATUS_CLOSED = 12;
    const STATUS_PENDING_KYC_3 = 13;
    const STATUS_ONE_TIME_CUSTOMER = 14;
    const STATUS_CGE = 15;
    const STATUS_TECHNICAL_ACCOUNT = 16;

    /**
     * @var string|null
     */
    private $id;

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
