<?php

namespace src\Model\TradableAssetPairs;

use HanischIt\KrakenApi\Call\TradableAssetPairs\TradableAssetPairsResponse;
use PHPUnit\Framework\TestCase;

class TradableAssetPairsResponseTest extends TestCase
{
    public function testResponse()
    {
        $data = [];

        for ($i = 0; $i < rand(2, 10); $i++) {
            $assetPair = uniqid();

            $data[$assetPair]["fees"] = [];
            for ($fees = 0; $fees < rand(2, 4); $fees++) {
                $data[$assetPair]["fees"][] = [rand(1000, 99999) / 1000, rand(100, 999) / 100];
            }
            $data[$assetPair]["fees_maker"] = [];
            for ($fees = 0; $fees < rand(2, 4); $fees++) {
                $data[$assetPair]["fees_maker"][] = [rand(1000, 99999) / 1000, rand(100, 999) / 100];
            }

            $data[$assetPair]["altname"] = uniqid();
            $data[$assetPair]["aclass_base"] = uniqid();
            $data[$assetPair]["base"] = uniqid();
            $data[$assetPair]["aclass_quote"] = uniqid();
            $data[$assetPair]["quote"] = uniqid();
            $data[$assetPair]["lot"] = uniqid();
            $data[$assetPair]["pair_decimals"] = uniqid();
            $data[$assetPair]["lot_decimals"] = rand(100, 1000);
            $data[$assetPair]["lot_multiplier"] = rand(100, 1000);
            $data[$assetPair]["leverage_buy"] = rand(100, 1000);
            $data[$assetPair]["leverage_sell"] = rand(100, 1000);
            $data[$assetPair]["fee_volume_currency"] = uniqid();
            $data[$assetPair]["margin_call"] = uniqid();
            $data[$assetPair]["margin_stop"] = uniqid();
        }

        $tradableAssetPairs = new TradableAssetPairsResponse();
        $tradableAssetPairs->manualMapping($data);

        foreach ($tradableAssetPairs->getTradableAssets() as $key => $tradableAsset) {
            self::assertEquals(isset($data[$tradableAsset->getAssetPair()]), true);
            foreach ($tradableAsset->getFees() as $feeKey => $fee) {
                self::assertEquals($fee->getVolume(), $data[$tradableAsset->getAssetPair()]['fees'][$feeKey][0]);
                self::assertEquals($fee->getPercentFee(), $data[$tradableAsset->getAssetPair()]['fees'][$feeKey][1]);
            }
            foreach ($tradableAsset->getFeesMaker() as $feeKey => $fee) {
                self::assertEquals($fee->getVolume(), $data[$tradableAsset->getAssetPair()]['fees_maker'][$feeKey][0]);
                self::assertEquals($fee->getPercentFee(), $data[$tradableAsset->getAssetPair()]['fees_maker'][$feeKey][1]);
            }

            self::assertEquals($tradableAsset->getAltname(), $data[$tradableAsset->getAssetPair()]["altname"]);
            self::assertEquals($tradableAsset->getAclassBase(), $data[$tradableAsset->getAssetPair()]["aclass_base"]);
            self::assertEquals($tradableAsset->getBase(), $data[$tradableAsset->getAssetPair()]["base"]);
            self::assertEquals($tradableAsset->getAclassQuote(), $data[$tradableAsset->getAssetPair()]["aclass_quote"]);
            self::assertEquals($tradableAsset->getQuote(), $data[$tradableAsset->getAssetPair()]["quote"]);
            self::assertEquals($tradableAsset->getLot(), $data[$tradableAsset->getAssetPair()]["lot"]);
            self::assertEquals($tradableAsset->getPairDecimals(), $data[$tradableAsset->getAssetPair()]["pair_decimals"]);
            self::assertEquals($tradableAsset->getLotDecimals(), $data[$tradableAsset->getAssetPair()]["lot_decimals"]);
            self::assertEquals($tradableAsset->getLotMultiplier(), $data[$tradableAsset->getAssetPair()]["lot_multiplier"]);
            self::assertEquals($tradableAsset->getLeverageBuy(), $data[$tradableAsset->getAssetPair()]["leverage_buy"]);
            self::assertEquals($tradableAsset->getLeverageSell(), $data[$tradableAsset->getAssetPair()]["leverage_sell"]);
            self::assertEquals($tradableAsset->getFeeVolumeCurrency(), $data[$tradableAsset->getAssetPair()]["fee_volume_currency"]);
            self::assertEquals($tradableAsset->getMarginCall(), $data[$tradableAsset->getAssetPair()]["margin_call"]);
            self::assertEquals($tradableAsset->getMarginStop(), $data[$tradableAsset->getAssetPair()]["margin_stop"]);
        }
    }
}
