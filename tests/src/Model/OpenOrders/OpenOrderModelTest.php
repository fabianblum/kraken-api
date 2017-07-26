<?php
/**
 * Created by PhpStorm.
 * User: fabia
 * Date: 26.07.2017
 * Time: 18:51
 */

namespace src\Model\OpenOrders;

use HanischIt\KrakenApi\Model\OpenOrders\OpenOrderModel;
use HanischIt\KrakenApi\Model\OpenOrders\OpenOrderOrderTypeModel;
use PHPUnit\Framework\TestCase;

class OpenOrderModelTest extends TestCase
{
    public function testModel()
    {
        $leverage = uniqid();
        $order = uniqid();
        $ordertype = uniqid();
        $pair = uniqid();
        $price = rand(100, 99999) / 1000;
        $price2 = rand(100, 99999) / 1000;
        $type = uniqid();

        $txid = uniqid();
        $cost = uniqid();
        $orderDetails = new OpenOrderOrderTypeModel($leverage, $order, $ordertype, $pair, $price, $price2, $type);
        $expiretm = uniqid();
        $fee = rand(100, 99999) / 1000;
        $misc = uniqid();
        $oflags = uniqid();
        $opentm = rand(100000, 9999999);
        $price = rand(100, 99999) / 1000;
        $refid = uniqid();
        $starttm = rand(100000, 9999999);
        $status = uniqid();
        $userref = uniqid();
        $vol = rand(100, 99999) / 1000;
        $vol_exec = rand(100, 99999) / 1000;

        $closedOrderModel = new OpenOrderModel(
            $txid,
            $cost,
            $orderDetails,
            $expiretm,
            $fee,
            $misc,
            $oflags,
            $opentm,
            $price,
            $refid,
            $starttm,
            $status,
            $userref,
            $vol,
            $vol_exec
        );

        self::assertEquals($cost, $closedOrderModel->getCost());
        self::assertEquals($expiretm, $closedOrderModel->getExpiretm());
        self::assertEquals($fee, $closedOrderModel->getFee());
        self::assertEquals($misc, $closedOrderModel->getMisc());
        self::assertEquals($oflags, $closedOrderModel->getOflags());
        self::assertEquals($opentm, $closedOrderModel->getOpentm());
        self::assertEquals($orderDetails, $closedOrderModel->getOrderDetails());
        self::assertEquals($price, $closedOrderModel->getPrice());
        self::assertEquals($refid, $closedOrderModel->getRefid());
        self::assertEquals($starttm, $closedOrderModel->getStarttm());
        self::assertEquals($status, $closedOrderModel->getStatus());
        self::assertEquals($txid, $closedOrderModel->getTxId());
        self::assertEquals($userref, $closedOrderModel->getUserref());
        self::assertEquals($vol, $closedOrderModel->getVol());
        self::assertEquals($vol_exec, $closedOrderModel->getVolExec());
    }
}
