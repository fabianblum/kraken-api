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

    $orderBookResponse = $api->getRecentTrades('XETHZEUR');

    echo "Last: " . date("Y-m-d H:i:s", $orderBookResponse->getLast());
    foreach ($orderBookResponse->getTradeModel('XETHZEUR') as $tradeModel) {
        echo "Time: " . date(
                "Y-m-d H:i:s",
                $tradeModel->getTime()
            ) . " / Type: " . $tradeModel->getType() . " / Price: " . $tradeModel->getPrice() . " / Volume: " . $tradeModel->getVolume() . "\n";
    }
} catch (Exception $e) {
    echo $e->getMessage();
}
