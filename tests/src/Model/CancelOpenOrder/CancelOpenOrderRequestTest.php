<?php

namespace src\Model\CancelOpenOrder;

use HanischIt\KrakenApi\Call\CancelOpenOrder\CancelOpenOrderRequest;
use HanischIt\KrakenApi\Enum\VisibilityEnum;
use PHPUnit\Framework\TestCase;

class CancelOpenOrderRequestTest extends TestCase
{
    public function testRequest()
    {
        $txid = uniqid();

        $data = [];
        $data["txid"] = $txid;

        $cancelOpenOrderRequest = new CancelOpenOrderRequest($txid);
        self::assertEquals($cancelOpenOrderRequest->getMethod(), 'CancelOrder');
        self::assertEquals($cancelOpenOrderRequest->getVisibility(), VisibilityEnum::VISIBILITY_PRIVATE);
        self::assertEquals($cancelOpenOrderRequest->getRequestData(), $data);
        self::assertEquals($cancelOpenOrderRequest->getResponseClassName(),
            \HanischIt\KrakenApi\Call\CancelOpenOrder\CancelOpenOrderResponse::class);
    }
}
