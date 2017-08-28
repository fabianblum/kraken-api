<?php

namespace HanischIt\KrakenApi\Call\TradesHistory;

use HanischIt\KrakenApi\Call\TradesHistory\Model\TradeModel;
use HanischIt\KrakenApi\Model\ResponseInterface;

/**
 * Class TradesHistoryResponse
 * @package HanischIt\KrakenApi\Call\TradesHistory
 */
class TradesHistoryResponse implements ResponseInterface
{
    /**
     * @var int
     */
    private $count;

    /**
     * @var TradeModel[]
     */
    private $trades;

    /**
     * @param array $result
     */
    public function manualMapping($result)
    {
        $this->count = $result["count"];
        foreach ($result["trades"] as $trade) {
            if (!isset($trade["closing"])) {
                $trade["closing"] = null;
            }
            $this->trades[] = new TradeModel($trade["ordertxid"], $trade["pair"], $trade["time"], $trade["type"],
                $trade["ordertype"], $trade["price"], $trade["cost"], $trade["fee"], $trade["vol"], $trade["margin"],
                $trade["misc"], $trade["closing"]);
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
     * @return TradeModel[]
     */
    public function getTrades()
    {
        return $this->trades;
    }


}
