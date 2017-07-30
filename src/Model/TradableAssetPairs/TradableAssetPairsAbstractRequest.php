<?php

namespace HanischIt\KrakenApi\Model\TradableAssetPairs;

use HanischIt\KrakenApi\Enum\VisibilityEnum;
use HanischIt\KrakenApi\Model\AbstractRequest;

/**
 * Class TradableAssetPairsAbstractRequest
 * @package HanischIt\KrakenApi\Model\TradableAssetPairs
 */
class TradableAssetPairsAbstractRequest extends AbstractRequest
{
    /**
     * @var string
     */
    private $info;
    /**
     * @var array
     */
    private $pair;

    /**
     * TradableAssetPairsAbstractRequest constructor.
     * @param string $info
     * @param string $pair
     */
    public function __construct($info = 'info', $pair = null)
    {
        $this->info = $info;
        $this->pair = $pair;
    }


    /**
     * Returns the api request name
     *
     * @return string
     */
    public function getMethod()
    {
        return 'AssetPairs';
    }

    /**
     * @return string
     */
    public function getVisibility()
    {
        return VisibilityEnum::VISIBILITY_PUBLIC;
    }

    /**
     * @return array
     */
    public function getRequestData()
    {
        $arr = [];
        $arr["info"] = $this->info;
        if (null !== $this->pair) {
            $arr["pair"] = $this->pair;
        }
        return $arr;
    }

    /**
     * @return string
     */
    public function getResponseClassName()
    {
        return TradableAssetPairsResponse::class;
    }
}
