<?php

namespace HanischIt\KrakenApi\Call\Trades;

use HanischIt\KrakenApi\Call\TradesHistory\Model\TradeModel;
use HanischIt\KrakenApi\Model\ResponseInterface;

/**
 * Class TradesResponse
 * @package HanischIt\KrakenApi\Call\Trades
 */
class TradesResponse implements ResponseInterface
{
    /**
     * @var \HanischIt\KrakenApi\Call\TradesHistory\Model\TradeModel[]
     */
    private $trades;

    /**
     * @param array $result
     */
    public function manualMapping($result)
    {
        foreach ($result as $txId => $trade) {
            if (!isset($trade["closing"])) {
                $trade["closing"] = null;
            }
            
            $this->trades[] = new TradeModel($trade["ordertxid"], $trade["pair"], $trade["time"], $trade["type"],
                $trade["ordertype"], $trade["price"], $trade["cost"], $trade["fee"], $trade["vol"], $trade["margin"],
                $trade["misc"], $trade["closing"]);
        }
    }

    /**
     * @return TradeModel[]
     */
    public function getTrades()
    {
        return $this->trades;
    }


}
