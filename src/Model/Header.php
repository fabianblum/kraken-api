<?php
/**
 * @author  Fabian Hanisch
 * @since   14.07.2017 21:00
 * @version 1.0
 */

namespace HanischIt\KrakenApi\Model;

/**
 * Class Header
 *
 * @package HanischIt\KrakenApi\Model
 */
class Header
{
    /**
     * @var string
     */
    private $apiKey;
    /**
     * @var string
     */
    private $apiSign;

    /**
     * Header constructor.
     *
     * @param string $apiKey
     * @param string $apiSign
     */
    public function __construct($apiKey, $apiSign)
    {
        $this->apiKey = $apiKey;
        $this->apiSign = $apiSign;
    }

    /**
     * @return string
     */
    public function getApiKey()
    {
        return $this->apiKey;
    }

    /**
     * @return string
     */
    public function getApiSign()
    {
        return $this->apiSign;
    }
}
