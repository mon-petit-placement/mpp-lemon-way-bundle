<?php

namespace Mpp\LemonWayClientBundle\Model;

class SddMandate
{
    const STATUS_NOT_VALIDATED = 0;
    const STATUS_CAN_BE_USED_6_WORKING_DAYS = 5;
    const STATUS_CAN_BE_USED_3_WORKING_DAYS = 6;
    const STATUS_DESACTIVATED = 8;
    const STATUS_REJECTED = 9;

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
    private $IBAN;

    /**
     * @var string|null
     */
    private $BIC;

    /**
     * @var string|null
     */
    private $holder;

    /**
     * @var string|null
     */
    private $UniqueMandateReference;

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
     * @method getIBAN
     *
     * @return string|null
     */
    public function getIBAN(): ?string
    {
        return $this->IBAN;
    }

    /**
     * @method setIBAN
     *
     * @param string|null $IBAN
     *
     * @return self
     */
    public function setIBAN(?string $IBAN): self
    {
        $this->IBAN = $IBAN;

        return $this;
    }

    /**
     * @method getBIC
     *
     * @return string|null
     */
    public function getBIC(): ?string
    {
        return $this->BIC;
    }

    /**
     * @method setBIC
     *
     * @param string|null $BIC
     *
     * @return self
     */
    public function setBIC(?string $BIC): self
    {
        $this->BIC = $BIC;

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
     * @method getUniqueMandateReference
     *
     * @return string|null
     */
    public function getUniqueMandateReference(): ?string
    {
        return $this->UniqueMandateReference;
    }

    /**
     * @method setUniqueMandateReference
     *
     * @param string|null $UniqueMandateReference
     *
     * @return self
     */
    public function setUniqueMandateReference(?string $UniqueMandateReference): self
    {
        $this->UniqueMandateReference = $UniqueMandateReference;

        return $this;
    }
}
