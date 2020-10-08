<?php

namespace Mpp\LemonWayClientBundle\OptionsResolver;

use Mpp\LemonWayClientBundle\Model\PrivateData;
use Symfony\Component\OptionsResolver\Exception\InvalidOptionsException;
use Symfony\Component\OptionsResolver\Options;
use Symfony\Component\OptionsResolver\OptionsResolver;

class LemonWayDisputeClientOptionsResolver
{
    public static function resolveListOptions(array $options): array
    {
        $resolver = (new OptionsResolver())
            ->setDefined('transactionId')->setAllowedTypes('transactionId', ['int'])
            ->setDefined('transactionComment')->setAllowedTypes('transactionComment', ['string'])->setNormalizer('transactionComment', function (Options $options, $value) {
                if (strlen($value) < 0 || 140 < strlen($value)) {
                    throw new InvalidOptionsException(sprintf('The option "transactionComment" expected a length between 0 and 140 characters. Current length: %s', strlen($value)));
                }

                return $value;
            })
            ->setDefined('privateData')->setAllowedTypes('privateData', [PrivateData::class, 'array'])->setNormalizer('privateData', function (Options $options, $value) {
                if ($value instanceof PrivateData) {
                    return $value;
                }

                return PrivateData::createFromArray($value);
            })
            ->setDefined('page')->setAllowedTypes('page', ['int'])
            ->setDefined('limit')->setAllowedTypes('limit', ['int'])
        ;

        return $resolver->resolve($options);
    }

    public static function resolveCreateOptions(array $options): array
    {
        $resolver = (new OptionsResolver())
            ->setRequired('debitAccountId')->setAllowedTypes('debitAccountId', ['string'])->setNormalizer('debitAccountId', function (Options $options, $value) {
                if (strlen($value) < 0 || 256 < strlen($value)) {
                    throw new InvalidOptionsException(sprintf('The option "debitAccountId" expected a length between 0 and 256 characters. Current length: %s', strlen($value)));
                }

                return $value;
            })
            ->setRequired('creditAccountId')->setAllowedTypes('creditAccountId', ['string'])->setNormalizer('creditAccountId', function (Options $options, $value) {
                if (strlen($value) < 0 || 256 < strlen($value)) {
                    throw new InvalidOptionsException(sprintf('The option "creditAccountId" expected a length between 0 and 256 characters. Current length: %s', strlen($value)));
                }

                return $value;
            })
            ->setDefined('amount')->setAllowedTypes('amount', ['int'])
            ->setDefined('comment')->setAllowedTypes('comment', ['string'])->setNormalizer('comment', function (Options $options, $value) {
                if (strlen($value) < 0 || 140 < strlen($value)) {
                    throw new InvalidOptionsException(sprintf('The option "comment" expected a length between 0 and 140 characters. Current length: %s', strlen($value)));
                }

                return $value;
            })
            ->setDefined('scheduledDate')->setAllowedTypes('scheduledDate', ['string'])->setNormalizer('scheduledDate', function (Options $options, $value) {
                if (!preg_match('/^[12]\d{3}\/(0[1-9]|1[0-2])\/(0[1-9]|[12]\d|3[01])$/', $value)) {
                    throw new InvalidOptionsException('The option "scheduledDate" does not match the pattern "^[12]\d{3}\/(0[1-9]|1[0-2])\/(0[1-9]|[12]\d|3[01])$"');
                }

                return $value;
            })
            ->setDefined('privateData')->setAllowedTypes('privateData', [PrivateData::class, 'array'])->setNormalizer('privateData', function (Options $options, $value) {
                if ($value instanceof PrivateData) {
                    return $value;
                }

                return PrivateData::createFromArray($value);
            })
            ->setDefined('originTransactionId')->setAllowedTypes('originTransactionId', ['int'])
            ->setDefined('reference')->setAllowedTypes('reference', ['string'])->setNormalizer('reference', function (Options $options, $value) {
                if (strlen($value) < 0 || 36 < strlen($value)) {
                    throw new InvalidOptionsException(sprintf('The option "comment" expected a length between 0 and 36 characters. Current length: %s', strlen($value)));
                }

                return $value;
            })
        ;

        return $resolver->resolve($options);
    }
}
