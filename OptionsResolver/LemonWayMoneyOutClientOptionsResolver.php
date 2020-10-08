<?php

namespace Mpp\LemonWayClientBundle\OptionsResolver;

use Mpp\LemonWayClientBundle\Model\BankBranchAddress;
use Symfony\Component\OptionsResolver\Exception\InvalidOptionsException;
use Symfony\Component\OptionsResolver\Options;
use Symfony\Component\OptionsResolver\OptionsResolver;

class LemonWayMoneyInClientOptionsResolver
{
    public function resolveListOptions(array $options = []): array
    {
        $resolver = (new OptionsResolver())
            ->setDefined('transactionId')->setAllowedTypes('transactionId', ['int'])
            ->setDefined('transactionComment')->setAllowedTypes('transactionComment', ['string'])->setNormalizer('transactionComment', function (Options $options, $value) {
                if (strlen($value) < 0 || 140 < strlen($value)) {
                    throw new InvalidOptionsException(sprintf('The option "transactionComment" expected a length between 0 and 140 characters. Current length: %s', strlen($value)));
                }

                return $value;
            })
            ->setDefined('reference')->setAllowedTypes('reference', ['string'])->setNormalizer('reference', function (Options $options, $value) {
                if (strlen($value) < 0 || 50 < strlen($value)) {
                    throw new InvalidOptionsException(sprintf('The option "reference" expected a length between 0 and 50 characters. Current length: %s', strlen($value)));
                }

                return $value;
            })
            ->setDefined('page')->setAllowedTypes('page', ['int'])
            ->setDefined('limit')->setAllowedTypes('limit', ['int'])
        ;

        return $resolver->resolve($options);
    }

    public function resolveCreateOptions(array $options = []): array
    {
        $resolver = (new OptionsResolver())
            ->setRequired('accountId')->setAllowedTypes('accountId', ['string'])->setNormalizer('accountId', function (Options $options, $value) {
                if (strlen($value) < 0 || 256 < strlen($value)) {
                    throw new InvalidOptionsException(sprintf('The option "accountId" expected a length between 0 and 256 characters. Current length: %s', strlen($value)));
                }

                return $value;
            })
            ->setDefined('ibanId')->setAllowedTypes('ibanId', ['int'])
            ->setDefined('totalAmount')->setAllowedTypes('totalAmount', ['int'])
            ->setDefined('commissionAmount')->setAllowedTypes('commissionAmount', ['int'])
            ->setDefined('comment')->setAllowedTypes('comment', ['string'])->setNormalizer('comment', function (Options $options, $value) {
                if (strlen($value) < 0 || 140 < strlen($value)) {
                    throw new InvalidOptionsException(sprintf('The option "comment" expected a length between 0 and 140 characters. Current length: %s', strlen($value)));
                }

                return $value;
            })
            ->setRequired('autoCommission')->setAllowedTypes('autoCommission', ['bool'])
            ->setDefined('reference')->setAllowedTypes('reference', ['string'])->setNormalizer('reference', function (Options $options, $value) {
                if (strlen($value) < 0 || 50 < strlen($value)) {
                    throw new InvalidOptionsException(sprintf('The option "reference" expected a length between 0 and 50 characters. Current length: %s', strlen($value)));
                }

                return $value;
            })
        ;

        return $resolver->resolve($options);
    }

    public function resolveCancelOptions(array $options = []): array
    {
        $resolver = (new OptionsResolver())
            ->setDefined('accountId')->setAllowedTypes('accountId', ['string'])->setNormalizer('accountId', function (Options $options, $value) {
                if (strlen($value) < 0 || 256 < strlen($value)) {
                    throw new InvalidOptionsException(sprintf('The option "accountId" expected a length between 0 and 256 characters. Current length: %s', strlen($value)));
                }

                return $value;
            })
        ;

        return $resolver->resolve($options);
    }

    public function resolveDisableIbanOptions(array $options = []): array
    {
        $resolver = (new OptionsResolver())
            ->setRequired('wallet')->setAllowedTypes('wallet', ['string'])->setNormalizer('wallet', function (Options $options, $value) {
                if (strlen($value) < 0 || 256 < strlen($value)) {
                    throw new InvalidOptionsException(sprintf('The option "wallet" expected a length between 0 and 256 characters. Current length: %s', strlen($value)));
                }

                return $value;
            })
        ;

        return $resolver->resolve($options);
    }

