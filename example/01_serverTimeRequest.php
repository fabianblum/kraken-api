<?php
/**
 * @author Fabian Hanisch
 * @since 16.07.2017 02:55
 * @version 1.0
 */

require_once(__DIR__ . '/../vendor/autoload.php');

try {
    $api = new \HanischIt\KrakenApi\KrakenApi("HXrj3snnGpxsw8MpJZitCfeMWYseGPOd6r6aEQ8fpSZVhrKGAGEFJBz8", "vrClJzbEGEzcee7GXWV46swDwgXi7BpnxPDDYxPh/q9i4AR38PQ55Ab51C+yTxLCfQzDK2MKu05DfwEy49tWhg==");

    $serverTimeResponse = $api->getServerTime();

    echo "UnixTime: " . $serverTimeResponse->getUnixTime() . "\n";
    echo "rfc1123: " . $serverTimeResponse->getRfc1123();
} catch (Exception $e) {
    echo $e->getMessage();
}
