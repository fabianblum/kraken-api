<?php

namespace HanischIt\KrakenApi\Model\RecentTrades;

use HanischIt\KrakenApi\Enum\VisibilityEnum;
use HanischIt\KrakenApi\Model\AbstractRequest;

/**
 * Class RecentTradesAbstractRequest
 *
 * @package HanischIt\Model\RecentTrades
 */
class RecentTradesAbstractRequest extends AbstractRequest
{
    /**
     * @var string
     */
    private $assetPair;
    /**
     * @var string
     */
    private $since;

    /**
     * RecentTradesAbstractRequest constructor.
     *
     * @param string $assetPair
     * @param string $since
     */
    public function __construct($assetPair, $since)
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
        return 'Trades';
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
        $ret = [];
        $ret['pair'] = $this->assetPair;
        if ($this->since) {
            $ret['since'] = $this->since;
        }

        return $ret;
    }

    /**
     * @return string
     */
    public function getResponseClassName()
    {
        return RecentTradesResponse::class;
    }
}
