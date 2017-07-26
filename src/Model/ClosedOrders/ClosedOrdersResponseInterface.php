<?php
/**
 * Created by PhpStorm.
 * User: fabia
 * Date: 27.07.2017
 * Time: 00:15
 */

namespace HanischIt\KrakenApi\Model\ClosedOrders;


/**
 * Class ClosedOrdersResponse
 *
 * @package HanischIt\KrakenApi\Model\ClosedOrders
 */
interface ClosedOrdersResponseInterface
{
    /**
     * @param array $result
     */
    public function manualMapping($result);

    /**
     * @return ClosedOrderModel[]
     */
    public function getOrders();
}