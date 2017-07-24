<?php

namespace HanischIt\KrakenApi\Model\TradableAssetPairs;

use HanischIt\KrakenApi\Enum\VisibilityEnum;
use HanischIt\KrakenApi\Model\RequestInterface;

/**
 * Class TradableAssetPairsRequest
 * @package HanischIt\KrakenApi\Model\TradableAssetPairs
 */
class TradableAssetPairsRequest implements RequestInterface
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
     * TradableAssetPairsRequest constructor.
     * @param string $info
     * @param array $pair
     */
    public function __construct($info = 'info', array $pair = null)
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
        $arr["info"] = $this->info;
        if (null !== $this->pair) {
            $ret["pair"] = $this->pair;
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
