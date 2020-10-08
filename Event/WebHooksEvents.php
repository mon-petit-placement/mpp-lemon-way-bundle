<?php

namespace Mpp\LemonWayClientBundle\Event;

class WebHooksEvents
{
    const ACCOUNT_STATUS_CHANGE = 'mpp_lemon_way.event.account_status_change';
    const DOCUMENT_STATUS_CHANGE = 'mpp_lemon_way.event.document_status_change';
    const FREEZE_UNFREEZE_WALLET = 'mpp_lemon_way.event.freeze_unfreeze_wallet';
    const MONEY_IN_BY_WIRE_RECEIVED = 'mpp_lemon_way.event.money_in_by_wire_received';
    const MONEY_IN_BY_SDD_RECEIVED = 'mpp_lemon_way.event.money_in_by_sdd_received';
    const MONEY_IN_BY_CHEQUE_RECEIVED = 'mpp_lemon_way.event.money_in_by_cheque_received';
    const MONEY_IN_BY_SDD_CANCELED = 'mpp_lemon_way.event.money_in_by_sdd_canceled';
    const MONEY_OUT_CANCELED = 'mpp_lemon_way.event.money_out_canceled';
    const CHARGEBACK_RECEIVED = 'mpp_lemon_way.event.chargeback_received';
}
