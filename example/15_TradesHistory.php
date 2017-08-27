<?php
require_once(__DIR__ . '/../vendor/autoload.php');

try {
    $api = new \HanischIt\KrakenApi\KrakenApi(
        "Your-API-Key",
        "Your-API-Sign"
    );

    $tradesHistory = $api->getTradesHistory();

    echo "Coun trades: " . $tradesHistory->getCount();

    foreach ($tradesHistory->getTrades() as $trade) {
        echo "Order: " . $trade->getOrdertxid() . "\n";
    }

} catch (Exception $e) {
    echo $e->getMessage();
}
