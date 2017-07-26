<?php

namespace HanischIt\KrakenApi\Model\Assets;

use HanischIt\KrakenApi\Model\ResponseInterface;

/**
 * Class AssetsResponse
 *
 * @package HanischIt\KrakenApi\Model\Assets
 */
class AssetsResponse implements ResponseInterface, AssetsResponseInterface
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
