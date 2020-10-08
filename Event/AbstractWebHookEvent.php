<?php

namespace Mpp\LemonWayClientBundle\Event;

use Symfony\Contracts\EventDispatcher\Event;

abstract class AbstractWebHookEvent extends Event
{
    /**
     * @var int
     */
    protected $notifCategory;

    /**
     * @var string
     */
    protected $notifDate;

    /**
     * @method getNotifCategory
     *
     * @return int
     */
    public function getNotifCategory(): int
    {
        return $this->notifCategory;
    }

    /**
     * @method setNotifCategory
     *
     * @param int $notifCategory
     *
     * @return self
     */
    public function setNotifCategory(int $notifCategory): self
    {
        $this->notifCategory = $notifCategory;

        return $this;
    }

    /**
     * @method getNotifDate
     *
     * @return string
     */
    public function getNotifDate(): string
    {
        return $this->notifDate;
    }

    /**
     * @method setNotifDate
     *
     * @param string $notifDate
     *
     * @return self
     */
    public function setNotifDate(string $notifDate): self
    {
        $this->notifDate = $notifDate;

        return $this;
    }

    /**
     * Retrieve event name.
     *
     * @method getEventName
     *
     * @return string
     */
    abstract public static function getEventName(): string;
}
