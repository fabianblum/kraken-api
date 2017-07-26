<?php
/**
 * Created by PhpStorm.
 * User: fabia
 * Date: 26.07.2017
 * Time: 18:51
 */

namespace src\Model\ClosedOrders;

use HanischIt\KrakenApi\Model\ClosedOrders\ClosedOrderModel;
use HanischIt\KrakenApi\Model\ClosedOrders\ClosedOrderOrderTypeModel;
use PHPUnit\Framework\TestCase;

class ClosedOrderModelTest extends TestCase
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
        $closeTm = rand(100000, 9999999);
        $cost = uniqid();
        $orderDetails = new ClosedOrderOrderTypeModel($leverage, $order, $ordertype, $pair, $price, $price2, $type);
        $expiretm = uniqid();
        $fee = rand(100, 99999) / 1000;
        $misc = uniqid();
        $oflags = uniqid();
        $opentm = rand(100000, 9999999);
        $price = rand(100, 99999) / 1000;
        $reason = uniqid();
        $refid = uniqid();
        $starttm = rand(100000, 9999999);
        $status = uniqid();
        $userref = uniqid();
        $vol = rand(100, 99999) / 1000;
        $vol_exec = rand(100, 99999) / 1000;

        $closedOrderModel = new ClosedOrderModel(
            $txid,
            $closeTm,
            $cost,
            $orderDetails,
            $expiretm,
            $fee,
            $misc,
            $oflags,
            $opentm,
            $price,
            $reason,
            $refid,
            $starttm,
            $status,
            $userref,
            $vol,
            $vol_exec
        );

        self::assertEquals($closeTm, $closedOrderModel->getCloseTm());
        self::assertEquals($cost, $closedOrderModel->getCost());
        self::assertEquals($expiretm, $closedOrderModel->getExpiretm());
        self::assertEquals($fee, $closedOrderModel->getFee());
        self::assertEquals($misc, $closedOrderModel->getMisc());
        self::assertEquals($oflags, $closedOrderModel->getOflags());
        self::assertEquals($opentm, $closedOrderModel->getOpentm());
        self::assertEquals($orderDetails, $closedOrderModel->getOrderDetails());
        self::assertEquals($price, $closedOrderModel->getPrice());
        self::assertEquals($reason, $closedOrderModel->getReason());
        self::assertEquals($refid, $closedOrderModel->getRefid());
        self::assertEquals($starttm, $closedOrderModel->getStarttm());
        self::assertEquals($status, $closedOrderModel->getStatus());
        self::assertEquals($txid, $closedOrderModel->getTxId());
        self::assertEquals($userref, $closedOrderModel->getUserref());
        self::assertEquals($vol, $closedOrderModel->getVol());
        self::assertEquals($vol_exec, $closedOrderModel->getVolExec());
    }
}
