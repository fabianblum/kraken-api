<?php

namespace src\Model\SpreadData;

use HanischIt\KrakenApi\Call\SpreadData\SpreadDataResponse;
use PHPUnit\Framework\TestCase;

class SpreadDataResponseTest extends TestCase
{
    public function testResponse()
    {
        $data = [];
        $data["last"] = uniqid();

        $assetPair = uniqid();
        for ($y = 0; $y < rand(1, 10); $y++) {
            $data[$assetPair][] = [
                rand(1000000, 99999999),
                rand(1000, 99999) / 1000,
                rand(1000, 99999) / 1000
            ];
        }

        $recentTradesResponse = new SpreadDataResponse();
        $recentTradesResponse->manualMapping($data);

        self::assertEquals($data["last"], $recentTradesResponse->getLast());


        foreach ($recentTradesResponse->getSpreads() as $key => $model) {
            self::assertEquals($data[$assetPair][$key][0], $model->getTime());
            self::assertEquals($data[$assetPair][$key][1], $model->getBid());
            self::assertEquals($data[$assetPair][$key][2], $model->getAsk());
        }
    }
}
