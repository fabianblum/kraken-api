<?php
require_once(__DIR__ . '/../vendor/autoload.php');

try {
    $api = new \HanischIt\KrakenApi\KrakenApi(
        "Your-API-Key",
        "Your-API-Sign"
    );

    $ordersInfo = $api->getOrdersInfo(["XXXXX-XXXXX-XXXXX"]);

    foreach ($ordersInfo->getOrders() as $order) {
        echo "Order: " . $order->getTxId() . " / Canceled: " . $order->getCloseTm() . " / Reason: " . $order->getReason() . "\n";
    }

} catch (Exception $e) {
    echo $e->getMessage();
}
