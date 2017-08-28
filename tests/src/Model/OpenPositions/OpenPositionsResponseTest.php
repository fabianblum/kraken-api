<?php

namespace src\Model\OpenPositions;

use HanischIt\KrakenApi\Call\OpenPositions\OpenPositionsResponse;
use PHPUnit\Framework\TestCase;

class OpenPositionsResponseTest extends TestCase
{
    public function testResponse()
    {
        $data = [];
        for ($i = 0; $i < rand(5, 10); $i++) {
            $data[] = [
                "ordertxid" => uniqid(),
                "pair" => uniqid(),
                "time" => uniqid(),
                "type" => uniqid(),
                "ordertype" => uniqid(),
                "cost" => rand(1000, 99999) / 1000,
                "fee" => rand(1000, 99999) / 1000,
                "vol" => rand(1000, 99999) / 1000,
                "vol_closed" => rand(1000, 99999) / 1000,
                "margin" => rand(1000, 99999) / 1000,
                "value" => rand(1000, 99999) / 1000,
                "net" => rand(1000, 99999) / 1000,
                "misc" => uniqid(),
                "oflags" => uniqid(),
                "viqc" => uniqid(),
            ];
        }

        $openPositionsResponse = new OpenPositionsResponse();
        $openPositionsResponse->manualMapping($data);

        foreach ($openPositionsResponse->getPositions() as $key => $position) {
            self::assertEquals($key, $position->getPositiontxid());
            self::assertEquals($data[$key]["ordertxid"], $position->getOrdertxid());
            self::assertEquals($data[$key]["pair"], $position->getPair());
            self::assertEquals($data[$key]["time"], $position->getTime());
            self::assertEquals($data[$key]["type"], $position->getType());
            self::assertEquals($data[$key]["ordertype"], $position->getOrderType());
            self::assertEquals($data[$key]["cost"], $position->getCost());
            self::assertEquals($data[$key]["fee"], $position->getFee());
            self::assertEquals($data[$key]["vol"], $position->getVol());
            self::assertEquals($data[$key]["vol_closed"], $position->getVolClosed());
            self::assertEquals($data[$key]["margin"], $position->getMargin());
            self::assertEquals($data[$key]["value"], $position->getValue());
            self::assertEquals($data[$key]["net"], $position->getNet());
            self::assertEquals($data[$key]["misc"], $position->getMisc());
            self::assertEquals($data[$key]["oflags"], $position->getOflags());
            self::assertEquals($data[$key]["viqc"], $position->getVisqc());
        }
    }
}
