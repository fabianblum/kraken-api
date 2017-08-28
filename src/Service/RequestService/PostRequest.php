<?php
/**
 * @author  Fabian Hanisch
 * @since   16.07.2017 02:40
 * @version 1.0
 */

namespace HanischIt\KrakenApi\Service\RequestService;

use HanischIt\KrakenApi\Enum\RequestMethodEnum;
use HanischIt\KrakenApi\External\HttpClient;
use HanischIt\KrakenApi\Model\Header;
use HanischIt\KrakenApi\Model\RequestInterface;
use HanischIt\KrakenApi\Model\RequestOptions;

/**
 * Class PostRequest
 *
 * @package HanischIt\KrakenApi\Service\RequestService
 */
class PostRequest
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
     * @var Nonce
     */
    private $nonce;

    /**
     * Request constructor.
     *
     * @param HttpClient $client
     * @param RequestHeader $requestHeader
     * @param Nonce $nonce
     */
    public function __construct(HttpClient $client, RequestHeader $requestHeader, Nonce $nonce)
    {
        $this->client = $client;
        $this->requestHeader = $requestHeader;
        $this->nonce = $nonce;
    }

    /**
     * @param RequestInterface $request
     * @param RequestOptions $requestOptions
     * @param Header $header
     *
     * @return \Psr\Http\Message\ResponseInterface
     */
    public function execute(RequestInterface $request, RequestOptions $requestOptions, Header $header)
    {
        $nonce = $this->nonce->generate();
        $requestData = $request->getRequestData();
        $requestData["nonce"] = $nonce;
        $path = $requestOptions->getEndpoint() . $requestOptions->getVersion() . "/private/" . $request->getMethod();

        return $this->client->request(RequestMethodEnum::REQUEST_METHOD_POST, $path, [
            'headers' => $this->requestHeader->asArray(
                $header,
                $requestData,
                "/" . $requestOptions->getVersion() . "/private/" . $request->getMethod(),
                $nonce
            ),
            'form_params' => $requestData
        ]);
    }
}
