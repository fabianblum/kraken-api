<?php
/**
 * Created by PhpStorm.
 * User: fabia
 * Date: 27.07.2017
 * Time: 00:17
 */

namespace HanischIt\KrakenApi\Model\TradableAssetPairs;


/**
 * Class TradableAssetPairsResponse
 * @package HanischIt\KrakenApi\Model\TradableAssetPairs
 */
interface TradableAssetPairsResponseInterface
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