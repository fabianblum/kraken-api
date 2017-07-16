<?php
/**
 * @author Fabian Hanisch
 * @since 14.07.2017 23:08
 * @version 1.0
 */

namespace HanischIt\KrakenApi\Service\RequestService;

use HanischIt\KrakenApi\Enum\RequestMethodEnum;
use HanischIt\KrakenApi\Enum\VisibilityEnum;
use HanischIt\KrakenApi\External\HttpClient;
use HanischIt\KrakenApi\Model\Header;
use HanischIt\KrakenApi\Model\RequestInterface;
use HanischIt\KrakenApi\Model\RequestOptions;
use HanischIt\KrakenApi\Model\ResponseInterface;

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
     * @param RequestOptions $requestOptions
     * @param Header $header
     * @return ResponseInterface
     */
    public function execute(RequestInterface $request, RequestOptions $requestOptions, Header $header)
    {
        $method = $request->getVisibility() == VisibilityEnum::PRIVATE ? RequestMethodEnum::REQUEST_METHOD_POST : RequestMethodEnum::REQUEST_METHOD_GET;

        if ($method === RequestMethodEnum::REQUEST_METHOD_POST) {
            $response = (new PostRequest($this->client, $this->requestHeader))->execute($request, $requestOptions, $header);
        } else {
            $response = (new GetRequest($this->client, $this->requestHeader))->execute($request, $requestOptions, $header);
        }

        $responseClass = $request->getResponseClassName();
        $responseObject = new $responseClass();
        $result = json_decode($response->getBody(), true);
        if (isset($result["result"])) {
            foreach ($result["result"] as $key => $val) {
                $methodName = "set" . ucfirst($key);
                $responseObject->$methodName($val);
            }
        }

        return $responseObject;
    }
}
