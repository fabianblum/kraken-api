<?php
/**
 * @author Fabian Hanisch
 * @since 18.07.2017 20:32
 * @version 1.0
 */

namespace HanischIt\KrakenApi\Call\OrderBook\Model;

/**
 * Class OrderBookModel
 * @package HanischIt\KrakenApi\Call\OrderBook
 */
class OrderBookModel
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
     * @var string
     */
    private $timestamp;

    /**
     * OrderBookModel constructor.
     * @param float $price
     * @param float $volume
     * @param string $timestamp
     */
    public function __construct($price, $volume, $timestamp)
    {
        $this->price = $price;
        $this->volume = $volume;
        $this->timestamp = $timestamp;
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
     * @return string
     */
    public function getTimestamp()
    {
        return $this->timestamp;
    }
}
