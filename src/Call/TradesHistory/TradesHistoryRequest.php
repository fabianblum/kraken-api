<?php

namespace HanischIt\KrakenApi\Call\TradesHistory;

use HanischIt\KrakenApi\Enum\VisibilityEnum;
use HanischIt\KrakenApi\Model\RequestInterface;

/**
 * Class TradesHistoryRequest
 * @package HanischIt\KrakenApi\Call\TradesHistory
 */
class TradesHistoryRequest implements RequestInterface
{
    /**
     * @var string
     */
    private $type;

    /**
     * @var bool
     */
    private $trades = false;
    /**
     * @var string
     */
    private $start;
    /**
     * @var string
     */
    private $end;
    /**
     * @var int
     */
    private $ofs = 0;

    /**
     * TradesHistoryRequest constructor.
     * @param string $type
     * @param bool $trades
     * @param string $start
     * @param string $end
     * @param int $ofs
     */
    public function __construct($type, $trades = false, $start = null, $end = null, $ofs = null)
    {
        $this->type = $type;
        $this->trades = $trades;
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
        return 'TradesHistory';
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
        $ret["type"] = $this->type;
        $ret["trades"] = $this->trades;
        if ($this->start) {
            $ret["start"] = $this->start;
        }

        if ($this->end) {
            $ret["end"] = $this->end;
        }

        $ret["ofs"] = $this->ofs;
        return $ret;
    }

    /**
     * @return string
     */
    public function getResponseClassName()
    {
        return TradesHistoryResponse::class;
    }
}
