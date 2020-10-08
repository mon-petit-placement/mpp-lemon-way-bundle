<?php

namespace Mpp\LemonWayClientBundle\Model;

class BankBranchAddress extends Model
{
    /**
     * @var string|null
     */
    private $street;

    /**
     * @var string|null
     */
    private $zipCode;

    /**
     * @var string|null
     */
    private $city;

    /**
     * {@inheritdoc}
     */
    public static function configureOptions(OptionsResolver $resolver)
    {
        $resolver
            ->setRequired('street')->setAllowedTypes('street', ['string'])->setNormalizer('street', function (Options $options, $value) {
                if (strlen($value) < 0 || 128 < strlen($value)) {
                    throw new InvalidOptionsException(sprintf('The option "street" expected a length between 0 and 128 characters. Current length: %s', strlen($value)));
                }

                return $value;
            })
            ->setDefined('zipCode')->setAllowedTypes('zipCode', ['string'])->setNormalizer('zipCode', function (Options $options, $value) {
                if (strlen($value) < 0 || 16 < strlen($value)) {
                    throw new InvalidOptionsException(sprintf('The option "zipCode" expected a length between 0 and 16 characters. Current length: %s', strlen($value)));
                }

                return $value;
            })
            ->setDefined('city')->setAllowedTypes('city', ['string'])->setNormalizer('city', function (Options $options, $value) {
                if (strlen($value) < 0 || 128 < strlen($value)) {
                    throw new InvalidOptionsException(sprintf('The option "city" expected a length between 0 and 128 characters. Current length: %s', strlen($value)));
                }

                return $value;
            })
        ;
    }

    /**
     * @method getStreet
     *
     * @return string|null
     */
    public function getStreet(): ?string
    {
        return $this->street;
    }

    /**
     * @method setStreet
     *
     * @param string|null $street
     *
     * @return self
     */
    public function setStreet(?string $street): self
    {
        $this->street = $street;

        return $this;
    }

    /**
     * @method getZipCode
     *
     * @return string|null
     */
    public function getZipCode(): ?string
    {
        return $this->zipCode;
    }

    /**
     * @method setZipCode
     *
     * @param string|null $zipCode
     *
     * @return self
     */
    public function setZipCode(?string $zipCode): self
    {
        $this->zipCode = $zipCode;

        return $this;
    }

    /**
     * @method getCity
     *
     * @return string|null
     */
    public function getCity(): ?string
    {
        return $this->city;
    }

    /**
     * @method setCity
     *
     * @param string|null $city
     *
     * @return self
     */
    public function setCity(?string $city): self
    {
        $this->city = $city;

        return $this;
    }
}
