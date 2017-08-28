<?php

namespace src\Model\TradeBalance;

use HanischIt\KrakenApi\Call\TradeBalance\TradeBalanceResponse;
use PHPUnit\Framework\TestCase;

class TradeBalanceResponseTest extends TestCase
{
    public function testResponse()
    {
        $data = [];
        $data["eb"] = rand(1000, 99999) / 1000;
        $data["tb"] = rand(1000, 99999) / 1000;
        $data["m"] = rand(1000, 99999) / 1000;
        $data["n"] = rand(1000, 99999) / 1000;
        $data["c"] = rand(1000, 99999) / 1000;
        $data["v"] = rand(1000, 99999) / 1000;
        $data["e"] = rand(1000, 99999) / 1000;
        $data["mf"] = rand(1000, 99999) / 1000;

        $tradeBalanceRequest = new TradeBalanceResponse();
        $tradeBalanceRequest->manualMapping($data);

        self::assertEquals($data["eb"], $tradeBalanceRequest->getEquivavlentBalance());
        self::assertEquals($data["tb"], $tradeBalanceRequest->getTradeBalance());
        self::assertEquals($data["m"], $tradeBalanceRequest->getMarginAmount());
        self::assertEquals($data["n"], $tradeBalanceRequest->getUnrealizedNetProfitLoss());
        self::assertEquals($data["c"], $tradeBalanceRequest->getCostBasis());
        self::assertEquals($data["v"], $tradeBalanceRequest->getCurrentFloatingValuation());
        self::assertEquals($data["e"], $tradeBalanceRequest->getEquity());
        self::assertEquals($data["mf"], $tradeBalanceRequest->getFreeMargin());
    }
}
