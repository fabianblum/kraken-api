<?php
/**
 * Created by PhpStorm.
 * User: fabia
 * Date: 28.07.2017
 * Time: 19:33
 */

namespace src;

use HanischIt\KrakenApi\Call\AccountBalance\AccountBalanceResponse;
use HanischIt\KrakenApi\Call\AddOrder\AddOrderResponse;
use HanischIt\KrakenApi\Call\Assets\AssetsResponse;
use HanischIt\KrakenApi\Call\CancelOpenOrder\CancelOpenOrderResponse;
use HanischIt\KrakenApi\Call\ClosedOrders\ClosedOrdersResponse;
use HanischIt\KrakenApi\Call\GetTicker\TickerResponse;
use HanischIt\KrakenApi\Call\LedgersInfo\LedgersInfoResponse;
use HanischIt\KrakenApi\Call\OHLCData\OHLCDataResponse;
use HanischIt\KrakenApi\Call\OpenOrders\OpenOrdersResponse;
use HanischIt\KrakenApi\Call\OpenPositions\OpenPositionsResponse;
use HanischIt\KrakenApi\Call\OrderBook\Model\OrderBookResponse;
use HanischIt\KrakenApi\Call\OrdersInfo\OrdersInfoResponse;
use HanischIt\KrakenApi\Call\QueryLedgers\QueryLedgersResponse;
use HanischIt\KrakenApi\Call\RecentTrades\RecentTradesResponse;
use HanischIt\KrakenApi\Call\ServerTime\ServerTimeResponse;
use HanischIt\KrakenApi\Call\SpreadData\SpreadDataResponse;
use HanischIt\KrakenApi\Call\TradableAssetPairs\TradableAssetPairsResponse;
use HanischIt\KrakenApi\Call\TradeBalance\TradeBalanceResponse;
use HanischIt\KrakenApi\Call\Trades\TradesResponse;
use HanischIt\KrakenApi\Call\TradesHistory\TradesHistoryResponse;
use HanischIt\KrakenApi\Call\TradeVolume\TradeVolumeResponse;
use HanischIt\KrakenApi\KrakenApi;
use HanischIt\KrakenApi\Model\RequestInterface;
use HanischIt\KrakenApi\Service\RequestService\Request;
use PHPUnit_Framework_MockObject_MockObject;

class KrakenApiTest extends \PHPUnit_Framework_TestCase
{
    public function testGetServerTime()
    {
        $krakenApi = $this->getKrakenApi(ServerTimeResponse::class);

        self::assertInstanceOf(ServerTimeResponse::class, $krakenApi->getServerTime());
    }

    private function getKrakenApi($responseClass)
    {
        $apiKey = uniqid();
        $apiSign = uniqid();

        /** @var RequestInterface|PHPUnit_Framework_MockObject_MockObject $mock */
        $mock = $this->getMockBuilder(Request::class)->disableOriginalConstructor()
            ->getMock();

        $mock->expects(self::once())->method('execute')->willReturn(new $responseClass());

        $krakenApi = new KrakenApi($apiKey, $apiSign);
        $krakenApi->setRequest($mock);

        return $krakenApi;
    }

    public function testGetAccountBalance()
    {
        $krakenApi = $this->getKrakenApi(AccountBalanceResponse::class);

        self::assertInstanceOf(AccountBalanceResponse::class, $krakenApi->getAccountBalance());
    }

    public function testAddOrder()
    {
        $krakenApi = $this->getKrakenApi(AddOrderResponse::class);

        self::assertInstanceOf(AddOrderResponse::class, $krakenApi->addOrder(uniqid(), uniqid(), uniqid()));
    }

    public function testGetAssets()
    {
        $krakenApi = $this->getKrakenApi(AssetsResponse::class);

        self::assertInstanceOf(AssetsResponse::class, $krakenApi->getAssets());
    }

    public function testGetTicker()
    {
        $krakenApi = $this->getKrakenApi(TickerResponse::class);

        self::assertInstanceOf(TickerResponse::class, $krakenApi->getTicker([uniqid()]));
    }

