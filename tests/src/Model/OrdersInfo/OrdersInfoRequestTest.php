<?php

namespace src\Model\OrdersInfo;

use HanischIt\KrakenApi\Call\OrdersInfo\OrdersInfoResponse;
use HanischIt\KrakenApi\Enum\VisibilityEnum;
use PHPUnit\Framework\TestCase;

class OrdersInfoRequestTest extends TestCase
{
    public function testRequest()
    {
        $txId = [uniqid()];
        $userref = uniqid();

        $ordersInfoRequest = new \HanischIt\KrakenApi\Call\OrdersInfo\OrdersInfoRequest($txId, false, $userref);
        self::assertEquals($ordersInfoRequest->getMethod(), 'QueryOrders');
        self::assertEquals($ordersInfoRequest->getVisibility(), VisibilityEnum::VISIBILITY_PRIVATE);
        self::assertEquals($ordersInfoRequest->getRequestData(), ["trades" => false, "userref" => $userref, "txid" => implode(",", $txId)]);
        self::assertEquals($ordersInfoRequest->getResponseClassName(), OrdersInfoResponse::class);
    }
}
