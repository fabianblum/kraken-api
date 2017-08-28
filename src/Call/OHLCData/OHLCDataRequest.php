<?php

namespace HanischIt\KrakenApi\Call\OHLCData;

use HanischIt\KrakenApi\Enum\VisibilityEnum;
use HanischIt\KrakenApi\Model\RequestInterface;

/**
 * Class OHLCDataRequest
 * @package HanischIt\KrakenApi\Call\OHLCData
 */
class OHLCDataRequest implements RequestInterface
{

    /**
     * @var string
     */
    private $pair;

    /**
     * @var int
     */
    private $interval;

    /**
     * @var int
     */
    private $since;

    /**
     * OHLCDataRequest constructor.
     * @param string $pair
     * @param int $interval
     * @param int $since
     */
    public function __construct($pair, $interval, $since)
    {
        $this->pair = $pair;
        $this->interval = $interval;
        $this->since = $since;
    }

    /**
     * Returns the api request name
     *
     * @return string
     */
    public function getMethod()
    {
        return 'OHLC';
    }

    /**
     * @return string
     */
    public function getVisibility()
    {
        return VisibilityEnum::VISIBILITY_PUBLIC;
    }

    /**
     * @return array
     */
    public function getRequestData()
    {
        $ret = [];
        $ret["pair"] = $this->pair;
        if (null !== $this->interval) {
            $ret["interval"] = $this->interval;
        }
        if (null !== $this->since) {
            $ret["since"] = $this->since;
        }
        return $ret;
    }

    /**
     * @return string
     */
    public function getResponseClassName()
    {
        return OHLCDataResponse::class;
    }
}