    public function testGetOrderBook()
    {
        $krakenApi = $this->getKrakenApi(OrderBookResponse::class);

        self::assertInstanceOf(OrderBookResponse::class, $krakenApi->getOrderBook(uniqid()));
    }

    public function testGetOpenOrders()
    {
        $krakenApi = $this->getKrakenApi(OpenOrdersResponse::class);

        self::assertInstanceOf(OpenOrdersResponse::class, $krakenApi->getOpenOrders());
    }

    public function testGetClosedOrders()
    {
        $krakenApi = $this->getKrakenApi(ClosedOrdersResponse::class);

        self::assertInstanceOf(ClosedOrdersResponse::class, $krakenApi->getClosedOrders());
    }

    public function testGetRecentTrades()
    {
        $krakenApi = $this->getKrakenApi(RecentTradesResponse::class);

        self::assertInstanceOf(RecentTradesResponse::class, $krakenApi->getRecentTrades(uniqid()));
    }

    public function testGetSpreadData()
    {
        $krakenApi = $this->getKrakenApi(SpreadDataResponse::class);

        self::assertInstanceOf(SpreadDataResponse::class, $krakenApi->getSpreadData(uniqid()));
    }

    public function testGetTradableAssetPairs()
    {
        $krakenApi = $this->getKrakenApi(TradableAssetPairsResponse::class);

        $assetPairs = [uniqid()];
        self::assertInstanceOf(TradableAssetPairsResponse::class,
            $krakenApi->getTradableAssetPairs('all', $assetPairs));
    }

    public function testGetOhlcData()
    {
        $krakenApi = $this->getKrakenApi(OHLCDataResponse::class);

        self::assertInstanceOf(OHLCDataResponse::class,
            $krakenApi->getOHLCData(uniqid(), rand(1000, 100000), rand(100000, 1000000)));
    }

    public function testGetTradeBalance()
    {
        $krakenApi = $this->getKrakenApi(TradeBalanceResponse::class);

        self::assertInstanceOf(TradeBalanceResponse::class, $krakenApi->getTradeBalance(uniqid(), uniqid()));
    }

    public function testGetOrdersInfo()
    {
        $krakenApi = $this->getKrakenApi(OrdersInfoResponse::class);

        self::assertInstanceOf(OrdersInfoResponse::class, $krakenApi->getOrdersInfo([uniqid()]));
    }

    public function testGetTradesHistory()
    {
        $krakenApi = $this->getKrakenApi(TradesHistoryResponse::class);

        self::assertInstanceOf(TradesHistoryResponse::class, $krakenApi->getTradesHistory(uniqid()));
    }

    public function testGetTrades()
    {
        $krakenApi = $this->getKrakenApi(TradesResponse::class);

        self::assertInstanceOf(TradesResponse::class, $krakenApi->getTrades(uniqid()));
    }

    public function testCancelOpenOrder()
    {
        $krakenApi = $this->getKrakenApi(CancelOpenOrderResponse::class);

        self::assertInstanceOf(CancelOpenOrderResponse::class, $krakenApi->cancelOrder(uniqid()));
    }

    public function testGetLedgersInfo()
    {
        $krakenApi = $this->getKrakenApi(LedgersInfoResponse::class);

        self::assertInstanceOf(LedgersInfoResponse::class, $krakenApi->getLedgersInfo());
    }

    public function testGetLedgers()
    {
        $krakenApi = $this->getKrakenApi(QueryLedgersResponse::class);

        self::assertInstanceOf(QueryLedgersResponse::class, $krakenApi->getLedgers(uniqid()));
    }

    public function testGetTradeVolume()
    {
        $krakenApi = $this->getKrakenApi(TradeVolumeResponse::class);

        self::assertInstanceOf(TradeVolumeResponse::class, $krakenApi->getTradeVolume());
    }

    public function testGetOpenPositions()
    {
        $krakenApi = $this->getKrakenApi(OpenPositionsResponse::class);

        self::assertInstanceOf(OpenPositionsResponse::class, $krakenApi->getOpenPositions(uniqid()));
    }
}
