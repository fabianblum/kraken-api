<?php
/**
 * Created by PhpStorm.
 * User: fabia
 * Date: 26.07.2017
 * Time: 16:55
 */

namespace tests\src\Service\RequestService;

use HanischIt\KrakenApi\Call\ServerTime\ServerTimeResponse;
use HanischIt\KrakenApi\Call\SpreadData\SpreadDataResponse;
use HanischIt\KrakenApi\Enum\VisibilityEnum;
use HanischIt\KrakenApi\Model\Header;
use HanischIt\KrakenApi\Model\RequestInterface;
use HanischIt\KrakenApi\Model\RequestOptions;
use HanischIt\KrakenApi\Model\ResponseInterface;
use HanischIt\KrakenApi\Service\RequestService\GetRequest;
use HanischIt\KrakenApi\Service\RequestService\PostRequest;
use HanischIt\KrakenApi\Service\RequestService\Request;
use PHPUnit\Framework\TestCase;


/**
 * Class RequestTest
 * @package tests\src\Service\RequestService
 */
class RequestTest extends TestCase
{

    public function testExecuteGet()
    {
        $endpoint = uniqid();
        $apiKey = uniqid();
        $apiSign = uniqid();
        $version = rand(1, 99999);
        $responseClassName = ServerTimeResponse::class;
        $json = '{ "result":{"unixTime":5949494, "rfc1123": "asdads"} }';

        $requestInterface = $this->getRequestInterfaceMock();
        $postRequest = $this->getPostRequestMock();
        $getRequest = $this->getGetRequestMock();
        $responseInterface = $this->getResponseInterfaceMock();
        $requestOptions = new RequestOptions($endpoint, $version);
        $header = new Header($apiKey, $apiSign);

        $responseInterface->expects(self::any())->method('getBody')->will(self::returnValue($json));
        $requestInterface->expects(self::once())->method('getVisibility')->willReturn(VisibilityEnum::VISIBILITY_PUBLIC);
        $getRequest->expects(self::once())->method('execute')->with($requestInterface, $requestOptions)->willReturn($responseInterface);
        $requestInterface->expects(self::once())->method('getResponseClassName')->will(self::returnValue($responseClassName));

        $requestService = new Request($postRequest, $getRequest);
        $responseObj = $requestService->execute($requestInterface, $requestOptions, $header);

        self::assertInstanceOf(ResponseInterface::class, $responseObj);
    }

    /**
     * @expectedException HanischIt\KrakenApi\Exception\ApiException
     *
     */
    public function testExecuteGetError()
    {
        $endpoint = uniqid();
        $apiKey = uniqid();
        $apiSign = uniqid();
        $version = rand(1, 99999);
        $responseClassName = ServerTimeResponse::class;
        $json = '{ "error": ["a error occured"]}';

        $requestInterface = $this->getRequestInterfaceMock();
        $postRequest = $this->getPostRequestMock();
        $getRequest = $this->getGetRequestMock();
        $responseInterface = $this->getResponseInterfaceMock();
        $requestOptions = new RequestOptions($endpoint, $version);
        $header = new Header($apiKey, $apiSign);

        $responseInterface->expects(self::any())->method('getBody')->will(self::returnValue($json));
        $requestInterface->expects(self::once())->method('getVisibility')->willReturn(VisibilityEnum::VISIBILITY_PUBLIC);
        $getRequest->expects(self::once())->method('execute')->with($requestInterface, $requestOptions)->willReturn($responseInterface);
        $requestInterface->expects(self::once())->method('getResponseClassName')->will(self::returnValue($responseClassName));

        $requestService = new Request($postRequest, $getRequest);
        $responseObj = $requestService->execute($requestInterface, $requestOptions, $header);

        self::assertInstanceOf(ResponseInterface::class, $responseObj);
    }

    public function testExecutePost()
    {
        $endpoint = uniqid();
        $apiKey = uniqid();
        $apiSign = uniqid();
        $version = rand(1, 99999);
        $responseClassName = ServerTimeResponse::class;
        $json = '{ "result":{"unixTime":5949494, "rfc1123": "asdads"} }';

        $requestInterface = $this->getRequestInterfaceMock();
        $postRequest = $this->getPostRequestMock();
        $getRequest = $this->getGetRequestMock();
        $responseInterface = $this->getResponseInterfaceMock();
        $requestOptions = new RequestOptions($endpoint, $version);
        $header = new Header($apiKey, $apiSign);

        $responseInterface->expects(self::any())->method('getBody')->will(self::returnValue($json));
        $requestInterface->expects(self::once())->method('getVisibility')->willReturn(VisibilityEnum::VISIBILITY_PRIVATE);
        $postRequest->expects(self::once())->method('execute')->with($requestInterface, $requestOptions)->willReturn($responseInterface);
        $requestInterface->expects(self::once())->method('getResponseClassName')->will(self::returnValue($responseClassName));

        $requestService = new Request($postRequest, $getRequest);
        $responseObj = $requestService->execute($requestInterface, $requestOptions, $header);

        self::assertInstanceOf(ResponseInterface::class, $responseObj);
    }

