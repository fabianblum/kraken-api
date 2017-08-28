<?php

namespace HanischIt\KrakenApi\Call\ServerTime;

use HanischIt\KrakenApi\Model\ResponseInterface;

/**
 * Class ServerTimeResponse
 * @package HanischIt\KrakenApi\Call\ServerTime
 */
class ServerTimeResponse implements ResponseInterface
{

    /**
     * as unix timestamp
     *
     * @var string
     */
    private $unixTime;

    /**
     * as RFC 1123 time format
     *
     * @var string
     */
    private $rfc1123;

    /**
     * @return string
     */
    public function getUnixTime()
    {
        return $this->unixTime;
    }

    /**
     * @param string $unixTime
     */
    public function setUnixTime($unixTime)
    {
        $this->unixTime = $unixTime;
    }

    /**
     * @return string
     */
    public function getRfc1123()
    {
        return $this->rfc1123;
    }

    /**
     * @param string $rfc1123
     */
    public function setRfc1123($rfc1123)
    {
        $this->rfc1123 = $rfc1123;
    }
}
