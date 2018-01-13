<?php

namespace HanischIt\KrakenApi\Call\AddOrder;

use HanischIt\KrakenApi\Model\ResponseInterface;

/**
 * Class AddOrderResponse
 *
 * @package HanischIt\KrakenApi\Model\AddOrderResponse
 */
class AddOrderResponse implements ResponseInterface
{

    /**
     * order description info
     *
     * @var array
     */
    private $descr;

    /**
     * Transaction id
     *
     * @var string
     */
    private $txid;

    /**
     * @param array $result
     */
    public function manualMapping($result)
    {
        $this->descr = $result['descr']['order'];
        if(isset($result['txid'])) {
            $this->txid = $result['txid'][0];
        }
    }


    /**
     * @return array
     */
    public function getDescr()
    {
        return $this->descr;
    }

    /**
     * @return string
     */
    public function getTxid()
    {
        return $this->txid;
    }
}
