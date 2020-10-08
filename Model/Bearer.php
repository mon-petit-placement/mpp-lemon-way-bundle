<?php

namespace Mpp\LemonWayClientBundle\Model;

class Bearer extends Model
{
    /**
     *  @var string
     */
    private $token_type;

    /**
     *  @var string
     */
    private $access_token;

    /**
     *  @var int
     */
    private $expires_in;

    /**
     * @method getTokenType
     *
     * @return string
     */
    public function getTokenType(): string
    {
        return $this->token_type;
    }

    /**
     * @method setTokenType
     *
     * @param string $tokenType
     *
     * @return self
     */
    public function setTokenType(string $tokenType): self
    {
        $this->token_type = $tokenType;

        return $this;
    }

    /**
     * @method getAccessToken
     *
     * @return string
     */
    public function getAccessToken(): string
    {
        return $this->access_token;
    }

    /**
     * @method setAccessToken
     *
     * @param string $accessToken
     *
     * @return self
     */
    public function setAccessToken(string $accessToken): self
    {
        $this->access_token = $accessToken;

        return $this;
    }

    /**
     * @method getExpiresIn
     *
     * @return int
     */
    public function getExpiresIn(): int
    {
        return $this->expires_in;
    }

    /**
     * @method setExpiresIn
     *
     * @param int $expiresIn
     *
     * @return self
     */
    public function setExpiresIn(int $expiresIn): self
    {
        $this->expires_in = $expiresIn;

        return $this;
    }
}
