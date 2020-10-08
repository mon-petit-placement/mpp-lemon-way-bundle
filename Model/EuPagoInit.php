<?php

namespace Mpp\LemonWayClientBundle\Model;

class EuPagoInit
{
    /**
     * @var int|null
     */
    private $id;

    /**
     * @var string|null
     */
    private $reference;

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
     * @method getReference
     *
     * @return string|null
     */
    public function getReference(): ?string
    {
        return $this->reference;
    }

    /**
     * @method setReference
     *
     * @param string|null $reference
     *
     * @return self
     */
    public function setReference(?string $reference): self
    {
        $this->reference = $reference;

        return $this;
    }
}
