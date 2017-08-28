<?php

namespace src\Model\SpreadData;

use HanischIt\KrakenApi\Call\SpreadData\SpreadDataRequest;
use HanischIt\KrakenApi\Call\SpreadData\SpreadDataResponse;
use HanischIt\KrakenApi\Enum\VisibilityEnum;
use PHPUnit\Framework\TestCase;

class SpreadDataRequestTest extends TestCase
{
    public function testRequest()
    {
        $assetPair = uniqid();
        $since = rand(1000000, 999999999);

        $arr = [];
        $arr["pair"] = $assetPair;
        $arr["since"] = $since;

        $spreadDataRequest = new SpreadDataRequest($assetPair, $since);
        self::assertEquals($spreadDataRequest->getMethod(), 'Spread');
        self::assertEquals($spreadDataRequest->getVisibility(), VisibilityEnum::VISIBILITY_PUBLIC);
        self::assertEquals($spreadDataRequest->getRequestData(), $arr);
        self::assertEquals($spreadDataRequest->getResponseClassName(), SpreadDataResponse::class);
    }
}
