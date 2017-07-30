<?php

namespace src\Model\OrdersInfo;

use HanischIt\KrakenApi\Enum\VisibilityEnum;
use HanischIt\KrakenApi\Model\OrdersInfo\OrdersInfoAbstractRequest;
use HanischIt\KrakenApi\Model\OrdersInfo\OrdersInfoResponse;
use PHPUnit\Framework\TestCase;

class OrdersInfoRequestTest extends TestCase
{
    public function testRequest()
    {
        $txId = [uniqid()];
        $userref = uniqid();

        $ordersInfoRequest = new OrdersInfoAbstractRequest($txId, false, $userref);
        self::assertEquals($ordersInfoRequest->getMethod(), 'QueryOrders');
        self::assertEquals($ordersInfoRequest->getVisibility(), VisibilityEnum::VISIBILITY_PRIVATE);
        self::assertEquals($ordersInfoRequest->getRequestData(), ["trades" => false, "userref" => $userref, "txid" => implode(",", $txId)]);
        self::assertEquals($ordersInfoRequest->getResponseClassName(), OrdersInfoResponse::class);
    }
}
