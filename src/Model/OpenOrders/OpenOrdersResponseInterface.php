<?php
/**
 * Created by PhpStorm.
 * User: fabia
 * Date: 27.07.2017
 * Time: 00:16
 */

namespace HanischIt\KrakenApi\Model\OpenOrders;

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
     * @return OpenOrderModel[]
     */
    public function getOrders();
}