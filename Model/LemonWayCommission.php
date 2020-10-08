<?php

namespace Mpp\LemonWayClientBundle\Model;

class LemonWayCommission
{
    /**
     * @var string|null
     */
    private $idp2p;

    /**
     * @var int|null
     */
    private $amount;

    public function getIdp2p(): ?string
    {
        return $this->idp2p;
    }

    public function setIdp2p(?string $idp2p): self
    {
        $this->idp2p = $idp2p;

        return $this;
    }

    public function getAmount(): ?int
    {
        return $this->amount;
    }

    public function setAmount(?int $amount): self
    {
        $this->amount = $amount;

        return $this;
    }
}
