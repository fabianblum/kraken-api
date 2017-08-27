<?php

namespace src\Model\LedgersInfo;

use HanischIt\KrakenApi\Enum\VisibilityEnum;
use HanischIt\KrakenApi\Model\LedgersInfo\LedgersInfoRequest;
use HanischIt\KrakenApi\Model\LedgersInfo\LedgersInfoResponse;
use PHPUnit\Framework\TestCase;

class LedgersInfoRequestTest extends TestCase
{
    public function testRequest()
    {
        $aclass = uniqid();
        $asset = uniqid();
        $type = uniqid();
        $start = uniqid();
        $end = uniqid();
        $ofs = uniqid();

        $data = [];
        $data["aclass"] = $aclass;
        $data["asset"] = $asset;
        $data["type"] = $type;
        $data["start"] = $start;
        $data["end"] = $end;
        $data["ofs"] = $ofs;

        $ledgersInfoRequest = new LedgersInfoRequest($aclass, $asset, $type, $start, $end, $ofs);
        self::assertEquals($ledgersInfoRequest->getMethod(), 'Ledgers');
        self::assertEquals($ledgersInfoRequest->getVisibility(), VisibilityEnum::VISIBILITY_PRIVATE);
        self::assertEquals($ledgersInfoRequest->getRequestData(), $data);
        self::assertEquals($ledgersInfoRequest->getResponseClassName(), LedgersInfoResponse::class);
    }
}