    public function resolveCreateIbanOptions(array $options = []): array
    {
        $resolver = (new OptionsResolver())
            ->setRequired('accountId')->setAllowedTypes('accountId', ['string'])->setNormalizer('accountId', function (Options $options, $value) {
                if (strlen($value) < 0 || 256 < strlen($value)) {
                    throw new InvalidOptionsException(sprintf('The option "accountId" expected a length between 0 and 256 characters. Current length: %s', strlen($value)));
                }

                return $value;
            })
            ->setRequired('holder')->setAllowedTypes('holder', ['string'])->setNormalizer('holder', function (Options $options, $value) {
                if (strlen($value) < 0 || 256 < strlen($value)) {
                    throw new InvalidOptionsException(sprintf('The option "holder" expected a length between 0 and 256 characters. Current length: %s', strlen($value)));
                }

                return $value;
            })
            ->setDefined('bic')->setAllowedTypes('bic', ['string'])->setNormalizer('bic', function (Options $options, $value) {
                if (strlen($value) < 8 || 11 < strlen($value)) {
                    throw new InvalidOptionsException(sprintf('The option "bic" expected a length between 8 and 11 characters. Current length: %s', strlen($value)));
                }

                return $value;
            })
            ->setRequired('iban')->setAllowedTypes('iban', ['string'])->setNormalizer('iban', function (Options $options, $value) {
                if (strlen($value) < 15 || 34 < strlen($value)) {
                    throw new InvalidOptionsException(sprintf('The option "iban" expected a length between 15 and 34 characters. Current length: %s', strlen($value)));
                }

                return $value;
            })
            ->setDefined('domiciliation1')->setAllowedTypes('domiciliation1', ['string'])->setNormalizer('domiciliation1', function (Options $options, $value) {
                if (strlen($value) < 1 || 256 < strlen($value)) {
                    throw new InvalidOptionsException(sprintf('The option "domiciliation1" expected a length between 1 and 256 characters. Current length: %s', strlen($value)));
                }

                return $value;
            })
            ->setDefined('domiciliation2')->setAllowedTypes('domiciliation2', ['string'])->setNormalizer('domiciliation2', function (Options $options, $value) {
                if (strlen($value) < 1 || 256 < strlen($value)) {
                    throw new InvalidOptionsException(sprintf('The option "domiciliation2" expected a length between 1 and 256 characters. Current length: %s', strlen($value)));
                }

                return $value;
            })
            ->setDefined('comment')->setAllowedTypes('comment', ['string'])->setNormalizer('comment', function (Options $options, $value) {
                if (strlen($value) < 1 || 512 < strlen($value)) {
                    throw new InvalidOptionsException(sprintf('The option "comment" expected a length between 1 and 512 characters. Current length: %s', strlen($value)));
                }

                return $value;
            })
        ;

        return $resolver->resolve($options);
    }

