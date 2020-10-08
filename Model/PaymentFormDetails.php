<?php

namespace Mpp\LemonWayClientBundle\Model;

class PaymentFormDetails
{
    /**
     * @var string|null
     */
    private $parentId;

    /**
     * @var string|null
     */
    private $parentComment;

    /**
     * @var string|null
     */
    private $amountTot;

    /**
     * @var string|null
     */
    private $status;

    /**
     * @var int|null
     */
    private $utcDate;

    /**
     * @var int|null
     */
    private $created;

    /**
     * @var string|null
     */
    private $id;

    /**
     * @var string|null
     */
    private $optId;

    /**
     * @var string|null
     */
    private $accountPayer;

    /**
     * @var string|null
     */
    private $accountReceiver;

    /**
     * @var string|null
     */
    private $comment;

    /**
     * @var string|null
     */
    private $returnUrl;

    /**
     * @var string|null
     */
    private $cancelUrl;

    /**
     * @var string|null
     */
    private $errorUrl;

    /**
     * @var string|null
     */
    private $firstNamePayer;

    /**
     * @var string|null
     */
    private $lastNamePayer;

    /**
     * @var string|null
     */
    private $emailPayer;

    /**
     * @method getParentId
     *
     * @return string|null
     */
    public function getParentId(): ?string
    {
        return $this->parentId;
    }

    /**
     * @method setParentId
     *
     * @param string|null $parentId
     *
     * @return self
     */
    public function setParentId(?string $parentId): self
    {
        $this->parentId = $parentId;

        return $this;
    }

    /**
     * @method getParentComment
     *
     * @return string|null
     */
    public function getParentComment(): ?string
    {
        return $this->parentComment;
    }

    /**
     * @method setParentComment
     *
     * @param string|null $parentComment
     *
     * @return self
     */
    public function setParentComment(?string $parentComment): self
    {
        $this->parentComment = $parentComment;

        return $this;
    }

    /**
     * @method getAmountTot
     *
     * @return string|null
     */
    public function getAmountTot(): ?string
    {
        return $this->amountTot;
    }

    /**
     * @method setAmountTot
     *
     * @param string|null $amountTot
     *
     * @return self
     */
    public function setAmountTot(?string $amountTot): self
    {
        $this->amountTot = $amountTot;

        return $this;
    }

    /**
     * @method getStatus
     *
     * @return string|null
     */
    public function getStatus(): ?string
    {
        return $this->status;
    }

    /**
     * @method setStatus
     *
     * @param string|null $status
     *
     * @return self
     */
    public function setStatus(?string $status): self
    {
        $this->status = $status;

        return $this;
    }

    /**
     * @method getUtcDate
     *
     * @return int|null
     */
    public function getUtcDate(): ?int
    {
        return $this->utcDate;
    }

    /**
     * @method setUtcDate
     *
     * @param int|null $utcDate
     *
     * @return self
     */
    public function setUtcDate(?int $utcDate): self
    {
        $this->utcDate = $utcDate;

        return $this;
    }

    /**
     * @method getCreated
     *
     * @return int|null
     */
    public function getCreated(): ?int
    {
        return $this->created;
    }

    /**
     * @method setCreated
     *
     * @param int|null $created
     *
     * @return self
     */
    public function setCreated(?int $created): self
    {
        $this->created = $created;

        return $this;
    }

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
     * @method getOptId
     *
     * @return string|null
     */
    public function getOptId(): ?string
    {
        return $this->optId;
    }

    /**
     * @method setOptId
     *
     * @param string|null $optId
     *
     * @return self
     */
    public function setOptId(?string $optId): self
    {
        $this->optId = $optId;

        return $this;
    }

    /**
     * @method getAccountPayer
     *
     * @return string|null
     */
    public function getAccountPayer(): ?string
    {
        return $this->accountPayer;
    }

    /**
     * @method setAccountPayer
     *
     * @param string|null $accountPayer
     *
     * @return self
     */
    public function setAccountPayer(?string $accountPayer): self
    {
        $this->accountPayer = $accountPayer;

        return $this;
    }

    /**
     * @method getAccountReceiver
     *
     * @return string|null
     */
    public function getAccountReceiver(): ?string
    {
        return $this->accountReceiver;
    }

    /**
     * @method setAccountReceiver
     *
     * @param string|null $accountReceiver
     *
     * @return self
     */
    public function setAccountReceiver(?string $accountReceiver): self
    {
        $this->accountReceiver = $accountReceiver;

        return $this;
    }

    /**
     * @method getComment
     *
     * @return string|null
     */
    public function getComment(): ?string
    {
        return $this->comment;
    }

    /**
     * @method setComment
     *
     * @param string|null $comment
     *
     * @return self
     */
    public function setComment(?string $comment): self
    {
        $this->comment = $comment;

        return $this;
    }

    /**
     * @method getReturnUrl
     *
     * @return string|null
     */
    public function getReturnUrl(): ?string
    {
        return $this->returnUrl;
    }

    /**
     * @method setReturnUrl
     *
     * @param string|null $returnUrl
     *
     * @return self
     */
    public function setReturnUrl(?string $returnUrl): self
    {
        $this->returnUrl = $returnUrl;

        return $this;
    }

    /**
     * @method getCancelUrl
     *
     * @return string|null
     */
    public function getCancelUrl(): ?string
    {
        return $this->cancelUrl;
    }

    /**
     * @method setCancelUrl
     *
     * @param string|null $cancelUrl
     *
     * @return self
     */
    public function setCancelUrl(?string $cancelUrl): self
    {
        $this->cancelUrl = $cancelUrl;

        return $this;
    }

    /**
     * @method getErrorUrl
     *
     * @return string|null
     */
    public function getErrorUrl(): ?string
    {
        return $this->errorUrl;
    }

    /**
     * @method setErrorUrl
     *
     * @param string|null $errorUrl
     *
     * @return self
     */
    public function setErrorUrl(?string $errorUrl): self
    {
        $this->errorUrl = $errorUrl;

        return $this;
    }

    /**
     * @method getFirstNamePayer
     *
     * @return string|null
     */
    public function getFirstNamePayer(): ?string
    {
        return $this->firstNamePayer;
    }

    /**
     * @method setFirstNamePayer
     *
     * @param string|null $firstNamePayer
     *
     * @return self
     */
    public function setFirstNamePayer(?string $firstNamePayer): self
    {
        $this->firstNamePayer = $firstNamePayer;

        return $this;
    }

    /**
     * @method getLastNamePayer
     *
     * @return string|null
     */
    public function getLastNamePayer(): ?string
    {
        return $this->lastNamePayer;
    }

    /**
     * @method setLastNamePayer
     *
     * @param string|null $lastNamePayer
     *
     * @return self
     */
    public function setLastNamePayer(?string $lastNamePayer): self
    {
        $this->lastNamePayer = $lastNamePayer;

        return $this;
    }

    /**
     * @method getEmailPayer
     *
     * @return string|null
     */
    public function getEmailPayer(): ?string
    {
        return $this->emailPayer;
    }

    /**
     * @method setEmailPayer
     *
     * @param string|null $emailPayer
     *
     * @return self
     */
    public function setEmailPayer(?string $emailPayer): self
    {
        $this->emailPayer = $emailPayer;

        return $this;
    }
}
