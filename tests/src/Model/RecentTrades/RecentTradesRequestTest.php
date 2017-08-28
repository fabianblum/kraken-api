<?php

namespace src\Model\RecentTrades;

use HanischIt\KrakenApi\Call\RecentTrades\RecentTradesRequest;
use HanischIt\KrakenApi\Call\RecentTrades\RecentTradesResponse;
use HanischIt\KrakenApi\Enum\VisibilityEnum;
use PHPUnit\Framework\TestCase;

class RecentTradesRequestTest extends TestCase
{
    public function testRequest()
    {
        $assetPair = uniqid();
        $since = rand(10000000, 99999999);

        $arr = [];
        $arr["pair"] = $assetPair;
        $arr["since"] = $since;

        $recentTradesRequest = new RecentTradesRequest($assetPair, $since);
        self::assertEquals($recentTradesRequest->getMethod(), 'Trades');
        self::assertEquals($recentTradesRequest->getVisibility(), VisibilityEnum::VISIBILITY_PUBLIC);
        self::assertEquals($recentTradesRequest->getRequestData(), $arr);
        self::assertEquals($recentTradesRequest->getResponseClassName(), RecentTradesResponse::class);
    }
}
