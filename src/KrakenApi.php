<?php
/**
 * @author Fabian Hanisch
 * @since 16.07.2017 02:56
 * @version 1.0
 */

namespace HanischIt\KrakenApi;

use HanischIt\KrakenApi\External\HttpClient;
use HanischIt\KrakenApi\Model\Header;
use HanischIt\KrakenApi\Model\RequestOptions;
use HanischIt\KrakenApi\Model\ResponseInterface;
use HanischIt\KrakenApi\Model\ServerTime\ServerTimeRequest;
use HanischIt\KrakenApi\Model\ServerTime\ServerTimeResponse;
use HanischIt\KrakenApi\Service\RequestService\Request;
use HanischIt\KrakenApi\Service\RequestService\RequestHeader;

/**
 * Class KrakenApi
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
     * KrakenApi constructor.
     * @param string $apiKey
     * @param string $apiSign
     */
    public function __construct($apiKey, $apiSign)
    {
        $this->httpClient = new HttpClient();
        $this->requestHeader = new RequestHeader();
        $this->endpoint = 'https://api.kraken.com/0';
        $this->apiKey = $apiKey;
        $this->apiSign = $apiSign;
    }

    /**
     * @return ServerTimeResponse|ResponseInterface
     */
    public function getServerTime()
    {
        $serverTimeRequest = new ServerTimeRequest();
        $requestOptions = new RequestOptions($this->endpoint);
        $header = new Header($this->apiKey, $this->apiSign);

        $request = new Request($this->httpClient, $this->requestHeader);
        return $request->execute($serverTimeRequest, $requestOptions, $header);
    }
}
