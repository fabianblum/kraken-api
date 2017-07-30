<?php

namespace HanischIt\KrakenApi\Model\OrdersInfo;

use HanischIt\KrakenApi\Model\Model\Order\OrderModel;
use HanischIt\KrakenApi\Model\Model\Order\OrderTypeModel;
use HanischIt\KrakenApi\Model\ResponseInterface;
use Model\OHLCData\OHLCDataModel;

/**
 * Class OrdersInfoResponse
 * @package HanischIt\KrakenApi\Model\OrdersInfo
 */
class OrdersInfoResponse implements ResponseInterface
{
    /**
     * @var OrderModel[]
     */
    private $orders;

    /**
     * @param array $result
     */
    public function manualMapping($result)
    {
        foreach ($result as $txid => $orderData) {
            $this->orders[] = new OrderModel(
                $txid,
                isset($orderData["closetm"]) ? $orderData["closetm"] : null,
                $orderData["cost"],
                new OrderTypeModel(
                    $orderData["descr"]["leverage"],
                    $orderData["descr"]["order"],
                    $orderData["descr"]["ordertype"],
                    $orderData["descr"]["pair"],
                    $orderData["descr"]["price"],
                    $orderData["descr"]["price2"],
                    $orderData["descr"]["type"]
                ),
                $orderData["expiretm"],
                $orderData["fee"],
                $orderData["misc"],
                $orderData["oflags"],
                $orderData["opentm"],
                $orderData["price"],
                isset($orderData["reason"]) ? $orderData["reason"] : null,
                $orderData["refid"],
                $orderData["starttm"],
                $orderData["status"],
                $orderData["userref"],
                $orderData["vol"],
                $orderData["vol_exec"]
            );
        }
    }

    /**
     * @return OrderModel[]
     */
    public function getOrders()
    {
        return $this->orders;
    }
}
