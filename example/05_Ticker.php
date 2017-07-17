<?php
/**
 * @author  Fabian Hanisch
 * @since   16.07.2017 02:55
 * @version 1.0
 */

require_once(__DIR__ . '/../vendor/autoload.php');

try {
    $api = new \HanischIt\KrakenApi\KrakenApi(
        "olV67nGEsbcbSRDIH1E+FsLQvBzzaV14IbHyDxZDVyvxI0gpvRl+p7R1",
        "ov9tfD0ZQwEIXbz/87hi9DZze4I6hKY9QLuDBFMdll/H+XU56FJQu5v60kwkHyD9G1SPqqR71IW7QjPYN8nAnw=="
    );

    $tickerResponse = $api->getTicker(["XETHZEUR"]);

    echo "Todays-Opening-Price: " . $tickerResponse->getTodaysOpeningPrice("XETHZEUR");
} catch (Exception $e) {
    echo $e->getMessage();
}
