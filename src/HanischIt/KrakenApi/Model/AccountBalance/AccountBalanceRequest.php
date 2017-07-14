<?php

namespace HanischIt\KrakenApi\Model\AccountBalance;

use HanischIt\KrakenApi\Enum\VisibilityEnum;
use HanischIt\KrakenApi\Model\RequestInterface;

/**
 * Class ServerTimeRequest
 * @package HanischIt\KrakenApi\Request\PublicRequest
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
        return VisibilityEnum::PRIVATE;
    }
}
