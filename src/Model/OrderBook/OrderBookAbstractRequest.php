<?php

namespace HanischIt\KrakenApi\Model\OrderBook;

use HanischIt\KrakenApi\Enum\VisibilityEnum;
use HanischIt\KrakenApi\Model\AbstractRequest;

/**
 * Class OrderBookAbstractRequest
 *
 * @package HanischIt\KrakenApi\Model\OrderBook
 */
class OrderBookAbstractRequest extends AbstractRequest
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
     * OrderBookAbstractRequest constructor.
     * @param $assetPair
     * @param null $count
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
