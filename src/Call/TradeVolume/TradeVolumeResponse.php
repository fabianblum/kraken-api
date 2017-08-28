<?php

namespace HanischIt\KrakenApi\Call\TradeVolume;

use HanischIt\KrakenApi\Call\TradeVolume\Model\FeeModel;
use HanischIt\KrakenApi\Model\ResponseInterface;

/**
 * Class TradeVolumeResponse
 * @package HanischIt\KrakenApi\Call\TradeVolume
 */
class TradeVolumeResponse implements ResponseInterface
{
    /**
     * @var string
     */
    private $currency;
    /**
     * @var float
     */
    private $volume;
    /**
     * @var FeeModel[]
     */
    private $fees = [];
    /**
     * @var FeeModel[]
     */
    private $feesMaker = [];

    /**
     * @param array $result
     */
    public function manualMapping($result)
    {
        $this->currency = $result["currency"];
        $this->volume = $result["volume"];


        if (isset($result["fees"])) {
            foreach ($result["fees"] as $fee) {
                $this->fees[] = new FeeModel(
                    $fee["fee"],
                    $fee["minfee"],
                    $fee["maxfee"],
                    $fee["nextfee"],
                    $fee["nextvolume"],
                    $fee["tiervolume"]
                );
            }
        }

        if (isset($result["fees_maker"])) {
            foreach ($result["fees_maker"] as $fee) {
                $this->feesMaker[] = new FeeModel(
                    $fee["fee"],
                    $fee["minfee"],
                    $fee["maxfee"],
                    $fee["nextfee"],
                    $fee["nextvolume"],
                    $fee["tiervolume"]
                );
            }
        }
    }

    /**
     * @return string
     */
    public function getCurrency()
    {
        return $this->currency;
    }

    /**
     * @return float
     */
    public function getVolume()
    {
        return $this->volume;
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


}
