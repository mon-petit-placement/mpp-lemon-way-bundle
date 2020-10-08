<?php

namespace Mpp\LemonWayClientBundle\Model;

class CardInfo extends Model
{
    const CARD_TYPE_CB = 0;
    const CARD_TYPE_VISA = 1;
    const CARD_TYPE_MASTERCARD = 2;

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
    private $cardCode;

    /**
     * @var string|null
     */
    private $cardDate;

    /**
     * {@inheritdoc}
     */
    public static function configureOptions(OptionsResolver $resolver)
    {
        $resolver
            ->setRequired('cardType')->setAllowedTypes('cardType', ['int'])->setAllowedValues('cardType', [self::CARD_TYPE_CB, self::CARD_TYPE_VISA, self::CARD_TYPE_MASTERCARD])
            ->setRequired('cardNumber')->setAllowedTypes('cardNumber', ['string'])->setNormalizer('cardNumber', function (Options $options, $value) {
                if (strlen($value) < 13 || 19 < strlen($value)) {
                    throw new InvalidOptionsException(sprintf('The option "cardNumber" expected a length between 13 and 19 characters. Current length: %s', strlen($value)));
                }

                return $value;
            })
            ->setRequired('cardCode')->setAllowedTypes('cardCode', ['string'])->setNormalizer('cardCode', function (Options $options, $value) {
                if (3 !== strlen($value)) {
                    throw new InvalidOptionsException(sprintf('The option "cardCode" expected a length of 3 characters. Current length: %s', strlen($value)));
                }

                return $value;
            })
            ->setRequired('cardDate')->setAllowedTypes('cardDate', ['string'])->setNormalizer('cardDate', function (Options $options, $value) {
                if (!preg_match('/^(0[1-9]|1[0-2])\/([12]\d{3})$/', $value)) {
                    throw new InvalidOptionsException('The option "cardDate" does not match the pattern "^(0[1-9]|1[0-2])\/([12]\d{3})$"');
                }

                return $value;
            })
        ;
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
     * @method getCardCode
     *
     * @return string|null
     */
    public function getCardCode(): ?string
    {
        return $this->cardCode;
    }

    /**
     * @method setCardCode
     *
     * @param string|null $cardCode
     *
     * @return self
     */
    public function setCardCode(?string $cardCode): self
    {
        $this->cardCode = $cardCode;

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
}
