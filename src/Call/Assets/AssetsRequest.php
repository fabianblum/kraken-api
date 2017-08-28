<?php

namespace HanischIt\KrakenApi\Call\Assets;

use HanischIt\KrakenApi\Enum\VisibilityEnum;
use HanischIt\KrakenApi\Model\RequestInterface;

/**
 * Class AssetsRequest
 * @package HanischIt\KrakenApi\Call\Assets
 */
class AssetsRequest implements RequestInterface
{

    /**
     * Returns the api request name
     *
     * @return string
     */
    public function getMethod()
    {
        return 'Assets';
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
        return [];
    }

    /**
     * @return string
     */
    public function getResponseClassName()
    {
        return AssetsResponse::class;
    }
}
