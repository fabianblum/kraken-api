<?php
/**
 * Created by PhpStorm.
 * User: fabia
 * Date: 26.07.2017
 * Time: 18:56
 */

namespace src\Model\Assets;

use HanischIt\KrakenApi\Enum\VisibilityEnum;
use HanischIt\KrakenApi\Model\Assets\AssetsRequest;
use HanischIt\KrakenApi\Model\Assets\AssetsResponse;
use PHPUnit\Framework\TestCase;

class AssetsRequestTest extends TestCase
{
    public function testRequest()
    {
        $assetRequest = new AssetsRequest();
        self::assertEquals($assetRequest->getMethod(), 'Assets');
        self::assertEquals($assetRequest->getVisibility(), VisibilityEnum::VISIBILITY_PUBLIC);
        self::assertEquals($assetRequest->getRequestData(), []);
        self::assertEquals($assetRequest->getResponseClassName(), AssetsResponse::class);
    }
}
