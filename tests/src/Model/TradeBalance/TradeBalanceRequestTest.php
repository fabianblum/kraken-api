<?php

namespace src\Model\TradeBalance;

use HanischIt\KrakenApi\Enum\VisibilityEnum;
use HanischIt\KrakenApi\Model\TradeBalance\TradeBalanceRequest;
use HanischIt\KrakenApi\Model\TradeBalance\TradeBalanceResponse;
use PHPUnit\Framework\TestCase;

class TradeBalanceRequestTest extends TestCase
{
    public function testRequest()
    {
        $aclass = uniqid();
        $asset = uniqid();

        $data = [];
        $data["aclass"] = $aclass;
        $data["asset"] = $asset;

        $ohlcdRequest = new TradeBalanceRequest($aclass, $asset);
        self::assertEquals($ohlcdRequest->getMethod(), 'TradeBalance');
        self::assertEquals($ohlcdRequest->getVisibility(), VisibilityEnum::VISIBILITY_PRIVATE);
        self::assertEquals($ohlcdRequest->getRequestData(), $data);
        self::assertEquals($ohlcdRequest->getResponseClassName(), TradeBalanceResponse::class);
    }
}
