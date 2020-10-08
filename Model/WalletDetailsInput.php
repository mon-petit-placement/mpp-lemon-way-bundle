<?php

namespace Mpp\LemonWayClientBundle\Model;

class WalletDetailsInput extends Model
{
    /**
     * @var string|null
     */
    private $accountId;

    /**
     * @var string|null
     */
    private $email;

    /**
     * {@inheritdoc}
     */
    public static function configureOptions(OptionsResolver $resolver)
    {
        $resolver
            ->setDefined('accountId')->setAllowedTypes('street', ['string'])
            ->setDefined('email')->setAllowedTypes('email', ['string'])
        ;
    }

    /**
     * @method getAccountId
     *
     * @return string|null
     */
    public function getAccountId(): ?string
    {
        return $this->accountId;
    }

    /**
     * @method setAccountId
     *
     * @param string|null $accountId
     *
     * @return self
     */
    public function setAccountId(?string $accountId): self
    {
        $this->accountId = $accountId;

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
}
