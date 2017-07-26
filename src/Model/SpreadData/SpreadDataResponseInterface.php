<?php
/**
 * Created by PhpStorm.
 * User: fabia
 * Date: 27.07.2017
 * Time: 00:17
 */

namespace HanischIt\KrakenApi\Model\SpreadData;


/**
 * Class SpreadDataResponse
 * @package HanischIt\KrakenApi\Model\SpreadData
 */
interface SpreadDataResponseInterface
{
    /**
     * @param array $result
     */
    public function manualMapping($result);

    /**
     * @return int
     */
    public function getLast();

    /**
     * @return SpreadDataModel[]
     */
    public function getSpreads();
}