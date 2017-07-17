<?php

namespace HanischIt\KrakenApi\Model\AddOrder;

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
     * AddOrderResponse constructor.
     *
     * @param array  $descr
     * @param string $txid
     */
    public function __construct(array $descr, $txid)
    {
        $this->descr = $descr;
        $this->txid = $txid;
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
