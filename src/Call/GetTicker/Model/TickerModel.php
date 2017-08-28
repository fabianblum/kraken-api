<?php
/**
 * @author  Fabian Hanisch
 * @since   17.07.2017 20:34
 * @version 1.0
 */

namespace HanischIt\KrakenApi\Call\GetTicker\Model;

/**
 * Class TickerModel
 * @package HanischIt\KrakenApi\Call\GetTicker\Model
 */
class TickerModel
{
    /**
     * @var string
     */
    private $assetPair;
    /**
     * @var AskBidModel
     */
    private $ask;
    /**
     * @var AskBidModel
     */
    private $bid;
    /**
     * @var
     */
    private $lastTradeClosed;
    /**
     * @var DayPriceModel
     */
    private $volume;
    /**
     * @var DayPriceModel
     */
    private $volumeWeightedAverage;
    /**
     * @var DayPriceModel
     */
    private $numberOfTrades;
    /**
     * @var DayPriceModel
     */
    private $low;
    /**
     * @var DayPriceModel
     */
    private $high;
    /**
     * @var float
     */
    private $todaysOpeningPrice;

    /**
     * TickerModel constructor.
     *
     * @param string $assetPair
     * @param AskBidModel $ask
     * @param AskBidModel $bid
     * @param PriceVolumeModel $lastTradeClosed
     * @param DayPriceModel $volume
     * @param DayPriceModel $volumeWeightedAverage
     * @param DayPriceModel $numberOfTrades
     * @param DayPriceModel $low
     * @param DayPriceModel $high
     * @param float $todaysOpeningPrice
     */
    public function __construct(
        $assetPair,
        AskBidModel $ask,
        AskBidModel $bid,
        PriceVolumeModel $lastTradeClosed,
        DayPriceModel $volume,
        DayPriceModel $volumeWeightedAverage,
        DayPriceModel $numberOfTrades,
        DayPriceModel $low,
        DayPriceModel $high,
        $todaysOpeningPrice
    ) {
        $this->assetPair = $assetPair;
        $this->ask = $ask;
        $this->bid = $bid;
        $this->lastTradeClosed = $lastTradeClosed;
        $this->volume = $volume;
        $this->volumeWeightedAverage = $volumeWeightedAverage;
        $this->numberOfTrades = $numberOfTrades;
        $this->low = $low;
        $this->high = $high;
        $this->todaysOpeningPrice = $todaysOpeningPrice;
    }

    /**
     * @return AskBidModel
     */
    public function getAsk()
    {
        return $this->ask;
    }

    /**
     * @return AskBidModel
     */
    public function getBid()
    {
        return $this->bid;
    }

    /**
     * @return mixed
     */
    public function getLastTradeClosed()
    {
        return $this->lastTradeClosed;
    }

    /**
     * @return DayPriceModel
     */
    public function getVolume()
    {
        return $this->volume;
    }

    /**
     * @return DayPriceModel
     */
    public function getVolumeWeightedAverage()
    {
        return $this->volumeWeightedAverage;
    }

    /**
     * @return DayPriceModel
     */
    public function getNumberOfTrades()
    {
        return $this->numberOfTrades;
    }

    /**
     * @return DayPriceModel
     */
    public function getLow()
    {
        return $this->low;
    }

    /**
     * @return DayPriceModel
     */
    public function getHigh()
    {
        return $this->high;
    }

    /**
     * @return float
     */
    public function getTodaysOpeningPrice()
    {
        return $this->todaysOpeningPrice;
    }
}
