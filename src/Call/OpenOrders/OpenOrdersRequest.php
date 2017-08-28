<?php

namespace HanischIt\KrakenApi\Call\OpenOrders;

use HanischIt\KrakenApi\Enum\VisibilityEnum;
use HanischIt\KrakenApi\Model\RequestInterface;

/**
 * Class OpenOrdersRequest
 * @package HanischIt\KrakenApi\Call\OpenOrders
 */
class OpenOrdersRequest implements RequestInterface
{
    /**
     * @var bool
     */
    private $trades;
    /**
     * @var string|null
     */
    private $userref;

    /**
     * OrderBookRequest constructor.
     *
     * @param bool $trades
     * @param null $userref
     */
    public function __construct($trades = false, $userref = null)
    {
        $this->trades = $trades;
        $this->userref = $userref;
    }

    /**
     * Returns the api request name
     *
     * @return string
     */
    public function getMethod()
    {
        return 'OpenOrders';
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
        $arr = [];
        $arr["trades"] = $this->trades;
        if (null !== $this->userref) {
            $arr["userref"] = $this->userref;
        }

        return $arr;
    }

    /**
     * @return string
     */
    public function getResponseClassName()
    {
        return OpenOrdersResponse::class;
    }
}
