<?php
/**
 * @author Fabian Hanisch
 * @since: 2017-08-27
 * @version 1.0.0
 */

namespace HanischIt\KrakenApi\Call\Shared\Model;

/**
 * Class LedgerInfoModel
 * @package HanischIt\KrakenApi\Call\Shared\Model
 */
class LedgerInfoModel
{
    /**
     * @var string
     */
    private $ledgerId;
    /**
     * @var string
     */
    private $refid;
    /**
     * @var string
     */
    private $time;
    /**
     * @var string
     */
    private $type;
    /**
     * @var string
     */
    private $aclass;
    /**
     * @var string
     */
    private $asset;
    /**
     * @var float
     */
    private $amount;
    /**
     * @var float
     */
    private $fee;
    /**
     * @var float
     */
    private $balance;

    /**
     * LedgerInfoModel constructor.
     * @param string $ledgerId
     * @param string $refid
     * @param string $time
     * @param string $type
     * @param string $aclass
     * @param string $asset
     * @param float $amount
     * @param float $fee
     * @param float $balance
     */
    public function __construct($ledgerId, $refid, $time, $type, $aclass, $asset, $amount, $fee, $balance)
    {
        $this->ledgerId = $ledgerId;
        $this->refid = $refid;
        $this->time = $time;
        $this->type = $type;
        $this->aclass = $aclass;
        $this->asset = $asset;
        $this->amount = $amount;
        $this->fee = $fee;
        $this->balance = $balance;
    }

    /**
     * @return string
     */
    public function getLedgerId()
    {
        return $this->ledgerId;
    }

    /**
     * @return string
     */
    public function getRefid()
    {
        return $this->refid;
    }

    /**
     * @return string
     */
    public function getTime()
    {
        return $this->time;
    }

    /**
     * @return string
     */
    public function getType()
    {
        return $this->type;
    }

    /**
     * @return string
     */
    public function getAclass()
    {
        return $this->aclass;
    }

    /**
     * @return string
     */
    public function getAsset()
    {
        return $this->asset;
    }

    /**
     * @return float
     */
    public function getAmount()
    {
        return $this->amount;
    }

    /**
     * @return float
     */
    public function getFee()
    {
        return $this->fee;
    }

    /**
     * @return float
     */
    public function getBalance()
    {
        return $this->balance;
    }


}