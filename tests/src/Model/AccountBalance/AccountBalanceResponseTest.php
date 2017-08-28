<?php
/**
 * Created by PhpStorm.
 * User: fabia
 * Date: 26.07.2017
 * Time: 18:58
 */

namespace src\Model\AccountBalance;

use PHPUnit\Framework\TestCase;

class AccountBalanceResponseTest extends TestCase
{
    public function testResponse()
    {
        $data = [];
        for($i = 0; $i < rand(5, 20); $i++)
        {
            $data[uniqid()] = rand(100, 99999) / 100;
        }
        $accountBalanceResponse = new \HanischIt\KrakenApi\Call\AccountBalance\AccountBalanceResponse();
        $accountBalanceResponse->manualMapping($data);
        $responseModels = $accountBalanceResponse->getBalanceModels();

        self::assertContainsOnlyInstancesOf(\HanischIt\KrakenApi\Call\AccountBalance\Model\AccountBalanceModel::class,
            $responseModels);

        $i = 0;
        foreach($data as $assetName => $balance) {
            self::assertEquals($responseModels[$i]->getBalance(), $balance);
            self::assertEquals($responseModels[$i]->getAssetName(), $assetName);

            $i++;
        }
    }
}
