<?php

namespace Mpp\LemonWayClientBundle\Model;

class AccountDetails
{
    const PAYER_OR_BENEFICIARY_PAYER = 1;

    const PAYER_OR_BENEFICIARY_BENEFICIARY = 2;

    /**
     * @var string|null
     */
    private $id;

    /**
     * @var int|null
     */
    private $internalId;

    /**
     * @var string|null
     */
    private $clientTitle;

    /**
     * @var string|null
     */
    private $firstname;

    /**
     * @var string|null
     */
    private $lastname;

    /**
     * @var int|null
     */
    private $balance;

    /**
     * @var string|null
     */
    private $email;

    /**
     * @var int|null
     */
    private $status;

    /**
     * @var bool|null
     */
    private $isBlocked;

    /**
     * @var int|null
     */
    private $accountType;

    /**
     * @var Company|null
     */
    private $company;

    /**
     * @var Address|null
     */
    private $adresse;

    /**
     * @var Birth|null
     */
    private $birth;

    /**
     * @var string|null
     */
    private $nationality;

    /**
     * @var string|null
     */
    private $phoneNumber;

    /**
     * @var string|null
     */
    private $mobileNumber;

    /**
     * @var bool|null
     */
    private $isDebtor;

    /**
     * @var int|null
     */
    private $payerOrBeneficiary;

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
     * @method getClientTitle
     *
     * @return string|null
     */
    public function getClientTitle(): ?string
    {
        return $this->clientTitle;
    }

    /**
     * @method setClientTitle
     *
     * @param string|null $clientTitle
     *
     * @return self
     */
    public function setClientTitle(?string $clientTitle): self
    {
        $this->clientTitle = $clientTitle;

        return $this;
    }

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
     * @method getBalance
     *
     * @return int|null
     */
    public function getBalance(): ?int
    {
        return $this->lastname;
    }

    /**
     * @method setBalance
     *
     * @param int|null $balance
     *
     * @return self
     */
    public function setBalance(?int $balance): self
    {
        $this->balance = $balance;

        return $this;
    }

    /**
     * @method getEmail
     *
     * @return string|null
     */
    public function getEmail(): ?string
    {
        return $this->email;
    }

    /**
     * @method setEmail
     *
     * @param string|null $email
     *
     * @return self
     */
    public function setEmail(?string $email): self
    {
        $this->email = $email;

        return $this;
    }

    /**
     * @method getStatus
     *
     * @return int|null
     */
    public function getStatus(): ?int
    {
        return $this->status;
    }

    /**
     * @method setStatus
     *
     * @param int|null $status
     *
     * @return self
     */
    public function setStatus(?int $status): self
    {
        $this->status = $status;

        return $this;
    }

    /**
     * @method isBlocked
     *
     * @return bool
     */
    public function isBlocked(): ?bool
    {
        return $this->isBlocked;
    }

    /**
     * @method setBlocked
     *
     * @param bool|null $isBlocked
     *
     * @return self
     */
    public function setBlocked(?bool $isBlocked): self
    {
        $this->isBlocked = $isBlocked;

        return $this;
    }

    /**
     * @method getAccountType
     *
     * @return int|null
     */
    public function getAccountType(): ?int
    {
        return $this->accountType;
    }

    /**
     * @method setAccountType
     *
     * @param int|null $accountType
     *
     * @return self
     */
    public function setAccountType(?int $accountType): self
    {
        $this->accountType = $accountType;

        return $this;
    }

    /**
     * @method getCompany
     *
     * @return Company|null
     */
    public function getCompany(): ?Company
    {
        return $this->company;
    }

    /**
     * @method setCompany
     *
     * @param Company|null $company
     *
     * @return self
     */
    public function setCompany(?Company $company): self
    {
        $this->company = $company;

        return $this;
    }

    /**
     * @method getAdresse
     *
     * @return Address|null
     */
    public function getAdresse(): ?Address
    {
        return $this->adresse;
    }

    /**
     * @method setAdresse
     *
     * @param Address|null $adresse
     *
     * @return self
     */
    public function setAdresse(?Address $adresse): self
    {
        $this->adresse = $adresse;

        return $this;
    }

    /**
     * @method getBirth
     *
     * @return Birth|null
     */
    public function getBirth(): ?Birth
    {
        return $this->birth;
    }

    /**
     * @method setBirth
     *
     * @param Birth|null $birth
     *
     * @return self
     */
    public function setBirth(?Birth $birth): self
    {
        $this->birth = $birth;

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
     * @method getPhoneNumber
     *
     * @return string|null
     */
    public function getPhoneNumber(): ?string
    {
        return $this->phoneNumber;
    }

    /**
     * @method setPhoneNumber
     *
     * @param string|null $phoneNumber
     *
     * @return self
     */
    public function setPhoneNumber(?string $phoneNumber): self
    {
        $this->phoneNumber = $phoneNumber;

        return $this;
    }

    /**
     * @method getMobileNumber
     *
     * @return string|null
     */
    public function getMobileNumber(): ?string
    {
        return $this->mobileNumber;
    }

    /**
     * @method setMobileNumber
     *
     * @param string|null $mobileNumber
     *
     * @return self
     */
    public function setMobileNumber(?string $mobileNumber): self
    {
        $this->mobileNumber = $mobileNumber;

        return $this;
    }

    /**
     * @method isDebtor
     *
     * @return bool|null
     */
    public function isDebtor(): ?bool
    {
        return $this->isDebtor;
    }

    /**
     * @method setDebtor
     *
     * @param bool|null $isDebtor
     *
     * @return self
     */
    public function setDebtor(?bool $isDebtor): self
    {
        $this->isDebtor = $isDebtor;

        return $this;
    }

    /**
     * @method getPayerOrBeneficiary
     *
     * @return int|null
     */
    public function getPayerOrBeneficiary(): ?int
    {
        return $this->payerOrBeneficiary;
    }

    /**
     * @method setPayerOrBeneficiary
     *
     * @param int|null $payerOrBeneficiary
     *
     * @return self
     */
    public function setPayerOrBeneficiary(?int $payerOrBeneficiary): self
    {
        $this->payerOrBeneficiary = $payerOrBeneficiary;

        return $this;
    }
}
