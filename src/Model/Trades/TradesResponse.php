<?php

namespace HanischIt\KrakenApi\Model\Trades;

use HanischIt\KrakenApi\Model\ResponseInterface;
use HanischIt\KrakenApi\Model\TradesHistory\Trade;

/**
 * Class TradesResponse
 * @package HanischIt\KrakenApi\Model\Trades
 */
class TradesResponse implements ResponseInterface
{
    /**
     * @var Trade[]
     */
    private $trades;

    /**
     * @param array $result
     */
    public function manualMapping($result)
    {
        foreach ($result as $txId => $trade) {
            $this->trades[] = new Trade($trade["ordertxid"], $trade["pair"], $trade["time"], $trade["type"], $trade["ordertype"], $trade["price"], $trade["cost"], $trade["fee"], $trade["vol"], $trade["margin"], $trade["misc"], $trade["closing"]);
        }
    }

    /**
     * @return Trade[]
     */
    public function getTrades()
    {
        return $this->trades;
    }


}
