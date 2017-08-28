<?php
/**
 * Created by PhpStorm.
 * User: fabia
 * Date: 26.07.2017
 * Time: 18:56
 */

namespace src\Model\ServerTime;

use HanischIt\KrakenApi\Call\ServerTime\ServerTimeRequest;
use HanischIt\KrakenApi\Call\ServerTime\ServerTimeResponse;
use HanischIt\KrakenApi\Enum\VisibilityEnum;
use PHPUnit\Framework\TestCase;

class ServerTimeRequestTest extends TestCase
{
    public function testRequest()
    {
        $accountBalanceRequest = new ServerTimeRequest();
        self::assertEquals($accountBalanceRequest->getMethod(), 'Time');
        self::assertEquals($accountBalanceRequest->getVisibility(), VisibilityEnum::VISIBILITY_PUBLIC);
        self::assertEquals($accountBalanceRequest->getRequestData(), []);
        self::assertEquals($accountBalanceRequest->getResponseClassName(), ServerTimeResponse::class);
    }
}
