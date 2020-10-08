<?php

namespace Mpp\LemonWayClientBundle\Model;

use Mpp\LemonWayClientBundle\Exception\LemonWayException;

class Error
{
    /**
     * @var int|null
     */
    private $code;

    /**
     * @var string|null
     */
    private $message;

    /**
     * @var PSP|null
     */
    private $psp;

    /**
     * @method getCode
     *
     * @return int|null
     */
    public function getCode(): ?int
    {
        return $this->code;
    }

    /**
     * @method setCode
     *
     * @param int|null $code
     *
     * @return self
     */
    public function setCode(?int $code): self
    {
        $this->code = $code;

        return $this;
    }

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

    /**
     * @method getPSP
     *
     * @return PSP|null
     */
    public function getPSP(): ?PSP
    {
        return $this->psp;
    }

    /**
     * @method setPSP
     *
     * @param PSP|null $psp
     *
     * @return self
     */
    public function setPSP(?PSP $psp): self
    {
        $this->psp = $psp;

        return $this;
    }

    /**
     * @method getException
     *
     * @return LemonWayException
     */
    public function getException(): LemonWayException
    {
        return new LemonWayException($this);
    }
}
