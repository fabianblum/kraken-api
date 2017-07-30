<?php
/**
 * Created by PhpStorm.
 * User: fabia
 * Date: 27.07.2017
 * Time: 00:14
 */

namespace HanischIt\KrakenApi\Model\AccountBalance;

use HanischIt\KrakenApi\Model\ResponseInterface;


/**
 * Class AccountBalanceResponse
 *
 * @package HanischIt\KrakenApi\Mod
 */
interface AccountBalanceResponseInterface extends ResponseInterface
{
    /**
     * @param array $result
     */
    public function manualMapping($result);

    /**
     * @return AccountBalanceModel[]
     */
    public function getBalanceModels();
}