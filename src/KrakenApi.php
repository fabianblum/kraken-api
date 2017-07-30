<?php
/**
 * @author  Fabian Hanisch
 * @since   16.07.2017 02:56
 * @version 1.0
 */

namespace HanischIt\KrakenApi;

use HanischIt\KrakenApi\External\HttpClient;
use HanischIt\KrakenApi\Model\AbstractRequest;
use HanischIt\KrakenApi\Model\AccountBalance\AccountBalanceAbstractRequest;
use HanischIt\KrakenApi\Model\AccountBalance\AccountBalanceResponse;
use HanischIt\KrakenApi\Model\AddOrder\AddOrderAbstractRequest;
use HanischIt\KrakenApi\Model\AddOrder\AddOrderResponse;
use HanischIt\KrakenApi\Model\Assets\AssetsAbstractRequest;
use HanischIt\KrakenApi\Model\Assets\AssetsResponse;
use HanischIt\KrakenApi\Model\ClosedOrders\ClosedOrdersAbstractRequest;
use HanischIt\KrakenApi\Model\ClosedOrders\ClosedOrdersResponse;
use HanischIt\KrakenApi\Model\GetTicker\TickerAbstractRequest;
use HanischIt\KrakenApi\Model\GetTicker\TickerResponse;
use HanischIt\KrakenApi\Model\Header;
use HanischIt\KrakenApi\Model\OHLCData\OHLCDataAbstractRequest;
use HanischIt\KrakenApi\Model\OHLCData\OHLCDataResponse;
use HanischIt\KrakenApi\Model\OpenOrders\OpenOrdersAbstractRequest;
use HanischIt\KrakenApi\Model\OpenOrders\OpenOrdersResponse;
use HanischIt\KrakenApi\Model\OrderBook\OrderBookAbstractRequest;
use HanischIt\KrakenApi\Model\OrderBook\OrderBookResponse;
use HanischIt\KrakenApi\Model\OrdersInfo\OrdersInfoAbstractRequest;
use HanischIt\KrakenApi\Model\OrdersInfo\OrdersInfoResponse;
use HanischIt\KrakenApi\Model\RecentTrades\RecentTradesAbstractRequest;
use HanischIt\KrakenApi\Model\RecentTrades\RecentTradesResponse;
use HanischIt\KrakenApi\Model\RequestOptions;
use HanischIt\KrakenApi\Model\Response;
use HanischIt\KrakenApi\Model\ServerTime\ServerTimeAbstractRequest;
use HanischIt\KrakenApi\Model\ServerTime\ServerTimeResponse;
use HanischIt\KrakenApi\Model\SpreadData\SpreadDataAbstractRequest;
use HanischIt\KrakenApi\Model\SpreadData\SpreadDataResponse;
use HanischIt\KrakenApi\Model\TradableAssetPairs\TradableAssetPairsAbstractRequest;
use HanischIt\KrakenApi\Model\TradableAssetPairs\TradableAssetPairsResponse;
use HanischIt\KrakenApi\Model\TradeBalance\TradeBalanceAbstractRequest;
use HanischIt\KrakenApi\Model\TradeBalance\TradeBalanceResponse;
use HanischIt\KrakenApi\Service\RequestService\GetRequest;
use HanischIt\KrakenApi\Service\RequestService\Nonce;
use HanischIt\KrakenApi\Service\RequestService\PostRequest;
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
     * @var AbstractRequest
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
        $this->request = new Service\RequestService\Request($postRequest, $getRequest);
        $this->header = new Header($apiKey, $apiSign);
    }

    /**
     * @param Service\RequestService\Request $request
     */
    public function setRequest(Service\RequestService\Request $request)
    {
        $this->request = $request;
    }

    /**
     * @return ServerTimeResponse|Response
     */
    public function getServerTime()
    {
        $serverTimeRequest = new ServerTimeAbstractRequest();

        return $this->doRequest($serverTimeRequest);
    }

    /**
     * @return AccountBalanceResponse|Response
     */
    public function getAccountBalance()
    {
        $accountBalanceRequest = new AccountBalanceAbstractRequest();

        return $this->doRequest($accountBalanceRequest);
    }

    /**
     * @param string $pair
     * @param string $type
     * @param string $orderType
     * @param null|float $price
     * @param null|float $volume
     *
     * @return Response|AddOrderResponse
     */
    public function addOrder($pair, $type, $orderType, $price = null, $volume = null)
    {
        $addOrderRequest = new AddOrderAbstractRequest($pair, $type, $orderType, $price, $volume);

        return $this->doRequest($addOrderRequest);
    }

    /**
     * @return Response|AssetsResponse
     */
    public function getAssets()
    {
        $assetsRequest = new AssetsAbstractRequest();

        return $this->doRequest($assetsRequest);
    }

    /**
     * @param array $assetNames
     *
     * @return Response|TickerResponse
     */
    public function getTicker(array $assetNames)
    {
        $tickerRequest = new TickerAbstractRequest($assetNames);

        return $this->doRequest($tickerRequest);
    }

    /**
     * @param string $assetPair
     * @param int|null $count
     *
     * @return Response|OrderBookResponse
     */
    public function getOrderBook($assetPair, $count = null)
    {
        $orderBookRequest = new OrderBookAbstractRequest($assetPair, $count);

        return $this->doRequest($orderBookRequest);
    }

    /**
     * @param bool $trades
     * @param null $userref
     *
     * @return Response|OpenOrdersResponse
     */
    public function getOpenOrders($trades = false, $userref = null)
    {
        $orderBookRequest = new OpenOrdersAbstractRequest($trades, $userref);

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
     * @return ClosedOrdersResponse|Response
     */
    public function getClosedOrders(
        $trades = false,
        $userref = null,
        $start = null,
        $end = null,
        $ofs = null,
        $closetime = null
    )
    {
        $orderBookRequest = new ClosedOrdersAbstractRequest($trades, $userref, $start, $end, $ofs, $closetime);

        return $this->doRequest($orderBookRequest);
    }

    /**
     * @param string $assetPair
     * @param null|string $since
     *
     * @return Response|RecentTradesResponse
     */
    public function getRecentTrades($assetPair, $since = null)
    {
        $recentTradeRequest = new RecentTradesAbstractRequest($assetPair, $since);

        return $this->doRequest($recentTradeRequest);
    }

    /**
     * @param string $assetPair
     * @param string $since
     * @return Response|SpreadDataResponse
     */
    public function getSpreadData($assetPair, $since = null)
    {
        $spreadDataRequest = new SpreadDataAbstractRequest($assetPair, $since);

        return $this->doRequest($spreadDataRequest);
    }

    /**
     * @param string $info
     * @param array|null $assetPairs
     * @return Response|TradableAssetPairsResponse
     */
    public function getTradableAssetPairs($info, array $assetPairs = null)
    {
        if (null !== $assetPairs) {
            $assetPairs = implode(',', $assetPairs);
        }
        $tradableAssetPairs = new TradableAssetPairsAbstractRequest($info, $assetPairs);

        return $this->doRequest($tradableAssetPairs);
    }

    /**
     * @param string $assetPair
     * @param null|int $interval
     * @param null|int $since
     * @return Response|OHLCDataResponse
     */
    public function getOHLCData($assetPair, $interval = null, $since = null)
    {
        $ohlcDataRequest = new OHLCDataAbstractRequest($assetPair, $interval, $since);

        return $this->doRequest($ohlcDataRequest);
    }

    /**
     * @param array|null $txids
     * @param bool $trades
     * @param null|string $userref
     * @return Response|OrdersInfoResponse
     */
    public function getOrdersInfo(array $txids, $trades = false, $userref = null)
    {
        $ordersInfoRequest = new OrdersInfoAbstractRequest($txids, $trades, $userref);

        return $this->doRequest($ordersInfoRequest);
    }

    /**
     * @param string|null $aclass
     * @param string|null $asset
     * @return Response|TradeBalanceResponse
     */
    public function getTradeBalance($aclass = null, $asset = null)
    {
        $tradeBalanceRequest = new TradeBalanceAbstractRequest($aclass, $asset);

        return $this->doRequest($tradeBalanceRequest);
    }

    /**
     * @param AbstractRequest $Request
     *
     * @return Response
     */
    private function doRequest(AbstractRequest $Request)
    {
        return $this->request->execute($Request, $this->requestOptions, $this->header);
    }
}
