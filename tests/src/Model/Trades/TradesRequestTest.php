<?php

namespace src\Model\Trades;

use HanischIt\KrakenApi\Enum\VisibilityEnum;
use HanischIt\KrakenApi\Model\Trades\TradesRequest;
use HanischIt\KrakenApi\Model\Trades\TradesResponse;
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
        self::assertEquals($tradesRequest->getResponseClassName(), TradesResponse::class);
    }
}
