<?php

namespace HanischIt\KrakenApi\Call\TradeBalance;

use HanischIt\KrakenApi\Model\ResponseInterface;

/**
 * Class TradeBalanceResponse
 * @package HanischIt\KrakenApi\Call\TradeBalance
 */
class TradeBalanceResponse implements ResponseInterface
{
    /**
     * @var float
     */
    private $equivavlentBalance;
    /**
     * @var float
     */
    private $tradeBalance;
    /**
     * @var float
     */
    private $marginAmount;
    /**
     * @var float
     */
    private $unrealizedNetProfitLoss;
    /**
     * @var float
     */
    private $costBasis;
    /**
     * @var float
     */
    private $currentFloatingValuation;
    /**
     * @var float
     */
    private $equity;
    /**
     * @var float
     */
    private $freeMargin;


    /**
     * @param array $data
     */
    public function manualMapping($data)
    {
        $this->equivavlentBalance = $data["eb"];
        $this->tradeBalance = $data["tb"];
        $this->marginAmount = $data["m"];
        $this->unrealizedNetProfitLoss = $data["n"];
        $this->costBasis = $data["c"];
        $this->currentFloatingValuation = $data["v"];
        $this->equity = $data["e"];
        $this->freeMargin = $data["mf"];
    }

    /**
     * @return float
     */
    public function getEquivavlentBalance()
    {
        return $this->equivavlentBalance;
    }

    /**
     * @return float
     */
    public function getTradeBalance()
    {
        return $this->tradeBalance;
    }

    /**
     * @return float
     */
    public function getMarginAmount()
    {
        return $this->marginAmount;
    }

    /**
     * @return float
     */
    public function getUnrealizedNetProfitLoss()
    {
        return $this->unrealizedNetProfitLoss;
    }

    /**
     * @return float
     */
    public function getCostBasis()
    {
        return $this->costBasis;
    }

    /**
     * @return float
     */
    public function getCurrentFloatingValuation()
    {
        return $this->currentFloatingValuation;
    }

    /**
     * @return float
     */
    public function getEquity()
    {
        return $this->equity;
    }

    /**
     * @return float
     */
    public function getFreeMargin()
    {
        return $this->freeMargin;
    }
}
