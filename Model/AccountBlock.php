<?php

namespace Mpp\LemonWayClientBundle\Model;

class AccountBlock
{
    /**
     * @var string|null
     */
    private $id;

    /**
     * @var bool|null
     */
    private $isBlocked;

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
     * @method isBlocked
     *
     * @return bool|null
     */
    public function isBlocked(): ?bool
    {
        return $this->isBlocked;
    }

    /**
     * @method setIsBlocked
     *
     * @param bool|null $isBlocked
     *
     * @return self
     */
    public function setIsBlocked(?bool $isBlocked): self
    {
        $this->isBlocked = $isBlocked;

        return $this;
    }
}
