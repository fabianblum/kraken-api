<?php

namespace src\Model\TradableAssetPairs;

use HanischIt\KrakenApi\Call\TradableAssetPairs\TradableAssetPairsRequest;
use HanischIt\KrakenApi\Enum\VisibilityEnum;
use PHPUnit\Framework\TestCase;

class TradableAssetPairsRequestTest extends TestCase
{
    public function testRequest()
    {
        $info = uniqid();
        $pair = uniqid();

        $arr = [];
        $arr["info"] = $info;
        $arr["pair"] = [$pair];

        $tradableAssetPairs = new TradableAssetPairsRequest($info, [$pair]);
        self::assertEquals($tradableAssetPairs->getMethod(), 'AssetPairs');
        self::assertEquals($tradableAssetPairs->getVisibility(), VisibilityEnum::VISIBILITY_PUBLIC);
        self::assertEquals($tradableAssetPairs->getRequestData(), $arr);
        self::assertEquals($tradableAssetPairs->getResponseClassName(),
            \HanischIt\KrakenApi\Call\TradableAssetPairs\TradableAssetPairsResponse::class);
    }
}
