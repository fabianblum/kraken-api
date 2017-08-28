<?php
/**
 * @author Fabian Hanisch
 * @since: 2017-08-28
 * @version 1.0.0
 */

namespace HanischIt\KrakenApi\Call\TradeVolume\Model;

/**
 * Class FeeModel
 * @package HanischIt\KrakenApi\Call\TradeVolume\Model
 */
class FeeModel
{
    /**
     * @var float
     */
    private $fee;
    /**
     * @var float
     */
    private $minfee;
    /**
     * @var float
     */
    private $maxfee;
    /**
     * @var float
     */
    private $nextfee;
    /**
     * @var float
     */
    private $nextvolume;
    /**
     * @var float
     */
    private $tiervolume;

    /**
     * FeeModel constructor.
     * @param float $fee
     * @param float $minfee
     * @param float $maxfee
     * @param float $nextfee
     * @param float $nextvolume
     * @param float $tiervolume
     */
    public function __construct($fee, $minfee, $maxfee, $nextfee, $nextvolume, $tiervolume)
    {
        $this->fee = $fee;
        $this->minfee = $minfee;
        $this->maxfee = $maxfee;
        $this->nextfee = $nextfee;
        $this->nextvolume = $nextvolume;
        $this->tiervolume = $tiervolume;
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
    public function getMinfee()
    {
        return $this->minfee;
    }

    /**
     * @return float
     */
    public function getMaxfee()
    {
        return $this->maxfee;
    }

    /**
     * @return float
     */
    public function getNextfee()
    {
        return $this->nextfee;
    }

    /**
     * @return float
     */
    public function getNextvolume()
    {
        return $this->nextvolume;
    }

    /**
     * @return float
     */
    public function getTiervolume()
    {
        return $this->tiervolume;
    }


}