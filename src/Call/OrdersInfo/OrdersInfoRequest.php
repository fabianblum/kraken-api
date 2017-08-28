<?php

namespace HanischIt\KrakenApi\Call\OrdersInfo;

use HanischIt\KrakenApi\Enum\VisibilityEnum;
use HanischIt\KrakenApi\Model\RequestInterface;

/**
 * Class OrdersInfoRequest
 * @package HanischIt\KrakenApi\Call\OrdersInfo
 */
class OrdersInfoRequest implements RequestInterface
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
     * @var string
     */
    private $txids;

    /**
     * OrdersInfoRequest constructor.
     * @param bool $trades
     * @param null|string $userref
     * @param null|string[] $txids
     */
    public function __construct(array $txids, $trades = false, $userref = null)
    {
        $this->trades = $trades;
        if (null !== $userref) {
            $this->userref = $userref;
        }

        $this->txids = implode(",", $txids);
    }


    /**
     * Returns the api request name
     *
     * @return string
     */
    public function getMethod()
    {
        return 'QueryOrders';
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
        $ret["trades"] = $this->trades;
        if (null !== $this->userref) {
            $ret["userref"] = $this->userref;
        }
        if (null !== $this->txids) {
            $ret["txid"] = $this->txids;
        }
        return $ret;
    }

    /**
     * @return string
     */
    public function getResponseClassName()
    {
        return OrdersInfoResponse::class;
    }
}
