<?php

namespace Mpp\LemonWayClientBundle\OptionsResolver;

use Symfony\Component\HttpFoundation\File\File;
use Symfony\Component\Model\Account;
use Symfony\Component\Model\Address;
use Symfony\Component\Model\Birth;
use Symfony\Component\Model\Company;
use Symfony\Component\Model\UpdateAccountStatus;
use Symfony\Component\Model\WalletDetailsInput;
use Symfony\Component\OptionsResolver\Exception\InvalidOptionsException;
use Symfony\Component\OptionsResolver\Options;
use Symfony\Component\OptionsResolver\OptionsResolver;

class LemonWayAccountClientOptionsResolver
{
    public static function resolveGetBalanceOptions(array $options): array
    {
        $resolver = (new OptionsResolver())
            ->setDefined('atDate')->setAllowedTypes('atDate', ['string'])->setNormalizer('atDate', function (Options $options, $value) {
                if (!preg_match('/^-?\d{1,12}$/', $value)) {
                    throw new InvalidOptionsException('The option "atDate" does not match the pattern "^-?\d{1,12}$"');
                }

                return $value;
            })
        ;

        return $resolver->resolve($options);
    }

    public static function resolveGetKycStatusesOptions(array $options): array
    {
        $resolver = (new OptionsResolver())
            ->setRequired('updateDate')->setAllowedTypes('updateDate', ['string'])->setNormalizer('updateDate', function (Options $options, $value) {
                if (!preg_match('/^-?\d{1,12}$/', $value)) {
                    throw new InvalidOptionsException('The option "updateDate" does not match the pattern "^-?\d{1,12}$"');
                }

                return $value;
            })
            ->setDefined('page')->setAllowedTypes('page', ['int'])
            ->setDefined('limit')->setAllowedTypes('limit', ['int'])
        ;

        return $resolver->resolve($options);
    }

    public static function resolveGetBalancesOptions(array $options): array
    {
        $resolver = (new OptionsResolver())
            ->setDefined('updateDate')->setAllowedTypes('updateDate', ['string'])->setNormalizer('updateDate', function (Options $options, $value) {
                if (!preg_match('/^-?\d{1,12}$/', $value)) {
                    throw new InvalidOptionsException('The option "updateDate" does not match the pattern "^-?\d{1,12}$"');
                }

                return $value;
            })
            ->setDefined('internalAccountIdStart')->setAllowedTypes('internalAccountIdStart', ['int'])->setNormalizer('internalAccountIdStart', function (Options $options, $value) {
                if (!preg_match('/^\d{1,19}$/', $value)) {
                    throw new InvalidOptionsException('The option "internalAccountIdStart" does not match the pattern "^\d{1,19}$"');
                }

                return $value;
            })
            ->setDefined('internalAccountIdEnd')->setAllowedTypes('internalAccountIdEnd', ['int'])->setNormalizer('internalAccountIdEnd', function (Options $options, $value) {
                if (!preg_match('/^\d{1,19}$/', $value)) {
                    throw new InvalidOptionsException('The option "internalAccountIdEnd" does not match the pattern "^\d{1,19}$"');
                }

                return $value;
            })
            ->setDefined('page')->setAllowedTypes('page', ['int'])
            ->setDefined('limit')->setAllowedTypes('limit', ['int'])
        ;

        return $resolver->resolve($options);
    }

    public static function resolveGetTransactionsOptions(array $options): array
    {
        $resolver = (new OptionsResolver())
            ->setDefined('startDate')->setAllowedTypes('startDate', ['string'])->setNormalizer('startDate', function (Options $options, $value) {
                if (!preg_match('/^-?\d{1,12}$/', $value)) {
                    throw new InvalidOptionsException('The option "startDate" does not match the pattern "^-?\d{1,12}$"');
                }

                return $value;
            })
            ->setDefined('endDate')->setAllowedTypes('endDate', ['string'])->setNormalizer('endDate', function (Options $options, $value) {
                if (!preg_match('/^-?\d{1,12}$/', $value)) {
                    throw new InvalidOptionsException('The option "endDate" does not match the pattern "^-?\d{1,12}$"');
                }

                return $value;
            })
            ->setDefined('executionDateStart')->setAllowedTypes('executionDateStart', ['string'])->setNormalizer('executionDateStart', function (Options $options, $value) {
                if (!preg_match('/^-?\d{1,12}$/', $value)) {
                    throw new InvalidOptionsException('The option "executionDateStart" does not match the pattern "^-?\d{1,12}$"');
                }

                return $value;
            })
            ->setDefined('executionDateEnd')->setAllowedTypes('executionDateEnd', ['string'])->setNormalizer('executionDateEnd', function (Options $options, $value) {
                if (!preg_match('/^-?\d{1,12}$/', $value)) {
                    throw new InvalidOptionsException('The option "executionDateEnd" does not match the pattern "^-?\d{1,12}$"');
                }

                return $value;
            })
            ->setDefined('page')->setAllowedTypes('page', ['int'])
            ->setDefined('limit')->setAllowedTypes('limit', ['int'])
        ;

        return $resolver->resolve($options);
    }

