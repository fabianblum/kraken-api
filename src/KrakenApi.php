<?php
/**
 * @author  Fabian Hanisch
 * @since   16.07.2017 02:56
 * @version 1.0
 */

namespace HanischIt\KrakenApi;

use HanischIt\KrakenApi\Call\AccountBalance\AccountBalanceRequest;
use HanischIt\KrakenApi\Call\AccountBalance\AccountBalanceResponse;
use HanischIt\KrakenApi\Call\AddOrder\AddOrderRequest;
use HanischIt\KrakenApi\Call\AddOrder\AddOrderResponse;
use HanischIt\KrakenApi\Call\Assets\AssetsRequest;
use HanischIt\KrakenApi\Call\CancelOpenOrder\CancelOpenOrderRequest;
use HanischIt\KrakenApi\Call\ClosedOrders\ClosedOrdersRequest;
use HanischIt\KrakenApi\Call\ClosedOrders\ClosedOrdersResponse;
use HanischIt\KrakenApi\Call\GetTicker\TickerRequest;
use HanischIt\KrakenApi\Call\LedgersInfo\LedgersInfoRequest;
use HanischIt\KrakenApi\Call\OHLCData\OHLCDataRequest;
use HanischIt\KrakenApi\Call\OpenOrders\OpenOrdersRequest;
use HanischIt\KrakenApi\Call\OpenPositions\OpenPositionsRequest;
use HanischIt\KrakenApi\Call\OpenPositions\OpenPositionsResponse;
use HanischIt\KrakenApi\Call\OrderBook\Model\OrderBookResponse;
use HanischIt\KrakenApi\Call\OrderBook\OrderBookRequest;
use HanischIt\KrakenApi\Call\OrdersInfo\OrdersInfoRequest;
use HanischIt\KrakenApi\Call\OrdersInfo\OrdersInfoResponse;
use HanischIt\KrakenApi\Call\QueryLedgers\QueryLedgersRequest;
use HanischIt\KrakenApi\Call\RecentTrades\RecentTradesRequest;
use HanischIt\KrakenApi\Call\RecentTrades\RecentTradesResponse;
use HanischIt\KrakenApi\Call\ServerTime\ServerTimeRequest;
use HanischIt\KrakenApi\Call\ServerTime\ServerTimeResponse;
use HanischIt\KrakenApi\Call\SpreadData\SpreadDataRequest;
use HanischIt\KrakenApi\Call\SpreadData\SpreadDataResponse;
use HanischIt\KrakenApi\Call\TradableAssetPairs\TradableAssetPairsRequest;
use HanischIt\KrakenApi\Call\TradableAssetPairs\TradableAssetPairsResponse;
use HanischIt\KrakenApi\Call\TradeBalance\TradeBalanceRequest;
use HanischIt\KrakenApi\Call\TradeBalance\TradeBalanceResponse;
use HanischIt\KrakenApi\Call\Trades\TradesRequest;
use HanischIt\KrakenApi\Call\Trades\TradesResponse;
use HanischIt\KrakenApi\Call\TradesHistory\TradesHistoryRequest;
use HanischIt\KrakenApi\Call\TradeVolume\TradeVolumeRequest;
use HanischIt\KrakenApi\External\HttpClient;
use HanischIt\KrakenApi\Model\Header;
use HanischIt\KrakenApi\Model\RequestInterface;
use HanischIt\KrakenApi\Model\RequestOptions;
use HanischIt\KrakenApi\Model\ResponseInterface;
use HanischIt\KrakenApi\Service\RequestService\GetRequest;
use HanischIt\KrakenApi\Service\RequestService\Nonce;
use HanischIt\KrakenApi\Service\RequestService\PostRequest;
use HanischIt\KrakenApi\Service\RequestService\Request;
use HanischIt\KrakenApi\Service\RequestService\RequestHeader;

/**
 * Class KrakenApi
 *
 * @package HanischIt\KrakenApi
 */
class KrakenApi
{
    /**
     * @var RequestOptions
     */
    private $requestOptions;
    /**
     * @var Header
     */
    private $header;
    /**
     * @var Request
     */
    private $request;

