<?php

namespace HanischIt\KrakenApi\Model\Assets;

use HanischIt\KrakenApi\Enum\VisibilityEnum;
use HanischIt\KrakenApi\Model\AbstractRequest;

/**
 * Class AssetsAbstractRequest
 *
 * @package HanischIt\KrakenApi\Model\Assets
 */
class AssetsAbstractRequest extends AbstractRequest
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
