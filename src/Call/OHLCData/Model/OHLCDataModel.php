<?php

namespace HanischIt\KrakenApi\Call\OHLCData\Model;

/**
 * Class OHLCDataModel
 * @package HanischIt\KrakenApi\Call\OHLCData\Model
 */
class OHLCDataModel
{
    /**
     * @var int
     */
    private $time;
    /**
     * @var float
     */
    private $open;
    /**
     * @var float
     */
    private $high;
    /**
     * @var float
     */
    private $low;
    /**
     * @var float
     */
    private $close;
    /**
     * @var float
     */
    private $vwap;
    /**
     * @var float
     */
    private $volume;
    /**
     * @var int
     */
    private $count;

    /**
     * OHLCDataModel constructor.
     * @param int $time
     * @param float $open
     * @param float $high
     * @param float $low
     * @param float $close
     * @param float $vwap
     * @param float $volume
     * @param int $count
     */
    public function __construct($time, $open, $high, $low, $close, $vwap, $volume, $count)
    {
        $this->time = $time;
        $this->open = $open;
        $this->high = $high;
        $this->low = $low;
        $this->close = $close;
        $this->vwap = $vwap;
        $this->volume = $volume;
        $this->count = $count;
    }

    /**
     * @return int
     */
    public function getTime()
    {
        return $this->time;
    }

    /**
     * @return float
     */
    public function getOpen()
    {
        return $this->open;
    }

    /**
     * @return float
     */
    public function getHigh()
    {
        return $this->high;
    }

    /**
     * @return float
     */
    public function getLow()
    {
        return $this->low;
    }

    /**
     * @return float
     */
    public function getClose()
    {
        return $this->close;
    }

    /**
     * @return float
     */
    public function getVwap()
    {
        return $this->vwap;
    }

    /**
     * @return float
     */
    public function getVolume()
    {
        return $this->volume;
    }

    /**
     * @return int
     */
    public function getCount()
    {
        return $this->count;
    }
}
