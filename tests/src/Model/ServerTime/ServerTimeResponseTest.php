<?php
/**
 * Created by PhpStorm.
 * User: fabia
 * Date: 26.07.2017
 * Time: 18:58
 */

namespace src\Model\ServerTime;

use HanischIt\KrakenApi\Call\ServerTime\ServerTimeResponse;
use PHPUnit\Framework\TestCase;

class ServerTimeResponseTest extends TestCase
{
    public function testResponse()
    {
        $rfc1123 = uniqid();
        $unixtime = rand(100000, 9999999);

        $serverTimeResponse = new ServerTimeResponse();
        $serverTimeResponse->setRfc1123($rfc1123);
        $serverTimeResponse->setUnixTime($unixtime);

        self::assertEquals($serverTimeResponse->getRfc1123(), $rfc1123);
        self::assertEquals($serverTimeResponse->getUnixTime(), $unixtime);
    }
}