    public function testExecuteGetManualMapping()
    {
        $endpoint = uniqid();
        $apiKey = uniqid();
        $apiSign = uniqid();
        $version = rand(1, 99999);
        $responseClassName = SpreadDataResponse::class;
        $json = '{ "result":{"last":5949494, "ASDASD": [10, 11, 12]} }';

        $requestInterface = $this->getRequestInterfaceMock();
        $postRequest = $this->getPostRequestMock();
        $getRequest = $this->getGetRequestMock();
        $responseInterface = $this->getResponseInterfaceMock();
        $requestOptions = new RequestOptions($endpoint, $version);
        $header = new Header($apiKey, $apiSign);

        $responseInterface->expects(self::any())->method('getBody')->will(self::returnValue($json));
        $requestInterface->expects(self::once())->method('getVisibility')->willReturn(VisibilityEnum::VISIBILITY_PUBLIC);
        $getRequest->expects(self::once())->method('execute')->with($requestInterface, $requestOptions)->willReturn($responseInterface);
        $requestInterface->expects(self::once())->method('getResponseClassName')->will(self::returnValue($responseClassName));

        $requestService = new Request($postRequest, $getRequest);
        $responseObj = $requestService->execute($requestInterface, $requestOptions, $header);

        self::assertInstanceOf(ResponseInterface::class, $responseObj);
    }

    public function testExecuteManualMapping()
    {
        $endpoint = uniqid();
        $apiKey = uniqid();
        $apiSign = uniqid();
        $version = rand(1, 99999);
        $responseClassName = SpreadDataResponse::class;
        $json = '{ "result":{"last":5949494, "ASDASD": [10, 11, 12]} }';

        $requestInterface = $this->getRequestInterfaceMock();
        $postRequest = $this->getPostRequestMock();
        $getRequest = $this->getGetRequestMock();
        $responseInterface = $this->getResponseInterfaceMock();
        $requestOptions = new RequestOptions($endpoint, $version);
        $header = new Header($apiKey, $apiSign);

        $responseInterface->expects(self::any())->method('getBody')->will(self::returnValue($json));
        $requestInterface->expects(self::once())->method('getVisibility')->willReturn(VisibilityEnum::VISIBILITY_PRIVATE);
        $postRequest->expects(self::once())->method('execute')->with($requestInterface, $requestOptions)->willReturn($responseInterface);
        $requestInterface->expects(self::once())->method('getResponseClassName')->will(self::returnValue($responseClassName));

        $requestService = new Request($postRequest, $getRequest);
        $responseObj = $requestService->execute($requestInterface, $requestOptions, $header);

        self::assertInstanceOf(ResponseInterface::class, $responseObj);
    }

    /**
     * @return \PHPUnit_Framework_MockObject_MockObject|RequestInterface
     */
    private function getRequestInterfaceMock()
    {
        $stub = $this->getMock(RequestInterface::class);

        return $stub;
    }

    /**
     * @return \PHPUnit_Framework_MockObject_MockObject|PostRequest
     */
    private function getPostRequestMock()
    {
        $stub = $this->getMockBuilder(PostRequest::class)->disableOriginalConstructor()->getMock();

        return $stub;
    }

    /**
     * @return \PHPUnit_Framework_MockObject_MockObject|GetRequest
     */
    private function getGetRequestMock()
    {
        $stub = $this->getMockBuilder(GetRequest::class)->disableOriginalConstructor()->getMock();

        return $stub;
    }

    /**
     * @return \PHPUnit_Framework_MockObject_MockObject|ResponseInterface
     */
    private function getResponseInterfaceMock()
    {
        $stub = $this->getMock(ResponseInterface::class, ['getBody']);

        return $stub;
    }

    /**
     * @return \PHPUnit_Framework_MockObject_MockObject
     */
    private function getNewClass($newClass)
    {
        $stub = $this->getMock($newClass, ['manualMapping', 'setData']);

        return $stub;
    }
}
