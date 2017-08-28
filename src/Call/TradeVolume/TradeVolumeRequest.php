<?php

namespace HanischIt\KrakenApi\Call\TradeVolume;

use HanischIt\KrakenApi\Enum\VisibilityEnum;
use HanischIt\KrakenApi\Model\RequestInterface;

/**
 * Class TradeVolumeRequest
 * @package HanischIt\KrakenApi\Call\TradeVolume
 */
class TradeVolumeRequest implements RequestInterface
{

    /**
     * @var string
     */
    private $pair;
    /**
     * @var bool
     */
    private $feeInfo;

    /**
     * TradeVolumeRequest constructor.
     * @param string $pair
     * @param bool $feeInfo
     */
    public function __construct($pair = null, $feeInfo = null)
    {
        $this->pair = $pair;
        $this->feeInfo = $feeInfo;
    }


    /**
     * Returns the api request name
     *
     * @return string
     */
    public function getMethod()
    {
        return 'TradeVolume';
    }

    /**
     * @return string
     */
    public function getVisibility()
    {
        return VisibilityEnum::VISIBILITY_PRIVATE;
    }

    /**
     * @return array
     */
    public function getRequestData()
    {
        $ret = [];
        if ($this->pair) {
            $ret["pair"] = $this->pair;
        }
        if ($this->feeInfo) {
            $ret["fee-info"] = $this->feeInfo;
        }
        return $ret;
    }

    /**
     * @return string
     */
    public function getResponseClassName()
    {
        return TradeVolumeResponse::class;
    }
}
