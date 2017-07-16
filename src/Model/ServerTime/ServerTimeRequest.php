<?php

namespace HanischIt\KrakenApi\Model\ServerTime;

use HanischIt\KrakenApi\Enum\VisibilityEnum;
use HanischIt\KrakenApi\Model\RequestInterface;

/**
 * Class GetServerTime
 * @package HanischIt\KrakenApi\Request\PublicRequest
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
        return VisibilityEnum::PUBLIC;
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
