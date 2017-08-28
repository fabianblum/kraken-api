<?php

namespace src\Model\RecentTrades;

use PHPUnit\Framework\TestCase;

class RecentTradesResponseTest extends TestCase
{
    public function testResponse()
    {
        $data = [];
        $data["last"] = uniqid();

        for ($i = 0; $i < rand(1, 10); $i++) {
            $assetPair = uniqid();
            for ($y = 0; $y < rand(1, 10); $y++) {
                $data[$assetPair][] = [
                    rand(1000, 99999) / 1000,
                    rand(1000, 99999) / 1000,
                    rand(1000, 99999),
                    uniqid(),
                    uniqid(),
                    uniqid()];
            }
        }

        $recentTradesResponse = new \HanischIt\KrakenApi\Call\RecentTrades\RecentTradesResponse();
        $recentTradesResponse->manualMapping($data);

        self::assertEquals($data["last"], $recentTradesResponse->getLast());
        self::assertEquals([], $recentTradesResponse->getTradeModel(uniqid()));

        foreach ($data as $assetPair => $dataArr) {
            if ($assetPair == "last") {
                continue;
            }

            foreach ($recentTradesResponse->getTradeModel($assetPair) as $key => $model) {
                self::assertEquals($data[$assetPair][$key][0], $model->getPrice());
                self::assertEquals($data[$assetPair][$key][1], $model->getVolume());
                self::assertEquals($data[$assetPair][$key][2], $model->getTime());
                self::assertEquals($data[$assetPair][$key][3], $model->getType());
                self::assertEquals($data[$assetPair][$key][4], $model->getTradeType());
                self::assertEquals($data[$assetPair][$key][5], $model->getMisc());
            }
        }
    }
}
