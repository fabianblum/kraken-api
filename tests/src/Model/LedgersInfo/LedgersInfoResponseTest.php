<?php

namespace src\Model\LedgersInfo;

use HanischIt\KrakenApi\Call\LedgersInfo\LedgersInfoResponse;
use PHPUnit\Framework\TestCase;

class LedgersInfoResponseTest extends TestCase
{
    public function testResponse()
    {
        $data = [];
        $data["count"] = rand(1, 1000);
        $data["ledger"] = [];
        for ($i = 0; $i < rand(5, 10); $i++) {
            $data["ledger"][] = [
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

        self::assertEquals($data["count"], $ledgersInfoResponse->getCount());
        foreach ($ledgersInfoResponse->getLedgerInfos() as $key => $ledgerInfo) {
            self::assertEquals($key, $ledgerInfo->getLedgerId());
            self::assertEquals($data["ledger"][$key]["refid"], $ledgerInfo->getRefid());
            self::assertEquals($data["ledger"][$key]["time"], $ledgerInfo->getTime());
            self::assertEquals($data["ledger"][$key]["type"], $ledgerInfo->getType());
            self::assertEquals($data["ledger"][$key]["aclass"], $ledgerInfo->getAclass());
            self::assertEquals($data["ledger"][$key]["asset"], $ledgerInfo->getAsset());
            self::assertEquals($data["ledger"][$key]["amount"], $ledgerInfo->getAmount());
            self::assertEquals($data["ledger"][$key]["fee"], $ledgerInfo->getFee());
            self::assertEquals($data["ledger"][$key]["balance"], $ledgerInfo->getBalance());
        }
    }
}
