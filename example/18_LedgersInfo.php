<?php
require_once(__DIR__ . '/../vendor/autoload.php');

try {
    $api = new \HanischIt\KrakenApi\KrakenApi(
        "Your-API-Key",
        "Your-API-Sign"
    );

    $ledgersInfo = $api->getLedgersInfo();

    foreach ($ledgersInfo->getLedgerInfos() as $ledgerInfo) {
        echo $ledgerInfo->getRefid() . ":" . $ledgerInfo->getAsset() . " " . $ledgerInfo->getAmount() . "\n";
    }
} catch (Exception $e) {
    echo $e->getMessage();
}
