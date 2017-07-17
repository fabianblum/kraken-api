<?php
/**
 * @author  Fabian Hanisch
 * @since   16.07.2017 02:34
 * @version 1.0
 */

namespace HanischIt\KrakenApi\Model;

/**
 * Class RequestOptions
 *
 * @package HanischIt\KrakenApi\Model
 */
class RequestOptions
{
    /**
     * @var string
     */
    private $endpoint;
    /**
     * @var string
     */
    private $version;

    /**
     * RequestOptions constructor.
     *
     * @param string $endpoint
     * @param string $version
     */
    public function __construct($endpoint, $version)
    {
        $this->endpoint = $endpoint;
        $this->version = $version;
    }

    /**
     * @return string
     */
    public function getEndpoint()
    {
        return $this->endpoint;
    }

    /**
     * @return string
     */
    public function getVersion()
    {
        return $this->version;
    }
}
