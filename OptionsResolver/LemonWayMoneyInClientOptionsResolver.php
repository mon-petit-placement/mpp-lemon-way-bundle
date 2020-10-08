<?php

namespace Mpp\LemonWayClientBundle\OptionsResolver;

use Mpp\LemonWayClientBundle\Model\CardInfo;
use Mpp\LemonWayClientBundle\Model\CardInfoExtended;
use Mpp\LemonWayClientBundle\Model\TransactionInfo;
use Symfony\Component\OptionsResolver\Exception\InvalidOptionsException;
use Symfony\Component\OptionsResolver\Options;
use Symfony\Component\OptionsResolver\OptionsResolver;

class LemonWayMoneyOutClientOptionsResolver
{
    public function resolveListBySddOptions(array $options): array
    {
        $resolver = (new OptionsResolver())
            ->setRequired('updateDate')->setAllowedTypes('updateDate', ['string'])->setNormalizer('updateDate', function (Options $options, $value) {
                if (!preg_match('/^-?\d{1,12}$/', $value)) {
                    throw new InvalidOptionsException('The option "updateDate" does not match the pattern "^-?\d{1,12}$"');
                }

                return $value;
            })
            ->setRequired('updateEndDate')->setAllowedTypes('updateEndDate', ['string'])->setNormalizer('updateEndDate', function (Options $options, $value) {
                if (!preg_match('/^-?\d{1,12}$/', $value)) {
                    throw new InvalidOptionsException('The option "updateEndDate" does not match the pattern "^-?\d{1,12}$"');
                }

                return $value;
            })
            ->setDefined('page')->setAllowedTypes('page', ['int'])
            ->setDefined('limit')->setAllowedTypes('limit', ['int'])
        ;

        return $resolver->resolve($options);
    }

    public function resolveListByFundTransferOptions(array $options): array
    {
        $resolver = (new OptionsResolver())
            ->setRequired('updateDate')->setAllowedTypes('updateDate', ['string'])->setNormalizer('updateDate', function (Options $options, $value) {
                if (!preg_match('/^-?\d{1,12}$/', $value)) {
                    throw new InvalidOptionsException('The option "updateDate" does not match the pattern "^-?\d{1,12}$"');
                }

                return $value;
            })
            ->setRequired('updateEndDate')->setAllowedTypes('updateEndDate', ['string'])->setNormalizer('updateEndDate', function (Options $options, $value) {
                if (!preg_match('/^-?\d{1,12}$/', $value)) {
                    throw new InvalidOptionsException('The option "updateEndDate" does not match the pattern "^-?\d{1,12}$"');
                }

                return $value;
            })
            ->setDefined('page')->setAllowedTypes('page', ['int'])
            ->setDefined('limit')->setAllowedTypes('limit', ['int'])
        ;

        return $resolver->resolve($options);
    }

    public function resolveListByChequeOptions(array $options): array
    {
        $resolver = (new OptionsResolver())
            ->setRequired('updateDate')->setAllowedTypes('updateDate', ['string'])->setNormalizer('updateDate', function (Options $options, $value) {
                if (!preg_match('/^-?\d{1,12}$/', $value)) {
                    throw new InvalidOptionsException('The option "updateDate" does not match the pattern "^-?\d{1,12}$"');
                }

                return $value;
            })
            ->setRequired('updateEndDate')->setAllowedTypes('updateEndDate', ['string'])->setNormalizer('updateEndDate', function (Options $options, $value) {
                if (!preg_match('/^-?\d{1,12}$/', $value)) {
                    throw new InvalidOptionsException('The option "updateEndDate" does not match the pattern "^-?\d{1,12}$"');
                }

                return $value;
            })
            ->setDefined('chequeType')->setAllowedTypes('chequeType', ['int'])->setAllowedValues('chequeType', [15, 23]) // 15 = Cheque payment // 23 = Pagaré
            ->setDefined('page')->setAllowedTypes('page', ['int'])
            ->setDefined('limit')->setAllowedTypes('limit', ['int'])
        ;

        return $resolver->resolve($options);
    }

    public function resolveListOptions(array $options): array
    {
        $resolver = (new OptionsResolver())
            ->setDefined('transactionId')->setAllowedTypes('transactionId', ['int'])
            ->setDefined('transactionComment')->setAllowedTypes('transactionComment', ['string'])->setNormalizer('transactionComment', function (Options $options, $value) {
                if (strlen($value) < 0 || 140 < strlen($value)) {
                    throw new InvalidOptionsException(sprintf('The option "transactionComment" expected a length between 0 and 140 characters. Current length: %s', strlen($value)));
                }

                return $value;
            })
            ->setDefined('transactionMerchantToken')->setAllowedTypes('transactionMerchantToken', ['string'])->setNormalizer('transactionMerchantToken', function (Options $options, $value) {
                if (strlen($value) < 0 || 50 < strlen($value)) {
                    throw new InvalidOptionsException(sprintf('The option "transactionMerchantToken" expected a length between 0 and 50 characters. Current length: %s', strlen($value)));
                }

                return $value;
            })
            ->setRequired('updateDate')->setAllowedTypes('updateDate', ['string'])->setNormalizer('updateDate', function (Options $options, $value) {
                if (!preg_match('/^-?\d{1,12}$/', $value)) {
                    throw new InvalidOptionsException('The option "updateDate" does not match the pattern "^-?\d{1,12}$"');
                }

                return $value;
            })
            ->setRequired('updateEndDate')->setAllowedTypes('updateEndDate', ['string'])->setNormalizer('updateEndDate', function (Options $options, $value) {
                if (!preg_match('/^-?\d{1,12}$/', $value)) {
                    throw new InvalidOptionsException('The option "updateEndDate" does not match the pattern "^-?\d{1,12}$"');
                }

                return $value;
            })
            ->setDefined('chequeType')->setAllowedTypes('chequeType', ['int'])->setAllowedValues('chequeType', [15, 23]) // 15 = Cheque payment // 23 = Pagaré
            ->setDefined('page')->setAllowedTypes('page', ['int'])
            ->setDefined('limit')->setAllowedTypes('limit', ['int'])
        ;

        return $resolver->resolve($options);
    }

    public function resolveCancelOptions(array $options): array
    {
        $resolver = (new OptionsResolver())
            ->setDefined('account')->setAllowedTypes('account', ['string'])->setNormalizer('account', function (Options $options, $value) {
                if (strlen($value) < 0 || 256 < strlen($value)) {
                    throw new InvalidOptionsException(sprintf('The option "account" expected a length between 0 and 256 characters. Current length: %s', strlen($value)));
                }

                return $value;
            })
        ;

        return $resolver->resolve($options);
    }

