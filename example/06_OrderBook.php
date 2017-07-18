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

    $orderBookResponse = $api->getOrderBook("XETHZEUR", 20);

    echo "Aks :\n";
    foreach ($orderBookResponse->getAsks() as $ask) {
        echo "- Price: " . $ask->getPrice() . " / Volume: " . $ask->getVolume() . " / Timestamp: " . $ask->getTimestamp() . "\n";
    }
    echo "Bids :\n";
    foreach ($orderBookResponse->getBids() as $bids) {
        echo "- Price: " . $bids->getPrice() . " / Volume: " . $bids->getVolume() . " / Timestamp: " . $bids->getTimestamp() . "\n";
    }

} catch (Exception $e) {
    echo $e->getMessage();
}
