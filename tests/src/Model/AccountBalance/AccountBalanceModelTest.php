<?php
/**
 * Created by PhpStorm.
 * User: fabia
 * Date: 26.07.2017
 * Time: 18:51
 */

namespace src\Model\AccountBalance;

use HanischIt\KrakenApi\Call\AccountBalance\Model\AccountBalanceModel;
use PHPUnit\Framework\TestCase;

class AccountBalanceModelTest extends TestCase
{
    public function testAccountBalanceModel()
    {
        $assetName = uniqid();
        $number = rand(100, 99999999) / 100;
        $accountBalanceModel = new AccountBalanceModel($assetName, $number);
        self::assertEquals($assetName, $accountBalanceModel->getAssetName());
        self::assertEquals($number, $accountBalanceModel->getBalance());
    }
}
