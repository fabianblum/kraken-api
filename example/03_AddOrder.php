<?php
/**
 * @author  Fabian Hanisch
 * @since   16.07.2017 02:55
 * @version 1.0
 */

use HanischIt\KrakenApi\Enum\OrderOrderTypeEnum;
use HanischIt\KrakenApi\Enum\OrderTypeEnum;

require_once(__DIR__ . '/../vendor/autoload.php');

try {
    $api = new \HanischIt\KrakenApi\KrakenApi(
        "Your-API-Key",
        "Your-API-Sign"
    );

    $addOrderResponse = $api->addOrder(
        'XETHZEUR',
        OrderTypeEnum::ORDER_TYPE_BUY,
        OrderOrderTypeEnum::ORDER_ORDERTYPE_LIMIT,
        200,
        10,
        true
    );

    echo "TxId: " . $addOrderResponse->getTxid();
} catch (Exception $e) {
    echo $e->getMessage();
}
