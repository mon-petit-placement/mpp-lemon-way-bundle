<?php

namespace Mpp\LemonWayClientBundle\Model;

class PaymentForm
{
    /**
     * @var string|null
     */
    private $walletIp;

    /**
     * @var string|null
     */
    private $walletUa;

    /**
     * @var string|null
     */
    private $amountTotRange;

    /**
     * @var string|null
     */
    private $amountCom;

    /**
     * @var string|null
     */
    private $language;

    /**
     * @var string|null
     */
    private $version;

    /**
     * @var string|null
     */
    private $style;

    /**
     * @var string|null
     */
    private $atosStyle;

    /**
     * @var string|null
     */
    private $notifUrl;

    /**
     * @var string|null
     */
    private $options;

    /**
     * @var string|null
     */
    private $active;

    /**
     * @var string|null
     */
    private $raisonSociale;

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
     * @method getWalletIp
     *
     * @return string|null
     */
    public function getWalletIp(): ?string
    {
        return $this->walletIp;
    }

    /**
     * @method setWalletIp
     *
     * @param string|null $walletIp
     *
     * @return self
     */
    public function setWalletIp(?string $walletIp): self
    {
        $this->walletIp = $walletIp;

        return $this;
    }

    /**
     * @method getWalletUa
     *
     * @return string|null
     */
    public function getWalletUa(): ?string
    {
        return $this->walletUa;
    }

    /**
     * @method setWalletUa
     *
     * @param string|null $walletUa
     *
     * @return self
     */
    public function setWalletUa(?string $walletUa): self
    {
        $this->walletUa = $walletUa;

        return $this;
    }

    /**
     * @method getAmountTotRange
     *
     * @return string|null
     */
    public function getAmountTotRange(): ?string
    {
        return $this->amountTotRange;
    }

    /**
     * @method setAmountTotRange
     *
     * @param string|null $amountTotRange
     *
     * @return self
     */
    public function setAmountTotRange(?string $amountTotRange): self
    {
        $this->amountTotRange = $amountTotRange;

        return $this;
    }

    /**
     * @method getAmountCom
     *
     * @return string|null
     */
    public function getAmountCom(): ?string
    {
        return $this->amountCom;
    }

    /**
     * @method setAmountCom
     *
     * @param string|null $amountCom
     *
     * @return self
     */
    public function setAmountCom(?string $amountCom): self
    {
        $this->amountCom = $amountCom;

        return $this;
    }

    /**
     * @method getLanguage
     *
     * @return string|null
     */
    public function getLanguage(): ?string
    {
        return $this->language;
    }

    /**
     * @method setLanguage
     *
     * @param string|null $language
     *
     * @return self
     */
    public function setLanguage(?string $language): self
    {
        $this->language = $language;

        return $this;
    }

    /**
     * @method getVersion
     *
     * @return string|null
     */
    public function getVersion(): ?string
    {
        return $this->version;
    }

    /**
     * @method setVersion
     *
     * @param string|null $version
     *
     * @return self
     */
    public function setVersion(?string $version): self
    {
        $this->version = $version;

        return $this;
    }

    /**
     * @method getStyle
     *
     * @return string|null
     */
    public function getStyle(): ?string
    {
        return $this->style;
    }

    /**
     * @method setStyle
     *
     * @param string|null $style
     *
     * @return self
     */
    public function setStyle(?string $style): self
    {
        $this->style = $style;

        return $this;
    }

    /**
     * @method getAtosStyle
     *
     * @return string|null
     */
    public function getAtosStyle(): ?string
    {
        return $this->atosStyle;
    }

    /**
     * @method setAtosStyle
     *
     * @param string|null $atosStyle
     *
     * @return self
     */
    public function setAtosStyle(?string $atosStyle): self
    {
        $this->atosStyle = $atosStyle;

        return $this;
    }

    /**
     * @method getNotifUrl
     *
     * @return string|null
     */
    public function getNotifUrl(): ?string
    {
        return $this->notifUrl;
    }

    /**
     * @method setNotifUrl
     *
     * @param string|null $notifUrl
     *
     * @return self
     */
    public function setNotifUrl(?string $notifUrl): self
    {
        $this->notifUrl = $notifUrl;

        return $this;
    }

    /**
     * @method getOptions
     *
     * @return string|null
     */
    public function getOptions(): ?string
    {
        return $this->options;
    }

    /**
     * @method setOptions
     *
     * @param string|null $options
     *
     * @return self
     */
    public function setOptions(?string $options): self
    {
        $this->options = $options;

        return $this;
    }

    /**
     * @method getActive
     *
     * @return string|null
     */
    public function getActive(): ?string
    {
        return $this->active;
    }

    /**
     * @method setActive
     *
     * @param string|null $active
     *
     * @return self
     */
    public function setActive(?string $active): self
    {
        $this->active = $active;

        return $this;
    }

    /**
     * @method getRaisonSociale
     *
     * @return string|null
     */
    public function getRaisonSociale(): ?string
    {
        return $this->raisonSociale;
    }

    /**
     * @method setRaisonSociale
     *
     * @param string|null $raisonSociale
     *
     * @return self
     */
    public function setRaisonSociale(?string $raisonSociale): self
    {
        $this->raisonSociale = $raisonSociale;

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