    public function resolveAddAccountBankDetailsOptions(array $options = []): array
    {
        $resolver = (new OptionsResolver())
            ->setRequired('wallet')->setAllowedTypes('wallet', ['string'])->setNormalizer('wallet', function (Options $options, $value) {
                if (strlen($value) < 0 || 256 < strlen($value)) {
                    throw new InvalidOptionsException(sprintf('The option "wallet" expected a length between 0 and 256 characters. Current length: %s', strlen($value)));
                }

                return $value;
            })
            ->setDefined('accountType')->setAllowedTypes('accountType', ['string'])->setAllowedValues('accountType', [0, 1, 2]) // 0 = Other // 1 = IBAN // 2 = BBAN/RIB.
            ->setRequired('holderName')->setAllowedTypes('holderName', ['string'])->setNormalizer('holderName', function (Options $options, $value) {
                if (strlen($value) < 0 || 256 < strlen($value)) {
                    throw new InvalidOptionsException(sprintf('The option "holderName" expected a length between 0 and 256 characters. Current length: %s', strlen($value)));
                }

                return $value;
            })
            ->setRequired('accountNumber')->setAllowedTypes('accountNumber', ['string'])->setNormalizer('accountNumber', function (Options $options, $value) {
                if (strlen($value) < 0 || 34 < strlen($value)) {
                    throw new InvalidOptionsException(sprintf('The option "accountNumber" expected a length between 0 and 34 characters. Current length: %s', strlen($value)));
                }

                return $value;
            })
            ->setDefined('holderCountry')->setAllowedTypes('holderCountry', ['string'])->setNormalizer('holderCountry', function (Options $options, $value) {
                if (2 !== strlen($value)) {
                    throw new InvalidOptionsException(sprintf('The option "holderCountry" expected a length of 2 characters. Current length: %s', strlen($value)));
                }

                return $value;
            })
            ->setDefined('bicCode')->setAllowedTypes('bicCode', ['string'])->setNormalizer('bicCode', function (Options $options, $value) {
                if (strlen($value) < 8 || 11 < strlen($value)) {
                    throw new InvalidOptionsException(sprintf('The option "bicCode" expected a length between 8 and 11 characters. Current length: %s', strlen($value)));
                }

                return $value;
            })
            ->setDefined('bankName')->setAllowedTypes('bankName', ['string'])->setNormalizer('bankName', function (Options $options, $value) {
                if (strlen($value) < 0 || 140 < strlen($value)) {
                    throw new InvalidOptionsException(sprintf('The option "bankName" expected a length between 0 and 140 characters. Current length: %s', strlen($value)));
                }

                return $value;
            })
            ->setRequired('bankCountry')->setAllowedTypes('bankCountry', ['string'])->setNormalizer('bankCountry', function (Options $options, $value) {
                if (2 !== strlen($value)) {
                    throw new InvalidOptionsException(sprintf('The option "bankCountry" expected a length of 2 characters. Current length: %s', strlen($value)));
                }

                return $value;
            })
            ->setDefined('bankBranchCode')->setAllowedTypes('bankBranchCode', ['string'])->setNormalizer('bankBranchCode', function (Options $options, $value) {
                if (strlen($value) < 0 || 255 < strlen($value)) {
                    throw new InvalidOptionsException(sprintf('The option "bankBranchCode" expected a length between 0 and 255 characters. Current length: %s', strlen($value)));
                }

                return $value;
            })
            ->setDefined('bankBranchAddress')->setAllowedTypes('bankBranchAddress', [BankBranchAddress::class, 'array'])->setNormalizer('bankBranchAddress', function (Options $options, $value) {
                if ($value instanceof BankBranchAddress) {
                    return $value;
                }

                return BankBranchAddress::createFromArray($value);
            })
            ->setDefined('intermediaryBicCode')->setAllowedTypes('intermediaryBicCode', ['string'])->setNormalizer('intermediaryBicCode', function (Options $options, $value) {
                if (strlen($value) < 8 || 11 < strlen($value)) {
                    throw new InvalidOptionsException(sprintf('The option "intermediaryBicCode" expected a length between 8 and 11 characters. Current length: %s', strlen($value)));
                }

                return $value;
            })
            ->setDefined('intermediaryBankName')->setAllowedTypes('intermediaryBankName', ['string'])->setNormalizer('intermediaryBankName', function (Options $options, $value) {
                if (strlen($value) < 0 || 140 < strlen($value)) {
                    throw new InvalidOptionsException(sprintf('The option "intermediaryBankName" expected a length between 0 and 140 characters. Current length: %s', strlen($value)));
                }

                return $value;
            })
            ->setDefined('intermediaryBankCountry')->setAllowedTypes('intermediaryBankCountry', ['string'])->setNormalizer('intermediaryBankCountry', function (Options $options, $value) {
                if (2 !== strlen($value)) {
                    throw new InvalidOptionsException(sprintf('The option "intermediaryBankCountry" expected a length of 2 characters. Current length: %s', strlen($value)));
                }

                return $value;
            })
            ->setDefined('comment')->setAllowedTypes('comment', ['string'])->setNormalizer('comment', function (Options $options, $value) {
                if (strlen($value) < 1 || 512 < strlen($value)) {
                    throw new InvalidOptionsException(sprintf('The option "comment" expected a length between 1 and 512 characters. Current length: %s', strlen($value)));
                }

                return $value;
            })
        ;

        return $resolver->resolve($options);
    }
}
