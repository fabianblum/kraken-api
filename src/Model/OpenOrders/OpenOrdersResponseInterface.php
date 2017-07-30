<?php

namespace HanischIt\KrakenApi\Model\OpenOrders;

use HanischIt\KrakenApi\Model\Model\Order\OrderModel;
use HanischIt\KrakenApi\Model\ResponseInterface;


/**
 * Class OpenOrdersResponse
 *
 * @package HanischIt\KrakenApi\Model\OpenOrders
 */
interface OpenOrdersResponseInterface extends ResponseInterface
{
    /**
     * @param array $result
     */
    public function manualMapping($result);

    /**
     * @return OrderModel[]
     */
    public function getOrders();
}