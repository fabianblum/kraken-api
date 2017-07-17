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

    $tickerResponse = $api->getTicker(["XETHZEUR"]);

    echo "Todays-Opening-Price: " . $tickerResponse->getTodaysOpeningPrice("XETHZEUR");
} catch (Exception $e) {
    echo $e->getMessage();
}
