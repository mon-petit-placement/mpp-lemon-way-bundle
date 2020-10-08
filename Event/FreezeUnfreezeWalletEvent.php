<?php

namespace Mpp\LemonWayClientBundle\Event;

class AccountStatusChangeEvent extends AbstractWebHookEvent
{
    /**
     * @var string
     */
    private $extId;

    /**
     * @var int
     */
    private $intId;

    /**
     * @var int
     */
    private $blocked;

    /**
     * @method getExtId
     *
     * @return string
     */
    public function getExtId(): string
    {
        return $this->extId;
    }

    /**
     * @method setExtId
     *
     * @param string $extId
     *
     * @return self
     */
    public function setExtId(string $extId): self
    {
        $this->extId = $extId;

        return $this;
    }

    /**
     * @method getIntId
     *
     * @return int
     */
    public function getIntId(): int
    {
        return $this->intId;
    }

    /**
     * @method setIntId
     *
     * @param int $intId
     *
     * @return self
     */
    public function setIntId(int $intId): self
    {
        $this->intId = $intId;

        return $this;
    }

    /**
     * @method getBlocked
     *
     * @return int
     */
    public function getBlocked(): int
    {
        return $this->blocked;
    }

    /**
     * @method setBlocked
     *
     * @param int $blocked
     *
     * @return self
     */
    public function setBlocked(int $blocked): self
    {
        $this->blocked = $blocked;

        return $this;
    }

    /**
     * {@inheritdoc}
     */
    public static function getEventName(): string
    {
        return WebHooksEvents::FREEZE_UNFREEZE_WALLET;
    }
}
