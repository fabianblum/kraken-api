<?php
/**
 * Created by PhpStorm.
 * User: fabia
 * Date: 27.07.2017
 * Time: 00:15
 */

namespace HanischIt\KrakenApi\Model\ClosedOrders;

use HanischIt\KrakenApi\Model\Model\Order\OrderModel;
use HanischIt\KrakenApi\Model\ResponseInterface;


/**
 * Class ClosedOrdersResponse
 *
 * @package HanischIt\KrakenApi\Model\ClosedOrders
 */
interface ClosedOrdersResponseInterface extends ResponseInterface
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