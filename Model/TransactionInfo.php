<?php

namespace Mpp\LemonWayClientBundle\Model;

class TransactionInfo extends Model
{
    /**
     * @var string|null
     */
    private $reference;

    /**
     * @var string|null
     */
    private $order;

    /**
     * @var string|null
     */
    private $dateTime;

    /**
     * @var string|null
     */
    private $merchantId;

    /**
     * @var string|null
     */
    private $authorisationId;

    /**
     * {@inheritdoc}
     */
    public static function configureOptions(OptionsResolver $resolver)
    {
        $resolver
            ->setRequired('reference')->setAllowedTypes('reference', ['string'])->setNormalizer('reference', function (Options $options, $value) {
                if (strlen($value) < 6 || 64 < strlen($value)) {
                    throw new InvalidOptionsException(sprintf('The option "reference" expected a length between 6 and 64 characters. Current length: %s', strlen($value)));
                }

                return $value;
            })
            ->setRequired('order')->setAllowedTypes('order', ['string'])->setNormalizer('order', function (Options $options, $value) {
                if (strlen($value) < 6 || 64 < strlen($value)) {
                    throw new InvalidOptionsException(sprintf('The option "order" expected a length between 6 and 64 characters. Current length: %s', strlen($value)));
                }

                return $value;
            })
            ->setRequired('dateTime')->setAllowedTypes('dateTime', ['string'])->setNormalizer('dateTime', function (Options $options, $value) {
                if (!preg_match('/^-?\d{1,12}$/', $value)) {
                    throw new InvalidOptionsException('The option "cardDate" does not match the pattern "^-?\d{1,12}$"');
                }

                return $value;
            })
            ->setRequired('merchantId')->setAllowedTypes('merchantId', ['string'])->setNormalizer('merchantId', function (Options $options, $value) {
                if (strlen($value) < 6 || 64 < strlen($value)) {
                    throw new InvalidOptionsException(sprintf('The option "merchantId" expected a length between 6 and 64 characters. Current length: %s', strlen($value)));
                }

                return $value;
            })
            ->setRequired('authorisationId')->setAllowedTypes('authorisationId', ['string'])->setNormalizer('authorisationId', function (Options $options, $value) {
                if (strlen($value) < 4 || 64 < strlen($value)) {
                    throw new InvalidOptionsException(sprintf('The option "authorisationId" expected a length between 4 and 64 characters. Current length: %s', strlen($value)));
                }

                return $value;
            })
        ;
    }

    /**
     * @method getReference
     *
     * @return string|null
     */
    public function getReference(): ?string
    {
        return $this->reference;
    }

    /**
     * @method setReference
     *
     * @param string|null $reference
     *
     * @return self
     */
    public function setReference(?string $reference): self
    {
        $this->reference = $reference;

        return $this;
    }

    /**
     * @method getOrder
     *
     * @return string|null
     */
    public function getOrder(): ?string
    {
        return $this->order;
    }

    /**
     * @method setOrder
     *
     * @param string|null $order
     *
     * @return self
     */
    public function setOrder(?string $order): self
    {
        $this->order = $order;

        return $this;
    }

    /**
     * @method getDateTime
     *
     * @return string|null
     */
    public function getDateTime(): ?string
    {
        return $this->dateTime;
    }

    /**
     * @method setDateTime
     *
     * @param string|null $dateTime
     *
     * @return self
     */
    public function setDateTime(?string $dateTime): self
    {
        $this->dateTime = $dateTime;

        return $this;
    }

    /**
     * @method getMerchantId
     *
     * @return string|null
     */
    public function getMerchantId(): ?string
    {
        return $this->merchantId;
    }

    /**
     * @method setMerchantId
     *
     * @param string|null $merchantId
     *
     * @return self
     */
    public function setMerchantId(?string $merchantId): self
    {
        $this->merchantId = $merchantId;

        return $this;
    }

    /**
     * @method getAuthorisationId
     *
     * @return string|null
     */
    public function getAuthorisationId(): ?string
    {
        return $this->authorisationId;
    }

    /**
     * @method setAuthorisationId
     *
     * @param string|null $authorisationId
     *
     * @return self
     */
    public function setAuthorisationId(?string $authorisationId): self
    {
        $this->authorisationId = $authorisationId;

        return $this;
    }
}
