<?php

namespace Mpp\LemonWayClientBundle\Model;

class PrivateData
{
    /**
     * @var array<string>|null
     */
    private $value;

    /**
     * @method getValue
     *
     * @return array<string>|null
     */
    public function getValue(): ?array
    {
        return $this->value;
    }

    /**
     * @method setValue
     *
     * @param array<string>|null $value
     *
     * @return self
     */
    public function setValue(?array $value): self
    {
        $this->value = $value;

        return $this;
    }
}
