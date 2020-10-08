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
    private $status;

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
     * @method getStatus
     *
     * @return int
     */
    public function getStatus(): int
    {
        return $this->status;
    }

    /**
     * @method setStatus
     *
     * @param int $status
     *
     * @return self
     */
    public function setStatus(int $status): self
    {
        $this->status = $status;

        return $this;
    }

    /**
     * {@inheritdoc}
     */
    public static function getEventName(): string
    {
        return WebHooksEvents::ACCOUNT_STATUS_CHANGE;
    }
}