    public function resolveUnregisterOptions(array $options): array
    {
        $resolver = (new OptionsResolver())
            ->setDefined('wallet')->setAllowedTypes('wallet', ['string'])->setNormalizer('wallet', function (Options $options, $value) {
                if (strlen($value) < 0 || 256 < strlen($value)) {
                    throw new InvalidOptionsException(sprintf('The option "wallet" expected a length between 0 and 256 characters. Current length: %s', strlen($value)));
                }

                return $value;
            })
        ;

        return $resolver->resolve($options);
    }

    public function resolveValidateOptions(array $options): array
    {
        $resolver = (new OptionsResolver())
            ->setRequired('totalAmount')->setAllowedTypes('totalAmount', ['int'])->setNormalizer('totalAmount', function (Options $options, $value) {
                if (!preg_match('/^-?[0-9]{1,13}(.[0-9]{2}){0,1}$/', $value)) {
                    throw new InvalidOptionsException('The option "totalAmount" does not match the pattern "^-?[0-9]{1,13}(.[0-9]{2}){0,1}$"');
                }

                return $value;
            })
            ->setDefined('commissionAmount')->setAllowedTypes('commissionAmount', ['int'])
            ->setDefined('specialConfig')->setAllowedTypes('specialConfig', ['string'])->setNormalizer('specialConfig', function (Options $options, $value) {
                if (!empty($value)) {
                    throw new InvalidOptionsException(sprintf('The option "specialConfig" expected to be empty. Current value: %s', $value));
                }

                return $value;
            })
        ;

        return $resolver->resolve($options);
    }

    public function resolveUnregisterMandateOptions(array $options): array
    {
        $resolver = (new OptionsResolver())
            ->setRequired('account')->setAllowedTypes('account', ['string'])->setNormalizer('account', function (Options $options, $value) {
                if (strlen($value) < 0 || 256 < strlen($value)) {
                    throw new InvalidOptionsException(sprintf('The option "account" expected a length between 0 and 256 characters. Current length: %s', strlen($value)));
                }

                return $value;
            })
        ;

        return $resolver->resolve($options);
    }

    public function resolveConfirm3DOptions(array $options): array
    {
        $resolver = (new OptionsResolver())
            ->setDefined('isPreAuth')->setAllowedTypes('isPreAuth', ['bool'])
            ->setDefined('delayedDays')->setAllowedTypes('delayedDays', ['int'])
            ->setDefined('card')->setAllowedTypes('card', [CardInfo::class, 'array'])->setNormalizer('card', function (Options $options, $value) {
                if ($value instanceof CardInfo) {
                    return $value;
                }

                return CardInfo::createFromArray($value);
            })
            ->setDefined('md')->setAllowedTypes('md', ['string'])
            ->setDefined('pares')->setAllowedTypes('pares', ['string'])
            ->setDefined('specialConfig')->setAllowedTypes('specialConfig', ['string'])->setNormalizer('specialConfig', function (Options $options, $value) {
                if (!empty($value)) {
                    throw new InvalidOptionsException(sprintf('The option "specialConfig" expected to be empty. Current value: %s', $value));
                }

                return $value;
            })
        ;

        return $resolver->resolve($options);
    }

    public function resolveInitSddOptions(array $options): array
    {
        $resolver = (new OptionsResolver())
            ->setRequired('sddMandateId')->setAllowedTypes('sddMandateId', ['int'])
            ->setDefined('collectionDate')->setAllowedTypes('collectionDate', ['string'])->setNormalizer('collectionDate', function (Options $options, $value) {
                if (!preg_match('/^[12]\d{3}\/(0[1-9]|1[0-2])\/(0[1-9]|[12]\d|3[01])$/', $value)) {
                    throw new InvalidOptionsException('The option "collectionDate" does not match the pattern "^[12]\d{3}\/(0[1-9]|1[0-2])\/(0[1-9]|[12]\d|3[01])$"');
                }

                return $value;
            })
            ->setDefined('reference')->setAllowedTypes('reference', ['string'])->setNormalizer('reference', function (Options $options, $value) {
                if (strlen($value) < 0 || 50 < strlen($value)) {
                    throw new InvalidOptionsException(sprintf('The option "reference" expected a length between 0 and 50 characters. Current length: %s', strlen($value)));
                }

                return $value;
            })
            ->setRequired('accountId')->setAllowedTypes('accountId', ['string'])->setNormalizer('accountId', function (Options $options, $value) {
                if (strlen($value) < 0 || 256 < strlen($value)) {
                    throw new InvalidOptionsException(sprintf('The option "accountId" expected a length between 0 and 256 characters. Current length: %s', strlen($value)));
                }

                return $value;
            })
            ->setDefined('totalAmount')->setAllowedTypes('totalAmount', ['int'])
            ->setDefined('commissionAmount')->setAllowedTypes('commissionAmount', ['int'])
            ->setDefined('comment')->setAllowedTypes('comment', ['string'])->setNormalizer('comment', function (Options $options, $value) {
                if (strlen($value) < 0 || 140 < strlen($value)) {
                    throw new InvalidOptionsException(sprintf('The option "comment" expected a length between 0 and 140 characters. Current length: %s', strlen($value)));
                }

                return $value;
            })
            ->setDefined('autoCommission')->setAllowedTypes('autoCommission', ['bool'])

        ;

        return $resolver->resolve($options);
    }

    public function resolveInitIDealOptions(array $options): array
    {
        $resolver = (new OptionsResolver())
            ->setRequired('returnUrl')->setAllowedTypes('returnUrl', ['string'])
            ->setRequired('issuerId')->setAllowedTypes('issuerId', ['string'])->setNormalizer('issuerId', function (Options $options, $value) {
                if (strlen($value) < 0 || 10 < strlen($value)) {
                    throw new InvalidOptionsException(sprintf('The option "issuerId" expected a length between 0 and 10 characters. Current length: %s', strlen($value)));
                }

                return $value;
            })
            ->setDefined('reference')->setAllowedTypes('reference', ['string'])->setNormalizer('reference', function (Options $options, $value) {
                if (strlen($value) < 0 || 50 < strlen($value)) {
                    throw new InvalidOptionsException(sprintf('The option "reference" expected a length between 0 and 50 characters. Current length: %s', strlen($value)));
                }

                return $value;
            })
            ->setRequired('accountId')->setAllowedTypes('accountId', ['string'])->setNormalizer('accountId', function (Options $options, $value) {
                if (strlen($value) < 0 || 256 < strlen($value)) {
                    throw new InvalidOptionsException(sprintf('The option "accountId" expected a length between 0 and 256 characters. Current length: %s', strlen($value)));
                }

                return $value;
            })
            ->setDefined('totalAmount')->setAllowedTypes('totalAmount', ['int'])
            ->setDefined('commissionAmount')->setAllowedTypes('commissionAmount', ['int'])
            ->setDefined('comment')->setAllowedTypes('comment', ['string'])->setNormalizer('comment', function (Options $options, $value) {
                if (strlen($value) < 0 || 140 < strlen($value)) {
                    throw new InvalidOptionsException(sprintf('The option "comment" expected a length between 0 and 140 characters. Current length: %s', strlen($value)));
                }

                return $value;
            })
            ->setDefined('autoCommission')->setAllowedTypes('autoCommission', ['bool'])

        ;

        return $resolver->resolve($options);
    }

