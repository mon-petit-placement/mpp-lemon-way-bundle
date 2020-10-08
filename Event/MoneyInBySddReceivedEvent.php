<?php

namespace Mpp\LemonWayClientBundle\Event;

class MoneyInBySddReceivedEvent extends NewMoneyInEvent
{
    /**
     * {@inheritdoc}
     */
    public static function getEventName(): string
    {
        return WebHooksEvents::MONEY_IN_BY_SDD_RECEIVED;
    }
}
