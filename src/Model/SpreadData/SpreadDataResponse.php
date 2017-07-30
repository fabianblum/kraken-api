<?php

namespace HanischIt\KrakenApi\Model\SpreadData;

use HanischIt\KrakenApi\Model\Response;

/**
 * Class SpreadDataResponse
 * @package HanischIt\KrakenApi\Model\SpreadData
 */
class SpreadDataResponse extends Response
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
