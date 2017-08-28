<?php

namespace HanischIt\KrakenApi\Call\Assets;

use HanischIt\KrakenApi\Call\Assets\Model\AssetModel;
use HanischIt\KrakenApi\Model\ResponseInterface;

/**
 * Class AssetsResponse
 * @package HanischIt\KrakenApi\Call\Assets
 */
class AssetsResponse implements ResponseInterface
{
    /**
     * @var AssetModel[]
     */
    private $assets;

    /**
     * @param array $result
     */
    public function manualMapping($result)
    {
        foreach ($result as $assetName => $assetValues) {
            $this->assets[] = new AssetModel(
                $assetName,
                $assetValues["aclass"],
                $assetValues["altname"],
                $assetValues["decimals"],
                $assetValues["display_decimals"]
            );
        }
    }

    /**
     * @return AssetModel[]
     */
    public function getAssets()
    {
        return $this->assets;
    }
}
