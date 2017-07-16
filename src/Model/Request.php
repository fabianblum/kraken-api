<?php
/**
 * @author Fabian Hanisch
 * @since 14.07.2017 21:04
 * @version 1.0
 */

namespace HanischIt\KrakenApi\Model;

/**
 * Class Request
 * @package HanischIt\KrakenApi\Model
 */
class Request
{
    /**
     * @var string
     */
    private $nonce;

    /**
     * @var string
     */
    private $otp;

    /**
     * Request constructor.
     * @param string $nonce
     * @param string $otp
     */
    public function __construct($nonce, $otp)
    {
        $this->nonce = $nonce;
        $this->otp = $otp;
    }

    /**
     * @return string
     */
    public function getNonce()
    {
        return $this->nonce;
    }

    /**
     * @return string
     */
    public function getOtp()
    {
        return $this->otp;
    }
}