    public function resolveInitMBWayOptions(array $options): array
    {
        $resolver = (new OptionsResolver())
            ->setRequired('phone')->setAllowedTypes('phone', ['string'])
            ->setRequired('returnUrl')->setAllowedTypes('returnUrl', ['string'])
            ->setDefined('reference')->setAllowedTypes('reference', ['string'])->setNormalizer('reference', function (Options $options, $value) {
                if (strlen($value) < 0 || 50 < strlen($value)) {
                    throw new InvalidOptionsException(sprintf('The option "reference" expected a length between 0 and 50 characters. Current length: %s', strlen($value)));
                }

                return $value;
            })
            ->setRequired('accountId')->setAllowedTypes('accountId', ['string'])->setNormalizer('accountId', function (Options $options, $value) {
                if (strlen($value) < 0 || 256 < strlen($value)) {
                    throw new InvalidOptionsException(sprintf('The option "accountId" expected a length between 0 and 256 characters. Current length: %s', strlen($value)));
                }

                return $value;
            })
            ->setDefined('totalAmount')->setAllowedTypes('totalAmount', ['int'])
            ->setDefined('commissionAmount')->setAllowedTypes('commissionAmount', ['int'])
            ->setDefined('comment')->setAllowedTypes('comment', ['string'])->setNormalizer('comment', function (Options $options, $value) {
                if (strlen($value) < 0 || 140 < strlen($value)) {
                    throw new InvalidOptionsException(sprintf('The option "comment" expected a length between 0 and 140 characters. Current length: %s', strlen($value)));
                }

                return $value;
            })
            ->setDefined('autoCommission')->setAllowedTypes('autoCommission', ['bool'])

        ;

        return $resolver->resolve($options);
    }

    public function resolveCreditAccountWithCardOptions(array $options): array
    {
        $resolver = (new OptionsResolver())
            ->setRequired('card')->setAllowedTypes('card', [CardInfoExtended::class, 'array'])->setNormalizer('card', function (Options $options, $value) {
                if ($value instanceof CardInfoExtended) {
                    return $value;
                }

                return CardInfoExtended::createFromArray($value);
            })
            ->setRequired('transaction')->setAllowedTypes('transaction', [TransactionInfo::class, 'array'])->setNormalizer('transaction', function (Options $options, $value) {
                if ($value instanceof TransactionInfo) {
                    return $value;
                }

                return TransactionInfo::createFromArray($value);
            })
            ->setRequired('accountId')->setAllowedTypes('accountId', ['string'])->setNormalizer('accountId', function (Options $options, $value) {
                if (strlen($value) < 0 || 256 < strlen($value)) {
                    throw new InvalidOptionsException(sprintf('The option "accountId" expected a length between 0 and 256 characters. Current length: %s', strlen($value)));
                }

                return $value;
            })
            ->setDefined('totalAmount')->setAllowedTypes('totalAmount', ['int'])
            ->setDefined('commissionAmount')->setAllowedTypes('commissionAmount', ['int'])
            ->setDefined('comment')->setAllowedTypes('comment', ['string'])->setNormalizer('comment', function (Options $options, $value) {
                if (strlen($value) < 0 || 140 < strlen($value)) {
                    throw new InvalidOptionsException(sprintf('The option "comment" expected a length between 0 and 140 characters. Current length: %s', strlen($value)));
                }

                return $value;
            })
            ->setDefined('autoCommission')->setAllowedTypes('autoCommission', ['bool'])
        ;

        return $resolver->resolve($options);
    }

    public function resolveCreditAccountWithNon3DSecureCardOptions(array $options): array
    {
        $resolver = (new OptionsResolver())
            ->setRequired('card')->setAllowedTypes('card', [CardInfo::class, 'array'])->setNormalizer('card', function (Options $options, $value) {
                if ($value instanceof CardInfo) {
                    return $value;
                }

                return CardInfo::createFromArray($value);
            })
            ->setDefined('isPreAuth')->setAllowedTypes('isPreAuth', ['bool'])
            ->setDefined('delayedDays')->setAllowedTypes('delayedDays', ['int'])
            ->setDefined('specialConfig')->setAllowedTypes('specialConfig', ['string'])->setNormalizer('specialConfig', function (Options $options, $value) {
                if (!empty($value)) {
                    throw new InvalidOptionsException(sprintf('The option "specialConfig" expected to be empty. Current value: %s', $value));
                }

                return $value;
            })
            ->setDefined('reference')->setAllowedTypes('reference', ['string'])->setNormalizer('reference', function (Options $options, $value) {
                if (strlen($value) < 0 || 50 < strlen($value)) {
                    throw new InvalidOptionsException(sprintf('The option "reference" expected a length between 0 and 50 characters. Current length: %s', strlen($value)));
                }

                return $value;
            })
            ->setRequired('accountId')->setAllowedTypes('accountId', ['string'])->setNormalizer('accountId', function (Options $options, $value) {
                if (strlen($value) < 0 || 256 < strlen($value)) {
                    throw new InvalidOptionsException(sprintf('The option "accountId" expected a length between 0 and 256 characters. Current length: %s', strlen($value)));
                }

                return $value;
            })
            ->setDefined('totalAmount')->setAllowedTypes('totalAmount', ['int'])
            ->setDefined('commissionAmount')->setAllowedTypes('commissionAmount', ['int'])
            ->setDefined('comment')->setAllowedTypes('comment', ['string'])->setNormalizer('comment', function (Options $options, $value) {
                if (strlen($value) < 0 || 140 < strlen($value)) {
                    throw new InvalidOptionsException(sprintf('The option "comment" expected a length between 0 and 140 characters. Current length: %s', strlen($value)));
                }

                return $value;
            })
            ->setDefined('autoCommission')->setAllowedTypes('autoCommission', ['bool'])

        ;

        return $resolver->resolve($options);
    }

