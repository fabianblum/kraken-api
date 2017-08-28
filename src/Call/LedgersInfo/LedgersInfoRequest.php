<?php

namespace HanischIt\KrakenApi\Call\LedgersInfo;

use HanischIt\KrakenApi\Enum\VisibilityEnum;
use HanischIt\KrakenApi\Model\RequestInterface;

/**
 * Class LedgersInfoRequest
 * @package HanischIt\KrakenApi\Call\LedgersInfo
 */
class LedgersInfoRequest implements RequestInterface
{

    /**
     * @var string
     */
    private $aclass;
    /**
     * @var string
     */
    private $asset;
    /**
     * @var string
     */
    private $type;
    /**
     * @var string
     */
    private $start;
    /**
     * @var string
     */
    private $end;
    /**
     * @var string
     */
    private $ofs;

    /**
     * LedgersInfoRequest constructor.
     * @param string $aclass
     * @param string $asset
     * @param string $type
     * @param string $start
     * @param string $end
     * @param string $ofs
     */
    public function __construct(
        $aclass = 'currency',
        $asset = 'all',
        $type = 'all',
        $start = null,
        $end = null,
        $ofs = null
    ) {
        $this->aclass = $aclass;
        $this->asset = $asset;
        $this->type = $type;
        $this->start = $start;
        $this->end = $end;
        $this->ofs = $ofs;
    }


    /**
     * Returns the api request name
     *
     * @return string
     */
    public function getMethod()
    {
        return 'Ledgers';
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
        $ret["aclass"] = $this->aclass;
        $ret["asset"] = $this->asset;
        $ret["type"] = $this->type;
        $ret["start"] = $this->start;
        $ret["end"] = $this->end;
        $ret["ofs"] = $this->ofs;
        return $ret;
    }

    /**
     * @return string
     */
    public function getResponseClassName()
    {
        return LedgersInfoResponse::class;
    }
}
