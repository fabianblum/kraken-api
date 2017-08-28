<?php
/**
 * @author fabian.hanisch
 * @since  2017-07-17
 */

namespace HanischIt\KrakenApi\Call\GetTicker\Model;

/**
 * Class DayPriceModel
 * @package HanischIt\KrakenApi\Call\GetTicker\Model
 */
class DayPriceModel
{
    /**
     * @var float
     */
    private $today;
    /**
     * @var float
     */
    private $last24;

    /**
     * DayPriceModel constructor.
     *
     * @param float $today
     * @param float $last24
     */
    public function __construct($today, $last24)
    {
        $this->today = $today;
        $this->last24 = $last24;
    }

    /**
     * @return float
     */
    public function getToday()
    {
        return $this->today;
    }

    /**
     * @return float
     */
    public function getLast24()
    {
        return $this->last24;
    }
}
