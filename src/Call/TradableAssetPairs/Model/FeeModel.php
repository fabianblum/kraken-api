<?php
/**
 * Created by PhpStorm.
 * User: Fabian
 * Date: 24.07.2017
 * Time: 15:35
 */

namespace HanischIt\KrakenApi\Call\TradableAssetPairs\Model;

/**
 * Class FeeModel
 * @package HanischIt\KrakenApi\Call\TradableAssetPairs\Model
 */
class FeeModel
{
    /**
     * @var float
     */
    private $volume;
    /**
     * @var float
     */
    private $percentFee;

    /**
     * FeeModel constructor.
     * @param float $volume
     * @param float $percentFee
     */
    public function __construct($volume, $percentFee)
    {
        $this->volume = $volume;
        $this->percentFee = $percentFee;
    }

    /**
     * @return float
     */
    public function getVolume()
    {
        return $this->volume;
    }

    /**
     * @return float
     */
    public function getPercentFee()
    {
        return $this->percentFee;
    }
}
