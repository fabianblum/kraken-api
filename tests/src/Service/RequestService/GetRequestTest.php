<?php
/**
 * @author fabian.hanisch
 * @since  2017-07-17
 */

namespace tests\src\Service\RequestService;

use HanischIt\KrakenApi\Enum\RequestMethodEnum;
use HanischIt\KrakenApi\Service\RequestService\GetRequest;
use PHPUnit_Framework_TestCase;

/**
 * Class GetRequestTest
 *
 * @package tests\src\Service\RequestService
 */
class GetRequestTest extends PHPUnit_Framework_TestCase
{
    public function testExecute()
    {
        $httpClient = $this->getHttpClientMock();
        $requestHeader = $this->getRequestHeaderMock();
        $requestInterface = $this->getRequestInterfaceMock();
        $requestOptions = $this->getRequestOptionsMock();
        $responseInterface = $this->getResponseInterfaceMock();

        $endpoint = uniqid();
        $version = rand(1, 1000);
        $method = uniqid();

        $path = $endpoint . "/" . $version . "/public/" . $method;

        $httpClient->expects(self::once())->method('request')->with(RequestMethodEnum::REQUEST_METHOD_GET, $path, [
            'query' => []
        ])->will(self::returnValue($responseInterface));

        $requestOptions->expects(self::once())->method('getEndpoint')->will(self::returnValue($endpoint));
        $requestOptions->expects(self::once())->method('getVersion')->will(self::returnValue($version));

        $requestInterface->expects(self::once())->method('getMethod')->will(self::returnValue($method));
        $requestInterface->expects(self::once())->method('getRequestData')->will(self::returnValue([]));


        $getRequest = new GetRequest($httpClient, $requestHeader);
        $getRequest->execute($requestInterface, $requestOptions);
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
        $stub = $this->getMockBuilder('\HanischIt\KrakenApi\Model\RequestInterface')->disableOriginalConstructor()->getMock();

        return $stub;
    }

    /**
     * @return \PHPUnit_Framework_MockObject_MockObject
     */
    public function getRequestOptionsMock()
    {
        $stub = $this->getMockBuilder('\HanischIt\KrakenApi\Model\RequestOptions')->disableOriginalConstructor()->getMock();

        return $stub;
    }

    /**
     * @return \PHPUnit_Framework_MockObject_MockObject
     */
    public function getResponseInterfaceMock()
    {
        $stub = $this->getMockBuilder('\HanischIt\KrakenApi\Model\ResponseInterface')->disableOriginalConstructor()->getMock();

        return $stub;
    }
}