    public static function resolveUpdateLegalDataOptions(array $options): array
    {
        $resolver = (new OptionsResolver())
            ->setDefined('company')->setAllowedTypes('company', [Company::class, 'array'])->setNormalizer('company', function (Options $options, $value) {
                if ($value instanceof Company) {
                    return $value;
                }

                return Company::createFromArray($value);
            })
            ->setDefined('email')->setAllowedTypes('email', ['string'])->setNormalizer('email', function (Options $options, $value) {
                if (!preg_match('/^(([^<>()[\]\\.,;:\s@\"]+(\.[^<>()[\]\\.,;:\s@\"]+)*)|(\".+\"))@((\[\d{1,3}\.\d{1,3}\.\d{1,3}\.\d{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/', $value)) {
                    throw new InvalidOptionsException('The option "email" does not match the pattern "^(([^<>()[\]\\.,;:\s@\"]+(\.[^<>()[\]\\.,;:\s@\"]+)*)|(\".+\"))@((\[\d{1,3}\.\d{1,3}\.\d{1,3}\.\d{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$"');
                }

                return $value;
            })
            ->setDefined('title')->setAllowedTypes('title', ['string'])->setAllowedValues('title', ['M', 'F', 'J', 'U'])
            ->setDefined('firstName')->setAllowedTypes('firstName', ['string'])->setNormalizer('firstName', function (Options $options, $value) {
                if (strlen($value) < 2 || 256 < strlen($value)) {
                    throw new InvalidOptionsException(sprintf('The option "firstName" expected a length between 2 and 256 characters. Current length: %s', strlen($value)));
                }

                return $value;
            })
            ->setDefined('lastName')->setAllowedTypes('lastName', ['string'])->setNormalizer('lastName', function (Options $options, $value) {
                if (strlen($value) < 2 || 256 < strlen($value)) {
                    throw new InvalidOptionsException(sprintf('The option "lastName" expected a length between 2 and 256 characters. Current length: %s', strlen($value)));
                }

                return $value;
            })
            ->setDefined('adresse')->setAllowedTypes('adresse', [Company::class, 'array'])->setNormalizer('adresse', function (Options $options, $value) {
                if ($value instanceof Address) {
                    return $value;
                }

                return Address::createFromArray($value);
            })
            ->setDefined('birth')->setAllowedTypes('birth', [Birth::class, 'array'])->setNormalizer('birth', function (Options $options, $value) {
                if ($value instanceof Birth) {
                    return $value;
                }

                return Birth::createFromArray($value);
            })
            ->setDefined('phoneNumber')->setAllowedTypes('phoneNumber', ['string'])->setNormalizer('phoneNumber', function (Options $options, $value) {
                if (!preg_match('/^\d{6,30}$/', $value)) {
                    throw new InvalidOptionsException('The option "phoneNumber" does not match the pattern "^\d{6,30}$"');
                }

                return $value;
            })
            ->setDefined('mobileNumber')->setAllowedTypes('mobileNumber', ['string'])->setNormalizer('mobileNumber', function (Options $options, $value) {
                if (!preg_match('/^\d{6,30}$/', $value)) {
                    throw new InvalidOptionsException('The option "mobileNumber" does not match the pattern "^\d{6,30}$"');
                }

                return $value;
            })
            ->setDefined('isDebtor')->setAllowedTypes('isDebtor', ['bool'])
            ->setDefined('nationality')->setAllowedTypes('nationality', ['string'])->setNormalizer('nationality', function (Options $options, $value) {
                if (strlen($value) < 0 || 19 < strlen($value)) {
                    throw new InvalidOptionsException(sprintf('The option "nationality" expected a length between 0 and 19 characters. Current length: %s', strlen($value)));
                }

                return $value;
            })
            ->setDefined('payerOrBeneficiary')->setAllowedTypes('payerOrBeneficiary', ['int'])->setAllowedValues([
                Account::PAYER_OR_BENEFICIARY_PAYER,
                Account::PAYER_OR_BENEFICIARY_BENEFICIARY,
            ])
        ;

        return $resolver->resolve($options);
    }

