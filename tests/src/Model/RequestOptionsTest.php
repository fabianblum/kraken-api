<?php

namespace src\Model;

use HanischIt\KrakenApi\Model\RequestOptions;
use PHPUnit\Framework\TestCase;

/**
 * Class RequestOptionsTest
 * @package src\Model
 */
class RequestOptionsTest extends TestCase
{
    public function testModel()
    {
        $endpoint = uniqid();
        $version = rand(1, 9999);
        $requestOptions = new RequestOptions($endpoint, $version);

        self::assertEquals($endpoint, $requestOptions->getEndpoint());
        self::assertEquals($version, $requestOptions->getVersion());
    }
}
