<?php
/**
 * @author  Fabian Hanisch
 * @since   14.07.2017 23:09
 * @version 1.0
 */

namespace HanischIt\KrakenApi\Service\RequestService;

use HanischIt\KrakenApi\Model\Header;
use HanischIt\KrakenApi\Model\RequestInterface;
use HanischIt\KrakenApi\Model\RequestOptions;

/**
 * Interface RequestServiceInterface
 *
 * @package HanischIt\KrakenApi\Service\RequestService
 */
interface RequestServiceInterface
{
    public function execute(RequestInterface $request, RequestOptions $requestOptions, Header $header);
}
