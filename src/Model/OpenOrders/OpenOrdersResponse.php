<?php

namespace HanischIt\KrakenApi\Model\OpenOrders;

/**
 * Class OpenOrdersResponse
 *
 * @package HanischIt\KrakenApi\Model\OpenOrders
 */
class OpenOrdersResponse implements OpenOrdersResponseInterface
{
    /**
     * @var OpenOrderModel[]
     */
    private $orders;

    /**
     * @param array $result
     */
    public function manualMapping($result)
    {
        foreach ($result["open"] as $txid => $orderData) {
            $this->orders[] = new OpenOrderModel(
                $txid,
                $orderData["cost"],
                new OpenOrderOrderTypeModel(
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
     * @return OpenOrderModel[]
     */
    public function getOrders()
    {
        return $this->orders;
    }
}
