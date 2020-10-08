<?php

namespace Mpp\LemonWayClientBundle\Model;

class UltimateBeneficialOwner
{
    /**
     * @var string|null
     */
    private $firstname;

    /**
     * @var string|null
     */
    private $lastname;

    /**
     * @var string|null
     */
    private $nationality;

    /**
     * @var string|null
     */
    private $dateOfBirth;

    /**
     * @var string|null
     */
    private $cityOfBirth;

    /**
     * @var string|null
     */
    private $countryOfBirth;

    /**
     * @var string|null
     */
    private $countryOfResidence;

    /**
     * @var int|null
     */
    private $startDate;

    /**
     * @var int|null
     */
    private $endData;

    /**
     * @var int|null
     */
    private $ultimateBeneficialOwnerId;

    /**
     * @method getFirstname
     *
     * @return string|null
     */
    public function getFirstname(): ?string
    {
        return $this->firstname;
    }

    /**
     * @method setFirstname
     *
     * @param string|null $firstname
     *
     * @return self
     */
    public function setFirstname(?string $firstname): self
    {
        $this->firstname = $firstname;

        return $this;
    }

    /**
     * @method getLastname
     *
     * @return string|null
     */
    public function getLastname(): ?string
    {
        return $this->lastname;
    }

    /**
     * @method setLastname
     *
     * @param string|null $lastname
     *
     * @return self
     */
    public function setLastname(?string $lastname): self
    {
        $this->lastName = $lastName;

        return $this;
    }

    /**
     * @method getNationality
     *
     * @return string|null
     */
    public function getNationality(): ?string
    {
        return $this->nationality;
    }

    /**
     * @method setNationality
     *
     * @param string|null $nationality
     *
     * @return self
     */
    public function setNationality(?string $nationality): self
    {
        $this->nationality = $nationality;

        return $this;
    }

    /**
     * @method getDateOfBirth
     *
     * @return string|null
     */
    public function getDateOfBirth(): ?string
    {
        return $this->dateOfBirth;
    }

    /**
     * @method setDateOfBirth
     *
     * @param string|null $dateOfBirth
     *
     * @return self
     */
    public function setDateOfBirth(?string $dateOfBirth): self
    {
        $this->dateOfBirth = $dateOfBirth;

        return $this;
    }

    /**
     * @method getCityOfBirth
     *
     * @return string|null
     */
    public function getCityOfBirth(): ?string
    {
        return $this->cityOfBirth;
    }

    /**
     * @method setCityOfBirth
     *
     * @param string|null $cityOfBirth
     *
     * @return self
     */
    public function setCityOfBirth(?string $cityOfBirth): self
    {
        $this->cityOfBirth = $cityOfBirth;

        return $this;
    }

    /**
     * @method getCountryOfBirth
     *
     * @return string|null
     */
    public function getCountryOfBirth(): ?string
    {
        return $this->countryOfBirth;
    }

    /**
     * @method setCountryOfBirth
     *
     * @param string|null $countryOfBirth
     *
     * @return self
     */
    public function setCountryOfBirth(?string $countryOfBirth): self
    {
        $this->countryOfBirth = $countryOfBirth;

        return $this;
    }

    /**
     * @method getCountryOfResidence
     *
     * @return string|null
     */
    public function getCountryOfResidence(): ?string
    {
        return $this->countryOfResidence;
    }

    /**
     * @method setCountryOfResidence
     *
     * @param string|null $countryOfResidence
     *
     * @return self
     */
    public function setCountryOfResidence(?string $countryOfResidence): self
    {
        $this->countryOfResidence = $countryOfResidence;

        return $this;
    }

    /**
     * @method getStartDate
     *
     * @return int|null
     */
    public function getStartDate(): ?int
    {
        return $this->startDate;
    }

    /**
     * @method setStartDate
     *
     * @param int|null $startDate
     *
     * @return self
     */
    public function setStartDate(?int $startDate): self
    {
        $this->startDate = $startDate;

        return $this;
    }

    /**
     * @method getEndDate
     *
     * @return int|null
     */
    public function getEndDate(): ?int
    {
        return $this->endDate;
    }

    /**
     * @method setEndDate
     *
     * @param int|null $endDate
     *
     * @return self
     */
    public function setEndDate(?int $endDate): self
    {
        $this->endDate = $endDate;

        return $this;
    }

    /**
     * @method getUltimateBeneficialOwnerId
     *
     * @return int|null
     */
    public function getUltimateBeneficialOwnerId(): ?int
    {
        return $this->ultimateBeneficialOwnerId;
    }

    /**
     * @method setUltimateBeneficialOwnerId
     *
     * @param int|null $ultimateBeneficialOwnerId
     *
     * @return self
     */
    public function setUltimateBeneficialOwnerId(?int $ultimateBeneficialOwnerId): self
    {
        $this->ultimateBeneficialOwnerId = $ultimateBeneficialOwnerId;

        return $this;
    }
}
