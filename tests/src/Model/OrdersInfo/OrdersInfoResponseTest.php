<?php

namespace src\Model\OrdersInfo;

use HanischIt\KrakenApi\Call\OrdersInfo\OrdersInfoResponse;
use HanischIt\KrakenApi\Call\Shared\Model\OrderModel;
use PHPUnit\Framework\TestCase;

class OrdersInfoResponseTest extends TestCase
{
    public function testResponse()
    {

        $data = [];

        for ($i = 0; $i < rand(2, 10); $i++) {
            $txId = uniqid();
            $data[$txId] = [

                "closetm" => uniqid(),
                "cost" => uniqid(),
                "descr" => ["leverage" => uniqid(), "order" => uniqid(), "ordertype" => uniqid(), "pair" => uniqid(), "price" => rand(1000, 99999) / 1000, "price2" => rand(1000, 99999) / 1000, "type" => uniqid()],
                "expiretm" => rand(100000, 9999999),
                "fee" => rand(1000, 99999) / 1000,
                "misc" => uniqid(),
                "oflags" => uniqid(),
                "opentm" => rand(100000, 9999999),
                "price" => rand(1000, 999999) / 1000,
                "reason" => uniqid(),
                "refid" => uniqid(),
                "starttm" => rand(10000, 999999),
                "status" => uniqid(),
                "userref" => uniqid(),
                "vol" => rand(1000, 99999) / 1000,
                "vol_exec" => rand(1000, 99999) / 1000
            ];
        }


        $ordersInfoResponse = new OrdersInfoResponse();
        $ordersInfoResponse->manualMapping($data);
        $responseModels = $ordersInfoResponse->getOrders();

        self::assertContainsOnlyInstancesOf(OrderModel::class, $responseModels);

        $i = 0;
        foreach ($data as $txid => $assetData) {
            self::assertEquals($responseModels[$i]->getTxId(), $txid);
            self::assertEquals($responseModels[$i]->getVolExec(), $assetData["vol_exec"]);
            self::assertEquals($responseModels[$i]->getVol(), $assetData["vol"]);
            self::assertEquals($responseModels[$i]->getUserref(), $assetData["userref"]);
            self::assertEquals($responseModels[$i]->getStarttm(), $assetData["starttm"]);
            self::assertEquals($responseModels[$i]->getRefid(), $assetData["refid"]);
            self::assertEquals($responseModels[$i]->getReason(), $assetData["reason"]);
            self::assertEquals($responseModels[$i]->getPrice(), $assetData["price"]);
            self::assertEquals($responseModels[$i]->getOrderDetails()->getPrice(), $assetData["descr"]["price"]);
            self::assertEquals($responseModels[$i]->getOrderDetails()->getLeverage(), $assetData["descr"]["leverage"]);
            self::assertEquals($responseModels[$i]->getOrderDetails()->getOrder(), $assetData["descr"]["order"]);
            self::assertEquals($responseModels[$i]->getOrderDetails()->getOrdertype(), $assetData["descr"]["ordertype"]);
            self::assertEquals($responseModels[$i]->getOrderDetails()->getPair(), $assetData["descr"]["pair"]);
            self::assertEquals($responseModels[$i]->getOrderDetails()->getPrice2(), $assetData["descr"]["price2"]);
            self::assertEquals($responseModels[$i]->getOrderDetails()->getType(), $assetData["descr"]["type"]);
            self::assertEquals($responseModels[$i]->getStatus(), $assetData["status"]);
            self::assertEquals($responseModels[$i]->getOpentm(), $assetData["opentm"]);
            self::assertEquals($responseModels[$i]->getOflags(), $assetData["oflags"]);
            self::assertEquals($responseModels[$i]->getMisc(), $assetData["misc"]);
            self::assertEquals($responseModels[$i]->getFee(), $assetData["fee"]);
            self::assertEquals($responseModels[$i]->getExpiretm(), $assetData["expiretm"]);
            self::assertEquals($responseModels[$i]->getCost(), $assetData["cost"]);
            self::assertEquals($responseModels[$i]->getCloseTm(), $assetData["closetm"]);

            $i++;
        }
    }
}
