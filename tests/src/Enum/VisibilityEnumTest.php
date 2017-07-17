<?php
/**
 * @author fabian.hanisch
 * @since  2017-07-17
 */

namespace tests\src\Enum;

use HanischIt\KrakenApi\Enum\VisibilityEnum;
use PHPUnit_Framework_TestCase;

/**
 * Class VisibilityEnumTest
 *
 * @package tests\src\Enum
 */
class VisibilityEnumTest extends PHPUnit_Framework_TestCase
{
    public function testEnum()
    {
        self::assertEquals('private', VisibilityEnum::VISIBILITY_PRIVATE);
        self::assertEquals('public', VisibilityEnum::VISIBILITY_PUBLIC);
    }
}
