<?php

namespace HanischIt\KrakenApi\Call\OpenPositions;

use HanischIt\KrakenApi\Call\OpenPositions\Model\OpenPositionModel;
use HanischIt\KrakenApi\Model\ResponseInterface;

/**
 * Class OpenPositionsResponse
 * @package HanischIt\KrakenApi\Call\OpenPositions
 */
class OpenPositionsResponse implements ResponseInterface
{
    /**
     * @var OpenPositionModel[]
     */
    private $positions = [];

    /**
     * @param array $result
     */
    public function manualMapping($result)
    {
        foreach ($result as $txId => $position) {
            $this->positions[] = new OpenPositionModel(
                $txId,
                $position["ordertxid"],
                $position["pair"],
                $position["time"],
                $position["type"],
                $position["ordertype"],
                $position["cost"],
                $position["fee"],
                $position["vol"],
                $position["vol_closed"],
                $position["margin"],
                $position["value"],
                $position["net"],
                $position["misc"],
                $position["oflags"],
                $position["viqc"]
            );
        }
    }

    /**
     * @return OpenPositionModel[]
     */
    public function getPositions()
    {
        return $this->positions;
    }

}
