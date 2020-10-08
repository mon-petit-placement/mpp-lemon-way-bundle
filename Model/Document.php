<?php

namespace Mpp\LemonWayClientBundle\Model;

class Document
{
    const STATUS_ON_HOLD = 0;
    const STATUS_RECEIVED = 1;
    const STATUS_ACCEPTED = 2;
    const STATUS_REJECTED = 3;
    const STATUS_REJECTED_UNREADABLE_BY_HUMAN = 4;
    const STATUS_REJECTED_EXPIRED = 5;
    const STATUS_REJECTED_WRONG_TYPE = 6;
    const STATUS_REJECTED_WRONG_NAME = 7;
    const STATUS_REJECTED_DUPLICATED_DOCUMENT = 8;

    const TYPE_ID_CARD = 0;
    const TYPE_PROOF_OF_ADDRESS = 1;
    const TYPE_IBAN = 2;
    const TYPE_EUROPEAN_PASSPORT = 3;
    const TYPE_EXTRA_EUROPEAN_PASSPORT = 4;
    const TYPE_RESIDENCE_PERMIT = 5;
    const TYPE_COMPANY_REGISTRATION_DOCUMENT = 7;
    const TYPE_DRIVER_LICENCE = 11;
    const TYPE_STATUS = 12;
    const TYPE_SELFIE = 13;
    const TYPE_OTHER_1 = 14;
    const TYPE_OTHER_2 = 15;
    const TYPE_OTHER_3 = 16;
    const TYPE_OTHER_4 = 17;
    const TYPE_OTHER_5 = 18;
    const TYPE_OTHER_6 = 19;
    const TYPE_OTHER_7 = 20;
    const TYPE_SDD_MANDATE = 21;

    /**
     * @var int|null
     */
    private $id;

    /**
     * @var int|null
     */
    private $status;

    /**
     * @var int|null
     */
    private $type;

    /**
     * @var string|null
     */
    private $validityDate;

    /**
     * @var string|null
     */
    private $comment;

    /**
     * @method getId
     *
     * @return int|null
     */
    public function getId(): ?int
    {
        return $this->id;
    }

    /**
     * @method setId
     *
     * @param int|null $id
     *
     * @return self
     */
    public function setId(?int $id): self
    {
        $this->id = $id;

        return $this;
    }

    /**
     * @method getType
     *
     * @return int|null
     */
    public function getType(): ?int
    {
        return $this->type;
    }

    /**
     * @method setType
     *
     * @param int|null $type
     *
     * @return self
     */
    public function setType(?int $type): self
    {
        $this->type = $type;

        return $this;
    }

    /**
     * @method getValidityDate
     *
     * @return string|null
     */
    public function getValidityDate(): ?string
    {
        return $this->validityDate;
    }

    /**
     * @method setValidityDate
     *
     * @param string|null $validityDate
     *
     * @return self
     */
    public function setValidityDate(?string $validityDate): self
    {
        $this->validityDate = $validityDate;

        return $this;
    }

    /**
     * @method getComment
     *
     * @return string|null
     */
    public function getComment(): ?string
    {
        return $this->comment;
    }

    /**
     * @method setComment
     *
     * @param string|null $comment
     *
     * @return self
     */
    public function setComment(?string $comment): self
    {
        $this->comment = $comment;

        return $this;
    }
}
