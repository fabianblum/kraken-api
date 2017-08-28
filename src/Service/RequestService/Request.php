<?php
/**
 * @author  Fabian Hanisch
 * @since   14.07.2017 23:08
 * @version 1.0
 */

namespace HanischIt\KrakenApi\Service\RequestService;

use HanischIt\KrakenApi\Enum\RequestMethodEnum;
use HanischIt\KrakenApi\Enum\VisibilityEnum;
use HanischIt\KrakenApi\Exception\ApiException;
use HanischIt\KrakenApi\Model\Header;
use HanischIt\KrakenApi\Model\RequestInterface;
use HanischIt\KrakenApi\Model\RequestOptions;
use HanischIt\KrakenApi\Model\ResponseInterface;

/**
 * Class Request
 *
 * @package HanischIt\KrakenApi\Service\RequestService
 */
class Request implements RequestServiceInterface
{
    /**
     * @var PostRequest
     */
    private $postRequest;
    /**
     * @var GetRequest
     */
    private $getRequest;

    /**
     * Request constructor.
     *
     * @param PostRequest $postRequest
     * @param GetRequest $getRequest
     */
    public function __construct(PostRequest $postRequest, GetRequest $getRequest)
    {
        $this->postRequest = $postRequest;
        $this->getRequest = $getRequest;
    }

    /**
     * @param RequestInterface $request
     * @param RequestOptions $requestOptions
     * @param Header $header
     *
     * @return ResponseInterface
     */
    public function execute(RequestInterface $request, RequestOptions $requestOptions, Header $header)
    {
        $method = $request->getVisibility() == VisibilityEnum::VISIBILITY_PRIVATE ? RequestMethodEnum::REQUEST_METHOD_POST : RequestMethodEnum::REQUEST_METHOD_GET;

        if ($method === RequestMethodEnum::REQUEST_METHOD_POST) {
            $response = $this->postRequest->execute($request, $requestOptions, $header);
        } else {
            $response = $this->getRequest->execute($request, $requestOptions);
        }

        $responseClass = $request->getResponseClassName();
        $result = json_decode($response->getBody(), true);
        $this->handleError($result);
        $responseObject = new $responseClass();
        if (isset($result["result"])) {
            if (method_exists($responseObject, "manualMapping")) {
                $responseObject->manualMapping($result["result"]);
            } else {
                foreach ($result["result"] as $key => $val) {
                    $methodName = "set" . ucfirst($key);
                    $responseObject->$methodName($val);
                }
            }
        }

        return $responseObject;
    }

    /**
     * @param array $result
     * @throws ApiException
     */
    private function handleError($result)
    {
        if (isset($result["error"]) && !empty($result["error"])) {
            throw new ApiException(implode($result["error"], ","));
        }
    }
}