    public static function resolveUpdateBlockStatusOptions(array $options): array
    {
        $resolver = (new OptionsResolver())
            ->setDefined('isBlocked')->setAllowedTypes('isBlocked', ['bool'])
            ->setDefined('comment')->setAllowedTypes('comment', ['string'])->setNormalizer('comment', function (Options $options, $value) {
                if (strlen($value) < 2 || 256 < strlen($value)) {
                    throw new InvalidOptionsException(sprintf('The option "comment" expected a length between 2 and 256 characters. Current length: %s', strlen($value)));
                }

                return $value;
            })
        ;

        return $resolver->resolve($options);
    }

    public static function resolveUpdateStatusOptions(array $options): array
    {
        $resolver = (new OptionsResolver())
            ->setDefined('status')->setAllowedTypes('status', ['int'])->setAllowedValues('status', [
                UpdateAccountStatus::STATUS_NOT_OPENED,
                UpdateAccountStatus::STATUS_OPENED_DOCUMENT_INCOMPLETE,
                UpdateAccountStatus::STATUS_OPENED_DOCUMENT_REJECTED,
                UpdateAccountStatus::STATUS_OPENED_KYC_1,
                UpdateAccountStatus::STATUS_OPENED_KYC_2,
                UpdateAccountStatus::STATUS_OPENED_KYC_3,
                UpdateAccountStatus::STATUS_OPENED_DOCUMENT_EXPIRED,
                UpdateAccountStatus::STATUS_FROZEN,
                UpdateAccountStatus::STATUS_BLOCKED,
                UpdateAccountStatus::STATUS_LOCKED,
                UpdateAccountStatus::STATUS_CLOSED,
                UpdateAccountStatus::STATUS_PENDING_KYC_3,
                UpdateAccountStatus::STATUS_ONE_TIME_CUSTOMER,
                UpdateAccountStatus::STATUS_CGE,
                UpdateAccountStatus::STATUS_TECHNICAL_ACCOUNT,
            ])
        ;

        return $resolver->resolve($options);
    }

    public static function resolveUpdateIndividualDataOptions(array $options): array
    {
        $resolver = (new OptionsResolver())
            ->setDefined('email')->setAllowedTypes('email', ['string'])->setNormalizer('email', function (Options $options, $value) {
                if (!preg_match('/^(([^<>()[\]\\.,;:\s@\"]+(\.[^<>()[\]\\.,;:\s@\"]+)*)|(\".+\"))@((\[\d{1,3}\.\d{1,3}\.\d{1,3}\.\d{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/', $value)) {
                    throw new InvalidOptionsException('The option "email" does not match the pattern "^(([^<>()[\]\\.,;:\s@\"]+(\.[^<>()[\]\\.,;:\s@\"]+)*)|(\".+\"))@((\[\d{1,3}\.\d{1,3}\.\d{1,3}\.\d{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$"');
                }

                return $value;
            })
            ->setDefined('title')->setAllowedTypes('title', ['string'])->setAllowedValues('title', ['M', 'F', 'J', 'U'])
            ->setDefined('firstName')->setAllowedTypes('firstName', ['string'])->setNormalizer('firstName', function (Options $options, $value) {
                if (strlen($value) < 2 || 256 < strlen($value)) {
                    throw new InvalidOptionsException(sprintf('The option "firstName" expected a length between 2 and 256 characters. Current length: %s', strlen($value)));
                }

                return $value;
            })
            ->setDefined('lastName')->setAllowedTypes('lastName', ['string'])->setNormalizer('lastName', function (Options $options, $value) {
                if (strlen($value) < 2 || 256 < strlen($value)) {
                    throw new InvalidOptionsException(sprintf('The option "lastName" expected a length between 2 and 256 characters. Current length: %s', strlen($value)));
                }

                return $value;
            })
            ->setDefined('adresse')->setAllowedTypes('adresse', [Company::class, 'array'])->setNormalizer('adresse', function (Options $options, $value) {
                if ($value instanceof Address) {
                    return $value;
                }

                return Address::createFromArray($value);
            })
            ->setDefined('birth')->setAllowedTypes('birth', [Birth::class, 'array'])->setNormalizer('birth', function (Options $options, $value) {
                if ($value instanceof Birth) {
                    return $value;
                }

                return Birth::createFromArray($value);
            })
            ->setDefined('phoneNumber')->setAllowedTypes('phoneNumber', ['string'])->setNormalizer('phoneNumber', function (Options $options, $value) {
                if (!preg_match('/^\d{6,30}$/', $value)) {
                    throw new InvalidOptionsException('The option "phoneNumber" does not match the pattern "^\d{6,30}$"');
                }

                return $value;
            })
            ->setDefined('mobileNumber')->setAllowedTypes('mobileNumber', ['string'])->setNormalizer('mobileNumber', function (Options $options, $value) {
                if (!preg_match('/^\d{6,30}$/', $value)) {
                    throw new InvalidOptionsException('The option "mobileNumber" does not match the pattern "^\d{6,30}$"');
                }

                return $value;
            })
            ->setDefined('isDebtor')->setAllowedTypes('isDebtor', ['bool'])
            ->setDefined('nationality')->setAllowedTypes('nationality', ['string'])->setNormalizer('nationality', function (Options $options, $value) {
                if (strlen($value) < 0 || 19 < strlen($value)) {
                    throw new InvalidOptionsException(sprintf('The option "nationality" expected a length between 0 and 19 characters. Current length: %s', strlen($value)));
                }

                return $value;
            })
            ->setDefined('payerOrBeneficiary')->setAllowedTypes('payerOrBeneficiary', ['int'])->setAllowedValues([
                Account::PAYER_OR_BENEFICIARY_PAYER,
                Account::PAYER_OR_BENEFICIARY_BENEFICIARY,
            ])
        ;

        return $resolver->resolve($options);
    }

