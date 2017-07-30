<?php

namespace HanischIt\KrakenApi\Model\OpenOrders;

use HanischIt\KrakenApi\Model\Model\Order\OrderModel;
use HanischIt\KrakenApi\Model\Model\Order\OrderTypeModel;


/**
 * Class OpenOrdersResponse
 *
 * @package HanischIt\KrakenApi\Model\OpenOrders
 */
class OpenOrdersResponse implements OpenOrdersResponseInterface
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
        foreach ($result["open"] as $txid => $orderData) {
            $this->orders[] = new OrderModel(
                $txid,
                null,
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
                null,
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
