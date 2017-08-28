<?php

namespace src\Model\Trades;

use PHPUnit\Framework\TestCase;

class TradesResponseTest extends TestCase
{
    public function testResponse()
    {
        $data = [];
        for ($i = 0; $i < rand(5, 10); $i++) {
            $data[] = ["ordertxid" => uniqid(), "pair" => uniqid(), "time" => uniqid(), "type" => uniqid(), "ordertype" => uniqid(), "price" => rand(1000, 99999) / 1000, "cost" => rand(1000, 99999) / 1000, "fee" => rand(1000, 99999) / 1000, "vol" => rand(1000, 99999) / 1000, "margin" => rand(1000, 99999) / 1000, "misc" => uniqid(), "closing" => uniqid()];
        }

        $tradesHistoryResponse = new \HanischIt\KrakenApi\Call\Trades\TradesResponse();
        $tradesHistoryResponse->manualMapping($data);

        foreach ($tradesHistoryResponse->getTrades() as $key => $trade) {
            self::assertEquals($data[$key]["ordertxid"], $trade->getOrdertxid());
            self::assertEquals($data[$key]["pair"], $trade->getPair());
            self::assertEquals($data[$key]["time"], $trade->getTime());
            self::assertEquals($data[$key]["type"], $trade->getType());
            self::assertEquals($data[$key]["ordertype"], $trade->getOrdertype());
            self::assertEquals($data[$key]["price"], $trade->getPrice());
            self::assertEquals($data[$key]["cost"], $trade->getCost());
            self::assertEquals($data[$key]["fee"], $trade->getFee());
            self::assertEquals($data[$key]["vol"], $trade->getVol());
            self::assertEquals($data[$key]["margin"], $trade->getMargin());
            self::assertEquals($data[$key]["misc"], $trade->getMisc());
            self::assertEquals($data[$key]["closing"], $trade->getClosing());
        }
    }
}
