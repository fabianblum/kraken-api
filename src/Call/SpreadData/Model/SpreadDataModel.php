<?php
/**
 * @author Fabian Hanisch
 * @since 18.07.2017 20:32
 * @version 1.0
 */

namespace HanischIt\KrakenApi\Call\SpreadData\Model;

/**
 * Class SpreadDataModel
 * @package HanischIt\KrakenApi\Call\SpreadData\Model
 */
class SpreadDataModel
{
    /**
     * @var int
     */
    private $time;
    /**
     * @var float
     */
    private $bid;
    /**
     * @var float
     */
    private $ask;

    /**
     * SpreadDataModel constructor.
     * @param int $time
     * @param float $bid
     * @param float $ask
     */
    public function __construct($time, $bid, $ask)
    {
        $this->time = $time;
        $this->bid = $bid;
        $this->ask = $ask;
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
    public function getBid()
    {
        return $this->bid;
    }

    /**
     * @return float
     */
    public function getAsk()
    {
        return $this->ask;
    }
}
