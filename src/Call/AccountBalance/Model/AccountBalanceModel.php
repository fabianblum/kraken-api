<?php
/**
 * @author fabian.hanisch
 * @since  2017-07-18
 */

namespace HanischIt\KrakenApi\Call\AccountBalance\Model;

/**
 * Class AccountBalanceModel
 * @package HanischIt\KrakenApi\Call\AccountBalance\Model
 */
class AccountBalanceModel
{
    /**
     * @var string
     */
    private $assetName;
    /**
     * @var float
     */
    private $balance;

    /**
     * AccountBalanceModel constructor.
     *
     * @param string $assetName
     * @param float $balance
     */
    public function __construct($assetName, $balance)
    {
        $this->assetName = $assetName;
        $this->balance = $balance;
    }

    /**
     * @return string
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
