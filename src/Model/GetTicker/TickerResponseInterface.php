<?php
/**
 * Created by PhpStorm.
 * User: fabia
 * Date: 27.07.2017
 * Time: 00:16
 */

namespace HanischIt\KrakenApi\Model\GetTicker;

use HanischIt\KrakenApi\Model\ResponseInterface;


/**
 * Class ServerTimeResponse
 *
 * @package HanischIt\KrakenApi\Model\GetTicker
 */
interface TickerResponseInterface extends ResponseInterface
{
    /**
     * @param array $result
     */
    public function manualMapping($result);

    /**
     * @param string $assetPair
     *
     * @return AskBidModel
     * @throws \Exception
     */
    public function getAsk($assetPair);

    /**
     * @param string $assetPair
     *
     * @return AskBidModel
     * @throws \Exception
     */
    public function getBid($assetPair);

    /**
     * @param string $assetPair
     *
     * @return mixed
     * @throws \Exception
     */
    public function getLastTradeClosed($assetPair);

    /**
     * @param string $assetPair
     *
     * @return DayPriceModel
     * @throws \Exception
     */
    public function getVolume($assetPair);

    /**
     * @param string $assetPair
     *
     * @return DayPriceModel
     * @throws \Exception
     */
    public function getVolumeWeightedAverage($assetPair);

    /**
     * @param string $assetPair
     *
     * @return DayPriceModel
     * @throws \Exception
     */
    public function getNumberOfTrades($assetPair);

    /**
     * @param string $assetPair
     *
     * @return DayPriceModel
     * @throws \Exception
     */
    public function getLow($assetPair);

    /**
     * @param string $assetPair
     *
     * @return DayPriceModel
     * @throws \Exception
     */
    public function getHigh($assetPair);

    /**
     * @param string $assetPair
     *
     * @return float
     * @throws \Exception
     */
    public function getTodaysOpeningPrice($assetPair);
}