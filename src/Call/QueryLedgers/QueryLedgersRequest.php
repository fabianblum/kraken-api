<?php

namespace HanischIt\KrakenApi\Call\QueryLedgers;

use HanischIt\KrakenApi\Enum\VisibilityEnum;
use HanischIt\KrakenApi\Model\RequestInterface;

/**
 * Class QueryLedgersRequest
 * @package HanischIt\KrakenApi\Call\QueryLedgers
 */
class QueryLedgersRequest implements RequestInterface
{

    /**
     * @var string
     */
    private $id;

    /**
     * QueryLedgersRequest constructor.
     * @param string $id
     */
    public function __construct($id)
    {
        $this->id = $id;
    }


    /**
     * Returns the api request name
     *
     * @return string
     */
    public function getMethod()
    {
        return 'QueryLedgers';
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
        $ret["id"] = $this->id;
        return $ret;
    }

    /**
     * @return string
     */
    public function getResponseClassName()
    {
        return QueryLedgersResponse::class;
    }
}
