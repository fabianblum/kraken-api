<?php

namespace src\Model\LedgersInfo;

use HanischIt\KrakenApi\Call\QueryLedgers\QueryLedgersRequest;
use HanischIt\KrakenApi\Call\QueryLedgers\QueryLedgersResponse;
use HanischIt\KrakenApi\Enum\VisibilityEnum;
use PHPUnit\Framework\TestCase;

class QueryLedgersRequestTest extends TestCase
{
    public function testRequest()
    {
        $id = uniqid();

        $data = [];
        $data["id"] = $id;

        $ledgersInfoRequest = new QueryLedgersRequest($id);
        self::assertEquals($ledgersInfoRequest->getMethod(), 'QueryLedgers');
        self::assertEquals($ledgersInfoRequest->getVisibility(), VisibilityEnum::VISIBILITY_PRIVATE);
        self::assertEquals($ledgersInfoRequest->getRequestData(), $data);
        self::assertEquals($ledgersInfoRequest->getResponseClassName(), QueryLedgersResponse::class);
    }
}
