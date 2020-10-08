<?php

namespace Mpp\LemonWayClientBundle\Exception;

use Mpp\LemonWayClientBundle\Model\Error;

class LemonWayException extends \Exception
{
    public function __construct(Error $error)
    {
        parent::__construct($error->getMessage(), $error->getCode());
    }
}