    public function resolveInitChequeOptions(array $options): array
    {
        $resolver = (new OptionsResolver())
            ->setDefined('transferId')->setAllowedTypes('transferId', ['string'])->setNormalizer('transferId', function (Options $options, $value) {
                if (strlen($value) < 0 || 8 < strlen($value)) {
                    throw new InvalidOptionsException(sprintf('The option "transferId" expected a length between 0 and 8 characters. Current length: %s', strlen($value)));
                }

                return $value;
            })
            ->setDefined('partner')->setAllowedTypes('partner', ['string'])->setNormalizer('partner', function (Options $options, $value) {
                if (strlen($value) < 0 || 256 < strlen($value)) {
                    throw new InvalidOptionsException(sprintf('The option "partner" expected a length between 0 and 256 characters. Current length: %s', strlen($value)));
                }

                return $value;
            })
            ->setDefined('chequeType')->setAllowedTypes('chequeType', ['int'])->setAllowedValues('chequeType', [15, 23]) // 5 = Cheque payment // 23 = Pagaré
            ->setRequired('accountId')->setAllowedTypes('accountId', ['string'])->setNormalizer('accountId', function (Options $options, $value) {
                if (strlen($value) < 0 || 256 < strlen($value)) {
                    throw new InvalidOptionsException(sprintf('The option "accountId" expected a length between 0 and 256 characters. Current length: %s', strlen($value)));
                }

                return $value;
            })
            ->setDefined('totalAmount')->setAllowedTypes('totalAmount', ['int'])
            ->setDefined('commissionAmount')->setAllowedTypes('commissionAmount', ['int'])
            ->setDefined('comment')->setAllowedTypes('comment', ['string'])->setNormalizer('comment', function (Options $options, $value) {
                if (strlen($value) < 0 || 140 < strlen($value)) {
                    throw new InvalidOptionsException(sprintf('The option "comment" expected a length between 0 and 140 characters. Current length: %s', strlen($value)));
                }

                return $value;
            })
            ->setDefined('autoCommission')->setAllowedTypes('autoCommission', ['bool'])

        ;

        return $resolver->resolve($options);
    }

    public function resolveRegisterSddMandateOptions(array $options): array
    {
        $resolver = (new OptionsResolver())
            ->setRequired('wallet')->setAllowedTypes('wallet', ['string'])->setNormalizer('wallet', function (Options $options, $value) {
                if (strlen($value) < 0 || 256 < strlen($value)) {
                    throw new InvalidOptionsException(sprintf('The option "wallet" expected a length between 0 and 256 characters. Current length: %s', strlen($value)));
                }

                return $value;
            })
            ->setRequired('holder')->setAllowedTypes('holder', ['string'])->setNormalizer('holder', function (Options $options, $value) {
                if (strlen($value) < 0 || 100 < strlen($value)) {
                    throw new InvalidOptionsException(sprintf('The option "holder" expected a length between 0 and 100 characters. Current length: %s', strlen($value)));
                }

                return $value;
            })
            ->setRequired('bic')->setAllowedTypes('bic', ['string'])->setNormalizer('bic', function (Options $options, $value) {
                if (strlen($value) < 0 || 11 < strlen($value)) {
                    throw new InvalidOptionsException(sprintf('The option "bic" expected a length between 0 and 11 characters. Current length: %s', strlen($value)));
                }

                return $value;
            })
            ->setRequired('iban')->setAllowedTypes('iban', ['string'])->setNormalizer('iban', function (Options $options, $value) {
                if (strlen($value) < 15 || 34 < strlen($value)) {
                    throw new InvalidOptionsException(sprintf('The option "iban" expected a length between 15 and 34 characters. Current length: %s', strlen($value)));
                }

                return $value;
            })
            ->setDefined('isB2B')->setAllowedTypes('isB2B', ['bool'])
            ->setRequired('isRecurring')->setAllowedTypes('isRecurring', ['bool'])
            ->setDefined('street')->setAllowedTypes('street', ['string'])->setNormalizer('street', function (Options $options, $value) {
                if (strlen($value) < 0 || 256 < strlen($value)) {
                    throw new InvalidOptionsException(sprintf('The option "street" expected a length between 0 and 256 characters. Current length: %s', strlen($value)));
                }

                return $value;
            })
            ->setDefined('postCode')->setAllowedTypes('postCode', ['string'])->setNormalizer('postCode', function (Options $options, $value) {
                if (strlen($value) < 0 || 10 < strlen($value)) {
                    throw new InvalidOptionsException(sprintf('The option "postCode" expected a length between 0 and 10 characters. Current length: %s', strlen($value)));
                }

                return $value;
            })
            ->setDefined('city')->setAllowedTypes('city', ['string'])->setNormalizer('city', function (Options $options, $value) {
                if (strlen($value) < 0 || 256 < strlen($value)) {
                    throw new InvalidOptionsException(sprintf('The option "city" expected a length between 0 and 256 characters. Current length: %s', strlen($value)));
                }

                return $value;
            })
            ->setDefined('country')->setAllowedTypes('country', ['string'])->setNormalizer('country', function (Options $options, $value) {
                if (strlen($value) < 0 || 256 < strlen($value)) {
                    throw new InvalidOptionsException(sprintf('The option "country" expected a length between 0 and 256 characters. Current length: %s', strlen($value)));
                }

                return $value;
            })
            ->setDefined('mandateLanguage')->setAllowedTypes('mandateLanguage', ['string'])->setNormalizer('mandateLanguage', function (Options $options, $value) {
                if (2 !== strlen($value)) {
                    throw new InvalidOptionsException(sprintf('The option "mandateLanguage" expected a length of 2 characters. Current length: %s', strlen($value)));
                }

                return $value;
            })
            ->setDefined('rum')->setAllowedTypes('rum', ['string'])
        ;

        return $resolver->resolve($options);
    }

    public function resolveInitSofortOptions(array $options): array
    {
        $resolver = (new OptionsResolver())
            ->setRequired('returnUrl')->setAllowedTypes('returnUrl', ['string'])
            ->setDefined('reference')->setAllowedTypes('reference', ['string'])->setNormalizer('reference', function (Options $options, $value) {
                if (strlen($value) < 0 || 50 < strlen($value)) {
                    throw new InvalidOptionsException(sprintf('The option "reference" expected a length between 0 and 50 characters. Current length: %s', strlen($value)));
                }

                return $value;
            })
            ->setRequired('accountId')->setAllowedTypes('accountId', ['string'])->setNormalizer('accountId', function (Options $options, $value) {
                if (strlen($value) < 0 || 256 < strlen($value)) {
                    throw new InvalidOptionsException(sprintf('The option "accountId" expected a length between 0 and 256 characters. Current length: %s', strlen($value)));
                }

                return $value;
            })
            ->setDefined('totalAmount')->setAllowedTypes('totalAmount', ['int'])
            ->setDefined('commissionAmount')->setAllowedTypes('commissionAmount', ['int'])
            ->setDefined('comment')->setAllowedTypes('comment', ['string'])->setNormalizer('comment', function (Options $options, $value) {
                if (strlen($value) < 0 || 140 < strlen($value)) {
                    throw new InvalidOptionsException(sprintf('The option "comment" expected a length between 0 and 140 characters. Current length: %s', strlen($value)));
                }

                return $value;
            })
            ->setDefined('autoCommission')->setAllowedTypes('autoCommission', ['bool'])

        ;

        return $resolver->resolve($options);
    }

