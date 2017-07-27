<?php

namespace src\Model;

use HanischIt\KrakenApi\Model\Request;
use PHPUnit\Framework\TestCase;

/**
 * Class RequestTest
 * @package src\Model
 */
class RequestTest extends TestCase
{
    public function testModel()
    {
        $nonce = uniqid();
        $otp = uniqid();

        $requestModel = new Request($nonce, $otp);

        self::assertEquals($nonce, $requestModel->getNonce());
        self::assertEquals($otp, $requestModel->getOtp());
    }
}
