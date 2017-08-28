<?php

namespace src\Model\Trades;

use HanischIt\KrakenApi\Call\CancelOpenOrder\CancelOpenOrderResponse;
use PHPUnit\Framework\TestCase;

class CancelOpenOrderResponseTest extends TestCase
{
    public function testResponse()
    {
        $data = [];
        $data["count"] = rand(1, 100);
        $data["pending"] = rand(1, 100);

        $cancelOpenOrderRequest = new CancelOpenOrderResponse();
        $cancelOpenOrderRequest->manualMapping($data);

        self::assertEquals($data["count"], $cancelOpenOrderRequest->getCount());
        self::assertEquals($data["pending"], $cancelOpenOrderRequest->getPending());
    }
}
