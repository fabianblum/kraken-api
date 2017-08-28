<?php

namespace HanischIt\KrakenApi\Call\Shared\Model;

/**
 * Class OrderTypeModel
 * @package HanischIt\KrakenApi\Call\Shared\Model
 */
class OrderTypeModel
{
    /**
     * @var string
     */
    private $leverage;
    /**
     * @var string
     */
    private $order;
    /**
     * @var string
     */
    private $ordertype;
    /**
     * @var string
     */
    private $pair;
    /**
     * @var float
     */
    private $price;
    /**
     * @var float
     */
    private $price2;
    /**
     * @var string
     */
    private $type;

    /**
     * OpenOrderOrderTypeModel constructor.
     *
     * @param string $leverage
     * @param string $order
     * @param string $ordertype
     * @param string $pair
     * @param float $price
     * @param float $price2
     * @param string $type
     */
    public function __construct($leverage, $order, $ordertype, $pair, $price, $price2, $type)
    {
        $this->leverage = $leverage;
        $this->order = $order;
        $this->ordertype = $ordertype;
        $this->pair = $pair;
        $this->price = $price;
        $this->price2 = $price2;
        $this->type = $type;
    }

    /**
     * @return string
     */
    public function getLeverage()
    {
        return $this->leverage;
    }

    /**
     * @return string
     */
    public function getOrder()
    {
        return $this->order;
    }

    /**
     * @return string
     */
    public function getOrdertype()
    {
        return $this->ordertype;
    }

    /**
     * @return string
     */
    public function getPair()
    {
        return $this->pair;
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
    public function getPrice2()
    {
        return $this->price2;
    }

    /**
     * @return string
     */
    public function getType()
    {
        return $this->type;
    }
}
