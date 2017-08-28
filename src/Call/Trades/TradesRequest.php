<?php

namespace HanischIt\KrakenApi\Call\Trades;

use HanischIt\KrakenApi\Enum\VisibilityEnum;
use HanischIt\KrakenApi\Model\RequestInterface;

/**
 * Class TradesRequest
 * @package HanischIt\KrakenApi\Call\Trades
 */
class TradesRequest implements RequestInterface
{

    /**
     * @var string
     */
    private $txid;
    /**
     * @var bool
     */
    private $trades = false;

    /**
     * TradesRequest constructor.
     * @param string $txid
     * @param bool $trades
     */
    public function __construct($txid, $trades = false)
    {
        $this->txid = $txid;
        $this->trades = $trades;
    }


    /**
     * Returns the api request name
     *
     * @return string
     */
    public function getMethod()
    {
        return 'QueryTrades';
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
        $ret["trades"] = $this->trades;
        return $ret;
    }

    /**
     * @return string
     */
    public function getResponseClassName()
    {
        return TradesResponse::class;
    }
}
