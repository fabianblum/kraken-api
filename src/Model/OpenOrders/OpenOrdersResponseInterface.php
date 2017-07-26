<?php
/**
 * Created by PhpStorm.
 * User: fabia
 * Date: 27.07.2017
 * Time: 00:16
 */

namespace HanischIt\KrakenApi\Model\OpenOrders;


/**
 * Class OpenOrdersResponse
 *
 * @package HanischIt\KrakenApi\Model\OpenOrders
 */
interface OpenOrdersResponseInterface
{
    /**
     * @param array $result
     */
    public function manualMapping($result);

    /**
     * @return OpenOrderModel[]
     */
    public function getOrders();
}