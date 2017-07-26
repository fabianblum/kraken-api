<?php
/**
 * Created by PhpStorm.
 * User: fabia
 * Date: 26.07.2017
 * Time: 18:04
 */

namespace src\Service\RequestService;

use HanischIt\KrakenApi\Model\Header;
use HanischIt\KrakenApi\Service\RequestService\RequestHeader;
use PHPUnit\Framework\TestCase;

class RequestHeaderTest extends TestCase
{
    public function testAsArray()
    {
        $apiKey = uniqid();
        $apiSign = uniqid();
        $requestData = ["data1" => uniqid(), "data2" => uniqid()];
        $path = uniqid();
        $nonce = uniqid();

        $header = new Header($apiKey, $apiSign);

        $requestHeader = new RequestHeader();
        $data = $requestHeader->asArray($header, $requestData, $path, $nonce);

        $requestData["nonce"] = $nonce;
        $postData = http_build_query($requestData, '', '&');
        $sign = base64_encode(hash_hmac('sha512', $path . hash('sha256', $nonce . $postData, true), base64_decode($header->getApiSign()), true));


        self::assertEquals($apiKey, $data["API-Key"]);
        self::assertEquals($sign, $data["API-Sign"]);
    }
}