    public static function resolveUpdateUltimateBeneficialOwnerOptions(array $options): array
    {
        $resolver = (new OptionsResolver())
            ->setDefined('firstName')->setAllowedTypes('firstName', ['string'])->setNormalizer('firstName', function (Options $options, $value) {
                if (strlen($value) < 2 || 256 < strlen($value)) {
                    throw new InvalidOptionsException(sprintf('The option "firstName" expected a length between 2 and 256 characters. Current length: %s', strlen($value)));
                }

                return $value;
            })
            ->setDefined('lastName')->setAllowedTypes('lastName', ['string'])->setNormalizer('lastName', function (Options $options, $value) {
                if (strlen($value) < 2 || 256 < strlen($value)) {
                    throw new InvalidOptionsException(sprintf('The option "lastName" expected a length between 2 and 256 characters. Current length: %s', strlen($value)));
                }

                return $value;
            })
            ->setDefined('nationality')->setAllowedTypes('nationality', ['string'])->setNormalizer('nationality', function (Options $options, $value) {
                if (strlen($value) < 0 || 19 < strlen($value)) {
                    throw new InvalidOptionsException(sprintf('The option "nationality" expected a length between 0 and 19 characters. Current length: %s', strlen($value)));
                }

                return $value;
            })
            ->setDefined('dateOrBirth')->setAllowedTypes('dateOrBirth', ['string'])->setNormalizer('dateOrBirth', function (Options $options, $value) {
                if (!preg_match('/^[12]\d{3}\/(0[1-9]|1[0-2])\/(0[1-9]|[12]\d|3[01])$/', $value)) {
                    throw new InvalidOptionsException('The option "dateOrBirth" does not match the pattern "^[12]\d{3}\/(0[1-9]|1[0-2])\/(0[1-9]|[12]\d|3[01])$"');
                }

                return $value;
            })
            ->setDefined('cityOfBirth')->setAllowedTypes('cityOfBirth', ['string'])->setNormalizer('cityOfBirth', function (Options $options, $value) {
                if (strlen($value) < 0 || 140 < strlen($value)) {
                    throw new InvalidOptionsException(sprintf('The option "cityOfBirth" expected a length between 0 and 140 characters. Current length: %s', strlen($value)));
                }

                return $value;
            })
            ->setDefined('countryOfBirth')->setAllowedTypes('countryOfBirth', ['string'])->setNormalizer('countryOfBirth', function (Options $options, $value) {
                if (3 !== strlen($value)) {
                    throw new InvalidOptionsException(sprintf('The option "countryOfBirth" expected a length of 3 characters. Current length: %s', strlen($value)));
                }

                return $value;
            })
            ->setDefined('countryOfResidence')->setAllowedTypes('countryOfResidence', ['string'])->setNormalizer('countryOfResidence', function (Options $options, $value) {
                if (strlen($value) < 0 || 19 < strlen($value)) {
                    throw new InvalidOptionsException(sprintf('The option "countryOfResidence" expected a length between 0 and 19 characters. Current length: %s', strlen($value)));
                }

                return $value;
            })
            ->setDefined('isActive')->setAllowedTypes('isActive', ['bool'])
        ;

        return $resolver->resolve($options);
    }

