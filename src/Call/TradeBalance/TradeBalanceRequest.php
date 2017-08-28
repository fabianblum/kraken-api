<?php

namespace HanischIt\KrakenApi\Call\TradeBalance;

use HanischIt\KrakenApi\Enum\VisibilityEnum;
use HanischIt\KrakenApi\Model\RequestInterface;

/**
 * Class TradeBalanceRequest
 * @package HanischIt\KrakenApi\Call\TradeBalance
 */
class TradeBalanceRequest implements RequestInterface
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
     * TradeBalanceRequest constructor.
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
