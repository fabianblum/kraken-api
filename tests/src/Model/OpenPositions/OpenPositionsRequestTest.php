<?php

namespace src\Model\OpenPositions;

use HanischIt\KrakenApi\Enum\VisibilityEnum;
use HanischIt\KrakenApi\Model\OpenPositions\OpenPositionsRequest;
use HanischIt\KrakenApi\Model\OpenPositions\OpenPositionsResponse;
use PHPUnit\Framework\TestCase;

class OpenPositionsRequestTest extends TestCase
{
    public function testRequest()
    {
        $txid = uniqid();
        $docalcs = uniqid();

        $data = [];
        $data["txid"] = $txid;
        $data["docalcs"] = $docalcs;

        $tradesRequest = new OpenPositionsRequest($txid, $docalcs);
        self::assertEquals($tradesRequest->getMethod(), 'OpenPositions');
        self::assertEquals($tradesRequest->getVisibility(), VisibilityEnum::VISIBILITY_PRIVATE);
        self::assertEquals($tradesRequest->getRequestData(), $data);
        self::assertEquals($tradesRequest->getResponseClassName(), OpenPositionsResponse::class);
    }
}
