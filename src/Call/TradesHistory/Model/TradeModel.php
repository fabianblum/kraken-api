<?php
/**
 * Created by PhpStorm.
 * User: fabia
 * Date: 27.08.2017
 * Time: 19:32
 */

namespace HanischIt\KrakenApi\Call\TradesHistory\Model;

/**
 * Class TradeModel
 * @package HanischIt\KrakenApi\Call\TradesHistory\Model
 */
class TradeModel
{
    /**
     * @var string
     */
    private $ordertxid;
    /**
     * @var string
     */
    private $pair;
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
    private $ordertype;
    /**
     * @var float
     */
    private $price;
    /**
     * @var float
     */
    private $cost;
    /**
     * @var float
     */
    private $fee;
    /**
     * @var float
     */
    private $vol;
    /**
     * @var float
     */
    private $margin;
    /**
     * @var string
     */
    private $misc;
    /**
     * @var string
     */
    private $closing;

    /**
     * Trade constructor.
     * @param string $ordertxid
     * @param string $pair
     * @param int $time
     * @param string $type
     * @param string $ordertype
     * @param float $price
     * @param float $cost
     * @param float $fee
     * @param float $vol
     * @param float $margin
     * @param string $misc
     * @param string $closing
     */
    public function __construct(
        $ordertxid,
        $pair,
        $time,
        $type,
        $ordertype,
        $price,
        $cost,
        $fee,
        $vol,
        $margin,
        $misc,
        $closing
    ) {
        $this->ordertxid = $ordertxid;
        $this->pair = $pair;
        $this->time = $time;
        $this->type = $type;
        $this->ordertype = $ordertype;
        $this->price = $price;
        $this->cost = $cost;
        $this->fee = $fee;
        $this->vol = $vol;
        $this->margin = $margin;
        $this->misc = $misc;
        $this->closing = $closing;
    }


    /**
     * @return string
     */
    public function getOrdertxid()
    {
        return $this->ordertxid;
    }

    /**
     * @return string
     */
    public function getPair()
    {
        return $this->pair;
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
    public function getOrdertype()
    {
        return $this->ordertype;
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
    public function getCost()
    {
        return $this->cost;
    }

    /**
     * @return float
     */
    public function getFee()
    {
        return $this->fee;
    }

    /**
     * @return float
     */
    public function getVol()
    {
        return $this->vol;
    }

    /**
     * @return float
     */
    public function getMargin()
    {
        return $this->margin;
    }

    /**
     * @return string
     */
    public function getMisc()
    {
        return $this->misc;
    }

    /**
     * @return string
     */
    public function getClosing()
    {
        return $this->closing;
    }
}
