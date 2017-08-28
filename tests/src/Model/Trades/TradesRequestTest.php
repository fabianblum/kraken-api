<?php

namespace src\Model\Trades;

use HanischIt\KrakenApi\Call\Trades\TradesRequest;
use HanischIt\KrakenApi\Enum\VisibilityEnum;
use PHPUnit\Framework\TestCase;

class TradesRequestTest extends TestCase
{
    public function testRequest()
    {
        $txid = uniqid();
        $trades = uniqid();

        $data = [];
        $data["txid"] = $txid;
        $data["trades"] = $trades;

        $tradesRequest = new TradesRequest($txid, $trades);
        self::assertEquals($tradesRequest->getMethod(), 'QueryTrades');
        self::assertEquals($tradesRequest->getVisibility(), VisibilityEnum::VISIBILITY_PRIVATE);
        self::assertEquals($tradesRequest->getRequestData(), $data);
        self::assertEquals($tradesRequest->getResponseClassName(),
            \HanischIt\KrakenApi\Call\Trades\TradesResponse::class);
    }
}
