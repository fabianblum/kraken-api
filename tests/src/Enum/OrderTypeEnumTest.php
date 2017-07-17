<?php
/**
 * @author fabian.hanisch
 * @since  2017-07-17
 */

namespace tests\src\Enum;

use HanischIt\KrakenApi\Enum\OrderTypeEnum;
use PHPUnit_Framework_TestCase;

/**
 * Class OrderTypeEnumTest
 *
 * @package tests\src\Enum
 */
class OrderTypeEnumTest extends PHPUnit_Framework_TestCase
{
    public function testEnum()
    {
        self::assertEquals('buy', OrderTypeEnum::ORDER_TYPE_BUY);
        self::assertEquals('sell', OrderTypeEnum::ORDER_TYPE_SELL);
    }
}
