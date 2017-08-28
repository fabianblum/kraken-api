<?php
/**
 * @author  Fabian Hanisch
 * @since   16.07.2017 02:40
 * @version 1.0
 */

namespace HanischIt\KrakenApi\Service\RequestService;

use HanischIt\KrakenApi\Enum\RequestMethodEnum;
use HanischIt\KrakenApi\External\HttpClient;
use HanischIt\KrakenApi\Model\RequestInterface;
use HanischIt\KrakenApi\Model\RequestOptions;
use HanischIt\KrakenApi\Model\ResponseInterface;

/**
 * Class PostRequest
 *
 * @package HanischIt\KrakenApi\Service\RequestService
 */
class GetRequest
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
     *
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
     *
     * @return ResponseInterface
     */
    public function execute(RequestInterface $request, RequestOptions $requestOptions)
    {
        $path = $requestOptions->getEndpoint() . "/" . $requestOptions->getVersion() . "/public/" . $request->getMethod();

        return $this->client->request(RequestMethodEnum::REQUEST_METHOD_GET, $path, [
            'query' => $request->getRequestData()
        ]);
    }
}
