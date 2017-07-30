<?php

namespace src\Model\GetTicker;

use HanischIt\KrakenApi\Enum\VisibilityEnum;
use HanischIt\KrakenApi\Model\GetTicker\TickerAbstractRequest;
use HanischIt\KrakenApi\Model\GetTicker\TickerResponse;
use PHPUnit\Framework\TestCase;

class TickerRequestTest extends TestCase
{
    public function testRequest()
    {
        $pairs = [];
        for ($i = 0; $i < rand(5, 10); $i++) {
            $pairs[] = uniqid();
        }
        $tickerRequest = new TickerAbstractRequest($pairs);
        self::assertEquals($tickerRequest->getMethod(), 'Ticker');
        self::assertEquals($tickerRequest->getVisibility(), VisibilityEnum::VISIBILITY_PUBLIC);
        self::assertEquals($tickerRequest->getRequestData(), ["pair" => implode(",", $pairs)]);
        self::assertEquals($tickerRequest->getResponseClassName(), TickerResponse::class);
    }
}
