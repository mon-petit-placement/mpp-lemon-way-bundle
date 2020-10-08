<?php

namespace Mpp\LemonWayClientBundle\Event;

class MoneyInByWireReceivedEvent extends NewMoneyInEvent
{
    /**
     * {@inheritdoc}
     */
    public static function getEventName(): string
    {
        return WebHooksEvents::MONEYIN_BY_WIRE_CANCELED;
    }
}
