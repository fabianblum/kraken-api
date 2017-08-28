<?php
/**
 * @author fabian.hanisch
 * @since  2017-07-18
 */

namespace HanischIt\KrakenApi\Call\RecentTrades\Model;

/**
 * Class RecentTradeModel
 * @package HanischIt\KrakenApi\Call\RecentTrades\Model
 */
class RecentTradeModel
{
    /**
     * @var float
     */
    private $price;
    /**
     * @var float
     */
    private $volume;
    /**
     * @var int
     */
    private $time;
    /**
     * @var string
     */
    private $type;
    /**
     * @var string
     */
    private $tradeType;
    /**
     * @var string
     */
    private $misc;

    /**
     * RecentTradeModel constructor.
     *
     * @param float $price
     * @param float $volume
     * @param int $time
     * @param string $type
     * @param string $tradeType
     * @param string $misc
     */
    public function __construct($price, $volume, $time, $type, $tradeType, $misc)
    {
        $this->price = $price;
        $this->volume = $volume;
        $this->time = $time;
        $this->type = $type;
        $this->tradeType = $tradeType;
        $this->misc = $misc;
    }

    /**
     * @return float
     */
    public function getPrice()
    {
        return $this->price;
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
    public function getTime()
    {
        return $this->time;
    }

    /**
     * @return string
     */
    public function getType()
    {
        return $this->type;
    }

    /**
     * @return string
     */
    public function getTradeType()
    {
        return $this->tradeType;
    }

    /**
     * @return string
     */
    public function getMisc()
    {
        return $this->misc;
    }
}
