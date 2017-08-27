<?php
require_once(__DIR__ . '/../vendor/autoload.php');

try {
    $api = new \HanischIt\KrakenApi\KrakenApi(
        "Your-API-Key",
        "Your-API-Sign"
    );

    $tradeVolume = $api->getTradeVolume('paid');

    echo "Currency:" . $tradeVolume->getCurrency() . "\n";
    echo "Volume:" . $tradeVolume->getVolume() . "\n";

} catch (Exception $e) {
    echo $e->getMessage();
}
