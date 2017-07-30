<?php

namespace HanischIt\KrakenApi\Model;

/**
 * Class Response
 * @package HanischIt\KrakenApi\Model
 */
abstract class Response
{
    abstract public function manualMapping($data);
}