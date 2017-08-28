<?php

namespace HanischIt\KrakenApi\Call\OrderBook;

use HanischIt\KrakenApi\Call\OrderBook\Model\OrderBookResponse;
use HanischIt\KrakenApi\Enum\VisibilityEnum;
use HanischIt\KrakenApi\Model\RequestInterface;

/**
 * Class OrderBookRequest
 * @package HanischIt\KrakenApi\Call\OrderBook
 */
class OrderBookRequest implements RequestInterface
{
    /**
     * @var
     */
    private $assetPair;
    /**
     * @var null
     */
    private $count;

    /**
     * OrderBookRequest constructor.
     * @param $assetPair
     * @param null|int $count
     */
    public function __construct($assetPair, $count = null)
    {
        $this->assetPair = $assetPair;
        $this->count = $count;
    }

    /**
     * Returns the api request name
     *
     * @return string
     */
    public function getMethod()
    {
        return 'Depth';
    }

    /**
     * @return string
     */
    public function getVisibility()
    {
        return VisibilityEnum::VISIBILITY_PUBLIC;
    }

    /**
     * @return array
     */
    public function getRequestData()
    {
        $arr = [];
        $arr["pair"] = $this->assetPair;
        if ($this->count) {
            $arr["count"] = $this->count;
        }
        return $arr;
    }

    /**
     * @return string
     */
    public function getResponseClassName()
    {
        return OrderBookResponse::class;
    }
}