    public function resolveInitWebOptions(array $options): array
    {
        $resolver = (new OptionsResolver())
            ->setRequired('returnUrl')->setAllowedTypes('returnUrl', ['string'])
            ->setRequired('errorUrl')->setAllowedTypes('errorUrl', ['string'])
            ->setRequired('cancelUrl')->setAllowedTypes('cancelUrl', ['string'])
            ->setDefined('registerCard')->setAllowedTypes('registerCard', ['bool'])
            ->setDefined('captureDelayedDays')->setAllowedTypes('captureDelayedDays', ['int'])
            ->setDefined('label')->setAllowedTypes('label', ['string'])
            ->setDefined('moneyInNature')->setAllowedTypes('moneyInNature', ['string'])->setAllowedValues('moneyInNature', [0, 1]) // 0 = Activité 1 // 1 = Activité 2
            ->setDefined('reference')->setAllowedTypes('reference', ['string'])->setNormalizer('reference', function (Options $options, $value) {
                if (strlen($value) < 0 || 50 < strlen($value)) {
                    throw new InvalidOptionsException(sprintf('The option "reference" expected a length between 0 and 50 characters. Current length: %s', strlen($value)));
                }

                return $value;
            })
            ->setRequired('accountId')->setAllowedTypes('accountId', ['string'])->setNormalizer('accountId', function (Options $options, $value) {
                if (strlen($value) < 0 || 256 < strlen($value)) {
                    throw new InvalidOptionsException(sprintf('The option "accountId" expected a length between 0 and 256 characters. Current length: %s', strlen($value)));
                }

                return $value;
            })
            ->setDefined('totalAmount')->setAllowedTypes('totalAmount', ['int'])
            ->setDefined('commissionAmount')->setAllowedTypes('commissionAmount', ['int'])
            ->setDefined('comment')->setAllowedTypes('comment', ['string'])->setNormalizer('comment', function (Options $options, $value) {
                if (strlen($value) < 0 || 140 < strlen($value)) {
                    throw new InvalidOptionsException(sprintf('The option "comment" expected a length between 0 and 140 characters. Current length: %s', strlen($value)));
                }

                return $value;
            })
            ->setDefined('autoCommission')->setAllowedTypes('autoCommission', ['bool'])

        ;

        return $resolver->resolve($options);
    }

    public function resolveInitPayshopOptions(array $options): array
    {
        $resolver = (new OptionsResolver())
            ->setRequired('returnUrl')->setAllowedTypes('returnUrl', ['string'])
            ->setDefined('reference')->setAllowedTypes('reference', ['string'])->setNormalizer('reference', function (Options $options, $value) {
                if (strlen($value) < 0 || 50 < strlen($value)) {
                    throw new InvalidOptionsException(sprintf('The option "reference" expected a length between 0 and 50 characters. Current length: %s', strlen($value)));
                }

                return $value;
            })
            ->setRequired('accountId')->setAllowedTypes('accountId', ['string'])->setNormalizer('accountId', function (Options $options, $value) {
                if (strlen($value) < 0 || 256 < strlen($value)) {
                    throw new InvalidOptionsException(sprintf('The option "accountId" expected a length between 0 and 256 characters. Current length: %s', strlen($value)));
                }

                return $value;
            })
            ->setDefined('totalAmount')->setAllowedTypes('totalAmount', ['int'])
            ->setDefined('commissionAmount')->setAllowedTypes('commissionAmount', ['int'])
            ->setDefined('comment')->setAllowedTypes('comment', ['string'])->setNormalizer('comment', function (Options $options, $value) {
                if (strlen($value) < 0 || 140 < strlen($value)) {
                    throw new InvalidOptionsException(sprintf('The option "comment" expected a length between 0 and 140 characters. Current length: %s', strlen($value)));
                }

                return $value;
            })
            ->setDefined('autoCommission')->setAllowedTypes('autoCommission', ['bool'])

        ;

        return $resolver->resolve($options);
    }

    public function resolveInitTrustlyOptions(array $options): array
    {
        $resolver = (new OptionsResolver())
            ->setRequired('finalCustomerEmail')->setAllowedTypes('finalCustomerEmail', ['string'])->setNormalizer('finalCustomerEmail', function (Options $options, $value) {
                if (!preg_match('/^(([^<>()[\]\\.,;:\s@\"]+(\.[^<>()[\]\\.,;:\s@\"]+)*)|(\".+\"))@((\[\d{1,3}\.\d{1,3}\.\d{1,3}\.\d{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/', $value)) {
                    throw new InvalidOptionsException('The option "finalCustomerEmail" does not match the pattern "^(([^<>()[\]\\.,;:\s@\"]+(\.[^<>()[\]\\.,;:\s@\"]+)*)|(\".+\"))@((\[\d{1,3}\.\d{1,3}\.\d{1,3}\.\d{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$"');
                }

                return $value;
            })
            ->setRequired('finalCustomerFirstName')->setAllowedTypes('finalCustomerFirstName', ['string'])
            ->setRequired('finalCustomerLastName')->setAllowedTypes('finalCustomerLastName', ['string'])
            ->setRequired('returnUrl')->setAllowedTypes('returnUrl', ['string'])
            ->setDefined('reference')->setAllowedTypes('reference', ['string'])->setNormalizer('reference', function (Options $options, $value) {
                if (strlen($value) < 0 || 50 < strlen($value)) {
                    throw new InvalidOptionsException(sprintf('The option "reference" expected a length between 0 and 50 characters. Current length: %s', strlen($value)));
                }

                return $value;
            })
            ->setRequired('accountId')->setAllowedTypes('accountId', ['string'])->setNormalizer('accountId', function (Options $options, $value) {
                if (strlen($value) < 0 || 256 < strlen($value)) {
                    throw new InvalidOptionsException(sprintf('The option "accountId" expected a length between 0 and 256 characters. Current length: %s', strlen($value)));
                }

                return $value;
            })
            ->setDefined('totalAmount')->setAllowedTypes('totalAmount', ['int'])
            ->setDefined('commissionAmount')->setAllowedTypes('commissionAmount', ['int'])
            ->setDefined('comment')->setAllowedTypes('comment', ['string'])->setNormalizer('comment', function (Options $options, $value) {
                if (strlen($value) < 0 || 140 < strlen($value)) {
                    throw new InvalidOptionsException(sprintf('The option "comment" expected a length between 0 and 140 characters. Current length: %s', strlen($value)));
                }

                return $value;
            })
            ->setDefined('autoCommission')->setAllowedTypes('autoCommission', ['bool'])

        ;

        return $resolver->resolve($options);
    }

