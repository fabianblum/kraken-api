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
        'MCmFPhit7uoWh09l7FzXry/XiPjRO+YrVdmoDd1+Xh9ty4miJA2sk5PW',
        'eHdYEl9lwIAF+MkS52GhwayF0VJ03EDur0CmBnlinqSK8XSjop3af7vuNuvdFR6sXe3+hE79ErbqbBb0GDU20w=='
    );

    $addOrderResponse = $api->addOrder(
        'XETHZEUR',
        OrderTypeEnum::ORDER_TYPE_BUY,
        OrderOrderTypeEnum::ORDER_ORDERTYPE_LIMIT,
        200,
        10
    );

    echo "TxId: " . $addOrderResponse->getTxid();
} catch (Exception $e) {
    echo $e->getMessage();
}
