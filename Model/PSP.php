<?php

namespace Mpp\LemonWayClientBundle\Model;

class PSP
{
    /**
     * @var string|null
     */
    private $message;

    /**
     * @method getMessage
     *
     * @return string|null
     */
    public function getMessage(): ?string
    {
        return $this->message;
    }

    /**
     * @method setMessage
     *
     * @param string|null $message
     *
     * @return self
     */
    public function setMessage(?string $message): self
    {
        $this->message = $message;

        return $this;
    }
}