    public static function resolveCreateLegalOptions(array $options): array
    {
        $resolver = (new OptionsResolver())
            ->setDefined('company')->setAllowedTypes('company', [Company::class, 'array'])->setNormalizer('company', function (Options $options, $value) {
                if ($value instanceof Company) {
                    return $value;
                }

                return Company::createFromArray($value);
            })
            ->setDefined('isUltimateBeneficialOwner')->setAllowedTypes('isUltimateBeneficialOwner', ['bool'])
            ->setDefined('accountId')->setAllowedTypes('accountId', ['string'])->setNormalizer('accountId', function (Options $options, $value) {
                if (strlen($value) < 1 || 100 < strlen($value)) {
                    throw new InvalidOptionsException(sprintf('The option "accountId" expected a length between 1 and 100 characters. Current length: %s', strlen($value)));
                }

                return $value;
            })
            ->setDefined('email')->setAllowedTypes('email', ['string'])->setNormalizer('email', function (Options $options, $value) {
                if (!preg_match('/^(([^<>()[\]\\.,;:\s@\"]+(\.[^<>()[\]\\.,;:\s@\"]+)*)|(\".+\"))@((\[\d{1,3}\.\d{1,3}\.\d{1,3}\.\d{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/', $value)) {
                    throw new InvalidOptionsException('The option "email" does not match the pattern "^(([^<>()[\]\\.,;:\s@\"]+(\.[^<>()[\]\\.,;:\s@\"]+)*)|(\".+\"))@((\[\d{1,3}\.\d{1,3}\.\d{1,3}\.\d{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$"');
                }

                return $value;
            })
            ->setDefined('title')->setAllowedTypes('title', ['string'])->setAllowedValues('title', ['M', 'F', 'J', 'U'])
            ->setDefined('firstName')->setAllowedTypes('firstName', ['string'])->setNormalizer('firstName', function (Options $options, $value) {
                if (strlen($value) < 2 || 256 < strlen($value)) {
                    throw new InvalidOptionsException(sprintf('The option "firstName" expected a length between 2 and 256 characters. Current length: %s', strlen($value)));
                }

                return $value;
            })
            ->setDefined('lastName')->setAllowedTypes('lastName', ['string'])->setNormalizer('lastName', function (Options $options, $value) {
                if (strlen($value) < 2 || 256 < strlen($value)) {
                    throw new InvalidOptionsException(sprintf('The option "lastName" expected a length between 2 and 256 characters. Current length: %s', strlen($value)));
                }

                return $value;
            })
            ->setDefined('adresse')->setAllowedTypes('adresse', [Company::class, 'array'])->setNormalizer('adresse', function (Options $options, $value) {
                if ($value instanceof Address) {
                    return $value;
                }

                return Address::createFromArray($value);
            })
            ->setDefined('birth')->setAllowedTypes('birth', [Birth::class, 'array'])->setNormalizer('birth', function (Options $options, $value) {
                if ($value instanceof Birth) {
                    return $value;
                }

                return Birth::createFromArray($value);
            })
            ->setDefined('phoneNumber')->setAllowedTypes('phoneNumber', ['string'])->setNormalizer('phoneNumber', function (Options $options, $value) {
                if (!preg_match('/^\d{6,30}$/', $value)) {
                    throw new InvalidOptionsException('The option "phoneNumber" does not match the pattern "^\d{6,30}$"');
                }

                return $value;
            })
            ->setDefined('mobileNumber')->setAllowedTypes('mobileNumber', ['string'])->setNormalizer('mobileNumber', function (Options $options, $value) {
                if (!preg_match('/^\d{6,30}$/', $value)) {
                    throw new InvalidOptionsException('The option "mobileNumber" does not match the pattern "^\d{6,30}$"');
                }

                return $value;
            })
            ->setDefined('isDebtor')->setAllowedTypes('isDebtor', ['bool'])
            ->setDefined('nationality')->setAllowedTypes('nationality', ['string'])->setNormalizer('nationality', function (Options $options, $value) {
                if (strlen($value) < 0 || 19 < strlen($value)) {
                    throw new InvalidOptionsException(sprintf('The option "nationality" expected a length between 0 and 19 characters. Current length: %s', strlen($value)));
                }

                return $value;
            })
            ->setDefined('payerOrBeneficiary')->setAllowedTypes('payerOrBeneficiary', ['int'])->setAllowedValues([
                Account::PAYER_OR_BENEFICIARY_PAYER,
                Account::PAYER_OR_BENEFICIARY_BENEFICIARY,
            ])
            ->setDefined('isOneTimeCustomerAccount')->setAllowedTypes('isOneTimeCustomerAccount', ['bool'])
            ->setDefined('isTechnicalAccount')->setAllowedTypes('isTechnicalAccount', ['bool'])
        ;

        return $resolver->resolve($options);
    }

