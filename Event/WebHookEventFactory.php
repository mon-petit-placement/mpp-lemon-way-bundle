<?php

namespace Mpp\LemonWayClientBundle\Event;

class WebHookEventFactory
{
    const NOTIF_CATEGORY_EVENT_CLASS_MAPPING = [
        8 => AccountStatusChangeEvent::class,
        9 => DocumentStatusChangeEvent::class,
        10 => MoneyInByWireReceivedEvent::class,
        11 => MoneyInBySddReceivedEvent::class,
        12 => MoneyInByChequeReceivedEvent::class,
        13 => FreezeUnfreezeWalletEvent::class,
        14 => ChargebackReceivedEvent::class,
        15 => MoneyOutCanceledEvent::class,
        17 => MoneyInBySddCanceledEvent::class,
    ];

    public static function create(array $parameters): WebHookEvent
    {
        $resolver = (new OptionsResolver())
            ->setRequired('NotifCategory')->setAllowedTypes('NotifCategory', ['int'])->setAllowedValues('NotifCategory', array_keys(self::NOTIF_CATEGORY_EVENT_CLASS_MAPPING))
            ->setRequired('NotifDate')->setAllowedTypes('NotifDate', ['string'])
        ;

        $parameters = $resolver->resolve($parameters);

        $eventClassName = self::NOTIF_CATEGORY_EVENT_CLASS_MAPPING[$parameters['NotifCategory']];
        $reflectionClass = new \ReflectionClass($eventClassName);
        $event = $reflectionClass->newInstance();

        foreach ($parameters as $key => $value) {
            $method = sprintf('set%s', ucfirst($key));
            if ($reflectionClass->hasMethod($method)) {
                call_user_func([$event, $method], $value);
            }
        }

        return $event;
    }
}
