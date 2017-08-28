<?php
/**
 * @author  Fabian Hanisch
 * @since   14.07.2017 23:19
 * @version 1.0
 */

namespace HanischIt\KrakenApi\Service\RequestService;

use HanischIt\KrakenApi\Model\Header;

/**
 * Class RequestHeader
 *
 * @package HanischIt\KrakenApi\Service\RequestService
 */
class RequestHeader
{
    /**
     * @param Header $header
     * @param array $requestData
     * @param string $path
     * @param        $nonce
     *
     * @return array
     */
    public function asArray(Header $header, array $requestData, $path, $nonce)
    {
        $requestData["nonce"] = $nonce;
        $postData = http_build_query($requestData, '', '&');
        $sign = hash_hmac('sha512', $path . hash('sha256', $nonce . $postData, true),
            base64_decode($header->getApiSign()), true);

        return ["API-Key" => $header->getApiKey(), "API-Sign" => base64_encode($sign)];
    }
}
