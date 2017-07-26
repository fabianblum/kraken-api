<?php
/**
 * Created by PhpStorm.
 * User: fabia
 * Date: 27.07.2017
 * Time: 00:16
 */

namespace HanischIt\KrakenApi\Model\OrderBook;

use HanischIt\KrakenApi\Model\ResponseInterface;


/**
 * Class OrderBookResponse
 *
 * @package HanischIt\KrakenApi\Model\OrderBook
 */
interface OrderBookResponseInterface extends ResponseInterface
{
    /**
     * @param array $result
     */
    public function manualMapping($result);

    /**
     * @return string
     */
    public function getAssetPair();

    /**
     * @return OrderBookModel[]
     */
    public function getAsks();

    /**
     * @return OrderBookModel[]
     */
    public function getBids();
}