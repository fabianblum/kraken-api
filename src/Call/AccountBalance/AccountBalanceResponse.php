<?php

namespace HanischIt\KrakenApi\Call\AccountBalance;

use HanischIt\KrakenApi\Call\AccountBalance\Model\AccountBalanceModel;
use HanischIt\KrakenApi\Model\ResponseInterface;

/**
 * Class AccountBalanceResponse
 *
 * @package HanischIt\KrakenApi\Mod
 */
class AccountBalanceResponse implements ResponseInterface
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
