<?php
/**
 * @author  Fabian Hanisch
 * @since   16.07.2017 18:24
 * @version 1.0
 */

namespace HanischIt\KrakenApi\Call\AddOrder;

use HanischIt\KrakenApi\Enum\VisibilityEnum;
use HanischIt\KrakenApi\Model\RequestInterface;

/**
 * Class AddOrderRequest
 * @package HanischIt\KrakenApi\Call\AddOrder
 */
class AddOrderRequest implements RequestInterface
{
    /**
     * @var string
     */
    private $pair;
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
    private $price;
    /**
     * @var float
     */
    private $volume;
    /**
     * @var bool
     */
    private $validateOnly;

    /**
     * AddOrderRequest constructor.
     *
     * @param string $pair
     * @param string $type
     * @param string $orderType
     * @param float $price
     * @param float $volume
     * @param bool $validateOnly
     */
    public function __construct($pair, $type, $orderType, $price, $volume, $validateOnly = false)
    {
        $this->pair = $pair;
        $this->type = $type;
        $this->orderType = $orderType;
        $this->price = $price;
        $this->volume = $volume;
        $this->validateOnly = $validateOnly;
    }


    /**
     * Returns the api request name
     *
     * @return string
     */
    public function getMethod()
    {
        return 'AddOrder';
    }

    /**
     * @return string
     */
    public function getVisibility()
    {
        return VisibilityEnum::VISIBILITY_PRIVATE;
    }

    /**
     * @return array
     */
    public function getRequestData()
    {
        $ret = [];
        $ret["pair"] = $this->pair;
        $ret["type"] = $this->type;
        $ret["ordertype"] = $this->orderType;
        if ($this->price) {
            $ret["price"] = $this->price;
        }
        if ($this->volume) {
            $ret["volume"] = $this->volume;
        }
        if (false !== $this->validateOnly) {
            $ret["validate"] = $this->validateOnly;
        }

        return $ret;
    }

    /**
     * @return string
     */
    public function getResponseClassName()
    {
        return AddOrderResponse::class;
    }
}
