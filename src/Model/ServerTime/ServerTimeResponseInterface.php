<?php
/**
 * Created by PhpStorm.
 * User: fabia
 * Date: 27.07.2017
 * Time: 00:17
 */

namespace HanischIt\KrakenApi\Model\ServerTime;


/**
 * Class ServerTimeResponse
 *
 * @package HanischIt\KrakenApi\Model\ServerTime
 */
interface ServerTimeResponseInterface
{
    /**
     * @return string
     */
    public function getUnixTime();

    /**
     * @param string $unixTime
     */
    public function setUnixTime($unixTime);

    /**
     * @return string
     */
    public function getRfc1123();

    /**
     * @param string $rfc1123
     */
    public function setRfc1123($rfc1123);
}