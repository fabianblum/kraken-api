<?php
/**
 * Created by PhpStorm.
 * User: fabia
 * Date: 26.07.2017
 * Time: 16:49
 */

namespace tests\src\Service\RequestService;

use HanischIt\KrakenApi\Service\RequestService\Nonce;

/**
 * Class NonceTest
 * @package tests\src\Service\RequestService
 */
class NonceTest extends \PHPUnit_Framework_TestCase
{
    public function testGenerate()
    {
        $nonceService = new Nonce();

        self::assertNotEmpty( $nonceService->generate());
    }
}
