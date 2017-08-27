<?php

namespace HanischIt\KrakenApi\Model\TradesHistory;

use HanischIt\KrakenApi\Model\ResponseInterface;

/**
 * Class TradesHistoryResponse
 * @package HanischIt\KrakenApi\Model\TradesHistory
 */
class TradesHistoryResponse implements ResponseInterface
{
    /**
     * @var int
     */
    private $count;

    /**
     * @var Trade[]
     */
    private $trades;

    /**
     * @param array $result
     */
    public function manualMapping($result)
    {
        $this->count = $result["count"];
        foreach ($result["trades"] as $trade) {
            $this->trades[] = new Trade($trade["ordertxid"], $trade["pair"], $trade["time"], $trade["type"], $trade["ordertype"], $trade["price"], $trade["cost"], $trade["fee"], $trade["vol"], $trade["margin"], $trade["misc"], $trade["closing"]);
        }
    }

    /**
     * @return int
     */
    public function getCount()
    {
        return $this->count;
    }

    /**
     * @return Trade[]
     */
    public function getTrades()
    {
        return $this->trades;
    }


}
