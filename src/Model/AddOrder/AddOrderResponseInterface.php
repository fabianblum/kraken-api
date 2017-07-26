<?php
/**
 * Created by PhpStorm.
 * User: fabia
 * Date: 27.07.2017
 * Time: 00:15
 */

namespace HanischIt\KrakenApi\Model\AddOrder;


/**
 * Class AddOrderResponse
 *
 * @package HanischIt\KrakenApi\Model\AddOrderResponse
 */
interface AddOrderResponseInterface
{
    /**
     * @param array $result
     */
    public function manualMapping($result);

    /**
     * @return array
     */
    public function getDescr();

    /**
     * @return string
     */
    public function getTxid();
}