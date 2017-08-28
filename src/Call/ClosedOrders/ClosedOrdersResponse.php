<?php

namespace HanischIt\KrakenApi\Call\ClosedOrders;

use HanischIt\KrakenApi\Call\Shared\Model\OrderModel;
use HanischIt\KrakenApi\Call\Shared\Model\OrderTypeModel;
use HanischIt\KrakenApi\Model\ResponseInterface;

/**
 * Class ClosedOrdersResponse
 * @package HanischIt\KrakenApi\Call\ClosedOrders
 */
class ClosedOrdersResponse implements ResponseInterface
{
    /**
     * @var \HanischIt\KrakenApi\Call\Shared\Model\OrderModel[]
     */
    private $orders = [];

    /**
     * @param array $result
     */
    public function manualMapping($result)
    {
        foreach ($result["closed"] as $txid => $orderData) {
            $this->orders[] = new OrderModel(
                $txid,
                $orderData["closetm"],
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
                $orderData["reason"],
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
     * @return \HanischIt\KrakenApi\Call\Shared\Model\OrderModel[]
     */
    public function getOrders()
    {
        return $this->orders;
    }
}
