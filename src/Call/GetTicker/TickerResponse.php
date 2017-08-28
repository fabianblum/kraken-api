<?php

namespace HanischIt\KrakenApi\Call\GetTicker;

use HanischIt\KrakenApi\Call\GetTicker\Model\AskBidModel;
use HanischIt\KrakenApi\Call\GetTicker\Model\DayPriceModel;
use HanischIt\KrakenApi\Call\GetTicker\Model\PriceVolumeModel;
use HanischIt\KrakenApi\Call\GetTicker\Model\TickerModel;
use HanischIt\KrakenApi\Model\ResponseInterface;

/**
 * Class TickerResponse
 * @package HanischIt\KrakenApi\Call\GetTicker
 */
class TickerResponse implements ResponseInterface
{
    /**
     * @var TickerModel[]
     */
    private $models;

    /**
     * @param array $result
     */
    public function manualMapping($result)
    {
        foreach ($result as $assetPair => $tickerValues) {
            $this->models[$assetPair] = new TickerModel(
                $assetPair,
                new AskBidModel($tickerValues["a"][0], $tickerValues["a"][1], $tickerValues["a"][2]),
                new AskBidModel($tickerValues["b"][0], $tickerValues["b"][1], $tickerValues["b"][2]),
                new PriceVolumeModel($tickerValues["c"][0], $tickerValues["c"][1]),
                new DayPriceModel($tickerValues["v"][0], $tickerValues["v"][1]),
                new DayPriceModel($tickerValues["p"][0], $tickerValues["p"][1]),
                new DayPriceModel($tickerValues["t"][0], $tickerValues["t"][1]),
                new DayPriceModel($tickerValues["l"][0], $tickerValues["l"][1]),
                new DayPriceModel($tickerValues["h"][0], $tickerValues["h"][1]),
                $tickerValues["o"]
            );
        }
    }

    /**
     * @param string $assetPair
     *
     * @return AskBidModel
     * @throws \Exception
     */
    public function getAsk($assetPair)
    {
        $this->checkIfAssetPairExist($assetPair);

        return $this->models[$assetPair]->getAsk();
    }

    /**
     * @param string $assetPair
     *
     * @throws \Exception
     */
    private function checkIfAssetPairExist($assetPair)
    {
        if (!isset($this->models[$assetPair])) {
            throw new \Exception($assetPair . " is not included in response");
        }
    }

    /**
     * @param string $assetPair
     *
     * @return AskBidModel
     * @throws \Exception
     */
    public function getBid($assetPair)
    {
        $this->checkIfAssetPairExist($assetPair);

        return $this->models[$assetPair]->getBid();
    }

    /**
     * @param string $assetPair
     *
     * @return PriceVolumeModel
     * @throws \Exception
     */
    public function getLastTradeClosed($assetPair)
    {
        $this->checkIfAssetPairExist($assetPair);

        return $this->models[$assetPair]->getLastTradeClosed();
    }

    /**
     * @param string $assetPair
     *
     * @return DayPriceModel
     * @throws \Exception
     */
    public function getVolume($assetPair)
    {
        $this->checkIfAssetPairExist($assetPair);

        return $this->models[$assetPair]->getVolume();
    }

    /**
     * @param string $assetPair
     *
     * @return DayPriceModel
     * @throws \Exception
     */
    public function getVolumeWeightedAverage($assetPair)
    {
        $this->checkIfAssetPairExist($assetPair);

        return $this->models[$assetPair]->getVolumeWeightedAverage();
    }

    /**
     * @param string $assetPair
     *
     * @return DayPriceModel
     * @throws \Exception
     */
    public function getNumberOfTrades($assetPair)
    {
        $this->checkIfAssetPairExist($assetPair);

        return $this->models[$assetPair]->getNumberOfTrades();
    }

    /**
     * @param string $assetPair
     *
     * @return DayPriceModel
     * @throws \Exception
     */
    public function getLow($assetPair)
    {
        $this->checkIfAssetPairExist($assetPair);

        return $this->models[$assetPair]->getLow();
    }

    /**
     * @param string $assetPair
     *
     * @return DayPriceModel
     * @throws \Exception
     */
    public function getHigh($assetPair)
    {
        $this->checkIfAssetPairExist($assetPair);

        return $this->models[$assetPair]->getHigh();
    }

    /**
     * @param string $assetPair
     *
     * @return float
     * @throws \Exception
     */
    public function getTodaysOpeningPrice($assetPair)
    {
        $this->checkIfAssetPairExist($assetPair);

        return $this->models[$assetPair]->getTodaysOpeningPrice();
    }
}
