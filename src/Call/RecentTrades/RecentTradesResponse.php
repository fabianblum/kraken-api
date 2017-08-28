<?php

namespace HanischIt\KrakenApi\Call\RecentTrades;

use HanischIt\KrakenApi\Call\RecentTrades\Model\RecentTradeModel;
use HanischIt\KrakenApi\Model\ResponseInterface;

/**
 * Class RecentTradesResponse
 * @package HanischIt\KrakenApi\Call\RecentTrades
 */
class RecentTradesResponse implements ResponseInterface
{
    /**
     * @var RecentTradeModel[][]
     */
    private $tradeModel = [];
    /**
     * @var int
     */
    private $last;

    /**
     * @param $result
     */
    public function manualMapping($result)
    {
        $this->last = $result["last"];
        foreach ($result as $assetName => $trades) {
            if ($assetName == "last") {
                continue;
            }
            foreach ($trades as $trade) {
                $this->tradeModel[$assetName][] = new RecentTradeModel($trade[0], $trade[1], $trade[2], $trade[3],
                    $trade[4], $trade[5]);
            }
        }
    }

    /**
     * @param string $assetPair
     *
     * @return RecentTradeModel[]
     */
    public function getTradeModel($assetPair)
    {
        if (!isset($this->tradeModel[$assetPair])) {
            return [];
        }

        return $this->tradeModel[$assetPair];
    }

    /**
     * @return int
     */
    public function getLast()
    {
        return $this->last;
    }
}
