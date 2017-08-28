<?php
/**
 * @author  Fabian Hanisch
 * @since   18.07.2017 20:32
 * @version 1.0
 */

namespace HanischIt\KrakenApi\Call\Shared\Model;

/**
 * Class OrderModel
 * @package HanischIt\KrakenApi\Call\Shared\Model
 */
class OrderModel
{
    /**
     * @var string
     */
    private $txId;
    /**
     * @var float
     */
    private $cost;
    /**
     * @var OrderTypeModel
     */
    private $orderDetails;
    /**
     * @var int
     */
    private $expiretm;
    /**
     * @var float
     */
    private $fee;
    /**
     * @var string
     */
    private $misc;
    /**
     * @var string
     */
    private $oflags;
    /**
     * @var int
     */
    private $opentm;
    /**
     * @var float
     */
    private $price;
    /**
     * @var string
     */
    private $refid;
    /**
     * @var int
     */
    private $starttm;
    /**
     * @var string
     */
    private $status;
    /**
     * @var string
     */
    private $userref;
    /**
     * @var float
     */
    private $vol;
    /**
     * @varfloat
     */
    private $vol_exec;
    private $closeTm;
    private $reason;

    /**
     * OpenOrderModel constructor.
     *
     * @param string $txid
     * @param string $closeTm
     * @param float $cost
     * @param OrderTypeModel $orderDetails
     * @param int $expiretm
     * @param float $fee
     * @param string $misc
     * @param string $oflags
     * @param int $opentm
     * @param float $price
     * @param string $reason
     * @param string $refid
     * @param int $starttm
     * @param string $status
     * @param string $userref
     * @param float $vol
     * @param float $vol_exec
     */
    public function __construct(
        $txid,
        $closeTm,
        $cost,
        OrderTypeModel $orderDetails,
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
    ) {
        $this->txId = $txid;
        $this->cost = $cost;
        $this->orderDetails = $orderDetails;
        $this->expiretm = $expiretm;
        $this->fee = $fee;
        $this->misc = $misc;
        $this->oflags = $oflags;
        $this->opentm = $opentm;
        $this->price = $price;
        $this->refid = $refid;
        $this->starttm = $starttm;
        $this->status = $status;
        $this->userref = $userref;
        $this->vol = $vol;
        $this->vol_exec = $vol_exec;
        $this->closeTm = $closeTm;
        $this->reason = $reason;
    }

    /**
     * @return string
     */
    public function getTxId()
    {
        return $this->txId;
    }


    /**
     * @return mixed
     */
    public function getCost()
    {
        return $this->cost;
    }

    /**
     * @return OrderTypeModel
     */
    public function getOrderDetails()
    {
        return $this->orderDetails;
    }

    /**
     * @return int
     */
    public function getExpiretm()
    {
        return $this->expiretm;
    }

    /**
     * @return float
     */
    public function getFee()
    {
        return $this->fee;
    }

    /**
     * @return string
     */
    public function getMisc()
    {
        return $this->misc;
    }

    /**
     * @return string
     */
    public function getOflags()
    {
        return $this->oflags;
    }

    /**
     * @return int
     */
    public function getOpentm()
    {
        return $this->opentm;
    }

    /**
     * @return float
     */
    public function getPrice()
    {
        return $this->price;
    }

    /**
     * @return string
     */
    public function getRefid()
    {
        return $this->refid;
    }

    /**
     * @return int
     */
    public function getStarttm()
    {
        return $this->starttm;
    }

    /**
     * @return string
     */
    public function getStatus()
    {
        return $this->status;
    }

    /**
     * @return string
     */
    public function getUserref()
    {
        return $this->userref;
    }

    /**
     * @return float
     */
    public function getVol()
    {
        return $this->vol;
    }

    /**
     * @return mixed
     */
    public function getVolExec()
    {
        return $this->vol_exec;
    }

    /**
     * @return string
     */
    public function getCloseTm()
    {
        return $this->closeTm;
    }

    /**
     * @return string
     */
    public function getReason()
    {
        return $this->reason;
    }
}
