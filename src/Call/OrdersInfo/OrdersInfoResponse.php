<?php

namespace HanischIt\KrakenApi\Call\OrdersInfo;

use HanischIt\KrakenApi\Call\Shared\Model\OrderModel;
use HanischIt\KrakenApi\Call\Shared\Model\OrderTypeModel;
use HanischIt\KrakenApi\Model\ResponseInterface;

/**
 * Class OrdersInfoResponse
 * @package HanischIt\KrakenApi\Call\OrdersInfo
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
