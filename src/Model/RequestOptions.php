<?php
/**
 * @author Fabian Hanisch
 * @since 16.07.2017 02:34
 * @version 1.0
 */

namespace HanischIt\KrakenApi\Model;

/**
 * Class RequestOptions
 * @package HanischIt\KrakenApi\Model
 */
class RequestOptions
{
    /**
     * @var string
     */
    private $endpoint;

    /**
     * RequestOptions constructor.
     * @param string $endpoint
     */
    public function __construct($endpoint)
    {
        $this->endpoint = $endpoint;
    }

    /**
     * @return string
     */
    public function getEndpoint(): string
    {
        return $this->endpoint;
    }
}