    /**
     * KrakenApi constructor.
     *
     * @param string $apiKey
     * @param string $apiSign
     * @param string $version
     * @param string $endpoint
     */
    public function __construct($apiKey, $apiSign, $version = '0', $endpoint = 'https://api.kraken.com/')
    {
        $httpClient = new HttpClient(['verify' => false]);
        $requestHeader = new RequestHeader();
        $nonce = new Nonce();

        $this->requestOptions = new RequestOptions($endpoint, $version);
        $postRequest = new PostRequest($httpClient, $requestHeader, $nonce);
        $getRequest = new GetRequest($httpClient, $requestHeader);
        $this->request = new Request($postRequest, $getRequest);
        $this->header = new Header($apiKey, $apiSign);
    }

    /**
     * @param Request $request
     */
    public function setRequest(Request $request)
    {
        $this->request = $request;
    }

    /**
     * @return ServerTimeResponse|ResponseInterface
     */
    public function getServerTime()
    {
        $serverTimeRequest = new ServerTimeRequest();

        return $this->doRequest($serverTimeRequest);
    }

    /**
     * @param RequestInterface $requestInterface
     *
     * @return ResponseInterface
     */
    private function doRequest(RequestInterface $requestInterface)
    {
        return $this->request->execute($requestInterface, $this->requestOptions, $this->header);
    }

    /**
     * @return AccountBalanceResponse|ResponseInterface
     */
    public function getAccountBalance()
    {
        $accountBalanceRequest = new AccountBalanceRequest();

        return $this->doRequest($accountBalanceRequest);
    }

    /**
     * @param string $pair
     * @param string $type
     * @param string $orderType
     * @param null|float $price
     * @param null|float $volume
     * @param bool $validateOnly
     * @return AddOrderResponse|ResponseInterface
     */
    public function addOrder($pair, $type, $orderType, $price = null, $volume = null, $validateOnly = false)
    {
        $addOrderRequest = new AddOrderRequest($pair, $type, $orderType, $price, $volume, $validateOnly);

        return $this->doRequest($addOrderRequest);
    }

    /**
     * @return ResponseInterface|\HanischIt\KrakenApi\Call\Assets\AssetsResponse
     */
    public function getAssets()
    {
        $assetsRequest = new AssetsRequest();

        return $this->doRequest($assetsRequest);
    }

    /**
     * @param array $assetNames
     *
     * @return ResponseInterface|\HanischIt\KrakenApi\Call\GetTicker\TickerResponse
     */
    public function getTicker(array $assetNames)
    {
        $tickerRequest = new TickerRequest($assetNames);

        return $this->doRequest($tickerRequest);
    }

    /**
     * @param string $assetPair
     * @param int|null $count
     *
     * @return ResponseInterface|OrderBookResponse
     */
    public function getOrderBook($assetPair, $count = null)
    {
        $orderBookRequest = new OrderBookRequest($assetPair, $count);

        return $this->doRequest($orderBookRequest);
    }

    /**
     * @param bool $trades
     * @param null $userref
     *
     * @return ResponseInterface|\HanischIt\KrakenApi\Call\OpenOrders\OpenOrdersResponse
     */
    public function getOpenOrders($trades = false, $userref = null)
    {
        $orderBookRequest = new OpenOrdersRequest($trades, $userref);

        return $this->doRequest($orderBookRequest);
    }

    /**
     * @param bool $trades
     * @param null $userref
     * @param null|string $start
     * @param null|string $end
     * @param null|int $ofs
     * @param null|string $closetime
     *
     * @return ClosedOrdersResponse|ResponseInterface
     */
    public function getClosedOrders(
        $trades = false,
        $userref = null,
        $start = null,
        $end = null,
        $ofs = null,
        $closetime = null
    ) {
        $orderBookRequest = new ClosedOrdersRequest($trades, $userref, $start, $end, $ofs, $closetime);

        return $this->doRequest($orderBookRequest);
    }

    /**
     * @param string $assetPair
     * @param null|string $since
     *
     * @return ResponseInterface|RecentTradesResponse
     */
    public function getRecentTrades($assetPair, $since = null)
    {
        $recentTradeRequest = new RecentTradesRequest($assetPair, $since);

        return $this->doRequest($recentTradeRequest);
    }

    /**
     * @param string $assetPair
     * @param string $since
     * @return ResponseInterface|SpreadDataResponse
     */
    public function getSpreadData($assetPair, $since = null)
    {
        $spreadDataRequest = new SpreadDataRequest($assetPair, $since);

        return $this->doRequest($spreadDataRequest);
    }

