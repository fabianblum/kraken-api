<?php
require_once(__DIR__ . '/../vendor/autoload.php');

try {
    $api = new \HanischIt\KrakenApi\KrakenApi(
        "Your-API-Key",
        "Your-API-Sign"
    );

    $countOrder = $api->cancelOrder('txid');

    echo "Count cancelled: " . $countOrder->getCount() . "\n";

} catch (Exception $e) {
    echo $e->getMessage();
}
