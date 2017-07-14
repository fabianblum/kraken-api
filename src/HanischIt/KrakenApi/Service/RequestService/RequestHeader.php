<?php
/**
 * @author Fabian Hanisch
 * @since 14.07.2017 23:19
 * @version 1.0
 */

namespace HanischIt\KrakenApi\Service\RequestService;

use HanischIt\KrakenApi\Model\Header;

/**
 * Class RequestHeader
 * @package HanischIt\KrakenApi\Service\RequestService
 */
class RequestHeader
{
    /**
     * @param Header $header
     * @return array
     */
    public function asArray(Header $header)
    {
        return ["API-Key" => $header->getApiKey(), "API-Sign" => $header->getApiSign()];
    }
}
