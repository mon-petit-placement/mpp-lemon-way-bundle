<?php

namespace Mpp\LemonWayClientBundle\Event;

class DocumentStatusChangeEvent extends AbstractWebHookEvent
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
    private $docId;

    /**
     * @var int
     */
    private $docType;

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
     * @method getDocId
     *
     * @return int
     */
    public function getDocId(): int
    {
        return $this->docId;
    }

    /**
     * @method setDocId
     *
     * @param int $docId
     *
     * @return self
     */
    public function setDocId(int $docId): self
    {
        $this->docId = $docId;

        return $this;
    }

    /**
     * @method getDocType
     *
     * @return int
     */
    public function getDocType(): int
    {
        return $this->docType;
    }

    /**
     * @method setDocType
     *
     * @param int $docType
     *
     * @return self
     */
    public function setDocType(int $docType): self
    {
        $this->docType = $docType;

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
        return WebHooksEvents::DOCUMENT_STATUS_CHANGE;
    }
}
