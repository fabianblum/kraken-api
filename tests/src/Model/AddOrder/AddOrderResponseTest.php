<?php
/**
 * Created by PhpStorm.
 * User: fabia
 * Date: 26.07.2017
 * Time: 18:58
 */

namespace src\Model\AddOrder;

use HanischIt\KrakenApi\Call\AddOrder\AddOrderResponse;
use PHPUnit\Framework\TestCase;

class AddOrderResponseTest extends TestCase
{
    public function testResponse()
    {
        $data = [];
        $data['descr']['order'] = uniqid();
        $data['txid'][0] = uniqid();


        $addOrderResponse = new AddOrderResponse();
        $addOrderResponse->manualMapping($data);

        self::assertEquals($addOrderResponse->getTxid(), $data['txid'][0]);
        self::assertEquals($addOrderResponse->getDescr(), $data['descr']['order']);
    }
}
