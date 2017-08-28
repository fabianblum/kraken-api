<?php
/**
 * Created by PhpStorm.
 * User: fabia
 * Date: 26.07.2017
 * Time: 18:56
 */

namespace src\Model\AddOrder;

use HanischIt\KrakenApi\Call\AddOrder\AddOrderRequest;
use HanischIt\KrakenApi\Call\AddOrder\AddOrderResponse;
use HanischIt\KrakenApi\Enum\VisibilityEnum;
use PHPUnit\Framework\TestCase;

class AddOrderRequestTest extends TestCase
{
    public function testRequest()
    {
        $pair = uniqid();
        $type = uniqid();
        $orderType = uniqid();
        $price = rand(100, 99999) / 100;
        $volume = rand(100, 909999999) / 1000;
        $validateOnly = true;

        $ret = [];
        $ret["pair"] = $pair;
        $ret["type"] = $type;
        $ret["ordertype"] = $orderType;
        $ret["price"] = $price;
        $ret["volume"] = $volume;
        if ($validateOnly !== false) {
            $ret["validate"] = $validateOnly;
        }

        $addOrderRequest = new AddOrderRequest($pair, $type, $orderType, $price, $volume, $validateOnly);
        self::assertEquals($addOrderRequest->getMethod(), 'AddOrder');
        self::assertEquals($addOrderRequest->getVisibility(), VisibilityEnum::VISIBILITY_PRIVATE);
        self::assertEquals($addOrderRequest->getResponseClassName(),
            \HanischIt\KrakenApi\Call\AddOrder\AddOrderResponse::class);
        self::assertEquals($addOrderRequest->getRequestData(), $ret);
    }

    public function testRequestNull()
    {
        $pair = uniqid();
        $type = uniqid();
        $orderType = uniqid();
        $price = null;
        $volume = null;
        $validateOnly = false;

        $ret = [];
        $ret["pair"] = $pair;
        $ret["type"] = $type;
        $ret["ordertype"] = $orderType;

        $addOrderRequest = new AddOrderRequest($pair, $type, $orderType, $price, $volume, $validateOnly);
        self::assertEquals($addOrderRequest->getMethod(), 'AddOrder');
        self::assertEquals($addOrderRequest->getVisibility(), VisibilityEnum::VISIBILITY_PRIVATE);
        self::assertEquals($addOrderRequest->getResponseClassName(), AddOrderResponse::class);
        self::assertEquals($addOrderRequest->getRequestData(), $ret);
    }
}
