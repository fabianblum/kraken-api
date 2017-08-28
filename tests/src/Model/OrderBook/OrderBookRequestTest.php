<?php

namespace src\Model\OrderBook;

use HanischIt\KrakenApi\Call\OrderBook\Model\OrderBookResponse;
use HanischIt\KrakenApi\Enum\VisibilityEnum;
use PHPUnit\Framework\TestCase;

class OrderBookRequestTest extends TestCase
{
    public function testRequest()
    {
        $assetPair = uniqid();
        $count = rand(1, 20);

        $arr = [];
        $arr["pair"] = $assetPair;
        $arr["count"] = $count;

        $orderBookRequest = new \HanischIt\KrakenApi\Call\OrderBook\OrderBookRequest($assetPair, $count);
        self::assertEquals($orderBookRequest->getMethod(), 'Depth');
        self::assertEquals($orderBookRequest->getVisibility(), VisibilityEnum::VISIBILITY_PUBLIC);
        self::assertEquals($orderBookRequest->getRequestData(), $arr);
        self::assertEquals($orderBookRequest->getResponseClassName(), OrderBookResponse::class);
    }
}
