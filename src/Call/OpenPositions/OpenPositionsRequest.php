<?php

namespace HanischIt\KrakenApi\Call\OpenPositions;

use HanischIt\KrakenApi\Enum\VisibilityEnum;
use HanischIt\KrakenApi\Model\RequestInterface;

/**
 * Class OpenPositionsRequest
 * @package HanischIt\KrakenApi\Call\OpenPositions
 */
class OpenPositionsRequest implements RequestInterface
{

    /**
     * @var string
     */
    private $txid;
    /**
     * @var bool
     */
    private $docalcs = false;

    /**
     * OpenPositionsRequest constructor.
     * @param string $txid
     * @param bool $docalcs
     */
    public function __construct($txid, $docalcs)
    {
        $this->txid = $txid;
        $this->docalcs = $docalcs;
    }


    /**
     * Returns the api request name
     *
     * @return string
     */
    public function getMethod()
    {
        return 'OpenPositions';
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
        $ret = [];
        $ret["txid"] = $this->txid;
        $ret["docalcs"] = $this->docalcs;
        return $ret;
    }

    /**
     * @return string
     */
    public function getResponseClassName()
    {
        return OpenPositionsResponse::class;
    }
}