    /**
     * @param string $info
     * @param array|null $assetPairs
     * @return ResponseInterface|TradableAssetPairsResponse
     */
    public function getTradableAssetPairs($info, array $assetPairs = null)
    {
        if (null !== $assetPairs) {
            $assetPairs = implode(',', $assetPairs);
        }
        $tradableAssetPairs = new TradableAssetPairsRequest($info, $assetPairs);

        return $this->doRequest($tradableAssetPairs);
    }

    /**
     * @param string $assetPair
     * @param null|int $interval
     * @param null|int $since
     * @return ResponseInterface|\HanischIt\KrakenApi\Call\OHLCData\OHLCDataResponse
     */
    public function getOHLCData($assetPair, $interval = null, $since = null)
    {
        $ohlcDataRequest = new OHLCDataRequest($assetPair, $interval, $since);

        return $this->doRequest($ohlcDataRequest);
    }

    /**
     * @param array|null $txids
     * @param bool $trades
     * @param null|string $userref
     * @return ResponseInterface|OrdersInfoResponse
     */
    public function getOrdersInfo(array $txids, $trades = false, $userref = null)
    {
        $ordersInfoRequest = new OrdersInfoRequest($txids, $trades, $userref);

        return $this->doRequest($ordersInfoRequest);
    }

    /**
     * @param string $type
     * @param bool $trades
     * @param null $start
     * @param null $end
     * @param null $ofs
     * @return ResponseInterface|\HanischIt\KrakenApi\Call\TradesHistory\TradesHistoryResponse
     */
    public function getTradesHistory($type = 'all', $trades = false, $start = null, $end = null, $ofs = null)
    {
        $tradesHistoryRequest = new TradesHistoryRequest($type, $trades, $start, $end, $ofs);

        return $this->doRequest($tradesHistoryRequest);
    }

    /**
     * @param string $txid
     * @param bool $trades
     * @return ResponseInterface|TradesResponse
     */
    public function getTrades($txid, $trades = false)
    {
        $tradesHistoryRequest = new TradesRequest($txid, $trades);

        return $this->doRequest($tradesHistoryRequest);
    }

    /**
     * @param string $txid
     * @return ResponseInterface|\HanischIt\KrakenApi\Call\CancelOpenOrder\CancelOpenOrderResponse
     */
    public function cancelOrder($txid)
    {
        $cancelOrderRequest = new CancelOpenOrderRequest($txid);

        return $this->doRequest($cancelOrderRequest);
    }

    /**
     * @param string|null $aclass
     * @param string|null $asset
     * @return ResponseInterface|TradeBalanceResponse
     */
    public function getTradeBalance($aclass = null, $asset = null)
    {
        $tradeBalanceRequest = new TradeBalanceRequest($aclass, $asset);

        return $this->doRequest($tradeBalanceRequest);
    }

    /**
     * @param string $aclass
     * @param string $asset
     * @param string $type
     * @param null|string $start
     * @param null|string $end
     * @param null|string $ofs
     * @return ResponseInterface|\HanischIt\KrakenApi\Call\LedgersInfo\LedgersInfoResponse
     */
    public function getLedgersInfo(
        $aclass = 'currency',
        $asset = 'all',
        $type = 'all',
        $start = null,
        $end = null,
        $ofs = null
    ) {
        $ledgersInfoRequest = new LedgersInfoRequest(
            $aclass,
            $asset,
            $type,
            $start,
            $end,
            $ofs);

        return $this->doRequest($ledgersInfoRequest);
    }

    /**
     * @param string $id
     * @return ResponseInterface|\HanischIt\KrakenApi\Call\QueryLedgers\QueryLedgersResponse
     */
    public function getLedgers($id)
    {
        $ledgersInfoRequest = new QueryLedgersRequest($id);

        return $this->doRequest($ledgersInfoRequest);

    }

    /**
     * @param null|string $pair
     * @param null|bool $feeInfo
     * @return \HanischIt\KrakenApi\Call\TradeVolume\TradeVolumeResponse|ResponseInterface
     */
    public function getTradeVolume($pair = null, $feeInfo = null)
    {
        $tradeVolumeRequest = new TradeVolumeRequest($pair, $feeInfo);

        return $this->doRequest($tradeVolumeRequest);
    }

    /**
     * @param string $txid
     * @param bool $docalcs
     * @return ResponseInterface|OpenPositionsResponse
     */
    public function getOpenPositions($txid, $docalcs = false)
    {
        $openPositionsRequest = new OpenPositionsRequest($txid, $docalcs);

        return $this->doRequest($openPositionsRequest);
    }
}
