<?php

namespace HanischIt\KrakenApi\Model;

/**
 * Class Response
 * @package HanischIt\KrakenApi\Model
 */
abstract class AbstractRequest
{
    /**
     * Returns the api request name
     *
     * @return string
     */
    abstract public function getMethod();

    /**
     * @return string
     */
    abstract public function getVisibility();

    /**
     * @return array
     */
    abstract public function getRequestData();

    /**
     * @return string
     */
    abstract public function getResponseClassName();
}