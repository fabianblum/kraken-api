<?php
/**
 * Created by PhpStorm.
 * User: fabia
 * Date: 26.07.2017
 * Time: 18:58
 */

namespace src\Model\Assets;

use HanischIt\KrakenApi\Model\Assets\AssetModel;
use HanischIt\KrakenApi\Model\Assets\AssetsResponse;
use PHPUnit\Framework\TestCase;

class AssetsResponseTest extends TestCase
{
    public function testResponse()
    {
        $data = [];
        for($i = 0; $i < rand(5, 20); $i++)
        {
            $data[uniqid()] = ["aclass" => uniqid(), "altname" => uniqid(), "decimals" => rand(1, 10), "display_decimals" => rand(1,10)];
        }


        $assetResponse = new AssetsResponse();
        $assetResponse->manualMapping($data);
        $responseModels = $assetResponse->getAssets();

        self::assertContainsOnlyInstancesOf(AssetModel::class, $responseModels);

        $i = 0;
        foreach($data as $assetName => $assetData) {
            self::assertEquals($responseModels[$i]->getAssetName(), $assetName);
            self::assertEquals($responseModels[$i]->getDisplayDecimals(), $assetData["display_decimals"]);
            self::assertEquals($responseModels[$i]->getDecimals(), $assetData["decimals"]);
            self::assertEquals($responseModels[$i]->getAltname(), $assetData["altname"]);
            self::assertEquals($responseModels[$i]->getAclass(), $assetData["aclass"]);

            $i++;
        }
    }
}
