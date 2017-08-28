<?php
/**
 * @author  Fabian Hanisch
 * @since   16.07.2017 02:55
 * @version 1.0
 */
require_once(__DIR__ . '/../vendor/autoload.php');

try {
    $api = new \HanischIt\KrakenApi\KrakenApi(
        "Your-API-Key",
        "Your-API-Sign"
    );

    $tradableAssetPairResponse = $api->getSpreadData('XETHZEUR');

    echo "Last: " . date("Y-m-d H:i:s", $tradableAssetPairResponse->getLast()) . " \n";

    foreach ($tradableAssetPairResponse->getSpreads() as $spread) {
        echo date("Y-m-d H:i:s",
                $spread->getTime()) . " / Ask: " . $spread->getAsk() . " / Bid: " . $spread->getBid() . "\n";
    }
} catch (Exception $e) {
    echo $e->getMessage();
}
