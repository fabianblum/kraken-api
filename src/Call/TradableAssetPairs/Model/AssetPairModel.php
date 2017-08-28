<?php
/**
 * Created by PhpStorm.
 * User: Fabian
 * Date: 24.07.2017
 * Time: 15:06
 */

namespace HanischIt\KrakenApi\Call\TradableAssetPairs\Model;

/**
 * Class AssetPairModel
 * @package HanischIt\KrakenApi\Call\TradableAssetPairs\Model
 */
class AssetPairModel
{
    /**
     * @var string
     */
    private $assetPair;
    /**
     * @var string
     */
    private $altname;
    /**
     * @var string
     */
    private $aclassBase;
    /**
     * @var string
     */
    private $base;
    /**
     * @var string
     */
    private $aclassQuote;
    /**
     * @var string
     */
    private $quote;
    /**
     * @var string
     */
    private $lot;
    /**
     * @var string
     */
    private $lotDecimals;
    /**
     * @var string
     */
    private $lotMultiplier;
    /**
     * @var string
     */
    private $leverageBuy;
    /**
     * @var string
     */
    private $leverageSell;
    /**
     * @var FeeModel[]
     */
    private $fees;
    /**
     * @var FeeModel[]
     */
    private $feesMaker;
    /**
     * @var string
     */
    private $feeVolumeCurrency;
    /**
     * @var string
     */
    private $marginCall;
    /**
     * @var string
     */
    private $marginStop;
    /**
     * @var int
     */
    private $pairDecimals;

    /**
     * AssetPairModel constructor.
     * @param string $assetPair
     * @param string $altname
     * @param string $aclassBase
     * @param string $base
     * @param string $aclassQuote
     * @param string $quote
     * @param string $lot
     * @param int $pairDecimals
     * @param string $lotDecimals
     * @param string $lotMultiplier
     * @param string $leverageBuy
     * @param string $leverageSell
     * @param FeeModel[] $fees
     * @param FeeModel[] $feesMaker
     * @param string $feeVolumeCurrency
     * @param string $marginCall
     * @param string $marginStop
     */
    public function __construct(
        $assetPair,
        $altname,
        $aclassBase,
        $base,
        $aclassQuote,
        $quote,
        $lot,
        $pairDecimals,
        $lotDecimals,
        $lotMultiplier,
        $leverageBuy,
        $leverageSell,
        $fees,
        $feesMaker,
        $feeVolumeCurrency,
        $marginCall,
        $marginStop
    ) {
        $this->assetPair = $assetPair;
        $this->altname = $altname;
        $this->aclassBase = $aclassBase;
        $this->base = $base;
        $this->aclassQuote = $aclassQuote;
        $this->quote = $quote;
        $this->lot = $lot;
        $this->pairDecimals = $pairDecimals;
        $this->lotDecimals = $lotDecimals;
        $this->lotMultiplier = $lotMultiplier;
        $this->leverageBuy = $leverageBuy;
        $this->leverageSell = $leverageSell;
        $this->fees = $fees;
        $this->feesMaker = $feesMaker;
        $this->feeVolumeCurrency = $feeVolumeCurrency;
        $this->marginCall = $marginCall;
        $this->marginStop = $marginStop;
    }

    /**
     * @return string
     */
    public function getAssetPair()
    {
        return $this->assetPair;
    }

    /**
     * @return int
     */
    public function getPairDecimals()
    {
        return $this->pairDecimals;
    }


    /**
     * @return string
     */
    public function getAltname()
    {
        return $this->altname;
    }

    /**
     * @return string
     */
    public function getAclassBase()
    {
        return $this->aclassBase;
    }

    /**
     * @return string
     */
    public function getBase()
    {
        return $this->base;
    }

    /**
     * @return string
     */
    public function getAclassQuote()
    {
        return $this->aclassQuote;
    }

    /**
     * @return string
     */
    public function getQuote()
    {
        return $this->quote;
    }

    /**
     * @return string
     */
    public function getLot()
    {
        return $this->lot;
    }

    /**
     * @return string
     */
    public function getLotDecimals()
    {
        return $this->lotDecimals;
    }

    /**
     * @return string
     */
    public function getLotMultiplier()
    {
        return $this->lotMultiplier;
    }

    /**
     * @return string
     */
    public function getLeverageBuy()
    {
        return $this->leverageBuy;
    }

    /**
     * @return string
     */
    public function getLeverageSell()
    {
        return $this->leverageSell;
    }

    /**
     * @return FeeModel[]
     */
    public function getFees()
    {
        return $this->fees;
    }

    /**
     * @return FeeModel[]
     */
    public function getFeesMaker()
    {
        return $this->feesMaker;
    }

    /**
     * @return string
     */
    public function getFeeVolumeCurrency()
    {
        return $this->feeVolumeCurrency;
    }

    /**
     * @return string
     */
    public function getMarginCall()
    {
        return $this->marginCall;
    }

    /**
     * @return string
     */
    public function getMarginStop()
    {
        return $this->marginStop;
    }
}
