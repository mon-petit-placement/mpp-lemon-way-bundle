# Symfony Bundle to interact with Lemon Way API

<img src="https://img.shields.io/badge/Total%20methods%20from%20documentation-%3F-blue"/>  
<img src="https://img.shields.io/badge/Methods%20added-0%25%20(0%2F%3F)-red"/>  
<img src="https://img.shields.io/badge/Methods%20implemented-0%25%20(0%2F%3F)-red"/>  
<img src="https://img.shields.io/badge/Methods%20tested-0%25%20(0%2F%3F)-red"/>  
<img src="https://img.shields.io/badge/Documentation-%3F%25-yellow"/>  
<img src="https://img.shields.io/badge/Up%20to%20date-v2.00.4-green"/>  

## Installation

To install this bundle, simply run the following command:
```
$ composer require mpp/lemon-way-client-bundle
```

## Configuration

First create a guzzle client:
```yaml
eight_points_guzzle:
    clients:
        my_lemon_way_client:
            base_url: '%env(LEMON_WAY_BASE_URL)%'
            options:
                headers:
                    PSU-Accept-Language: '%env(LEMON_WAY_PSU_ACCEPT_LANGUAGE)%' # optional (default: English)
                    PSU-IP-Address: '%env(LEMON_WAY_PSU_IP_ADRESS)%'
                    PSU-User-Agent: '%env(LEMON_WAY_PSU_USER_AGENT)%' # optional
```

Then configure this client to be used by the bundle:

```yaml
mpp_lemon_way_client:
    http_client: 'eight_points_guzzle.client.my_lemon_way_client'
    # Generate one from backoffice (Developers > Access Token)
    auth_access_token: '%env(LEMON_WAY_ACCESS_TOKEN)%'
    # SandBox URL : https://sandbox-api.lemonway.fr/oauth/api/v1/oauth/token
    # Production URL : https://auth.lemonway.com/oauth/api/v1/oauth/token
    auth_access_token_url: '%env(LEMON_WAY_ACCESS_TOKEN_URL)%'
```

(Recommanded) Create the mpp lemon way cache pool in ```config/packages/cache.yaml```:

> According to Lemon Way specification:  
> ⚠️ You must not create a token for every API call you perform. We strongly advise you to create one only when your current token has expired, to replace it.

```yaml
cache:
    pools:
        # ...
        cache.mpp_lemon_way_client: ~
```

