<?php

namespace src\Model\GetTicker;

use HanischIt\KrakenApi\Call\GetTicker\TickerRequest;
use HanischIt\KrakenApi\Call\GetTicker\TickerResponse;
use HanischIt\KrakenApi\Enum\VisibilityEnum;
use PHPUnit\Framework\TestCase;

class TickerRequestTest extends TestCase
{
    public function testRequest()
    {
        $pairs = [];
        for ($i = 0; $i < rand(5, 10); $i++) {
            $pairs[] = uniqid();
        }
        $tickerRequest = new TickerRequest($pairs);
        self::assertEquals($tickerRequest->getMethod(), 'Ticker');
        self::assertEquals($tickerRequest->getVisibility(), VisibilityEnum::VISIBILITY_PUBLIC);
        self::assertEquals($tickerRequest->getRequestData(), ["pair" => implode(",", $pairs)]);
        self::assertEquals($tickerRequest->getResponseClassName(), TickerResponse::class);
    }
}