    public static function resolveCreateIndividualOptions(array $options): array
    {
        $resolver = (new OptionsResolver())
            ->setDefined('accountId')->setAllowedTypes('accountId', ['string'])->setNormalizer('accountId', function (Options $options, $value) {
                if (strlen($value) < 1 || 100 < strlen($value)) {
                    throw new InvalidOptionsException(sprintf('The option "accountId" expected a length between 1 and 100 characters. Current length: %s', strlen($value)));
                }

                return $value;
            })
            ->setDefined('email')->setAllowedTypes('email', ['string'])->setNormalizer('email', function (Options $options, $value) {
                if (!preg_match('/^(([^<>()[\]\\.,;:\s@\"]+(\.[^<>()[\]\\.,;:\s@\"]+)*)|(\".+\"))@((\[\d{1,3}\.\d{1,3}\.\d{1,3}\.\d{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/', $value)) {
                    throw new InvalidOptionsException('The option "email" does not match the pattern "^(([^<>()[\]\\.,;:\s@\"]+(\.[^<>()[\]\\.,;:\s@\"]+)*)|(\".+\"))@((\[\d{1,3}\.\d{1,3}\.\d{1,3}\.\d{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$"');
                }

                return $value;
            })
            ->setDefined('title')->setAllowedTypes('title', ['string'])->setAllowedValues('title', ['M', 'F', 'J', 'U'])
            ->setDefined('firstName')->setAllowedTypes('firstName', ['string'])->setNormalizer('firstName', function (Options $options, $value) {
                if (strlen($value) < 2 || 256 < strlen($value)) {
                    throw new InvalidOptionsException(sprintf('The option "firstName" expected a length between 2 and 256 characters. Current length: %s', strlen($value)));
                }

                return $value;
            })
            ->setDefined('lastName')->setAllowedTypes('lastName', ['string'])->setNormalizer('lastName', function (Options $options, $value) {
                if (strlen($value) < 2 || 256 < strlen($value)) {
                    throw new InvalidOptionsException(sprintf('The option "lastName" expected a length between 2 and 256 characters. Current length: %s', strlen($value)));
                }

                return $value;
            })
            ->setDefined('adresse')->setAllowedTypes('adresse', [Company::class, 'array'])->setNormalizer('adresse', function (Options $options, $value) {
                if ($value instanceof Address) {
                    return $value;
                }

                return Address::createFromArray($value);
            })
            ->setDefined('birth')->setAllowedTypes('birth', [Birth::class, 'array'])->setNormalizer('birth', function (Options $options, $value) {
                if ($value instanceof Birth) {
                    return $value;
                }

                return Birth::createFromArray($value);
            })
            ->setDefined('phoneNumber')->setAllowedTypes('phoneNumber', ['string'])->setNormalizer('phoneNumber', function (Options $options, $value) {
                if (!preg_match('/^\d{6,30}$/', $value)) {
                    throw new InvalidOptionsException('The option "phoneNumber" does not match the pattern "^\d{6,30}$"');
                }

                return $value;
            })
            ->setDefined('mobileNumber')->setAllowedTypes('mobileNumber', ['string'])->setNormalizer('mobileNumber', function (Options $options, $value) {
                if (!preg_match('/^\d{6,30}$/', $value)) {
                    throw new InvalidOptionsException('The option "mobileNumber" does not match the pattern "^\d{6,30}$"');
                }

                return $value;
            })
            ->setDefined('isDebtor')->setAllowedTypes('isDebtor', ['bool'])
            ->setDefined('nationality')->setAllowedTypes('nationality', ['string'])->setNormalizer('nationality', function (Options $options, $value) {
                if (strlen($value) < 0 || 19 < strlen($value)) {
                    throw new InvalidOptionsException(sprintf('The option "nationality" expected a length between 0 and 19 characters. Current length: %s', strlen($value)));
                }

                return $value;
            })
            ->setDefined('payerOrBeneficiary')->setAllowedTypes('payerOrBeneficiary', ['int'])->setAllowedValues([
                Account::PAYER_OR_BENEFICIARY_PAYER,
                Account::PAYER_OR_BENEFICIARY_BENEFICIARY,
            ])
            ->setDefined('isOneTimeCustomerAccount')->setAllowedTypes('isOneTimeCustomerAccount', ['bool'])
            ->setDefined('isTechnicalAccount')->setAllowedTypes('isTechnicalAccount', ['bool'])
            ->setDefined('isUltimateBeneficialOwner')->setAllowedTypes('isUltimateBeneficialOwner', ['bool'])
        ;

        return $resolver->resolve($options);
    }

