<?php
require_once(__DIR__ . '/../vendor/autoload.php');

try {
    $api = new \HanischIt\KrakenApi\KrakenApi(
        "Your-API-Key",
        "Your-API-Sign"
    );

    $openPositions = $api->getOpenPositions('txid');

    foreach ($openPositions->getPositions() as $position) {
        echo $position->getPositiontxid() . ": " . $position->getOrdertxid() . "\n";
    }

} catch (Exception $e) {
    echo $e->getMessage();
}
