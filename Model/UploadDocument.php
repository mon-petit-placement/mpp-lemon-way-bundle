<?php

namespace Mpp\LemonWayClientBundle\Model;

class UpdateAccountStatus
{
    const STATUS_DOCUMENT_PUT_ON_HOLD = 0;
    const STATUS_RECEIVED_NEED_MANUAL_VALIDATION = 1;
    const STATUS_ACCEPTED = 2;
    const STATUS_REJECTED = 3;
    const STATUS_REJECTED_UNREADABLE_BY_HUMAN = 4;
    const STATUS_REJECTED_EXPIRED = 5;
    const STATUS_REJECTED_WRONG_TYPE = 6;
    const STATUS_REJECTED_WRONG_NAME = 7;
    const STATUS_REJECTED_DUPLICATED_DOCUMENT = 8;

    const SUBSTATUS_DOCUMENT_TYPE_NOT_PROCESSABLE_AUTOMATICALLY = 1;
    const SUBSTATUS_UNREADABLE_BY_COMPUTER = 2;
    const SUBSTATUS_WRONG_TYPE = 3;
    const SUBSTATUS_WRONG_NAME = 4;
    const SUBSTATUS_FILE_TOO_BIG = 5;
    const SUBSTATUS_AUTOMATIC_CONTROLS_FAILED = 6;
    const SUBSTATUS_NEED_2_SIDES_OF_DOCUMENT_IN_ONE_FILE = 7;
    const SUBSTATUS_UNKNOWN = 8;

    const ACCOUNTSTATUS_REGISTERED_KYC_INCOMPLETE = 2;
    const ACCOUNTSTATUS_REGISTERED_KYC_REJECTED = 3;
    const ACCOUNTSTATUS_REGISTERED_KYC_1 = 5;
    const ACCOUNTSTATUS_REGISTERED_KYC_2 = 6;
    const ACCOUNTSTATUS_REGISTERED_KYC_3 = 7;
    const ACCOUNTSTATUS_REGISTERED_KYC_EXPIRED = 8;
    const ACCOUNTSTATUS_BLOCKED = 10;
    const ACCOUNTSTATUS_CLOSED = 12;
    const ACCOUNTSTATUS_REGISTERED_KYC_UPDATED = 13;
    const ACCOUNTSTATUS_ONE_TIME_CUSTOMER = 14;
    const ACCOUNTSTATUS_SPECIAL_ACCOUNT_FOR_CROWDLENDING = 15;
    const ACCOUNTSTATUS_TECHNICAL_ACCOUNT = 16;

    /**
     * @var string|null
     */
    private $id;

    /**
     * @var int|null
     */
    private $status;

    /**
     * @var int|null
     */
    private $substatus;

    /**
     * @var int|null
     */
    private $accountstatus;

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

    /**
     * @method getSubstatus
     *
     * @return int|null
     */
    public function getSubstatus(): ?int
    {
        return $this->substatus;
    }

    /**
     * @method setSubstatus
     *
     * @param int|null $substatus
     *
     * @return self
     */
    public function setSubstatus(?int $substatus): self
    {
        $this->substatus = $substatus;

        return $this;
    }

    /**
     * @method getAccountstatus
     *
     * @return int|null
     */
    public function getAccountstatus(): ?int
    {
        return $this->accountstatus;
    }

    /**
     * @method setAccountstatus
     *
     * @param int|null $accountstatus
     *
     * @return self
     */
    public function setAccountstatus(?int $accountstatus): self
    {
        $this->accountstatus = $accountstatus;

        return $this;
    }
}
