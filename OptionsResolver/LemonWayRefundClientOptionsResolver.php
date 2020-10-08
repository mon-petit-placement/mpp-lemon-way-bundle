<?php

namespace Mpp\LemonWayClientBundle\OptionsResolver;

use Symfony\Component\OptionsResolver\Exception\InvalidOptionsException;
use Symfony\Component\OptionsResolver\Options;
use Symfony\Component\OptionsResolver\OptionsResolver;

class LemonWayRefundClientOptionsResolver
{
    public static function resolveListOptions(array $options): array
    {
        $resolver = (new OptionsResolver())
            ->setDefined('amountToRefund')->setAllowedTypes('amountToRefund', ['int'])->setNormalizer('amountToRefund', function (Options $options, $value) {
                if (!preg_match('/^-?[0-9]{1,13}(.[0-9]{2}){0,1}$/', $value)) {
                    throw new InvalidOptionsException('The option "amountToRefund" does not match the pattern "^-?[0-9]{1,13}(.[0-9]{2}){0,1}$"');
                }

                return $value;
            })
            ->setDefined('comment')->setAllowedTypes('comment', ['string'])->setNormalizer('comment', function (Options $options, $value) {
                if (strlen($value) < 0 || 140 < strlen($value)) {
                    throw new InvalidOptionsException(sprintf('The option "comment" expected a length between 0 and 140 characters. Current length: %s', strlen($value)));
                }

                return $value;
            })
        ;

        return $resolver->resolve($options);
    }
}
