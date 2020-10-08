<?php

namespace Mpp\LemonWayClientBundle\Model;

class ACS
{
    /**
     * @var string
     */
    private $actionUrl;

    /**
     * @var string
     */
    private $actionMethod;

    /**
     * @var string
     */
    private $pareqFieldName;

    /**
     * @var string
     */
    private $pareqFieldValue;

    /**
     * @var string
     */
    private $termurlFieldName;

    /**
     * @var string
     */
    private $mdFieldName;

    /**
     * @var string
     */
    private $mdFieldValue;

    /**
     * @var string
     */
    private $mpiResult;

    /**
     * @method getActionUrl
     *
     * @return string|null
     */
    public function getActionUrl(): ?string
    {
        return $this->actionUrl;
    }

    /**
     * @method setActionUrl
     *
     * @param string|null $actionUrl
     *
     * @return self
     */
    public function setActionUrl(?string $actionUrl): self
    {
        $this->actionUrl = $actionUrl;

        return $this;
    }

    /**
     * @method getActionMethod
     *
     * @return string|null
     */
    public function getActionMethod(): ?string
    {
        return $this->actionMethod;
    }

    /**
     * @method setActionMethod
     *
     * @param string|null $actionMethod
     *
     * @return self
     */
    public function setActionMethod(?string $actionMethod): self
    {
        $this->actionMethod = $actionMethod;

        return $this;
    }

    /**
     * @method getPareqFieldName
     *
     * @return string|null
     */
    public function getPareqFieldName(): ?string
    {
        return $this->pareqFieldName;
    }

    /**
     * @method setPareqFieldName
     *
     * @param string|null $pareqFieldName
     *
     * @return self
     */
    public function setPareqFieldName(?string $pareqFieldName): self
    {
        $this->pareqFieldName = $pareqFieldName;

        return $this;
    }

    /**
     * @method getPareqFieldValue
     *
     * @return string|null
     */
    public function getPareqFieldValue(): ?string
    {
        return $this->pareqFieldValue;
    }

    /**
     * @method setPareqFieldValue
     *
     * @param string|null $pareqFieldValue
     *
     * @return self
     */
    public function setPareqFieldValue(?string $pareqFieldValue): self
    {
        $this->pareqFieldValue = $pareqFieldValue;

        return $this;
    }

    /**
     * @method getTermurlFieldName
     *
     * @return string|null
     */
    public function getTermurlFieldName(): ?string
    {
        return $this->termurlFieldName;
    }

    /**
     * @method setTermurlFieldName
     *
     * @param string|null $termurlFieldName
     *
     * @return self
     */
    public function setTermurlFieldName(?string $termurlFieldName): self
    {
        $this->termurlFieldName = $termurlFieldName;

        return $this;
    }

    /**
     * @method getMdFieldName
     *
     * @return string|null
     */
    public function getMdFieldName(): ?string
    {
        return $this->mdFieldName;
    }

    /**
     * @method setMdFieldName
     *
     * @param string|null $mdFieldName
     *
     * @return self
     */
    public function setMdFieldName(?string $mdFieldName): self
    {
        $this->mdFieldName = $mdFieldName;

        return $this;
    }

    /**
     * @method getMdFieldValue
     *
     * @return string|null
     */
    public function getMdFieldValue(): ?string
    {
        return $this->mdFieldValue;
    }

    /**
     * @method setMdFieldValue
     *
     * @param string|null $mdFieldValue
     *
     * @return self
     */
    public function setMdFieldValue(?string $mdFieldValue): self
    {
        $this->mdFieldValue = $mdFieldValue;

        return $this;
    }

    /**
     * @method getMpiResult
     *
     * @return string|null
     */
    public function getMpiResult(): ?string
    {
        return $this->mpiResult;
    }

    /**
     * @method setMpiResult
     *
     * @param string|null $mpiResult
     *
     * @return self
     */
    public function setMpiResult(?string $mpiResult): self
    {
        $this->mpiResult = $mpiResult;

        return $this;
    }
}