    public function resolveRegisterCardOptions(array $options): array
    {
        $resolver = (new OptionsResolver())
            ->setRequired('accountId')->setAllowedTypes('accountId', ['string'])->setNormalizer('accountId', function (Options $options, $value) {
                if (strlen($value) < 0 || 256 < strlen($value)) {
                    throw new InvalidOptionsException(sprintf('The option "accountId" expected a length between 0 and 256 characters. Current length: %s', strlen($value)));
                }

                return $value;
            })
            ->setRequired('card')->setAllowedTypes('card', [CardInfo::class, 'array'])->setNormalizer('card', function (Options $options, $value) {
                if ($value instanceof CardInfo) {
                    return $value;
                }

                return CardInfo::createFromArray($value);
            })
            ->setDefined('specialConfig')->setAllowedTypes('specialConfig', ['string'])->setNormalizer('specialConfig', function (Options $options, $value) {
                if (!empty($value)) {
                    throw new InvalidOptionsException(sprintf('The option "specialConfig" expected to be empty. Current value: %s', $value));
                }

                return $value;
            })

        ;

        return $resolver->resolve($options);
    }

    public function resolveInitPayTrailOptions(array $options): array
    {
        $resolver = (new OptionsResolver())
            ->setRequired('returnUrl')->setAllowedTypes('returnUrl', ['string'])
            ->setDefined('reference')->setAllowedTypes('reference', ['string'])->setNormalizer('reference', function (Options $options, $value) {
                if (strlen($value) < 0 || 50 < strlen($value)) {
                    throw new InvalidOptionsException(sprintf('The option "reference" expected a length between 0 and 50 characters. Current length: %s', strlen($value)));
                }

                return $value;
            })
            ->setRequired('accountId')->setAllowedTypes('accountId', ['string'])->setNormalizer('accountId', function (Options $options, $value) {
                if (strlen($value) < 0 || 256 < strlen($value)) {
                    throw new InvalidOptionsException(sprintf('The option "accountId" expected a length between 0 and 256 characters. Current length: %s', strlen($value)));
                }

                return $value;
            })
            ->setDefined('totalAmount')->setAllowedTypes('totalAmount', ['int'])
            ->setDefined('commissionAmount')->setAllowedTypes('commissionAmount', ['int'])
            ->setDefined('comment')->setAllowedTypes('comment', ['string'])->setNormalizer('comment', function (Options $options, $value) {
                if (strlen($value) < 0 || 140 < strlen($value)) {
                    throw new InvalidOptionsException(sprintf('The option "comment" expected a length between 0 and 140 characters. Current length: %s', strlen($value)));
                }

                return $value;
            })
            ->setDefined('autoCommission')->setAllowedTypes('autoCommission', ['bool'])

        ;

        return $resolver->resolve($options);
    }

    public function resolveInitMobilePayOptions(array $options): array
    {
        $resolver = (new OptionsResolver())
            ->setRequired('returnUrl')->setAllowedTypes('returnUrl', ['string'])
            ->setDefined('reference')->setAllowedTypes('reference', ['string'])->setNormalizer('reference', function (Options $options, $value) {
                if (strlen($value) < 0 || 50 < strlen($value)) {
                    throw new InvalidOptionsException(sprintf('The option "reference" expected a length between 0 and 50 characters. Current length: %s', strlen($value)));
                }

                return $value;
            })
            ->setRequired('accountId')->setAllowedTypes('accountId', ['string'])->setNormalizer('accountId', function (Options $options, $value) {
                if (strlen($value) < 0 || 256 < strlen($value)) {
                    throw new InvalidOptionsException(sprintf('The option "accountId" expected a length between 0 and 256 characters. Current length: %s', strlen($value)));
                }

                return $value;
            })
            ->setDefined('totalAmount')->setAllowedTypes('totalAmount', ['int'])
            ->setDefined('commissionAmount')->setAllowedTypes('commissionAmount', ['int'])
            ->setDefined('comment')->setAllowedTypes('comment', ['string'])->setNormalizer('comment', function (Options $options, $value) {
                if (strlen($value) < 0 || 140 < strlen($value)) {
                    throw new InvalidOptionsException(sprintf('The option "comment" expected a length between 0 and 140 characters. Current length: %s', strlen($value)));
                }

                return $value;
            })
            ->setDefined('autoCommission')->setAllowedTypes('autoCommission', ['bool'])

        ;

        return $resolver->resolve($options);
    }

    public function resolveInitMultibancoOptions(array $options): array
    {
        $resolver = (new OptionsResolver())
            ->setDefined('startDate')->setAllowedTypes('startDate', ['string'])->setNormalizer('startDate', function (Options $options, $value) {
                if (!preg_match('/^[12]\d{3}\/(0[1-9]|1[0-2])\/(0[1-9]|[12]\d|3[01])$/', $value)) {
                    throw new InvalidOptionsException('The option "startDate" does not match the pattern "^[12]\d{3}\/(0[1-9]|1[0-2])\/(0[1-9]|[12]\d|3[01])$"');
                }

                return $value;
            })
            ->setDefined('endDate')->setAllowedTypes('endDate', ['string'])->setNormalizer('endDate', function (Options $options, $value) {
                if (!preg_match('/^[12]\d{3}\/(0[1-9]|1[0-2])\/(0[1-9]|[12]\d|3[01])$/', $value)) {
                    throw new InvalidOptionsException('The option "endDate" does not match the pattern "^[12]\d{3}\/(0[1-9]|1[0-2])\/(0[1-9]|[12]\d|3[01])$"');
                }

                return $value;
            })
            ->setRequired('returnUrl')->setAllowedTypes('returnUrl', ['string'])
            ->setDefined('reference')->setAllowedTypes('reference', ['string'])->setNormalizer('reference', function (Options $options, $value) {
                if (strlen($value) < 0 || 50 < strlen($value)) {
                    throw new InvalidOptionsException(sprintf('The option "reference" expected a length between 0 and 50 characters. Current length: %s', strlen($value)));
                }

                return $value;
            })
            ->setRequired('accountId')->setAllowedTypes('accountId', ['string'])->setNormalizer('accountId', function (Options $options, $value) {
                if (strlen($value) < 0 || 256 < strlen($value)) {
                    throw new InvalidOptionsException(sprintf('The option "accountId" expected a length between 0 and 256 characters. Current length: %s', strlen($value)));
                }

                return $value;
            })
            ->setDefined('totalAmount')->setAllowedTypes('totalAmount', ['int'])
            ->setDefined('commissionAmount')->setAllowedTypes('commissionAmount', ['int'])
            ->setDefined('comment')->setAllowedTypes('comment', ['string'])->setNormalizer('comment', function (Options $options, $value) {
                if (strlen($value) < 0 || 140 < strlen($value)) {
                    throw new InvalidOptionsException(sprintf('The option "comment" expected a length between 0 and 140 characters. Current length: %s', strlen($value)));
                }

                return $value;
            })
            ->setDefined('autoCommission')->setAllowedTypes('autoCommission', ['bool'])
        ;

        return $resolver->resolve($options);
    }

