<?php

namespace HanischIt\KrakenApi\Call\TradableAssetPairs;

use HanischIt\KrakenApi\Call\TradableAssetPairs\Model\AssetPairModel;
use HanischIt\KrakenApi\Call\TradableAssetPairs\Model\FeeModel;
use HanischIt\KrakenApi\Model\ResponseInterface;

/**
 * Class TradableAssetPairsResponse
 * @package HanischIt\KrakenApi\Call\TradableAssetPairs
 */
class TradableAssetPairsResponse implements ResponseInterface
{
    /**
     * @var AssetPairModel[]
     */
    private $tradableAssets;

    /**
     * @param array $arr
     */
    public function manualMapping(array $arr)
    {
        foreach ($arr as $assetPair => $data) {
            $fees = [];
            if (isset($data["fees"])) {
                foreach ($data["fees"] as $feeData) {
                    $fees[] = new FeeModel($feeData[0], $feeData[1]);
                }
            }
            $feesMaker = [];
            if (isset($data["fees_maker"])) {
                foreach ($data["fees_maker"] as $feeData) {
                    $feesMaker[] = new FeeModel($feeData[0], $feeData[1]);
                }
            }
            $this->tradableAssets[] = new AssetPairModel(
                $assetPair,
                $data["altname"],
                $data["aclass_base"],
                $data["base"],
                $data["aclass_quote"],
                $data["quote"],
                $data["lot"],
                $data["pair_decimals"],
                $data["lot_decimals"],
                $data["lot_multiplier"],
                $data["leverage_buy"],
                $data["leverage_sell"],
                $fees,
                $feesMaker,
                $data["fee_volume_currency"],
                $data["margin_call"],
                $data["margin_stop"]
            );
        }
    }

    /**
     * @return AssetPairModel[]
     */
    public function getTradableAssets()
    {
        return $this->tradableAssets;
    }
}
