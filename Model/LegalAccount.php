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
    private $lemonwayId;

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
     * @method getLemonwayId
     *
     * @return int|null
     */
    public function getLemonwayId(): ?int
    {
        return $this->lemonwayId;
    }

    /**
     * @method setLemonwayId
     *
     * @param int|null $lemonwayId
     *
     * @return self
     */
    public function setLemonwayId(?int $lemonwayId): self
    {
        $this->lemonwayId = $lemonwayId;

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
