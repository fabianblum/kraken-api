<?php

namespace src\Model\OHLCData;

use HanischIt\KrakenApi\Enum\VisibilityEnum;
use HanischIt\KrakenApi\Model\OHLCData\OHLCDataRequest;
use HanischIt\KrakenApi\Model\OHLCData\OHLCDataResponse;
use PHPUnit\Framework\TestCase;

class OHLCDataRequestTest extends TestCase
{
    public function testRequest()
    {
        $pair = uniqid();
        $interval = rand(10000, 99999);
        $since = rand(1000000, 99999999);

        $data = [];
        $data["pair"] = $pair;
        $data["interval"] = $interval;
        $data["since"] = $since;

        $ohlcdRequest = new OHLCDataRequest($pair, $interval, $since);
        self::assertEquals($ohlcdRequest->getMethod(), 'OHLC');
        self::assertEquals($ohlcdRequest->getVisibility(), VisibilityEnum::VISIBILITY_PUBLIC);
        self::assertEquals($ohlcdRequest->getRequestData(), $data);
        self::assertEquals($ohlcdRequest->getResponseClassName(), OHLCDataResponse::class);
    }
}
