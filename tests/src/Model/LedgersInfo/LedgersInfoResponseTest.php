<?php

namespace src\Model\LedgersInfo;

use HanischIt\KrakenApi\Model\LedgersInfo\LedgersInfoResponse;
use PHPUnit\Framework\TestCase;

class LedgersInfoResponseTest extends TestCase
{
    public function testResponse()
    {
        $data = [];
        for ($i = 0; $i < rand(5, 10); $i++) {
            $data[] = [
                "refid" => uniqid(),
                "time" => uniqid(),
                "type" => uniqid(),
                "aclass" => uniqid(),
                "asset" => uniqid(),
                "amount" => rand(1000, 99999) / 1000,
                "fee" => rand(1000, 99999) / 1000,
                "balance" => rand(1000, 99999) / 1000
            ];
        }

        $ledgersInfoResponse = new LedgersInfoResponse();
        $ledgersInfoResponse->manualMapping($data);

        foreach ($ledgersInfoResponse->getLedgerInfos() as $key => $ledgerInfo) {
            self::assertEquals($key, $ledgerInfo->getLedgerId());
            self::assertEquals($data[$key]["refid"], $ledgerInfo->getRefid());
            self::assertEquals($data[$key]["time"], $ledgerInfo->getTime());
            self::assertEquals($data[$key]["type"], $ledgerInfo->getType());
            self::assertEquals($data[$key]["aclass"], $ledgerInfo->getAclass());
            self::assertEquals($data[$key]["asset"], $ledgerInfo->getAsset());
            self::assertEquals($data[$key]["amount"], $ledgerInfo->getAmount());
            self::assertEquals($data[$key]["fee"], $ledgerInfo->getFee());
            self::assertEquals($data[$key]["balance"], $ledgerInfo->getBalance());
        }
    }
}
