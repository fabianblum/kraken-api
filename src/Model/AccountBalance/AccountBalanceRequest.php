<?php

namespace HanischIt\KrakenApi\Model\AccountBalance;

use HanischIt\KrakenApi\Enum\VisibilityEnum;
use HanischIt\KrakenApi\Model\RequestInterface;

/**
 * Class ServerTimeRequest
 *
 * @package HanischIt\Model\AccountBalance
 */
class AccountBalanceRequest implements RequestInterface
{

    /**
     * Returns the api request name
     *
     * @return string
     */
    public function getMethod()
    {
        return 'Balance';
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
        return [];
    }

    /**
     * @return string
     */
    public function getResponseClassName()
    {
        return AccountBalanceResponse::class;
    }
}
