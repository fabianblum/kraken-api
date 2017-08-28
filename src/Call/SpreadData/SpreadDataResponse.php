<?php

namespace HanischIt\KrakenApi\Call\SpreadData;

use HanischIt\KrakenApi\Call\SpreadData\Model\SpreadDataModel;
use HanischIt\KrakenApi\Model\ResponseInterface;

/**
 * Class SpreadDataResponse
 * @package HanischIt\KrakenApi\Call\SpreadData
 */
class SpreadDataResponse implements ResponseInterface
{
    /**
     * @var int
     */
    private $last;
    /**
     * @var SpreadDataModel[]
     */
    private $spreads;

    /**
     * @param array $result
     */
    public function manualMapping($result)
    {
        $this->last = $result["last"];
        foreach ($result as $assetPair => $assetData) {
            if ($assetPair == "last") {
                continue;
            }
            foreach ($assetData as $data) {
                $this->spreads[] = new SpreadDataModel($data[0], $data[1], $data[2]);
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
     * @return SpreadDataModel[]
     */
    public function getSpreads()
    {
        return $this->spreads;
    }
}
