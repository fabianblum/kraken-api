<?php

namespace src\Model\TradeVolume;

use HanischIt\KrakenApi\Enum\VisibilityEnum;
use PHPUnit\Framework\TestCase;

class TradeVolumeRequestTest extends TestCase
{
    public function testRequest()
    {
        $pair = uniqid();
        $feeInfo = uniqid();

        $data = [];
        $data["pair"] = $pair;
        $data["fee-info"] = $feeInfo;

        $tradesRequest = new \HanischIt\KrakenApi\Call\TradeVolume\TradeVolumeRequest($pair, $feeInfo);
        self::assertEquals($tradesRequest->getMethod(), 'TradeVolume');
        self::assertEquals($tradesRequest->getVisibility(), VisibilityEnum::VISIBILITY_PRIVATE);
        self::assertEquals($tradesRequest->getRequestData(), $data);
        self::assertEquals($tradesRequest->getResponseClassName(),
            \HanischIt\KrakenApi\Call\TradeVolume\TradeVolumeResponse::class);
    }
}
