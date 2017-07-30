<?php

namespace HanischIt\KrakenApi\Model\TradeBalance;

use HanischIt\KrakenApi\Enum\VisibilityEnum;
use HanischIt\KrakenApi\Model\AbstractRequest;

/**
 * Class ServerTimeAbstractRequest
 *
 * @package HanischIt\KrakenApi\Model\ServerTime
 */
class TradeBalanceAbstractRequest extends AbstractRequest
{
    /**
     * @var string
     */
    private $aclass;
    /**
     * @var string
     */
    private $asset;

    /**
     * TradeBalanceAbstractRequest constructor.
     * @param string $aclass
     * @param string $asset
     */
    public function __construct($aclass, $asset)
    {
        $this->aclass = $aclass;
        $this->asset = $asset;
    }


    /**
     * Returns the api request name
     *
     * @return string
     */
    public function getMethod()
    {
        return 'TradeBalance';
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
        if (null !== $this->aclass) {
            $ret["aclass"] = $this->aclass;
        }
        if (null !== $this->asset) {
            $ret["asset"] = $this->asset;
        }
        return $ret;
    }

    /**
     * @return string
     */
    public function getResponseClassName()
    {
        return TradeBalanceResponse::class;
    }
}
