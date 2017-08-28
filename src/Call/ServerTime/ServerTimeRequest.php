<?php

namespace HanischIt\KrakenApi\Call\ServerTime;

use HanischIt\KrakenApi\Enum\VisibilityEnum;
use HanischIt\KrakenApi\Model\RequestInterface;

/**
 * Class ServerTimeRequest
 * @package HanischIt\KrakenApi\Call\ServerTime
 */
class ServerTimeRequest implements RequestInterface
{

    /**
     * Returns the api request name
     *
     * @return string
     */
    public function getMethod()
    {
        return 'Time';
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
        return ServerTimeResponse::class;
    }
}
