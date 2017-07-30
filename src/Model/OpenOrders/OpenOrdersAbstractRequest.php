<?php

namespace HanischIt\KrakenApi\Model\OpenOrders;

use HanischIt\KrakenApi\Enum\VisibilityEnum;
use HanischIt\KrakenApi\Model\AbstractRequest;

/**
 * Class OpenOrdersAbstractRequest
 *
 * @package HanischIt\KrakenApi\Model\OpenOrders
 */
class OpenOrdersAbstractRequest extends AbstractRequest
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
     * OrderBookAbstractRequest constructor.
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
