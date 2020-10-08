<?php

namespace Mpp\LemonWayClientBundle\Model;

class Link
{
    /**
     * @var string|null
     */
    private $href;

    /**
     * @var string|null
     */
    private $templated;

    /**
     * @var string|null
     */
    private $method;

    /**
     * @var string|null
     */
    private $type;

    /**
     * @var string|null
     */
    private $deprecation;

    /**
     * @var string|null
     */
    private $name;

    /**
     * @var string|null
     */
    private $profile;

    /**
     * @var string|null
     */
    private $title;

    /**
     * @var string|null
     */
    private $hreflang;

    /**
     * @method getHref
     *
     * @return string|null
     */
    public function getHref(): ?string
    {
        return $this->href;
    }

    /**
     * @method setHref
     *
     * @param string|null $href
     *
     * @return self
     */
    public function setHref(?string $href): self
    {
        $this->href = $href;

        return $this;
    }

    /**
     * @method getTemplated
     *
     * @return string|null
     */
    public function getTemplated(): ?string
    {
        return $this->templated;
    }

    /**
     * @method setTemplated
     *
     * @param string|null $templated
     *
     * @return self
     */
    public function setTemplated(?string $templated): self
    {
        $this->templated = $templated;

        return $this;
    }

    /**
     * @method getMethod
     *
     * @return string|null
     */
    public function getMethod(): ?string
    {
        return $this->method;
    }

    /**
     * @method setMethod
     *
     * @param string|null $method
     *
     * @return self
     */
    public function setMethod(?string $method): self
    {
        $this->method = $method;

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

    /**
     * @method getDeprecation
     *
     * @return string|null
     */
    public function getDeprecation(): ?string
    {
        return $this->deprecation;
    }

    /**
     * @method setDeprecation
     *
     * @param string|null $deprecation
     *
     * @return self
     */
    public function setDeprecation(?string $deprecation): self
    {
        $this->deprecation = $deprecation;

        return $this;
    }

    /**
     * @method getName
     *
     * @return string|null
     */
    public function getName(): ?string
    {
        return $this->name;
    }

    /**
     * @method setName
     *
     * @param string|null $name
     *
     * @return self
     */
    public function setName(?string $name): self
    {
        $this->name = $name;

        return $this;
    }

    /**
     * @method getProfile
     *
     * @return string|null
     */
    public function getProfile(): ?string
    {
        return $this->profile;
    }

    /**
     * @method setProfile
     *
     * @param string|null $profile
     *
     * @return self
     */
    public function setProfile(?string $profile): self
    {
        $this->profile = $profile;

        return $this;
    }

    /**
     * @method getTitle
     *
     * @return string|null
     */
    public function getTitle(): ?string
    {
        return $this->title;
    }

    /**
     * @method setTitle
     *
     * @param string|null $title
     *
     * @return self
     */
    public function setTitle(?string $title): self
    {
        $this->title = $title;

        return $this;
    }

    /**
     * @method getHreflang
     *
     * @return string|null
     */
    public function getHreflang(): ?string
    {
        return $this->hreflang;
    }

    /**
     * @method setHreflang
     *
     * @param string|null $hreflang
     *
     * @return self
     */
    public function setHreflang(?string $hreflang): self
    {
        $this->hreflang = $hreflang;

        return $this;
    }
}
