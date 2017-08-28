<?php

namespace HanischIt\KrakenApi\Call\CancelOpenOrder;

use HanischIt\KrakenApi\Model\ResponseInterface;

/**
 * Class CancelOpenOrderResponse
 * @package HanischIt\KrakenApi\Call\CancelOpenOrder
 */
class CancelOpenOrderResponse implements ResponseInterface
{
    /**
     * @var int
     */
    private $count;

    /**
     * @var string
     */
    private $pending;

    /**
     * @param array $result
     */
    public function manualMapping($result)
    {
        $this->count = $result["count"];
        $this->pending = isset($result["pending"]) ? $result["pending"] : 0;
    }

    /**
     * @return int
     */
    public function getCount()
    {
        return $this->count;
    }

    /**
     * @return string
     */
    public function getPending()
    {
        return $this->pending;
    }


}
