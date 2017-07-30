<?php

namespace HanischIt\KrakenApi\Model\AccountBalance;

use HanischIt\KrakenApi\Model\Response;

/**
 * Class AccountBalanceResponse
 *
 * @package HanischIt\KrakenApi\Mod
 */
class AccountBalanceResponse extends Response
{
    /**
     * @var AccountBalanceModel[]
     */
    private $balanceModels = [];

    /**
     * @param $result
     */
    public function manualMapping($result)
    {
        foreach ($result as $assetName => $balance) {
            $this->balanceModels[] = new AccountBalanceModel($assetName, $balance);
        }
    }

    /**
     * @return AccountBalanceModel[]
     */
    public function getBalanceModels()
    {
        return $this->balanceModels;
    }
}
