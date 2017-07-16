<?php

namespace HanischIt\KrakenApi\Model\ServerTime;

use HanischIt\KrakenApi\Model\ResponseInterface;

/**
 * Class ServerTimeResponse
 * @package HanischIt\KrakenApi\Model\ServerTime
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
     * @param string $unixTime
     */
    public function setUnixTime(string $unixTime)
    {
        $this->unixTime = $unixTime;
    }

    /**
     * @param string $rfc1123
     */
    public function setRfc1123(string $rfc1123)
    {
        $this->rfc1123 = $rfc1123;
    }


    /**
     * @return string
     */
    public function getUnixTime(): string
    {
        return $this->unixTime;
    }

    /**
     * @return string
     */
    public function getRfc1123(): string
    {
        return $this->rfc1123;
    }
}
