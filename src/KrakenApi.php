<?php
/**
 * @author  Fabian Hanisch
 * @since   16.07.2017 02:56
 * @version 1.0
 */

namespace HanischIt\KrakenApi;

use HanischIt\KrakenApi\External\HttpClient;
use HanischIt\KrakenApi\Model\AccountBalance\AccountBalanceRequest;
use HanischIt\KrakenApi\Model\AccountBalance\AccountBalanceResponse;
use HanischIt\KrakenApi\Model\AddOrder\AddOrderRequest;
use HanischIt\KrakenApi\Model\AddOrder\AddOrderResponse;
use HanischIt\KrakenApi\Model\Assets\AssetsRequest;
use HanischIt\KrakenApi\Model\Assets\AssetsResponse;
use HanischIt\KrakenApi\Model\CancelOpenOrder\CancelOpenOrderRequest;
use HanischIt\KrakenApi\Model\CancelOpenOrder\CancelOpenOrderResponse;
use HanischIt\KrakenApi\Model\ClosedOrders\ClosedOrdersRequest;
use HanischIt\KrakenApi\Model\ClosedOrders\ClosedOrdersResponse;
use HanischIt\KrakenApi\Model\GetTicker\TickerRequest;
use HanischIt\KrakenApi\Model\GetTicker\TickerResponse;
use HanischIt\KrakenApi\Model\Header;
use HanischIt\KrakenApi\Model\LedgersInfo\LedgersInfoRequest;
use HanischIt\KrakenApi\Model\LedgersInfo\LedgersInfoResponse;
use HanischIt\KrakenApi\Model\OHLCData\OHLCDataRequest;
use HanischIt\KrakenApi\Model\OHLCData\OHLCDataResponse;
use HanischIt\KrakenApi\Model\OpenOrders\OpenOrdersRequest;
use HanischIt\KrakenApi\Model\OpenOrders\OpenOrdersResponse;
use HanischIt\KrakenApi\Model\OrderBook\OrderBookRequest;
use HanischIt\KrakenApi\Model\OrderBook\OrderBookResponse;
use HanischIt\KrakenApi\Model\OrdersInfo\OrdersInfoRequest;
use HanischIt\KrakenApi\Model\OrdersInfo\OrdersInfoResponse;
use HanischIt\KrakenApi\Model\RecentTrades\RecentTradesRequest;
use HanischIt\KrakenApi\Model\RecentTrades\RecentTradesResponse;
use HanischIt\KrakenApi\Model\RequestInterface;
use HanischIt\KrakenApi\Model\RequestOptions;
use HanischIt\KrakenApi\Model\ResponseInterface;
use HanischIt\KrakenApi\Model\ServerTime\ServerTimeRequest;
use HanischIt\KrakenApi\Model\ServerTime\ServerTimeResponse;
use HanischIt\KrakenApi\Model\SpreadData\SpreadDataRequest;
use HanischIt\KrakenApi\Model\SpreadData\SpreadDataResponse;
use HanischIt\KrakenApi\Model\TradableAssetPairs\TradableAssetPairsRequest;
use HanischIt\KrakenApi\Model\TradableAssetPairs\TradableAssetPairsResponse;
use HanischIt\KrakenApi\Model\TradeBalance\TradeBalanceRequest;
use HanischIt\KrakenApi\Model\TradeBalance\TradeBalanceResponse;
use HanischIt\KrakenApi\Model\Trades\TradesRequest;
use HanischIt\KrakenApi\Model\Trades\TradesResponse;
use HanischIt\KrakenApi\Model\TradesHistory\TradesHistoryRequest;
use HanischIt\KrakenApi\Model\TradesHistory\TradesHistoryResponse;
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
     *
     * @return ResponseInterface|AddOrderResponse
     */
    public function addOrder($pair, $type, $orderType, $price = null, $volume = null)
    {
        $addOrderRequest = new AddOrderRequest($pair, $type, $orderType, $price, $volume);

        return $this->doRequest($addOrderRequest);
    }

    /**
     * @return ResponseInterface|AssetsResponse
     */
    public function getAssets()
    {
        $assetsRequest = new AssetsRequest();

        return $this->doRequest($assetsRequest);
    }

    /**
     * @param array $assetNames
     *
     * @return ResponseInterface|TickerResponse
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
     * @return ResponseInterface|OpenOrdersResponse
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
     * @return ResponseInterface|OHLCDataResponse
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
     * @return ResponseInterface|TradesHistoryResponse
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
     * @return ResponseInterface|CancelOpenOrderResponse
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
     * @return ResponseInterface|LedgersInfoResponse
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
     * @param RequestInterface $requestInterface
     *
     * @return ResponseInterface
     */
    private function doRequest(RequestInterface $requestInterface)
    {
        return $this->request->execute($requestInterface, $this->requestOptions, $this->header);
    }
}
