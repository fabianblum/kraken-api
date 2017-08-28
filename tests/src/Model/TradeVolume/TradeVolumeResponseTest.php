<?php

namespace src\Model\TradeVolume;

use PHPUnit\Framework\TestCase;

class TradeVolumeResponseTest extends TestCase
{
    public function testResponse()
    {
        $data = [];
        $data["currency"] = uniqid();
        $data["volume"] = uniqid();
        $data["fees"] = [];
        for ($i = 0; $i < rand(5, 10); $i++) {
            $data["fees"][] = [
                "fee" => rand(1000, 99999) / 1000,
                "minfee" => rand(1000, 99999) / 1000,
                "maxfee" => rand(1000, 99999) / 1000,
                "nextfee" => rand(1000, 99999) / 1000,
                "nextvolume" => rand(1000, 99999) / 1000,
                "tiervolume" => rand(1000, 99999) / 1000
            ];
        }

        $data["fees_maker"] = [];
        for ($i = 0; $i < rand(5, 10); $i++) {
            $data["fees_maker"][] = [
                "fee" => rand(1000, 99999) / 1000,
                "minfee" => rand(1000, 99999) / 1000,
                "maxfee" => rand(1000, 99999) / 1000,
                "nextfee" => rand(1000, 99999) / 1000,
                "nextvolume" => rand(1000, 99999) / 1000,
                "tiervolume" => rand(1000, 99999) / 1000
            ];
        }

        $tradeVolumeResponse = new \HanischIt\KrakenApi\Call\TradeVolume\TradeVolumeResponse();
        $tradeVolumeResponse->manualMapping($data);

        self::assertEquals($data["currency"], $tradeVolumeResponse->getCurrency());
        self::assertEquals($data["volume"], $tradeVolumeResponse->getVolume());

        foreach ($tradeVolumeResponse->getFees() as $key => $fee) {
            self::assertEquals($data["fees"][$key]["fee"], $fee->getFee());
            self::assertEquals($data["fees"][$key]["minfee"], $fee->getMinfee());
            self::assertEquals($data["fees"][$key]["maxfee"], $fee->getMaxfee());
            self::assertEquals($data["fees"][$key]["nextfee"], $fee->getNextfee());
            self::assertEquals($data["fees"][$key]["nextvolume"], $fee->getNextvolume());
            self::assertEquals($data["fees"][$key]["tiervolume"], $fee->getTiervolume());
        }

        foreach ($tradeVolumeResponse->getFeesMaker() as $key => $fee) {
            self::assertEquals($data["fees_maker"][$key]["fee"], $fee->getFee());
            self::assertEquals($data["fees_maker"][$key]["minfee"], $fee->getMinfee());
            self::assertEquals($data["fees_maker"][$key]["maxfee"], $fee->getMaxfee());
            self::assertEquals($data["fees_maker"][$key]["nextfee"], $fee->getNextfee());
            self::assertEquals($data["fees_maker"][$key]["nextvolume"], $fee->getNextvolume());
            self::assertEquals($data["fees_maker"][$key]["tiervolume"], $fee->getTiervolume());
        }
    }
}