    public static function resolveRetrieveOptions(array $options): array
    {
        $resolver = (new OptionsResolver())
            ->setDefined('page')->setAllowedTypes('page', ['int'])
            ->setDefined('accounts')->setAllowedTypes('accounts', ['array'])->setNormalizer('accounts', function (Options $options, $value) {
                foreach ($value as $index => &$account) {
                    if ($account instanceof WalletDetailsInput) {
                        continue;
                    }

                    if (!is_array($account)) {
                        throw new InvalidOptionsException(
                            sprintf('The option "accounts[%s]" is not an array or an instanceof %s.', $index, WalletDetailsInput::class)
                        );
                    }

                    $account = WalletDetailsInput::createFromArray($account);
                }

                return $value;
            })
        ;

        return $resolver->resolve($options);
    }

    public static function resolveInitEnrolmentOptions(array $options): array
    {
        $resolver = (new OptionsResolver())
            ->setDefault('provider', 0)->setAllowedTypes('provider', ['int'])
            ->setDefined('successUrl')->setAllowedTypes('successUrl', ['string'])->setNormalizer('successUrl', function (Options $options, $value) {
                if (strlen($value) < 0 || 255 < strlen($value)) {
                    throw new InvalidOptionsException(sprintf('The option "successUrl" expected a length between 0 and 255 characters. Current length: %s', strlen($value)));
                }

                return $value;
            })
            ->setDefined('declinedUrl')->setAllowedTypes('declinedUrl', ['string'])->setNormalizer('declinedUrl', function (Options $options, $value) {
                if (strlen($value) < 0 || 255 < strlen($value)) {
                    throw new InvalidOptionsException(sprintf('The option "declinedUrl" expected a length between 0 and 255 characters. Current length: %s', strlen($value)));
                }

                return $value;
            })
            ->setDefined('couponRequestedUrl')->setAllowedTypes('couponRequestedUrl', ['string'])->setNormalizer('couponRequestedUrl', function (Options $options, $value) {
                if (strlen($value) < 0 || 255 < strlen($value)) {
                    throw new InvalidOptionsException(sprintf('The option "couponRequestedUrl" expected a length between 0 and 255 characters. Current length: %s', strlen($value)));
                }

                return $value;
            })
            ->setDefined('reviewPendingUrl')->setAllowedTypes('reviewPendingUrl', ['string'])->setNormalizer('reviewPendingUrl', function (Options $options, $value) {
                if (strlen($value) < 0 || 255 < strlen($value)) {
                    throw new InvalidOptionsException(sprintf('The option "reviewPendingUrl" expected a length between 0 and 255 characters. Current length: %s', strlen($value)));
                }

                return $value;
            })
            ->setDefined('incompleteUrl')->setAllowedTypes('incompleteUrl', ['string'])->setNormalizer('incompleteUrl', function (Options $options, $value) {
                if (strlen($value) < 0 || 255 < strlen($value)) {
                    throw new InvalidOptionsException(sprintf('The option "incompleteUrl" expected a length between 0 and 255 characters. Current length: %s', strlen($value)));
                }

                return $value;
            })
        ;

        return $resolver->resolve($options);
    }

    public static function resolveUploadDocumentsOptions(array $options): array
    {
        $resolver = (new OptionsResolver())
            ->setRequired('name')->setAllowedTypes('name', ['string'])
            ->setRequired('type')->setAllowedTypes('type', ['int'])->setAllowedValues('type', [
                self::TYPE_ID_CARD,
                self::TYPE_PROOF_OF_ADDRESS,
                self::TYPE_IBAN,
                self::TYPE_EUROPEAN_PASSPORT,
                self::TYPE_EXTRA_EUROPEAN_PASSPORT,
                self::TYPE_RESIDENCE_PERMIT,
                self::TYPE_COMPANY_REGISTRATION_DOCUMENT,
                self::TYPE_DRIVER_LICENCE,
                self::TYPE_STATUS,
                self::TYPE_SELFIE,
                self::TYPE_OTHER_1,
                self::TYPE_OTHER_2,
                self::TYPE_OTHER_3,
                self::TYPE_OTHER_4,
                self::TYPE_OTHER_5,
                self::TYPE_OTHER_6,
                self::TYPE_OTHER_7,
                self::TYPE_SDD_MANDATE,
            ])
            ->setRequired('buffer')->setAllowedTypes('buffer', ['string'])
            ->setDefined('sddMandateId')->setAllowedTypes('sddMandateId', ['int'])
            ->setRequired('documents')->setAllowedTypes('documents', ['array'])->setNormalizer('documents', function (Options $options, $value) {
                foreach ($value as $index => &$document) {
                    if ($document instanceof File) {
                        continue;
                    }

                    if (!is_string($document)) {
                        throw new InvalidOptionsException(
                            sprintf('The option "documents[%s]" is not a string or an instanceof %s.', $index, File::class)
                        );
                    }

                    $document = new File($document);
                }

                return $value;
            })
        ;

        return $resolver->resolve($options);
    }

