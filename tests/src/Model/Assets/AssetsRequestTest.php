<?php
/**
 * Created by PhpStorm.
 * User: fabia
 * Date: 26.07.2017
 * Time: 18:56
 */

namespace src\Model\Assets;

use HanischIt\KrakenApi\Enum\VisibilityEnum;
use PHPUnit\Framework\TestCase;

class AssetsRequestTest extends TestCase
{
    public function testRequest()
    {
        $assetRequest = new \HanischIt\KrakenApi\Call\Assets\AssetsRequest();
        self::assertEquals($assetRequest->getMethod(), 'Assets');
        self::assertEquals($assetRequest->getVisibility(), VisibilityEnum::VISIBILITY_PUBLIC);
        self::assertEquals($assetRequest->getRequestData(), []);
        self::assertEquals($assetRequest->getResponseClassName(),
            \HanischIt\KrakenApi\Call\Assets\AssetsResponse::class);
    }
}