(Optional) If you want to use [WebHooks](#how-to-use-webhooks-) configure the following routes in ```config/routes/mpp_lemon_way_client.yaml```:

```yaml
mpp_lemon_way_webhooks:
    path: /mpp/lemon-way/webhooks # make sure it is the same as defined in Lemonway backoffice
    controller: Mpp\LemonWayClientBundle\Controller\WebHooksController::callbackAction
```

## Clients

Here is the mapping of client for each specification name

<table>
    <thead>
        <tr>
            <th>Group</th>
            <th>Base path</th>
            <th>Client</th>
            <th>Client domain alias</th>
        </tr>
    </thead>
    <tbody>
        <tr>
            <td>Accounts</td>
            <td>/v2/accounts</td>
            <td><a href="./Client/LemonWayAccountClientInterface.php">LemonWayAccountClient</a></td>
            <td><a href="./Resources/docs/clients.md">account</a></td>
        </tr>
        <tr>
            <td>MoneyIns</td>
            <td>/v2/moneyins</td>
            <td><a href="./Client/LemonWayMoneyInClientInterface.php">LemonWayMoneyInClient</a></td>
            <td><a href="./Resources/docs/clients.md">money_in</a></td>
        </tr>
        <tr>
            <td>MoneyOuts</td>
            <td>/v2/moneyouts</td>
            <td><a href="./Client/LemonWayMoneyOutClientInterface.php">LemonWayMoneyOutClient</a></td>
            <td><a href="./Resources/docs/clients.md">money_out</a></td>
        </tr>
        <tr>
            <td>P2Ps</td>
            <td>/v2/p2p</td>
            <td><a href="./Client/LemonWayP2PClientInterface.php">LemonWayP2PClient</a></td>
            <td><a href="./Resources/docs/clients.md">p2p</a></td>
        </tr>
        <tr>
            <td>Refunds</td>
            <td>/v2/refunds</td>
            <td><a href="./Client/LemonWayRefundClientInterface.php">LemonWayRefundClient</a></td>
            <td><a href="./Resources/docs/clients.md">refund</a></td>
        </tr>
        <tr>
            <td>Disputes</td>
            <td>/v2/disputes</td>
            <td><a href="./Client/LemonWayDisputeClientInterface.php">LemonWayDisputeClient</a></td>
            <td><a href="./Resources/docs/clients.md">dispute</a></td>
        </tr>
    </tbody>
</table>

## Webhooks

<table>
    <thead>
        <tr>
            <th>Group</th>
            <th>Event id</th>
            <th>Event name</th>
        </tr>
    </thead>
    <tbody>
        <tr>
            <td rowspan="3">Accounts</td>
            <td>8</td>
            <td>Account status change</td>
        </tr>
        <tr>
            <td>9</td>
            <td>Document status change</td>
        </tr>
        <tr>
            <td>13</td>
            <td>Freeze/unfreeze wallet</td>
        </tr>
        <tr>
            <td rowspan="4">MoneyIns</td>
            <td>10</td>
            <td>MoneyIn : by wire received</td>
        </tr>
        <tr>
            <td>11</td>
            <td>MoneyIn : by SDD received</td>
        </tr>
        <tr>
            <td>12</td>
            <td>MoneyIn : by cheque received</td>
        </tr>
        <tr>
            <td>17</td>
            <td>MoneyIn by SDD canceled</td>
        </tr>
        <tr>
            <td>MoneyOuts</td>
            <td>15</td>
            <td>MoneyOut canceled</td>
        </tr>
        <tr>
            <td>Disputes</td>
            <td>14</td>
            <td>Chargeback received</td>
        </tr>
    </tbody>
</table>

## How to use ?

#### How to get a specific client ?

Here is a sample controller on how to get a specific client from registry:

```php
<?php

namespace App\Controller;

use Mpp\LemonWayClientBundle\Client\LemonWayAccountClient;
use Mpp\LemonWayClientBundle\Client\LemonWayClientRegistryInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class ExampleController extends AbstractController
{
    public function exampleAction(LemonWayClientRegistryInterface $lemonWayClientRegistry)
    {
        // Example with LemonWayAccountClient
        $myClient = $lemonWayClientRegistry->get('account');
    }

    // You can also inject the client directly
    public function exampleAction(LemonWayAccountClient $lemonWayAccountClient)
    {

    }
}
```

#### How to use each clients ?

You'll find an exemple of usage of each client below

-  [WIP] [Accounts](./Resources/docs/examples/account.md)
-  [WIP] [MoneyIns](./Resources/docs/examples/money-in.md)
-  [WIP] [MoneyOuts](./Resources/docs/examples/money-out.md)
-  [WIP] [P2Ps](./Resources/docs/examples/p2ps.md)
-  [WIP] [Refunds](./Resources/docs/examples/refund.md)
-  [WIP] [Disputes](./Resources/docs/examples/dispute.md)

#### How to use webhooks ?

First you must configure the following routes in ```config/routes/mpp_lemon_way_client.yaml```:

```yaml
mpp_lemon_way_webhooks:
    path: /mpp/lemon-way/webhooks # make sure it is the same as defined in Lemonway backoffice
    controller: Mpp\LemonWayClientBundle\Controller\WebHooksController::callbackAction
```

Then, you can attach to webhooks events in a custom subscriber:

```php
<?php

namespace App\Event\Subscriber;

use Mpp\LemonWayClientBundle\Event\WebHooksEvents;
use Mpp\LemonWayClientBundle\Event\AccountStatusChangeEvent;
use Mpp\LemonWayClientBundle\Event\DocumentStatusChangeEvent;
use Mpp\LemonWayClientBundle\Event\FreezeUnfreezeWalletEvent;
use Mpp\LemonWayClientBundle\Event\MoneyInByWireReceivedEvent;
use Mpp\LemonWayClientBundle\Event\MoneyInBySddReceivedEvent;
use Mpp\LemonWayClientBundle\Event\MoneyInByChequeReceivedEvent;
use Mpp\LemonWayClientBundle\Event\MoneyInBySddCanceledEvent;
use Mpp\LemonWayClientBundle\Event\MoneyOutCanceledEvent;
use Mpp\LemonWayClientBundle\Event\ChargebackReceivedEvent;
use Symfony\Component\EventDispatcher\EventSubscriberInterface;

class LemonWayWebHooksEventSubscriber implements EventSubscriberInterface
{
    public static function getSubscribedEvents()
    {
        return [
            WebHooksEvents::ACCOUNT_STATUS_CHANGE => [
                ['handleAccountStatusChangeEvent', 0],
            ],
            WebHooksEvents::DOCUMENT_STATUS_CHANGE => [
                ['handleDocumentStatusChangeEvent', 0],
            ],
            WebHooksEvents::FREEZE_UNFREEZE_WALLET => [
                ['handleFreezeUnfreezeWalletEvent', 0],
            ],
            WebHooksEvents::MONEY_IN_BY_WIRE_RECEIVED => [
                ['handleMoneyInByWireReceivedEvent', 0],
            ],
            WebHooksEvents::MONEY_IN_BY_SDD_RECEIVED => [
                ['handleMoneyInBySddReceivedEvent', 0],
            ],
            WebHooksEvents::MONEY_IN_BY_CHEQUE_RECEIVED => [
                ['handleMoneyInByChequeReceivedEvent', 0],
            ],
            WebHooksEvents::MONEY_IN_BY_SDD_CANCELED => [
                ['handleMoneyInBySddCanceledEvent', 0],
            ],
            WebHooksEvents::MONEY_OUT_CANCELED => [
                ['handleMoneyOutCanceledEvent', 0],
            ],
            WebHooksEvents::CHARGEBACK_RECEIVED => [
                ['handleChargebackReceivedEvent', 0],
            ],
        ];
    }

    public function handleAccountStatusChangeEvent(AccountStatusChangeEvent $event)
    {
        // Do something
    }

    public function handleDocumentStatusChangeEvent(DocumentStatusChangeEvent $event)
    {
        // Do something
    }

    public function handleFreezeUnfreezeWalletEvent(FreezeUnfreezeWalletEvent $event)
    {
        // Do something
    }

    public function handleMoneyInByWireReceivedEvent(MoneyInByWireReceivedEvent $event)
    {
        // Do something
    }

    public function handleMoneyInBySddReceivedEvent(MoneyInBySddReceivedEvent $event)
    {
        // Do something
    }

    public function handleMoneyInByChequeReceivedEvent(MoneyInByChequeReceivedEvent $event)
    {
        // Do something
    }

    public function handleMoneyInBySddCanceledEvent(MoneyInBySddCanceledEvent $event)
    {
        // Do something
    }

    public function handleMoneyOutCanceledEvent(MoneyOutCanceledEvent $event)
    {
        // Do something
    }

    public function handleChargebackReceivedEvent(ChargebackReceivedEvent $event)
    {
        // Do something
    }
}
```

## Tests

Update the environment variables in [phpunit.xml.dist](./phpunit.xml.dist):

```xml
<!-- ... -->
<php>
    <!-- ... -->
    <env name="APP_ENV" value="test" />
    <env name="LEMON_WAY_BASE_URL" value="" />
    <env name="LEMON_WAY_AUTH_ACCESS_TOKEN" value="" />
    <env name="LEMON_WAY_AUTH_ACCESS_TOKEN_URL" value="" />
    <!-- ... -->
</php>
<!-- ... -->
```

Then, use the following commands if you want to run the tests suite

```sh
$ make composer-install # once

$ make phpunit
```

## TODO

- [ ] Find a way to better handle ApiResponse by remplacing the $classNameMapping argument of requestAndPopulate
    -> For example by creating model object for each client response to simplify deserialization, so, LemonWayMoneyInClient::getAccountCards() method return a GetAccountCardsApiResponse instead of an array
- [ ] Implement tests
