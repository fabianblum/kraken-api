<?php

namespace HanischIt\KrakenApi\Model\GetTicker;

use HanischIt\KrakenApi\Model\ResponseInterface;

/**
 * Class ServerTimeResponse
 *
 * @package HanischIt\KrakenApi\Model\GetTicker
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
        if (!isset($assetPair)) {
            throw new \Exception($assetPair . " is not included in response");
        }

        return $this->models[$assetPair]->getAsk();
    }

    /**
     * @param string $assetPair
     *
     * @return AskBidModel
     * @throws \Exception
     */
    public function getBid($assetPair)
    {
        if (!isset($assetPair)) {
            throw new \Exception($assetPair . " is not included in response");
        }

        return $this->models[$assetPair]->getBid();
    }

    /**
     * @param string $assetPair
     *
     * @return mixed
     * @throws \Exception
     */
    public function getLastTradeClosed($assetPair)
    {
        if (!isset($assetPair)) {
            throw new \Exception($assetPair . " is not included in response");
        }

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
        if (!isset($assetPair)) {
            throw new \Exception($assetPair . " is not included in response");
        }

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
        if (!isset($assetPair)) {
            throw new \Exception($assetPair . " is not included in response");
        }

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
        if (!isset($assetPair)) {
            throw new \Exception($assetPair . " is not included in response");
        }

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
        if (!isset($assetPair)) {
            throw new \Exception($assetPair . " is not included in response");
        }

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
        if (!isset($assetPair)) {
            throw new \Exception($assetPair . " is not included in response");
        }

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
        if (!isset($assetPair)) {
            throw new \Exception($assetPair . " is not included in response");
        }

        return $this->models[$assetPair]->getTodaysOpeningPrice();
    }
}