    public function resolveCreatePaymentFormOptions(array $options): array
    {
        $resolver = (new OptionsResolver())
            ->setDefined('optId')->setAllowedTypes('optId', ['string'])->setNormalizer('optId', function (Options $options, $value) {
                if (strlen($value) < 0 || 50 < strlen($value)) {
                    throw new InvalidOptionsException(sprintf('The option "optId" expected a length between 0 and 50 characters. Current length: %s', strlen($value)));
                }

                return $value;
            })
            ->setDefined('walletPayer')->setAllowedTypes('walletPayer', ['string'])->setNormalizer('walletPayer', function (Options $options, $value) {
                if (strlen($value) < 0 || 100 < strlen($value)) {
                    throw new InvalidOptionsException(sprintf('The option "walletPayer" expected a length between 0 and 100 characters. Current length: %s', strlen($value)));
                }

                return $value;
            })
            ->setDefined('walletReceiver')->setAllowedTypes('walletReceiver', ['string'])->setNormalizer('walletReceiver', function (Options $options, $value) {
                if (strlen($value) < 0 || 100 < strlen($value)) {
                    throw new InvalidOptionsException(sprintf('The option "walletReceiver" expected a length between 0 and 100 characters. Current length: %s', strlen($value)));
                }

                return $value;
            })
            ->setDefined('totalAmount')->setAllowedTypes('totalAmount', ['int'])
            ->setDefined('commissionAmount')->setAllowedTypes('commissionAmount', ['int'])
            ->setDefined('accountId')->setAllowedTypes('accountId', ['string'])->setNormalizer('accountId', function (Options $options, $value) {
                if (strlen($value) < 0 || 256 < strlen($value)) {
                    throw new InvalidOptionsException(sprintf('The option "accountId" expected a length between 0 and 256 characters. Current length: %s', strlen($value)));
                }

                return $value;
            })
            ->setDefined('comment')->setAllowedTypes('comment', ['string'])->setNormalizer('comment', function (Options $options, $value) {
                if (strlen($value) < 0 || 140 < strlen($value)) {
                    throw new InvalidOptionsException(sprintf('The option "comment" expected a length between 0 and 140 characters. Current length: %s', strlen($value)));
                }

                return $value;
            })
            ->setDefined('returnUrl')->setAllowedTypes('returnUrl', ['string'])
            ->setDefined('errorUrl')->setAllowedTypes('errorUrl', ['string'])
            ->setDefined('cancelUrl')->setAllowedTypes('cancelUrl', ['string'])
            ->setDefined('firstNamePayer')->setAllowedTypes('firstNamePayer', ['string'])->setNormalizer('firstNamePayer', function (Options $options, $value) {
                if (strlen($value) < 0 || 255 < strlen($value)) {
                    throw new InvalidOptionsException(sprintf('The option "firstNamePayer" expected a length between 0 and 255 characters. Current length: %s', strlen($value)));
                }

                return $value;
            })
            ->setDefined('lastNamePayer')->setAllowedTypes('lastNamePayer', ['string'])->setNormalizer('lastNamePayer', function (Options $options, $value) {
                if (strlen($value) < 0 || 255 < strlen($value)) {
                    throw new InvalidOptionsException(sprintf('The option "lastNamePayer" expected a length between 0 and 255 characters. Current length: %s', strlen($value)));
                }

                return $value;
            })
            ->setDefined('emailPayer')->setAllowedTypes('emailPayer', ['string'])->setNormalizer('emailPayer', function (Options $options, $value) {
                if (!preg_match('/^(([^<>()[\]\\.,;:\s@\"]+(\.[^<>()[\]\\.,;:\s@\"]+)*)|(\".+\"))@((\[\d{1,3}\.\d{1,3}\.\d{1,3}\.\d{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/', $value)) {
                    throw new InvalidOptionsException('The option "emailPayer" does not match the pattern "^(([^<>()[\]\\.,;:\s@\"]+(\.[^<>()[\]\\.,;:\s@\"]+)*)|(\".+\"))@((\[\d{1,3}\.\d{1,3}\.\d{1,3}\.\d{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$"');
                }

                return $value;
            })
            ->setDefined('style')->setAllowedTypes('style', ['string'])->setNormalizer('style', function (Options $options, $value) {
                if (strlen($value) < 0 || 255 < strlen($value)) {
                    throw new InvalidOptionsException(sprintf('The option "style" expected a length between 0 and 255 characters. Current length: %s', strlen($value)));
                }

                return $value;
            })
            ->setDefined('atosStyle')->setAllowedTypes('atosStyle', ['string'])->setNormalizer('atosStyle', function (Options $options, $value) {
                if (strlen($value) < 0 || 255 < strlen($value)) {
                    throw new InvalidOptionsException(sprintf('The option "atosStyle" expected a length between 0 and 255 characters. Current length: %s', strlen($value)));
                }

                return $value;
            })
            ->setDefined('notifUrl')->setAllowedTypes('notifUrl', ['string'])->setNormalizer('notifUrl', function (Options $options, $value) {
                if (strlen($value) < 0 || 255 < strlen($value)) {
                    throw new InvalidOptionsException(sprintf('The option "notifUrl" expected a length between 0 and 255 characters. Current length: %s', strlen($value)));
                }

                return $value;
            })
            ->setDefined('options')->setAllowedTypes('options', ['string'])->setNormalizer('options', function (Options $options, $value) {
                if (strlen($value) < 0 || 255 < strlen($value)) {
                    throw new InvalidOptionsException(sprintf('The option "options" expected a length between 0 and 255 characters. Current length: %s', strlen($value)));
                }

                return $value;
            })
        ;

        return $resolver->resolve($options);
    }

    public function resolveCreditAccountWith3DSecureCardOptions(array $options): array
    {
        $resolver = (new OptionsResolver())
            ->setRequired('card')->setAllowedTypes('card', [CardInfo::class, 'array'])->setNormalizer('card', function (Options $options, $value) {
                if ($value instanceof CardInfo) {
                    return $value;
                }

                return CardInfo::createFromArray($value);
            })
            ->setDefined('returnUrl')->setAllowedTypes('returnUrl', ['string'])
            ->setDefined('reference')->setAllowedTypes('reference', ['string'])->setNormalizer('reference', function (Options $options, $value) {
                if (strlen($value) < 0 || 50 < strlen($value)) {
                    throw new InvalidOptionsException(sprintf('The option "reference" expected a length between 0 and 50 characters. Current length: %s', strlen($value)));
                }

                return $value;
            })
            ->setRequired('accountId')->setAllowedTypes('accountId', ['string'])->setNormalizer('accountId', function (Options $options, $value) {
                if (strlen($value) < 0 || 256 < strlen($value)) {
                    throw new InvalidOptionsException(sprintf('The option "accountId" expected a length between 0 and 256 characters. Current length: %s', strlen($value)));
                }

                return $value;
            })
            ->setDefined('totalAmount')->setAllowedTypes('totalAmount', ['int'])
            ->setDefined('commissionAmount')->setAllowedTypes('commissionAmount', ['int'])
            ->setDefined('comment')->setAllowedTypes('comment', ['string'])->setNormalizer('comment', function (Options $options, $value) {
                if (strlen($value) < 0 || 140 < strlen($value)) {
                    throw new InvalidOptionsException(sprintf('The option "comment" expected a length between 0 and 140 characters. Current length: %s', strlen($value)));
                }

                return $value;
            })
            ->setDefined('autoCommission')->setAllowedTypes('autoCommission', ['bool'])

        ;

        return $resolver->resolve($options);
    }

