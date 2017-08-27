<?php

namespace HanischIt\KrakenApi\Model\CancelOpenOrder;

use HanischIt\KrakenApi\Enum\VisibilityEnum;
use HanischIt\KrakenApi\Model\RequestInterface;

/**
 * Class TradesRequest
 * @package HanischIt\KrakenApi\Model\Trades
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
