<?php
/**
 * @author fabian.hanisch
 * @since  2017-07-17
 */

namespace HanischIt\KrakenApi\Call\GetTicker\Model;

/**
 * Class AskBidModel
 * @package HanischIt\KrakenApi\Call\GetTicker\Model
 */
class AskBidModel
{
    /**
     * @var float
     */
    private $price;
    /**
     * @var float
     */
    private $wholeLotVolume;
    /**
     * @var float
     */
    private $lotVolume;

    /**
     * AskBidModel constructor.
     *
     * @param float $price
     * @param float $wholeLotVolume
     * @param float $lotVolume
     */
    public function __construct($price, $wholeLotVolume, $lotVolume)
    {
        $this->price = $price;
        $this->wholeLotVolume = $wholeLotVolume;
        $this->lotVolume = $lotVolume;
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
    public function getWholeLotVolume()
    {
        return $this->wholeLotVolume;
    }

    /**
     * @return float
     */
    public function getLotVolume()
    {
        return $this->lotVolume;
    }
}
