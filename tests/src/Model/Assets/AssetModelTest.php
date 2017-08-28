<?php
/**
 * Created by PhpStorm.
 * User: fabia
 * Date: 26.07.2017
 * Time: 18:51
 */

namespace src\Model\Assets;

use PHPUnit\Framework\TestCase;

class AssetModelTest extends TestCase
{
    public function testModel()
    {
        $assetName = uniqid();
        $aclass = uniqid();
        $altname = uniqid();
        $decimals = rand(2,10);
        $displayDecimals = rand (2, 10);

        $assetModel = new \HanischIt\KrakenApi\Call\Assets\Model\AssetModel($assetName, $aclass, $altname, $decimals,
            $displayDecimals);
        self::assertEquals($assetName, $assetModel->getAssetName());
        self::assertEquals($aclass, $assetModel->getAclass());
        self::assertEquals($altname, $assetModel->getAltname());
        self::assertEquals($decimals, $assetModel->getDecimals());
        self::assertEquals($displayDecimals, $assetModel->getDisplayDecimals());
    }
}
