<?php

namespace Mpp\LemonWayClientBundle\Model;

use Symfony\Component\OptionsResolver\Exception\InvalidOptionsException;
use Symfony\Component\OptionsResolver\Options;
use Symfony\Component\OptionsResolver\OptionsResolver;

class Account extends Model
{
    /**
     * @var string|null
     */
    private $name;

    /**
     * @var string|null
     */
    private $decription;

    /**
     * @var string|null
     */
    private $websiteUrl;

    /**
     * @var string|null
     */
    private $identificationNumber;

    /**
     * {@inheritdoc}
     */
    public static function configureOptions(OptionsResolver $resolver)
    {
        $resolver
            ->setRequired('name')->setAllowedTypes('name', ['string'])->setNormalizer('name', function (Options $options, $value) {
                if (strlen($value) < 1 || 256 < strlen($value)) {
                    throw new InvalidOptionsException(sprintf('The option "name" expected a length between 1 and 256 characters. Current length: %s', strlen($value)));
                }

                return $value;
            })
            ->setRequired('description')->setAllowedTypes('description', ['string'])->setNormalizer('description', function (Options $options, $value) {
                if (strlen($value) < 1 || 256 < strlen($value)) {
                    throw new InvalidOptionsException(sprintf('The option "description" expected a length between 1 and 256 characters. Current length: %s', strlen($value)));
                }

                return $value;
            })
            ->setDefined('websiteUrl')->setAllowedTypes('websiteUrl', ['string'])->setNormalizer('websiteUrl', function (Options $options, $value) {
                if (strlen($value) < 1 || 256 < strlen($value)) {
                    throw new InvalidOptionsException(sprintf('The option "websiteUrl" expected a length between 1 and 256 characters. Current length: %s', strlen($value)));
                }

                return $value;
            })
            ->setDefined('identificationNumber')->setAllowedTypes('identificationNumber', ['string'])->setNormalizer('identificationNumber', function (Options $options, $value) {
                if (strlen($value) < 1 || 256 < strlen($value)) {
                    throw new InvalidOptionsException(sprintf('The option "identificationNumber" expected a length between 1 and 256 characters. Current length: %s', strlen($value)));
                }

                return $value;
            })
        ;
    }

    /**
     * @method getName
     *
     * @return string|null
     */
    public function getName(): ?string
    {
        return $this->name;
    }

    /**
     * @method setName
     *
     * @param string|null $name
     *
     * @return self
     */
    public function setName(?string $name): self
    {
        $this->name = $name;

        return $this;
    }

    /**
     * @method getDescription
     *
     * @return string|null
     */
    public function getDescription(): ?string
    {
        return $this->description;
    }

    /**
     * @method setDescription
     *
     * @param string|null $description
     *
     * @return self
     */
    public function setDescription(?string $description): self
    {
        $this->description = $description;

        return $this;
    }

    /**
     * @method getWebsiteUrl
     *
     * @return string|null
     */
    public function getWebsiteUrl(): ?string
    {
        return $this->websiteUrl;
    }

    /**
     * @method setWebsiteUrl
     *
     * @param string|null $websiteUrl
     *
     * @return self
     */
    public function setWebsiteUrl(?string $websiteUrl): self
    {
        $this->websiteUrl = $websiteUrl;

        return $this;
    }

    /**
     * @method getIdentificationNumber
     *
     * @return string|null
     */
    public function getIdentificationNumber(): ?string
    {
        return $this->identificationNumber;
    }

    /**
     * @method setIdentificationNumber
     *
     * @param string|null $identificationNumber
     *
     * @return self
     */
    public function setIdentificationNumber(?string $identificationNumber): self
    {
        $this->identificationNumber = $identificationNumber;

        return $this;
    }
}
