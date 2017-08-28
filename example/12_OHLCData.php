<?php

require_once(__DIR__ . '/../vendor/autoload.php');

try {
    $api = new \HanischIt\KrakenApi\KrakenApi(
        "Your-API-Key",
        "Your-API-Sign"
    );

    $ohlcResponse = $api->getOHLCData('XETHZEUR');

    echo "last: " . date("Y-m-d H:i:s", $ohlcResponse->getLast()) . "\n";

    foreach ($ohlcResponse->getOhlcDataModels() as $ohlcDataModel) {
        echo date("Y-m-d H:i:s",
                $ohlcDataModel->getTime()) . ": High: " . $ohlcDataModel->getHigh() . " / Low: " . $ohlcDataModel->getLow() . "\n";
    }


} catch (Exception $e) {
    echo $e->getMessage();
}
