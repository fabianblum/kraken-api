<?php
/**
 * Created by PhpStorm.
 * User: fabia
 * Date: 27.07.2017
 * Time: 00:15
 */

namespace HanischIt\KrakenApi\Model\Assets;

use HanischIt\KrakenApi\Model\ResponseInterface;


/**
 * Class AssetsResponse
 *
 * @package HanischIt\KrakenApi\Model\Assets
 */
interface AssetsResponseInterface extends ResponseInterface
{
    /**
     * @param array $result
     */
    public function manualMapping($result);

    /**
     * @return AssetModel[]
     */
    public function getAssets();
}