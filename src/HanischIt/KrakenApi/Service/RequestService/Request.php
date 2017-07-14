<?php
/**
 * @author Fabian Hanisch
 * @since 14.07.2017 23:08
 * @version 1.0
 */

namespace HanischIt\KrakenApi\Service\RequestService;

use HanischIt\KrakenApi\External\HttpClient;
use HanischIt\KrakenApi\Model\Header;
use HanischIt\KrakenApi\Model\RequestInterface;

/**
 * Class RequestServerTime
 * @package HanischIt\KrakenApi\Service\RequestService
 */
class Request implements RequestServiceInterface
{
    /**
     * @var HttpClient
     */
    private $client;
    /**
     * @var RequestHeader
     */
    private $requestHeader;

    /**
     * Request constructor.
     * @param HttpClient $client
     * @param RequestHeader $requestHeader
     */
    public function __construct(HttpClient $client, RequestHeader $requestHeader)
    {
        $this->client = $client;
        $this->requestHeader = $requestHeader;
    }

    /**
     * @param RequestInterface $request
     * @param Header $header
     */
    public function execute(RequestInterface $request, Header $header)
    {
        $this->client->request('', '', [
            'headers' => $this->requestHeader->asArray($header)
        ]);
    }
}
