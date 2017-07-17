<?php
/**
 * @author fabian.hanisch
 * @since  2017-07-17
 */

namespace HanischIt\KrakenApi\Service\RequestService;

/**
 * Class Nonce
 *
 * @package HanischIt\KrakenApi\Service\RequestService
 */
class Nonce
{
    public function generate()
    {
        $nonce = explode(' ', microtime());
        $nonce = $nonce[1] . str_pad(substr($nonce[0], 2, 6), 6, '0');

        return $nonce;
    }
}
