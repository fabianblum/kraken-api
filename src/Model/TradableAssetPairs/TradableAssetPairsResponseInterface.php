<?php
/**
 * Created by PhpStorm.
 * User: fabia
 * Date: 27.07.2017
 * Time: 00:17
 */

namespace HanischIt\KrakenApi\Model\TradableAssetPairs;

use HanischIt\KrakenApi\Model\ResponseInterface;


/**
 * Class TradableAssetPairsResponse
 * @package HanischIt\KrakenApi\Model\TradableAssetPairs
 */
interface TradableAssetPairsResponseInterface extends ResponseInterface
{
    /**
     * @param array $arr
     */
    public function manualMapping(array $arr);

    /**
     * @return AssetPairModel[]
     */
    public function getTradableAssets();
}