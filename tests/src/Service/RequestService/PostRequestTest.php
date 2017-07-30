<?php
/**
 * @author fabian.hanisch
 * @since  2017-07-17
 */

namespace tests\src\Service\RequestService;

use HanischIt\KrakenApi\Enum\RequestMethodEnum;
use HanischIt\KrakenApi\Model\Header;
use HanischIt\KrakenApi\Model\RequestInterface;
use HanischIt\KrakenApi\Model\RequestOptions;
use HanischIt\KrakenApi\Service\RequestService\Nonce;
use HanischIt\KrakenApi\Service\RequestService\PostRequest;
use PHPUnit_Framework_TestCase;
use Psr\Http\Message\ResponseInterface;

/**
 * Class PostRequestTest
 *
 * @package tests\src\Service\RequestService
 */
class PostRequestTest extends PHPUnit_Framework_TestCase
{
    public function testExecute()
    {
        $httpClient = $this->getHttpClientMock();
        $requestHeader = $this->getRequestHeaderMock();
        $requestInterface = $this->getRequestInterfaceMock();
        $requestOptions = $this->getRequestOptionsMock();
        $responseInterface = $this->getResponseInterfaceMock();
        $header = $this->getHeadersMod();
        $nonceService = $this->getNonceMock();
        $nonce = uniqid();


        $endpoint = uniqid();
        $version = rand(1, 1000);
        $method = uniqid();
        $apiKey = uniqid();
        $apiSign = uniqid();
        $apiSignEncoded = base64_encode($apiSign);

        $path = $endpoint . $version . "/private/" . $method;


        $httpClient->expects(self::once())->method('request')->with(RequestMethodEnum::REQUEST_METHOD_POST, $path, [
            'headers' => [
                'API-Key' => $apiKey,
                'API-Sign' => $apiSignEncoded
            ],
            'form_params' => ["nonce" => $nonce]
        ])->will(self::returnValue($responseInterface));

        $requestHeader->expects(self::once())->method('asArray')->with(
            $header,
            self::anything(),
            "/" . $version . "/private/" . $method,
            self::anything()
        )->will(self::returnValue(["API-Key" => $apiKey, "API-Sign" => $apiSignEncoded]));


        $requestOptions->expects(self::any())->method('getEndpoint')->will(self::returnValue($endpoint));
        $requestOptions->expects(self::any())->method('getVersion')->will(self::returnValue($version));

        $requestInterface->expects(self::any())->method('getMethod')->will(self::returnValue($method));
        $requestInterface->expects(self::any())->method('getRequestData')->will(self::returnValue([]));

        $nonceService->expects(self::any())->method('generate')->will(self::returnValue($nonce));


        $getRequest = new PostRequest($httpClient, $requestHeader, $nonceService);
        $getRequest->execute($requestInterface, $requestOptions, $header);
    }

    /**
     * @return \PHPUnit_Framework_MockObject_MockObject
     */
    public function getHttpClientMock()
    {
        $stub = $this->getMockBuilder('\HanischIt\KrakenApi\External\HttpClient')->disableOriginalConstructor()->getMock();

        return $stub;
    }

    /**
     * @return \PHPUnit_Framework_MockObject_MockObject
     */
    public function getRequestHeaderMock()
    {
        $stub = $this->getMockBuilder('\HanischIt\KrakenApi\Service\RequestService\RequestHeader')->disableOriginalConstructor()->getMock();

        return $stub;
    }

    /**
     * @return \PHPUnit_Framework_MockObject_MockObject
     */
    public function getRequestInterfaceMock()
    {
        $stub = $this->getMockBuilder(RequestInterface::class)->disableOriginalConstructor()->getMock();

        return $stub;
    }

    /**
     * @return \PHPUnit_Framework_MockObject_MockObject
     */
    public function getRequestOptionsMock()
    {
        $stub = $this->getMockBuilder(RequestOptions::class)->disableOriginalConstructor()->getMock();

        return $stub;
    }

    /**
     * @return \PHPUnit_Framework_MockObject_MockObject
     */
    public function getResponseInterfaceMock()
    {
        $stub = $this->getMockBuilder(ResponseInterface::class)->disableOriginalConstructor()->getMock();

        return $stub;
    }

    /**
     * @return \PHPUnit_Framework_MockObject_MockObject
     */
    public function getHeadersMod()
    {
        $stub = $this->getMockBuilder(Header::class)->disableOriginalConstructor()->getMock();

        return $stub;
    }

    /**
     * @return \PHPUnit_Framework_MockObject_MockObject
     */
    public function getNonceMock()
    {
        $stub = $this->getMockBuilder(Nonce::class)->disableOriginalConstructor()->getMock();

        return $stub;
    }
}
