<?php

namespace src\Model\GetTicker;

use HanischIt\KrakenApi\Call\GetTicker\TickerResponse;
use PHPUnit\Framework\TestCase;

class TickerResponseTest extends TestCase
{
    public function testResponse()
    {
        $data = [];
        for ($i = 0; $i < rand(5, 15); $i++) {
            $data[uniqid()] = [
                "a" => [rand(1000, 9999) / 1000, rand(1000, 9999) / 1000, rand(1000, 9999) / 1000],
                "b" => [rand(1000, 9999) / 1000, rand(1000, 9999) / 1000, rand(1000, 9999) / 1000],
                "c" => [rand(1000, 9999) / 1000, rand(1000, 9999) / 1000],
                "v" => [rand(1000, 9999) / 1000, rand(1000, 9999) / 1000],
                "p" => [rand(1000, 9999) / 1000, rand(1000, 9999) / 1000],
                "t" => [rand(1000, 9999) / 1000, rand(1000, 9999) / 1000],
                "l" => [rand(1000, 9999) / 1000, rand(1000, 9999) / 1000],
                "h" => [rand(1000, 9999) / 1000, rand(1000, 9999) / 1000],
                "o" => rand(1000, 9999) / 1000];
        }

        $tickerResponse = new TickerResponse();
        $tickerResponse->manualMapping($data);

        foreach ($data as $assetName => $dataArr) {
            $ask = $tickerResponse->getAsk($assetName);
            self::assertEquals($dataArr["a"][0], $ask->getPrice());
            self::assertEquals($dataArr["a"][1], $ask->getWholeLotVolume());
            self::assertEquals($dataArr["a"][2], $ask->getLotVolume());

            $bid = $tickerResponse->getBid($assetName);
            self::assertEquals($dataArr["b"][0], $bid->getPrice());
            self::assertEquals($dataArr["b"][1], $bid->getWholeLotVolume());
            self::assertEquals($dataArr["b"][2], $bid->getLotVolume());

            $volume = $tickerResponse->getVolume($assetName);
            self::assertEquals($dataArr["v"][0], $volume->getToday());
            self::assertEquals($dataArr["v"][1], $volume->getLast24());

            $volume = $tickerResponse->getVolumeWeightedAverage($assetName);
            self::assertEquals($dataArr["p"][0], $volume->getToday());
            self::assertEquals($dataArr["p"][1], $volume->getLast24());

            $volume = $tickerResponse->getNumberOfTrades($assetName);
            self::assertEquals($dataArr["t"][0], $volume->getToday());
            self::assertEquals($dataArr["t"][1], $volume->getLast24());

            $volume = $tickerResponse->getLow($assetName);
            self::assertEquals($dataArr["l"][0], $volume->getToday());
            self::assertEquals($dataArr["l"][1], $volume->getLast24());

            $volume = $tickerResponse->getHigh($assetName);
            self::assertEquals($dataArr["h"][0], $volume->getToday());
            self::assertEquals($dataArr["h"][1], $volume->getLast24());

            self::assertEquals($dataArr["o"], $tickerResponse->getTodaysOpeningPrice($assetName));

            $lastTradeClosed = $tickerResponse->getLastTradeClosed($assetName);
            self::assertEquals($dataArr["c"][0], $lastTradeClosed->getPrice());
            self::assertEquals($dataArr["c"][1], $lastTradeClosed->getVolume());

        }
    }

    /**
     * @expectedException \Exception
     */
    public function testResponseException()
    {
        $data = [];
        for ($i = 0; $i < 1; $i++) {
            $data[uniqid()] = [
                "a" => [rand(1000, 9999) / 1000, rand(1000, 9999) / 1000, rand(1000, 9999) / 1000],
                "b" => [rand(1000, 9999) / 1000, rand(1000, 9999) / 1000, rand(1000, 9999) / 1000],
                "c" => [rand(1000, 9999) / 1000, rand(1000, 9999) / 1000],
                "v" => [rand(1000, 9999) / 1000, rand(1000, 9999) / 1000],
                "p" => [rand(1000, 9999) / 1000, rand(1000, 9999) / 1000],
                "t" => [rand(1000, 9999) / 1000, rand(1000, 9999) / 1000],
                "l" => [rand(1000, 9999) / 1000, rand(1000, 9999) / 1000],
                "h" => [rand(1000, 9999) / 1000, rand(1000, 9999) / 1000],
                "o" => rand(1000, 9999) / 1000];
        }

        $tickerResponse = new TickerResponse();
        $tickerResponse->manualMapping($data);

        $tickerResponse->getHigh(uniqid());
    }
}
