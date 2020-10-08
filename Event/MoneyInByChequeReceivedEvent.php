<?php

namespace Mpp\LemonWayClientBundle\Event;

class MoneyInByChequeReceivedEvent extends NewMoneyInEvent
{
    /**
     * {@inheritdoc}
     */
    public static function getEventName(): string
    {
        return WebHooksEvents::MONEY_IN_BY_CHEQUE_RECEIVED;
    }
}
