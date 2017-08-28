<?php

namespace src\Model\TradeBalance;

use HanischIt\KrakenApi\Call\TradesHistory\TradesHistoryRequest;
use HanischIt\KrakenApi\Call\TradesHistory\TradesHistoryResponse;
use HanischIt\KrakenApi\Enum\VisibilityEnum;
use PHPUnit\Framework\TestCase;

class TradesHistoryRequestTest extends TestCase
{
    public function testRequest()
    {
        $type = uniqid();
        $trades = uniqid();
        $start = uniqid();
        $end = uniqid();
        $ofs = uniqid();

        $data = [];
        $data["type"] = $type;
        $data["trades"] = $trades;
        $data["start"] = $start;
        $data["end"] = $end;
        $data["ofs"] = $ofs;

        $tradesHistoryRequest = new TradesHistoryRequest($type, $trades, $start, $end, $ofs);
        self::assertEquals($tradesHistoryRequest->getMethod(), 'TradesHistory');
        self::assertEquals($tradesHistoryRequest->getVisibility(), VisibilityEnum::VISIBILITY_PRIVATE);
        self::assertEquals($tradesHistoryRequest->getRequestData(), $data);
        self::assertEquals($tradesHistoryRequest->getResponseClassName(), TradesHistoryResponse::class);
    }
}
