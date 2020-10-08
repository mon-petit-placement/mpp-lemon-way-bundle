<?php

namespace Mpp\LemonWayClientBundle\Model;

class CardInfoExtended extends Model
{
    const CARD_TYPE_CB = 0;
    const CARD_TYPE_VISA = 1;
    const CARD_TYPE_MASTERCARD = 2;

    /**
     * @var string|null
     */
    private $cardHolder;

    /**
     * @var int|null
     */
    private $cardType;

    /**
     * @var string|null
     */
    private $cardNumber;

    /**
     * @var string|null
     */
    private $cardDate;

    /**
     * @var string|null
     */
    private $cardCountry;

    /**
     * {@inheritdoc}
     */
    public static function configureOptions(OptionsResolver $resolver)
    {
        $resolver
            ->setDefined('cardHolder')->setAllowedTypes('cardHolder', ['string'])->setNormalizer('cardHolder', function (Options $options, $value) {
                if (strlen($value) < 2 || 64 < strlen($value)) {
                    throw new InvalidOptionsException(sprintf('The option "cardHolder" expected a length between 2 and 64 characters. Current length: %s', strlen($value)));
                }

                return $value;
            })
            ->setRequired('cardType')->setAllowedTypes('cardType', ['int'])->setAllowedValues('cardType', [self::CARD_TYPE_CB, self::CARD_TYPE_VISA, self::CARD_TYPE_MASTERCARD])
            ->setRequired('cardNumber')->setAllowedTypes('cardNumber', ['string'])->setNormalizer('cardNumber', function (Options $options, $value) {
                if (strlen($value) < 13 || 19 < strlen($value)) {
                    throw new InvalidOptionsException(sprintf('The option "cardNumber" expected a length between 13 and 19 characters. Current length: %s', strlen($value)));
                }

                return $value;
            })
            ->setRequired('cardDate')->setAllowedTypes('cardDate', ['string'])->setNormalizer('cardDate', function (Options $options, $value) {
                if (!preg_match('/^(0[1-9]|1[0-2])\/([12]\d{3})$/', $value)) {
                    throw new InvalidOptionsException('The option "cardDate" does not match the pattern "^(0[1-9]|1[0-2])\/([12]\d{3})$"');
                }

                return $value;
            })
            ->setDefined('cardCountry')->setAllowedTypes('cardCountry', ['string'])->setNormalizer('cardCountry', function (Options $options, $value) {
                if (3 !== strlen($value)) {
                    throw new InvalidOptionsException(sprintf('The option "cardCountry" expected a length of 3 characters. Current length: %s', strlen($value)));
                }

                return $value;
            })
        ;
    }

    /**
     * @method getCardHolder
     *
     * @return string|null
     */
    public function getCardHolder(): ?string
    {
        return $this->cardHolder;
    }

    /**
     * @method setCardHolder
     *
     * @param string|null $cardHolder
     *
     * @return self
     */
    public function setCardHolder(?string $cardHolder): self
    {
        $this->cardHolder = $cardHolder;

        return $this;
    }

    /**
     * @method getCardType
     *
     * @return int|null
     */
    public function getCardType(): ?int
    {
        return $this->cardType;
    }

    /**
     * @method setCardType
     *
     * @param int|null $cardType
     *
     * @return self
     */
    public function setCardType(?int $cardType): self
    {
        $this->cardType = $cardType;

        return $this;
    }

    /**
     * @method getCardNumber
     *
     * @return string|null
     */
    public function getCardNumber(): ?string
    {
        return $this->cardNumber;
    }

    /**
     * @method setCardNumber
     *
     * @param string|null $cardNumber
     *
     * @return self
     */
    public function setCardNumber(?string $cardNumber): self
    {
        $this->cardNumber = $cardNumber;

        return $this;
    }

    /**
     * @method getCardDate
     *
     * @return string|null
     */
    public function getCardDate(): ?string
    {
        return $this->cardDate;
    }

    /**
     * @method setCardDate
     *
     * @param string|null $cardDate
     *
     * @return self
     */
    public function setCardDate(?string $cardDate): self
    {
        $this->cardDate = $cardDate;

        return $this;
    }

    /**
     * @method getCardCountry
     *
     * @return string|null
     */
    public function getCardCountry(): ?string
    {
        return $this->cardCountry;
    }

    /**
     * @method setCardCountry
     *
     * @param string|null $cardCountry
     *
     * @return self
     */
    public function setCardCountry(?string $cardCountry): self
    {
        $this->cardCountry = $cardCountry;

        return $this;
    }
}
