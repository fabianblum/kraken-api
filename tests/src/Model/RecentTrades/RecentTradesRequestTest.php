<?php

namespace src\Model\RecentTrades;

use HanischIt\KrakenApi\Enum\VisibilityEnum;
use HanischIt\KrakenApi\Model\RecentTrades\RecentTradesAbstractRequest;
use HanischIt\KrakenApi\Model\RecentTrades\RecentTradesResponse;
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

        $recentTradesRequest = new RecentTradesAbstractRequest($assetPair, $since);
        self::assertEquals($recentTradesRequest->getMethod(), 'Trades');
        self::assertEquals($recentTradesRequest->getVisibility(), VisibilityEnum::VISIBILITY_PUBLIC);
        self::assertEquals($recentTradesRequest->getRequestData(), $arr);
        self::assertEquals($recentTradesRequest->getResponseClassName(), RecentTradesResponse::class);
    }
}
