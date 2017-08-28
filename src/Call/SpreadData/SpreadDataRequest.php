<?php

namespace HanischIt\KrakenApi\Call\SpreadData;

use HanischIt\KrakenApi\Enum\VisibilityEnum;
use HanischIt\KrakenApi\Model\RequestInterface;

/**
 * Class SpreadDataRequest
 * @package HanischIt\KrakenApi\Call\SpreadData
 */
class SpreadDataRequest implements RequestInterface
{
    /**
     * @var
     */
    private $assetPair;
    /**
     * @var null
     */
    private $since;

    /**
     * OrderBookRequest constructor.
     * @param $assetPair
     * @param null|mixed $since
     */
    public function __construct($assetPair, $since = null)
    {
        $this->assetPair = $assetPair;
        $this->since = $since;
    }

    /**
     * Returns the api request name
     *
     * @return string
     */
    public function getMethod()
    {
        return 'Spread';
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
        $arr["pair"] = $this->assetPair;
        if ($this->since) {
            $arr["since"] = $this->since;
        }
        return $arr;
    }

    /**
     * @return string
     */
    public function getResponseClassName()
    {
        return SpreadDataResponse::class;
    }
}
