<?php
/**
 * Created by PhpStorm.
 * User: fabia
 * Date: 28.07.2017
 * Time: 19:33
 */

namespace src;

use HanischIt\KrakenApi\KrakenApi;
use HanischIt\KrakenApi\Model\AccountBalance\AccountBalanceResponse;
use HanischIt\KrakenApi\Model\AddOrder\AddOrderResponse;
use HanischIt\KrakenApi\Model\Assets\AssetsResponse;
use HanischIt\KrakenApi\Model\ClosedOrders\ClosedOrdersResponse;
use HanischIt\KrakenApi\Model\GetTicker\TickerResponse;
use HanischIt\KrakenApi\Model\OHLCData\OHLCDataResponse;
use HanischIt\KrakenApi\Model\OpenOrders\OpenOrdersResponse;
use HanischIt\KrakenApi\Model\OrderBook\OrderBookResponse;
use HanischIt\KrakenApi\Model\OrdersInfo\OrdersInfoResponse;
use HanischIt\KrakenApi\Model\RecentTrades\RecentTradesResponse;
use HanischIt\KrakenApi\Model\RequestInterface;
use HanischIt\KrakenApi\Model\ServerTime\ServerTimeResponse;
use HanischIt\KrakenApi\Model\SpreadData\SpreadDataResponse;
use HanischIt\KrakenApi\Model\TradableAssetPairs\TradableAssetPairsResponse;
use HanischIt\KrakenApi\Model\TradeBalance\TradeBalanceResponse;
use HanischIt\KrakenApi\Model\TradesHistory\TradesHistoryResponse;
use HanischIt\KrakenApi\Service\RequestService\Request;
use PHPUnit_Framework_MockObject_MockObject;

class KrakenApiTest extends \PHPUnit_Framework_TestCase
{
    public function testGetServerTime()
    {
        $krakenApi = $this->getKrakenApi(ServerTimeResponse::class);

        self::assertInstanceOf(ServerTimeResponse::class, $krakenApi->getServerTime());
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
        self::assertInstanceOf(TradableAssetPairsResponse::class, $krakenApi->getTradableAssetPairs('all', $assetPairs));
    }

    public function testGetOhlcData()
    {
        $krakenApi = $this->getKrakenApi(OHLCDataResponse::class);

        self::assertInstanceOf(OHLCDataResponse::class, $krakenApi->getOHLCData(uniqid(), rand(1000, 100000), rand(100000, 1000000)));
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
}
