<?php
/**
 * Created by PhpStorm.
 * User: fabia
 * Date: 26.07.2017
 * Time: 18:56
 */

namespace src\Model\ClosedOrders;

use HanischIt\KrakenApi\Enum\VisibilityEnum;
use HanischIt\KrakenApi\Model\ClosedOrders\ClosedOrdersAbstractRequest;
use HanischIt\KrakenApi\Model\ClosedOrders\ClosedOrdersResponse;
use PHPUnit\Framework\TestCase;

class ClosedOrdersRequestTest extends TestCase
{
    public function testRequest()
    {
        $assetRequest = new ClosedOrdersAbstractRequest();
        self::assertEquals($assetRequest->getMethod(), 'ClosedOrders');
        self::assertEquals($assetRequest->getVisibility(), VisibilityEnum::VISIBILITY_PRIVATE);
        self::assertEquals($assetRequest->getRequestData(), ["trades" => false]);
        self::assertEquals($assetRequest->getResponseClassName(), ClosedOrdersResponse::class);
    }

    public function testRequestAll()
    {
        $trades = 1 === rand(0, 1);
        $userref = uniqid();
        $start = uniqid();
        $end = uniqid();
        $ofs = uniqid();
        $closetime = uniqid();

        $arr = [];
        $arr["trades"] = $trades;
        $arr["userref"] = $userref;
        $arr["start"] = $start;
        $arr["end"] = $end;
        $arr["ofs"] = $ofs;
        $arr["closetime"] = $closetime;


        $assetRequest = new ClosedOrdersAbstractRequest($trades, $userref, $start, $end, $ofs, $closetime);
        self::assertEquals($assetRequest->getMethod(), 'ClosedOrders');
        self::assertEquals($assetRequest->getVisibility(), VisibilityEnum::VISIBILITY_PRIVATE);
        self::assertEquals($assetRequest->getRequestData(), $arr);
        self::assertEquals($assetRequest->getResponseClassName(), ClosedOrdersResponse::class);
    }
}
