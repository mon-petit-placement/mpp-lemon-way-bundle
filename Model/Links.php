<?php

namespace Mpp\LemonWayClientBundle\Model;

class Links
{
    /**
     * @var Link|null
     */
    private $first;

    /**
     * @var Link|null
     */
    private $last;

    /**
     * @var Link|null
     */
    private $previous;

    /**
     * @var Link|null
     */
    private $next;

    /**
     * @var Link|null
     */
    private $self;

    /**
     * @method getFirst
     *
     * @return Link|null
     */
    public function getFirst(): ?Link
    {
        return $this->first;
    }

    /**
     * @method setFirst
     *
     * @param Link|null $first
     *
     * @return self
     */
    public function setFirst(?Link $first): self
    {
        $this->first = $first;

        return $this;
    }

    /**
     * @method getLast
     *
     * @return Link|null
     */
    public function getLast(): ?Link
    {
        return $this->last;
    }

    /**
     * @method setLast
     *
     * @param Link|null $last
     *
     * @return self
     */
    public function setLast(?Link $last): self
    {
        $this->last = $last;

        return $this;
    }

    /**
     * @method getPrevious
     *
     * @return Link|null
     */
    public function getPrevious(): ?Link
    {
        return $this->previous;
    }

    /**
     * @method setPrevious
     *
     * @param Link|null $previous
     *
     * @return self
     */
    public function setPrevious(?Link $previous): self
    {
        $this->previous = $previous;

        return $this;
    }

    /**
     * @method getNext
     *
     * @return Link|null
     */
    public function getNext(): ?Link
    {
        return $this->next;
    }

    /**
     * @method setNext
     *
     * @param Link|null $next
     *
     * @return self
     */
    public function setNext(?Link $next): self
    {
        $this->next = $next;

        return $this;
    }

    /**
     * @method getSelf
     *
     * @return Link|null
     */
    public function getSelf(): ?Link
    {
        return $this->self;
    }

    /**
     * @method setSelf
     *
     * @param Link|null $self
     *
     * @return self
     */
    public function setSelf(?Link $self): self
    {
        $this->self = $self;

        return $this;
    }
}
