<?php
/**
 * @author fabian.hanisch
 * @since  2017-07-17
 */

namespace tests\src\Enum;

use HanischIt\KrakenApi\Enum\OrderOrderTypeEnum;
use PHPUnit_Framework_TestCase;

/**
 * Class OrderOrderTypeEnumTest
 *
 * @package tests\src\Enum
 */
class OrderOrderTypeEnumTest extends PHPUnit_Framework_TestCase
{
    public function testEnum()
    {
        self::assertEquals('limit', OrderOrderTypeEnum::ORDER_ORDERTYPE_LIMIT);
        self::assertEquals('market', OrderOrderTypeEnum::ORDER_ORDERTYPE_MARKET);
    }
}
