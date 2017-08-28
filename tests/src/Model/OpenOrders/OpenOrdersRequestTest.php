<?php
/**
 * Created by PhpStorm.
 * User: fabia
 * Date: 26.07.2017
 * Time: 18:56
 */

namespace src\Model\ClosedOrders;

use HanischIt\KrakenApi\Call\OpenOrders\OpenOrdersRequest;
use HanischIt\KrakenApi\Call\OpenOrders\OpenOrdersResponse;
use HanischIt\KrakenApi\Enum\VisibilityEnum;
use PHPUnit\Framework\TestCase;

class OpenOrdersRequestTest extends TestCase
{
    public function testRequest()
    {
        $assetRequest = new OpenOrdersRequest();
        self::assertEquals($assetRequest->getMethod(), 'OpenOrders');
        self::assertEquals($assetRequest->getVisibility(), VisibilityEnum::VISIBILITY_PRIVATE);
        self::assertEquals($assetRequest->getRequestData(), ["trades" => false]);
        self::assertEquals($assetRequest->getResponseClassName(), OpenOrdersResponse::class);
    }

    public function testRequestAll()
    {
        $trades = 1 === rand(0, 1);
        $userref = uniqid();

        $arr = [];
        $arr["trades"] = $trades;
        $arr["userref"] = $userref;


        $assetRequest = new OpenOrdersRequest($trades, $userref);
        self::assertEquals($assetRequest->getMethod(), 'OpenOrders');
        self::assertEquals($assetRequest->getVisibility(), VisibilityEnum::VISIBILITY_PRIVATE);
        self::assertEquals($assetRequest->getRequestData(), $arr);
        self::assertEquals($assetRequest->getResponseClassName(), OpenOrdersResponse::class);
    }
}
