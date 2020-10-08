<?php

namespace Mpp\LemonWayClientBundle\Model;

class Iban
{
    const STATUS_NONE = 1;
    const STATUS_INTERNAL = 2;
    const STATUS_NOT_USED = 3;
    const STATUS_WAITING_VERIFICATION = 4;
    const STATUS_ACTIVATED = 5;
    const STATUS_REJECTED_BY_BANK = 6;
    const STATUS_REJECTED_NO_OWNER = 7;
    const STATUS_REJECTED_DESACTIVATED = 8;
    const STATUS_REJECTED_REJECTED = 9;

    const TYPE_MERCHANT = 1;
    const TYPE_VIRTUAL_CLIENT = 2;

    /**
     * @var int|null
     */
    private $id;

    /**
     * @var int|null
     */
    private $status;

    /**
     * @var string|null
     */
    private $iban;

    /**
     * @var string|null
     */
    private $swift;

    /**
     * @var string|null
     */
    private $holder;

    /**
     * @var int|null
     */
    private $type;

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
     * @method getIban
     *
     * @return string|null
     */
    public function getIban(): ?string
    {
        return $this->iban;
    }

    /**
     * @method setIban
     *
     * @param string|null $iban
     *
     * @return self
     */
    public function setIban(?string $iban): self
    {
        $this->iban = $iban;

        return $this;
    }

    /**
     * @method getSwift
     *
     * @return string|null
     */
    public function getSwift(): ?string
    {
        return $this->swift;
    }

    /**
     * @method setSwift
     *
     * @param string|null $swift
     *
     * @return self
     */
    public function setSwift(?string $swift): self
    {
        $this->swift = $swift;

        return $this;
    }

    /**
     * @method getHolder
     *
     * @return string|null
     */
    public function getHolder(): ?string
    {
        return $this->holder;
    }

    /**
     * @method setHolder
     *
     * @param string|null $holder
     *
     * @return self
     */
    public function setHolder(?string $holder): self
    {
        $this->holder = $holder;

        return $this;
    }

    /**
     * @method getType
     *
     * @return int|null
     */
    public function getType(): ?int
    {
        return $this->type;
    }

    /**
     * @method setType
     *
     * @param int|null $type
     *
     * @return self
     */
    public function setType(?int $type): self
    {
        $this->type = $type;

        return $this;
    }
}
