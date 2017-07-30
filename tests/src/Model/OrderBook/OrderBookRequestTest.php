<?php

namespace src\Model\OrderBook;

use HanischIt\KrakenApi\Enum\VisibilityEnum;
use HanischIt\KrakenApi\Model\OrderBook\OrderBookAbstractRequest;
use HanischIt\KrakenApi\Model\OrderBook\OrderBookResponse;
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

        $orderBookRequest = new OrderBookAbstractRequest($assetPair, $count);
        self::assertEquals($orderBookRequest->getMethod(), 'Depth');
        self::assertEquals($orderBookRequest->getVisibility(), VisibilityEnum::VISIBILITY_PUBLIC);
        self::assertEquals($orderBookRequest->getRequestData(), $arr);
        self::assertEquals($orderBookRequest->getResponseClassName(), OrderBookResponse::class);
    }
}
