<?php

namespace src\Model\TradeBalance;

use HanischIt\KrakenApi\Call\TradesHistory\TradesHistoryResponse;
use PHPUnit\Framework\TestCase;

class TradesHistoryResponseTest extends TestCase
{
    public function testResponse()
    {
        $data = [];
        $data["count"] = rand(1000, 99999) / 1000;
        $data["trades"] = [];
        for ($i = 0; $i < rand(5, 10); $i++) {
            $data["trades"][] = ["ordertxid" => uniqid(), "pair" => uniqid(), "time" => uniqid(), "type" => uniqid(), "ordertype" => uniqid(), "price" => rand(1000, 99999) / 1000, "cost" => rand(1000, 99999) / 1000, "fee" => rand(1000, 99999) / 1000, "vol" => rand(1000, 99999) / 1000, "margin" => rand(1000, 99999) / 1000, "misc" => uniqid(), "closing" => uniqid()];
        }

        $tradesHistoryResponse = new TradesHistoryResponse();
        $tradesHistoryResponse->manualMapping($data);

        self::assertEquals($data["count"], $tradesHistoryResponse->getCount());

        foreach ($tradesHistoryResponse->getTrades() as $key => $trade) {
            self::assertEquals($data["trades"][$key]["ordertxid"], $trade->getOrdertxid());
            self::assertEquals($data["trades"][$key]["pair"], $trade->getPair());
            self::assertEquals($data["trades"][$key]["time"], $trade->getTime());
            self::assertEquals($data["trades"][$key]["type"], $trade->getType());
            self::assertEquals($data["trades"][$key]["ordertype"], $trade->getOrdertype());
            self::assertEquals($data["trades"][$key]["price"], $trade->getPrice());
            self::assertEquals($data["trades"][$key]["cost"], $trade->getCost());
            self::assertEquals($data["trades"][$key]["fee"], $trade->getFee());
            self::assertEquals($data["trades"][$key]["vol"], $trade->getVol());
            self::assertEquals($data["trades"][$key]["margin"], $trade->getMargin());
            self::assertEquals($data["trades"][$key]["misc"], $trade->getMisc());
            self::assertEquals($data["trades"][$key]["closing"], $trade->getClosing());
        }
    }
}
