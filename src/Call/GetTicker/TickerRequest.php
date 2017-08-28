<?php

namespace HanischIt\KrakenApi\Call\GetTicker;

use HanischIt\KrakenApi\Enum\VisibilityEnum;
use HanischIt\KrakenApi\Model\RequestInterface;

/**
 * Class TickerRequest
 * @package HanischIt\KrakenApi\Call\GetTicker
 */
class TickerRequest implements RequestInterface
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
