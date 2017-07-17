<?php

namespace HanischIt\KrakenApi\Model;

/**
 * @author  Fabian Hanisch
 * @since   2017-07-14
 * @version 1.0.0
 */

/**
 * Interface RequestInterface
 *
 * @package HanischIt\KrakenApi\Model
 */
interface RequestInterface
{
    /**
     * Returns the api request name
     *
     * @return string
     */
    public function getMethod();

    /**
     * @return string
     */
    public function getVisibility();

    /**
     * @return array
     */
    public function getRequestData();

    /**
     * @return string
     */
    public function getResponseClassName();
}