    public function resolveCreateIbanOptions(array $options): array
    {
        $resolver = (new OptionsResolver())
            ->setRequired('wallet')->setAllowedTypes('wallet', ['string'])->setNormalizer('wallet', function (Options $options, $value) {
                if (strlen($value) < 0 || 256 < strlen($value)) {
                    throw new InvalidOptionsException(sprintf('The option "wallet" expected a length between 0 and 256 characters. Current length: %s', strlen($value)));
                }

                return $value;
            })
            ->setRequired('country')->setAllowedTypes('country', ['string'])->setNormalizer('country', function (Options $options, $value) {
                if (strlen($value) < 0 || 2 < strlen($value)) {
                    throw new InvalidOptionsException(sprintf('The option "country" expected a length between 0 and 2 characters. Current length: %s', strlen($value)));
                }

                return $value;
            })
            ->setDefined('generatePDFAndQrCode')->setAllowedTypes('generatePDFAndQrCode', ['bool'])
            ->setDefined('pdfLanguage')->setAllowedTypes('pdfLanguage', ['string'])->setNormalizer('pdfLanguage', function (Options $options, $value) {
                if (strlen($value) < 0 || 2 < strlen($value)) {
                    throw new InvalidOptionsException(sprintf('The option "pdfLanguage" expected a length between 0 and 2 characters. Current length: %s', strlen($value)));
                }

                return $value;
            })
        ;

        return $resolver->resolve($options);
    }

    public function resolveCreditAccountWithAccountCardOptions(array $options): array
    {
        $resolver = (new OptionsResolver())
            ->setDefined('isPreAuth')->setAllowedTypes('isPreAuth', ['bool'])
            ->setDefined('delayedDays')->setAllowedTypes('delayedDays', ['int'])
            ->setDefined('specialConfig')->setAllowedTypes('specialConfig', ['string'])->setNormalizer('specialConfig', function (Options $options, $value) {
                if (!empty($value)) {
                    throw new InvalidOptionsException(sprintf('The option "specialConfig" expected to be empty. Current value: %s', $value));
                }

                return $value;
            })
            ->setDefined('reference')->setAllowedTypes('reference', ['string'])->setNormalizer('reference', function (Options $options, $value) {
                if (strlen($value) < 0 || 50 < strlen($value)) {
                    throw new InvalidOptionsException(sprintf('The option "reference" expected a length between 0 and 50 characters. Current length: %s', strlen($value)));
                }

                return $value;
            })
            ->setRequired('accountId')->setAllowedTypes('accountId', ['string'])->setNormalizer('accountId', function (Options $options, $value) {
                if (strlen($value) < 0 || 256 < strlen($value)) {
                    throw new InvalidOptionsException(sprintf('The option "accountId" expected a length between 0 and 256 characters. Current length: %s', strlen($value)));
                }

                return $value;
            })
            ->setDefined('totalAmount')->setAllowedTypes('totalAmount', ['int'])
            ->setDefined('commissionAmount')->setAllowedTypes('commissionAmount', ['int'])
            ->setDefined('comment')->setAllowedTypes('comment', ['string'])->setNormalizer('comment', function (Options $options, $value) {
                if (strlen($value) < 0 || 140 < strlen($value)) {
                    throw new InvalidOptionsException(sprintf('The option "comment" expected a length between 0 and 140 characters. Current length: %s', strlen($value)));
                }

                return $value;
            })
            ->setDefined('autoCommission')->setAllowedTypes('autoCommission', ['bool'])

        ;

        return $resolver->resolve($options);
    }

    public function resolveCreditAccountWithMontlySubscriptionOptions(array $options): array
    {
        $resolver = (new OptionsResolver())
            ->setDefined('subscriptionId')->setAllowedTypes('subscriptionId', ['string'])->setNormalizer('subscriptionId', function (Options $options, $value) {
                if (strlen($value) < 0 || 24 < strlen($value)) {
                    throw new InvalidOptionsException(sprintf('The option "subscriptionId" expected a length between 0 and 24 characters. Current length: %s', strlen($value)));
                }

                return $value;
            })
            ->setDefined('count')->setAllowedTypes('count', ['int'])
            ->setRequired('accountId')->setAllowedTypes('accountId', ['string'])->setNormalizer('accountId', function (Options $options, $value) {
                if (strlen($value) < 0 || 256 < strlen($value)) {
                    throw new InvalidOptionsException(sprintf('The option "accountId" expected a length between 0 and 256 characters. Current length: %s', strlen($value)));
                }

                return $value;
            })
            ->setDefined('totalAmount')->setAllowedTypes('totalAmount', ['int'])
            ->setDefined('commissionAmount')->setAllowedTypes('commissionAmount', ['int'])
            ->setDefined('comment')->setAllowedTypes('comment', ['string'])->setNormalizer('comment', function (Options $options, $value) {
                if (strlen($value) < 0 || 140 < strlen($value)) {
                    throw new InvalidOptionsException(sprintf('The option "comment" expected a length between 0 and 140 characters. Current length: %s', strlen($value)));
                }

                return $value;
            })
            ->setDefined('autoCommission')->setAllowedTypes('autoCommission', ['bool'])

        ;

        return $resolver->resolve($options);
    }

    public function resolveDisableIbanOptions(array $options): array
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

    public function resolveCheck3DSecureStatusOptions(array $options): array
    {
        $resolver = (new OptionsResolver())
            ->setDefined('card')->setAllowedTypes('card', [CardInfo::class, 'array'])->setNormalizer('card', function (Options $options, $value) {
                if ($value instanceof CardInfo) {
                    return $value;
                }

                return CardInfo::createFromArray($value);
            })
            ->setDefined('md')->setAllowedTypes('md', ['string'])
            ->setDefined('pares')->setAllowedTypes('pares', ['string'])
            ->setDefined('specialConfig')->setAllowedTypes('specialConfig', ['string'])->setNormalizer('specialConfig', function (Options $options, $value) {
                if (!empty($value)) {
                    throw new InvalidOptionsException(sprintf('The option "specialConfig" expected to be empty. Current value: %s', $value));
                }

                return $value;
            })
        ;

        return $resolver->resolve($options);
    }
}
