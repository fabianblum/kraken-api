<?php

namespace HanischIt\KrakenApi\Call\OrderBook\Model;

use HanischIt\KrakenApi\Call\OrderBook\Model;
use HanischIt\KrakenApi\Model\ResponseInterface;

/**
 * Class OrderBookResponse
 * @package HanischIt\KrakenApi\Call\OrderBook
 */
class OrderBookResponse implements ResponseInterface
{
    /**
     * @var string
     */
    private $assetPair;
    /**
     * @var OrderBookModel[]
     */
    private $asks = [];
    /**
     * @var OrderBookModel[]
     */
    private $bids = [];

    /**
     * @param array $result
     */
    public function manualMapping($result)
    {
        foreach ($result as $assetPair => $askBids) {
            $this->assetPair = $assetPair;

            foreach ($askBids["asks"] as $ask) {
                $this->asks[] = new Model\OrderBookModel($ask[0], $ask[1], $ask[2]);
            }

            foreach ($askBids["bids"] as $bids) {
                $this->bids[] = new Model\OrderBookModel($bids[0], $bids[1], $bids[2]);
            }

            break;
        }
    }

    /**
     * @return string
     */
    public function getAssetPair()
    {
        return $this->assetPair;
    }

    /**
     * @return \HanischIt\KrakenApi\Call\OrderBook\Model\OrderBookModel[]
     */
    public function getAsks()
    {
        return $this->asks;
    }

    /**
     * @return OrderBookModel[]
     */
    public function getBids()
    {
        return $this->bids;
    }
}
