<?php
/**
 * @author fabian.hanisch
 * @since  2017-07-18
 */

namespace HanischIt\KrakenApi\Model\AccountBalance;

/**
 * Class AccountBalanceModel
 *
 * @package HanischIt\KrakenApi\Model\AccountBalance
 */
class AccountBalanceModel
{
    /**
     * @var float
     */
    private $assetName;
    /**
     * @var float
     */
    private $balance;

    /**
     * AccountBalanceModel constructor.
     *
     * @param float $assetName
     * @param float $balance
     */
    public function __construct($assetName, $balance)
    {
        $this->assetName = $assetName;
        $this->balance = $balance;
    }

    /**
     * @return float
     */
    public function getAssetName()
    {
        return $this->assetName;
    }

    /**
     * @return float
     */
    public function getBalance()
    {
        return $this->balance;
    }
}
