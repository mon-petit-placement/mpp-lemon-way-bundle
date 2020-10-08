<?php

namespace Mpp\LemonWayClientBundle\OptionsResolver;

use Symfony\Component\OptionsResolver\Exception\InvalidOptionsException;
use Symfony\Component\OptionsResolver\Options;
use Symfony\Component\OptionsResolver\OptionsResolver;

class LemonWayDisputeClientOptionsResolver
{
    public static function resolveListOptions(array $options): array
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
}
