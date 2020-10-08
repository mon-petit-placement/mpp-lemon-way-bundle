<?php

namespace Mpp\LemonWayClientBundle\Model;

class LegalAccount
{
    /**
     * @var string|null
     */
    private $id;

    /**
     * @var int|null
     */
    private $internalId;

    /**
     * @var Limits|null
     */
    private $limits;

    /**
     * @method getId
     *
     * @return string|null
     */
    public function getId(): ?string
    {
        return $this->id;
    }

    /**
     * @method setId
     *
     * @param string|null $id
     *
     * @return self
     */
    public function setId(?string $id): self
    {
        $this->id = $id;

        return $this;
    }

    /**
     * @method getInternalId
     *
     * @return int|null
     */
    public function getInternalId(): ?int
    {
        return $this->internalId;
    }

    /**
     * @method setInternalId
     *
     * @param int|null $internalId
     *
     * @return self
     */
    public function setInternalId(?int $internalId): self
    {
        $this->internalId = $internalId;

        return $this;
    }

    /**
     * @method getLimits
     *
     * @return Limits|null
     */
    public function getLimits(): ?Limits
    {
        return $this->limits;
    }

    /**
     * @method setLimits
     *
     * @param Limits|null $limits
     *
     * @return self
     */
    public function setLimits(?Limits $limits): self
    {
        $this->limits = $limits;

        return $this;
    }
}
