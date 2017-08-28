<?php
/**
 * @author fabian.hanisch
 * @since  2017-07-17
 */

namespace HanischIt\KrakenApi\Call\GetTicker\Model;

/**
 * Class PriceVolumeModel
 * @package HanischIt\KrakenApi\Call\GetTicker\Model
 */
class PriceVolumeModel
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
     * PriceVolumeModel constructor.
     *
     * @param float $price
     * @param float $volume
     */
    public function __construct($price, $volume)
    {
        $this->price = $price;
        $this->volume = $volume;
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
}
