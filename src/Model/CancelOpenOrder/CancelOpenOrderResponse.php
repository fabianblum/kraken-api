<?php

namespace HanischIt\KrakenApi\Model\CancelOpenOrder;

use HanischIt\KrakenApi\Model\ResponseInterface;

/**
 * Class TradesResponse
 * @package HanischIt\KrakenApi\Model\Trades
 */
class CancelOpenOrderResponse implements ResponseInterface
{
    /**
     * @var int
     */
    private $count;

    /**
     * @var string
     */
    private $pending;

    /**
     * @param array $result
     */
    public function manualMapping($result)
    {
        $this->count = $result["count"];
        $this->pending = $result["pending"];
    }

    /**
     * @return int
     */
    public function getCount()
    {
        return $this->count;
    }

    /**
     * @return string
     */
    public function getPending()
    {
        return $this->pending;
    }


}
