<?php
/**
 * @author  Fabian Hanisch
 * @since   16.07.2017 20:34
 * @version 1.0
 */

namespace HanischIt\KrakenApi\Call\Assets\Model;

/**
 * Class AssetModel
 * @package HanischIt\KrakenApi\Call\Assets\Model
 */
class AssetModel
{
    /**
     * @var string
     */
    private $assetName;
    /**
     * @var string
     */
    private $aclass;
    /**
     * @var string
     */
    private $altname;
    /**
     * @var int
     */
    private $decimals;
    /**
     * @var int
     */
    private $displayDecimals;

    /**
     * AssetModel constructor.
     *
     * @param string $assetName
     * @param string $aclass
     * @param string $altname
     * @param int $decimals
     * @param int $displayDecimals
     */
    public function __construct($assetName, $aclass, $altname, $decimals, $displayDecimals)
    {
        $this->assetName = $assetName;
        $this->aclass = $aclass;
        $this->altname = $altname;
        $this->decimals = $decimals;
        $this->displayDecimals = $displayDecimals;
    }

    /**
     * @return string
     */
    public function getAssetName()
    {
        return $this->assetName;
    }

    /**
     * @return string
     */
    public function getAclass()
    {
        return $this->aclass;
    }

    /**
     * @return string
     */
    public function getAltname()
    {
        return $this->altname;
    }

    /**
     * @return int
     */
    public function getDecimals()
    {
        return $this->decimals;
    }

    /**
     * @return int
     */
    public function getDisplayDecimals()
    {
        return $this->displayDecimals;
    }
}