    public static function resolveCreateUltimateBeneficialOwnerOptions(array $options): array
    {
        $resolver = (new OptionsResolver())
            ->setDefined('firstName')->setAllowedTypes('firstName', ['string'])->setNormalizer('firstName', function (Options $options, $value) {
                if (strlen($value) < 2 || 256 < strlen($value)) {
                    throw new InvalidOptionsException(sprintf('The option "firstName" expected a length between 2 and 256 characters. Current length: %s', strlen($value)));
                }

                return $value;
            })
            ->setDefined('lastName')->setAllowedTypes('lastName', ['string'])->setNormalizer('lastName', function (Options $options, $value) {
                if (strlen($value) < 2 || 256 < strlen($value)) {
                    throw new InvalidOptionsException(sprintf('The option "lastName" expected a length between 2 and 256 characters. Current length: %s', strlen($value)));
                }

                return $value;
            })
            ->setDefined('nationality')->setAllowedTypes('nationality', ['string'])->setNormalizer('nationality', function (Options $options, $value) {
                if (strlen($value) < 0 || 19 < strlen($value)) {
                    throw new InvalidOptionsException(sprintf('The option "nationality" expected a length between 0 and 19 characters. Current length: %s', strlen($value)));
                }

                return $value;
            })
            ->setDefined('dateOrBirth')->setAllowedTypes('dateOrBirth', ['string'])->setNormalizer('dateOrBirth', function (Options $options, $value) {
                if (!preg_match('/^[12]\d{3}\/(0[1-9]|1[0-2])\/(0[1-9]|[12]\d|3[01])$/', $value)) {
                    throw new InvalidOptionsException('The option "dateOrBirth" does not match the pattern "^[12]\d{3}\/(0[1-9]|1[0-2])\/(0[1-9]|[12]\d|3[01])$"');
                }

                return $value;
            })
            ->setDefined('cityOfBirth')->setAllowedTypes('cityOfBirth', ['string'])->setNormalizer('cityOfBirth', function (Options $options, $value) {
                if (strlen($value) < 0 || 140 < strlen($value)) {
                    throw new InvalidOptionsException(sprintf('The option "cityOfBirth" expected a length between 0 and 140 characters. Current length: %s', strlen($value)));
                }

                return $value;
            })
            ->setDefined('countryOfBirth')->setAllowedTypes('countryOfBirth', ['string'])->setNormalizer('countryOfBirth', function (Options $options, $value) {
                if (3 !== strlen($value)) {
                    throw new InvalidOptionsException(sprintf('The option "countryOfBirth" expected a length of 3 characters. Current length: %s', strlen($value)));
                }

                return $value;
            })
            ->setDefined('countryOfResidence')->setAllowedTypes('countryOfResidence', ['string'])->setNormalizer('countryOfResidence', function (Options $options, $value) {
                if (strlen($value) < 0 || 19 < strlen($value)) {
                    throw new InvalidOptionsException(sprintf('The option "countryOfResidence" expected a length between 0 and 19 characters. Current length: %s', strlen($value)));
                }

                return $value;
            })
        ;

        return $resolver->resolve($options);
    }

    public static function resolveSignDocumentOptions(array $options): array
    {
        $resolver = (new OptionsResolver())
            ->setRequired('mobileNumber')->setAllowedTypes('mobileNumber', ['string'])->setNormalizer('mobileNumber', function (Options $options, $value) {
                if (!preg_match('/^\d{6,30}$/', $value)) {
                    throw new InvalidOptionsException('The option "mobileNumber" does not match the pattern "^\d{6,30}$"');
                }

                return $value;
            })
            ->setRequired('type')->setAllowedTypes('type', ['string'])->setAllowedValues('type', [DOCUMENT::TYPE_SDD_MANDATE])
            ->setRequired('returnUrl')->setAllowedTypes('returnUrl', ['string'])->setNormalizer('returnUrl', function (Options $options, $value) {
                if (strlen($value) < 0 || 2000 < strlen($value)) {
                    throw new InvalidOptionsException(sprintf('The option "returnUrl" expected a length between 0 and 2000 characters. Current length: %s', strlen($value)));
                }

                return $value;
            })
            ->setRequired('errorUrl')->setAllowedTypes('errorUrl', ['string'])->setNormalizer('errorUrl', function (Options $options, $value) {
                if (strlen($value) < 0 || 2000 < strlen($value)) {
                    throw new InvalidOptionsException(sprintf('The option "errorUrl" expected a length between 0 and 2000 characters. Current length: %s', strlen($value)));
                }

                return $value;
            })
        ;

        return $resolver->resolve($options);
    }
}
