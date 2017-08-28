<?php

namespace src\Model\OHLCData;

use HanischIt\KrakenApi\Call\OHLCData\OHLCDataResponse;
use PHPUnit\Framework\TestCase;

class OHLCDataResponseTest extends TestCase
{
    public function testResponse()
    {
        $assetName = uniqid();
        $data = [];
        $data["last"] = rand(1000000, 99999999);
        for ($i = 0; $i < rand(2, 10); $i++) {
            $data[$assetName][] = [
                rand(1000, 999999) / 1000,
                rand(1000, 999999) / 1000,
                rand(1000, 999999) / 1000,
                rand(1000, 999999) / 1000,
                rand(1000, 999999) / 1000,
                rand(1000, 999999) / 1000,
                rand(1000, 999999) / 1000,
                rand(1, 100)];
        }
        $ohlcDataRequest = new OHLCDataResponse();
        $ohlcDataRequest->manualMapping($data);

        self::assertEquals($data["last"], $ohlcDataRequest->getLast());
        $models = $ohlcDataRequest->getOhlcDataModels();
        foreach ($data[$assetName] as $key => $dataArr) {
            self::assertEquals($dataArr[0], $models[$key]->getTime());
            self::assertEquals($dataArr[1], $models[$key]->getOpen());
            self::assertEquals($dataArr[2], $models[$key]->getHigh());
            self::assertEquals($dataArr[3], $models[$key]->getLow());
            self::assertEquals($dataArr[4], $models[$key]->getClose());
            self::assertEquals($dataArr[5], $models[$key]->getVwap());
            self::assertEquals($dataArr[6], $models[$key]->getVolume());
            self::assertEquals($dataArr[7], $models[$key]->getCount());
        }
    }
}
