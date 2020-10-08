<?php

namespace Mpp\LemonWayClientBundle\Model;

class Card
{
    /**
     * @var string|null
     */
    private $id;

    /**
     * @var bool|null
     */
    private $is3DS;

    /**
     * @var string|null
     */
    private $country;

    /**
     * @var string|null
     */
    private $authorizationNumber;

    /**
     * @var string|null
     */
    private $maskedNumber;

    /**
     * @var string|null
     */
    private $expiration;

    /**
     * @var string|null
     */
    private $type;

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
     * @method is3DS
     *
     * @return bool|null
     */
    public function is3DS(): ?bool
    {
        return $this->is3DS;
    }

    /**
     * @method setIs3DS
     *
     * @param bool|null $is3DS
     *
     * @return self
     */
    public function setIs3DS(?bool $is3DS): self
    {
        $this->is3DS = $is3DS;

        return $this;
    }

    /**
     * @method getCountry
     *
     * @return string|null
     */
    public function getCountry(): ?string
    {
        return $this->country;
    }

    /**
     * @method setCountry
     *
     * @param string|null $country
     *
     * @return self
     */
    public function setCountry(?string $country): self
    {
        $this->country = $country;

        return $this;
    }

    /**
     * @method getAuthorizationNumber
     *
     * @return string|null
     */
    public function getAuthorizationNumber(): ?string
    {
        return $this->authorizationNumber;
    }

    /**
     * @method setAuthorizationNumber
     *
     * @param string|null $authorizationNumber
     *
     * @return self
     */
    public function setAuthorizationNumber(?string $authorizationNumber): self
    {
        $this->authorizationNumber = $authorizationNumber;

        return $this;
    }

    /**
     * @method getMaskedNumber
     *
     * @return string|null
     */
    public function getMaskedNumber(): ?string
    {
        return $this->maskedNumber;
    }

    /**
     * @method setMaskedNumber
     *
     * @param string|null $maskedNumber
     *
     * @return self
     */
    public function setMaskedNumber(?string $maskedNumber): self
    {
        $this->maskedNumber = $maskedNumber;

        return $this;
    }

    /**
     * @method getExpiration
     *
     * @return string|null
     */
    public function getExpiration(): ?string
    {
        return $this->expiration;
    }

    /**
     * @method setExpiration
     *
     * @param string|null $expiration
     *
     * @return self
     */
    public function setExpiration(?string $expiration): self
    {
        $this->expiration = $expiration;

        return $this;
    }

    /**
     * @method getType
     *
     * @return string|null
     */
    public function getType(): ?string
    {
        return $this->type;
    }

    /**
     * @method setType
     *
     * @param string|null $type
     *
     * @return self
     */
    public function setType(?string $type): self
    {
        $this->type = $type;

        return $this;
    }
}
