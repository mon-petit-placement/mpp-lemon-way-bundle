<?php

namespace Mpp\LemonWayClientBundle\Model;

use Symfony\Component\OptionsResolver\Exception\InvalidOptionsException;
use Symfony\Component\OptionsResolver\Options;
use Symfony\Component\OptionsResolver\OptionsResolver;

class Birth extends Model
{
    /**
     * @var string|null
     */
    private $date;

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
            ->setRequired('date')->setAllowedTypes('date', ['string'])->setNormalizer('date', function (Options $options, $value) {
                if (!preg_match('/^-?\d{1,12}$/', $value)) {
                    throw new InvalidOptionsException('The option "date" does not match the pattern "^[12]\d{3}\/(0[1-9]|1[0-2])\/(0[1-9]|[12]\d|3[01])$"');
                }

                return $value;
            })
            ->setDefined('city')->setAllowedTypes('city', ['string'])->setNormalizer('city', function (Options $options, $value) {
                if (strlen($value) < 0 || 140 < strlen($value)) {
                    throw new InvalidOptionsException(sprintf('The option "city" expected a length between 0 and 140 characters. Current length: %s', strlen($value)));
                }

                return $value;
            })
            ->setDefined('country')->setAllowedTypes('country', ['string'])->setNormalizer('country', function (Options $options, $value) {
                if (3 !== strlen($value)) {
                    throw new InvalidOptionsException(sprintf('The option "country" expected a length of 3 characters. Current length: %s', strlen($value)));
                }

                return $value;
            })
        ;
    }

    /**
     * @method getDate
     *
     * @return string|null
     */
    public function getDate(): ?string
    {
        return $this->date;
    }

    /**
     * @method setDate
     *
     * @param string|null $date
     *
     * @return self
     */
    public function setDate(?string $date): self
    {
        $this->date = $date;

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
