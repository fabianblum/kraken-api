<?php

namespace HanischIt\KrakenApi\Model\ClosedOrders;

use HanischIt\KrakenApi\Calls\Shared\Model\OrderModel;
use HanischIt\KrakenApi\Calls\Shared\Model\OrderTypeModel;

/**
 * Class ClosedOrdersResponse
 *
 * @package HanischIt\KrakenApi\Model\ClosedOrders
 */
class ClosedOrdersResponse implements ClosedOrdersResponseInterface
{
    /**
     * @var \HanischIt\KrakenApi\Calls\Shared\Model\OrderModel[]
     */
    private $orders;

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
     * @return \HanischIt\KrakenApi\Calls\Shared\Model\OrderModel[]
     */
    public function getOrders()
    {
        return $this->orders;
    }
}
