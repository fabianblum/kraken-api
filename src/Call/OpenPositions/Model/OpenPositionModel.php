<?php
/**
 * @author Fabian Hanisch
 * @since: 2017-08-28
 * @version 1.0.0
 */

namespace HanischIt\KrakenApi\Call\OpenPositions\Model;

/**
 * Class OpenPositionModel
 * @package HanischIt\KrakenApi\Call\OpenPositions\Model
 */
class OpenPositionModel
{
    /**
     * @var string
     */
    private $positiontxid;
    /**
     * @var string
     */
    private $ordertxid;
    /**
     * @var string
     */
    private $pair;
    /**
     * @var string
     */
    private $time;
    /**
     * @var string
     */
    private $type;
    /**
     * @var string
     */
    private $orderType;
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
    private $volClosed;
    /**
     * @var float
     */
    private $margin;
    /**
     * @var float
     */
    private $value;
    /**
     * @var float
     */
    private $net;
    /**
     * @var string
     */
    private $misc;
    /**
     * @var string
     */
    private $oflags;
    /**
     * @var string
     */
    private $visqc;

    /**
     * OpenPositionModel constructor.
     * @param string $positiontxid
     * @param string $ordertxid
     * @param string $pair
     * @param string $time
     * @param string $type
     * @param string $orderType
     * @param float $cost
     * @param float $fee
     * @param float $vol
     * @param float $volClosed
     * @param float $margin
     * @param float $value
     * @param float $net
     * @param string $misc
     * @param string $oflags
     * @param string $visqc
     */
    public function __construct(
        $positiontxid,
        $ordertxid,
        $pair,
        $time,
        $type,
        $orderType,
        $cost,
        $fee,
        $vol,
        $volClosed,
        $margin,
        $value,
        $net,
        $misc,
        $oflags,
        $visqc
    ) {
        $this->ordertxid = $ordertxid;
        $this->pair = $pair;
        $this->time = $time;
        $this->type = $type;
        $this->orderType = $orderType;
        $this->cost = $cost;
        $this->fee = $fee;
        $this->vol = $vol;
        $this->volClosed = $volClosed;
        $this->margin = $margin;
        $this->value = $value;
        $this->net = $net;
        $this->misc = $misc;
        $this->oflags = $oflags;
        $this->visqc = $visqc;
        $this->positiontxid = $positiontxid;
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
     * @return string
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
    public function getOrderType()
    {
        return $this->orderType;
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
    public function getVolClosed()
    {
        return $this->volClosed;
    }

    /**
     * @return float
     */
    public function getMargin()
    {
        return $this->margin;
    }

    /**
     * @return float
     */
    public function getValue()
    {
        return $this->value;
    }

    /**
     * @return float
     */
    public function getNet()
    {
        return $this->net;
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
    public function getOflags()
    {
        return $this->oflags;
    }

    /**
     * @return string
     */
    public function getVisqc()
    {
        return $this->visqc;
    }

    /**
     * @return string
     */
    public function getPositiontxid()
    {
        return $this->positiontxid;
    }


}