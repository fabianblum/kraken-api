<?php

namespace HanischIt\KrakenApi\Model\ServerTime;

use HanischIt\KrakenApi\Enum\VisibilityEnum;
use HanischIt\KrakenApi\Model\AbstractRequest;
use HanischIt\KrakenApi\Model\RequestInterface;

/**
 * Class ServerTimeAbstractRequest
 *
 * @package HanischIt\KrakenApi\Model\ServerTime
 */
class ServerTimeAbstractRequest extends AbstractRequest
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
