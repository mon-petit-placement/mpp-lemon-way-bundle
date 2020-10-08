<?php

namespace Mpp\LemonWayClientBundle\Model;

use Symfony\Component\OptionsResolver\Exception\InvalidOptionsException;
use Symfony\Component\OptionsResolver\Options;
use Symfony\Component\OptionsResolver\OptionsResolver;

class Address extends Model
{
    /**
     * @var string|null
     */
    private $street;

    /**
     * @var string|null
     */
    private $postCode;

    /**
     * @var string|null
     */
    private $city;

    /**
     * @var string|null
     */
    private $country;

    /**
     * {@inheritdoc}
     */
    public static function configureOptions(OptionsResolver $resolver)
    {
        $resolver
            ->setRequired('street')->setAllowedTypes('street', ['string'])->setNormalizer('street', function (Options $options, $value) {
                if (strlen($value) < 0 || 256 < strlen($value)) {
                    throw new InvalidOptionsException(sprintf('The option "street" expected a length between 0 and 256 characters. Current length: %s', strlen($value)));
                }

                return $value;
            })
            ->setRequired('postCode')->setAllowedTypes('postCode', ['string'])->setNormalizer('postCode', function (Options $options, $value) {
                if (strlen($value) < 0 || 10 < strlen($value)) {
                    throw new InvalidOptionsException(sprintf('The option "postCode" expected a length between 0 and 10 characters. Current length: %s', strlen($value)));
                }

                return $value;
            })
            ->setDefined('city')->setAllowedTypes('city', ['string'])->setNormalizer('city', function (Options $options, $value) {
                if (strlen($value) < 0 || 140 < strlen($value)) {
                    throw new InvalidOptionsException(sprintf('The option "city" expected a length between 0 and 140 characters. Current length: %s', strlen($value)));
                }

                return $value;
            })
            ->setRequired('country')->setAllowedTypes('country', ['string'])->setNormalizer('country', function (Options $options, $value) {
                if (3 !== strlen($value)) {
                    throw new InvalidOptionsException(sprintf('The option "country" expected a length of 3 characters. Current length: %s', strlen($value)));
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
     * @method getPostCode
     *
     * @return string|null
     */
    public function getPostCode(): ?string
    {
        return $this->postCode;
    }

    /**
     * @method setPostCode
     *
     * @param string|null $postCode
     *
     * @return self
     */
    public function setPostCode(?string $postCode): self
    {
        $this->postCode = $postCode;

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

    /**
     * @method getCountry
     *
     * @return string|null
     */
    public function getCountry(): ?string
    {
        return $this->country;
    }

    /**
     * @method setCountry
     *
     * @param string|null $country
     *
     * @return self
     */
    public function setCountry(?string $country): self
    {
        $this->country = $country;

        return $this;
    }
}
