<?php

namespace HanischIt\KrakenApi\Call\OHLCData;

use HanischIt\KrakenApi\Call\OHLCData\Model\OHLCDataModel;
use HanischIt\KrakenApi\Model\ResponseInterface;

/**
 * Class OHLCDataResponse
 * @package HanischIt\KrakenApi\Call\OHLCData
 */
class OHLCDataResponse implements ResponseInterface
{

    /**
     *
     * @var int
     */
    private $last;

    /**
     * @var OHLCDataModel[]
     */
    private $ohlcDataModels;

    /**
     * @param array $data
     */
    public function manualMapping($data)
    {
        $this->last = $data["last"];

        foreach ($data as $assetPair => $assetDataArr) {
            if ($assetPair == "last") {
                continue;
            }

            foreach ($assetDataArr as $assetData) {
                $this->ohlcDataModels[] = new OHLCDataModel($assetData[0], $assetData[1], $assetData[2], $assetData[3],
                    $assetData[4], $assetData[5], $assetData[6], $assetData[7]);
            }
        }
    }

    /**
     * @return int
     */
    public function getLast()
    {
        return $this->last;
    }

    /**
     * @return OHLCDataModel[]
     */
    public function getOhlcDataModels()
    {
        return $this->ohlcDataModels;
    }
}
