<?php
/**
 * Created by PhpStorm.
 * User: fabia
 * Date: 27.07.2017
 * Time: 00:15
 */

namespace HanischIt\KrakenApi\Model\AddOrder;

use HanischIt\KrakenApi\Model\ResponseInterface;


/**
 * Class AddOrderResponse
 *
 * @package HanischIt\KrakenApi\Model\AddOrderResponse
 */
interface AddOrderResponseInterface extends ResponseInterface
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