<?php

namespace HanischIt\KrakenApi\Model\Assets;

use HanischIt\KrakenApi\Model\ResponseInterface;

/**
 * Class ServerTimeResponse
 * @package HanischIt\KrakenApi\Model\ServerTime
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
            $this->assets[] = new AssetModel($assetName, $assetValues["aclass"], $assetValues["altname"], $assetValues["decimals"], $assetValues["display_decimals"]);
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
