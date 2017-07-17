<?php
/**
 * @author fabian.hanisch
 * @since  2017-07-17
 */

namespace tests\src\Enum;

use HanischIt\KrakenApi\Enum\RequestMethodEnum;
use PHPUnit_Framework_TestCase;

/**
 * Class RequestMethodsEnumTest
 *
 * @package tests\src\Enum
 */
class RequestMethodsEnumTest extends PHPUnit_Framework_TestCase
{
    public function testEnum()
    {
        self::assertEquals('GET', RequestMethodEnum::REQUEST_METHOD_GET);
        self::assertEquals('POST', RequestMethodEnum::REQUEST_METHOD_POST);
    }
}
