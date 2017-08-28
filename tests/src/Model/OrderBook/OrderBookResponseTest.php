<?php

namespace src\Model\OrderBook;

use HanischIt\KrakenApi\Call\OrderBook\Model\OrderBookResponse;
use PHPUnit\Framework\TestCase;

class OrderBookResponseTest extends TestCase
{
    public function testResponse()
    {
        $data = [];
        $assetName = uniqid();
        $data[$assetName] = [];
        $data[$assetName]["asks"] = [];
        $data[$assetName]["bids"] = [];

        for ($y = 0; $y < rand(1, 20); $y++) {
            $data[$assetName]["asks"][] = [rand(1000, 99999) / 1000, rand(1000, 99999) / 1000, rand(10000, 999999)];
            $data[$assetName]["bids"][] = [rand(1000, 99999) / 1000, rand(1000, 99999) / 1000, rand(10000, 999999)];
        }

        $orderBookResponse = new OrderBookResponse();
        $orderBookResponse->manualMapping($data);

        self::assertEquals($assetName, $orderBookResponse->getAssetPair());

        foreach ($orderBookResponse->getAsks() as $key => $ask) {
            self::assertEquals($data[$assetName]["asks"][$key][0], $ask->getPrice());
            self::assertEquals($data[$assetName]["asks"][$key][1], $ask->getVolume());
            self::assertEquals($data[$assetName]["asks"][$key][2], $ask->getTimestamp());
        }

        foreach ($orderBookResponse->getBids() as $key => $bid) {
            self::assertEquals($data[$assetName]["bids"][$key][0], $bid->getPrice());
            self::assertEquals($data[$assetName]["bids"][$key][1], $bid->getVolume());
            self::assertEquals($data[$assetName]["bids"][$key][2], $bid->getTimestamp());
        }
    }
}
