<?php
/**
 * Created by PhpStorm.
 * User: fabia
 * Date: 26.07.2017
 * Time: 18:56
 */

namespace src\Model\AccountBalance;

use HanischIt\KrakenApi\Call\AccountBalance\AccountBalanceRequest;
use HanischIt\KrakenApi\Call\AccountBalance\AccountBalanceResponse;
use HanischIt\KrakenApi\Enum\VisibilityEnum;
use PHPUnit\Framework\TestCase;

class AccountBalanceRequestTest extends TestCase
{
    public function testRequest()
    {
        $accountBalanceRequest = new AccountBalanceRequest();
        self::assertEquals($accountBalanceRequest->getMethod(), 'Balance');
        self::assertEquals($accountBalanceRequest->getVisibility(), VisibilityEnum::VISIBILITY_PRIVATE);
        self::assertEquals($accountBalanceRequest->getRequestData(), []);
        self::assertEquals($accountBalanceRequest->getResponseClassName(), AccountBalanceResponse::class);
    }
}
