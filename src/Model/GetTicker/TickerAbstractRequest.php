<?php

namespace HanischIt\KrakenApi\Model\GetTicker;

use HanischIt\KrakenApi\Enum\VisibilityEnum;
use HanischIt\KrakenApi\Model\AbstractRequest;

/**
 * Class GetServerTime
 *
 * @package HanischIt\KrakenApi\Model\GetTicker
 */
class TickerAbstractRequest extends AbstractRequest
{

    /**
     * @var array
     */
    private $pairs;

    /**
     * TicketRequest constructor.
     *
     * @param array $pairs
     */
    public function __construct(array $pairs)
    {
        $this->pairs = $pairs;
    }

    /**
     * Returns the api request name
     *
     * @return string
     */
    public function getMethod()
    {
        return 'Ticker';
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
        return ["pair" => implode(",", $this->pairs)];
    }

    /**
     * @return string
     */
    public function getResponseClassName()
    {
        return TickerResponse::class;
    }
}
