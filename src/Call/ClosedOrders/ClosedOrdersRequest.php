<?php

namespace HanischIt\KrakenApi\Call\ClosedOrders;

use HanischIt\KrakenApi\Enum\VisibilityEnum;
use HanischIt\KrakenApi\Model\RequestInterface;

/**
 * Class ClosedOrdersRequest
 * @package HanischIt\KrakenApi\Call\ClosedOrders
 */
class ClosedOrdersRequest implements RequestInterface
{
    /**
     * @var bool
     */
    private $trades;
    /**
     * @var string|null
     */
    private $userref;
    /**
     * @var null|string
     */
    private $start;
    /**
     * @var null|string
     */
    private $end;
    /**
     * @var int|null
     */
    private $ofs;
    /**
     * @var null|string
     */
    private $closetime;

    /**
     * OrderBookRequest constructor.
     *
     * @param bool $trades
     * @param null|string $userref
     * @param null|string $start
     * @param null|string $end
     * @param null|int $ofs
     * @param null|string $closetime
     */
    public function __construct(
        $trades = false,
        $userref = null,
        $start = null,
        $end = null,
        $ofs = null,
        $closetime = null
    ) {
        $this->trades = $trades;
        $this->userref = $userref;
        $this->start = $start;
        $this->end = $end;
        $this->ofs = $ofs;
        $this->closetime = $closetime;
    }

    /**
     * Returns the api request name
     *
     * @return string
     */
    public function getMethod()
    {
        return 'ClosedOrders';
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
        $arr = [];
        $arr["trades"] = $this->trades;
        if (null !== $this->userref) {
            $arr["userref"] = $this->userref;
        }
        if (null !== $this->start) {
            $arr["start"] = $this->start;
        }
        if (null !== $this->end) {
            $arr["end"] = $this->end;
        }
        if (null !== $this->ofs) {
            $arr["ofs"] = $this->ofs;
        }
        if (null !== $this->closetime) {
            $arr["closetime"] = $this->closetime;
        }

        return $arr;
    }

    /**
     * @return string
     */
    public function getResponseClassName()
    {
        return ClosedOrdersResponse::class;
    }
}
