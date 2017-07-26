<?php

namespace HanischIt\KrakenApi\Model\AccountBalance;

/**
 * Class AccountBalanceResponse
 *
 * @package HanischIt\KrakenApi\Mod
 */
class AccountBalanceResponse implements AccountBalanceResponseInterface
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
