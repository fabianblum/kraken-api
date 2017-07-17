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
use HanischIt\KrakenApi\Model\Assets\AssetsRequest;
use HanischIt\KrakenApi\Model\Assets\AssetsResponse;
use HanischIt\KrakenApi\Model\GetTicker\TickerRequest;
use HanischIt\KrakenApi\Model\GetTicker\TickerResponse;
use HanischIt\KrakenApi\Model\Header;
use HanischIt\KrakenApi\Model\RequestInterface;
use HanischIt\KrakenApi\Model\RequestOptions;
use HanischIt\KrakenApi\Model\ResponseInterface;
use HanischIt\KrakenApi\Model\ServerTime\ServerTimeRequest;
use HanischIt\KrakenApi\Model\ServerTime\ServerTimeResponse;
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
     * @var HttpClient
     */
    private $httpClient;
    /**
     * @var RequestHeader
     */
    private $requestHeader;
    /**
     * @var string
     */
    private $apiKey;
    /**
     * @var string
     */
    private $apiSign;
    /**
     * @var string
     */
    private $version;

    /**
     * KrakenApi constructor.
     *
     * @param string $apiKey
     * @param string $apiSign
     */
    public function __construct($apiKey, $apiSign)
    {
        $this->httpClient = new HttpClient(['verify' => false]);
        $this->requestHeader = new RequestHeader();
        $this->endpoint = 'https://api.kraken.com/';
        $this->version = '0';
        $this->apiKey = $apiKey;
        $this->apiSign = $apiSign;
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
     * @param string     $pair
     * @param string     $type
     * @param string     $orderType
     * @param null|float $price
     * @param null|float $volume
     *
     * @return ResponseInterface
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
     * @param RequestInterface $requestInterface
     *
     * @return ResponseInterface
     */
    private function doRequest(RequestInterface $requestInterface)
    {
        $requestOptions = new RequestOptions($this->endpoint, $this->version);
        $header = new Header($this->apiKey, $this->apiSign);
        $request = new Request($this->httpClient, $this->requestHeader);

        return $request->execute($requestInterface, $requestOptions, $header);
    }
}
