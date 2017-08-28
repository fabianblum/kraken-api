<?php

namespace HanischIt\KrakenApi\Call\CancelOpenOrder;

use HanischIt\KrakenApi\Enum\VisibilityEnum;
use HanischIt\KrakenApi\Model\RequestInterface;

/**
 * Class CancelOpenOrderRequest
 * @package HanischIt\KrakenApi\Call\CancelOpenOrder
 */
class CancelOpenOrderRequest implements RequestInterface
{

    /**
     * @var string
     */
    private $txid;

    /**
     * TradesRequest constructor.
     * @param string $txid
     */
    public function __construct($txid)
    {
        $this->txid = $txid;
    }


    /**
     * Returns the api request name
     *
     * @return string
     */
    public function getMethod()
    {
        return 'CancelOrder';
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
        $ret["txid"] = $this->txid;
        return $ret;
    }

    /**
     * @return string
     */
    public function getResponseClassName()
    {
        return CancelOpenOrderResponse::class;
    }
}
