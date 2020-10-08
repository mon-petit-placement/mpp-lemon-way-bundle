<?php

namespace Mpp\LemonWayClientBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Contracts\EventDispatcher\EventDispatcherInterface;

class WebHooksController extends AbstractController
{
    public function __construct(EventDispatcherInterface $dispatcher)
    {
        $this->dispatcher = $dispatcher;
    }

    public function callbackAction(Request $request)
    {
        $event = WebHookEventFactory::create($request->request->all());

        $this->dispatcher->dispatch($event, $event::getEventName());
    }
}
