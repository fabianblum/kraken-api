<?php
require_once(__DIR__ . '/../vendor/autoload.php');

try {
    $api = new \HanischIt\KrakenApi\KrakenApi(
        "Your-API-Key",
        "Your-API-Sign"
    );

    $tradeBalance = $api->getTradeBalance('currency', 'ZEUR');


    echo "Trade Balance: " . $tradeBalance->getTradeBalance() . "\n";
    echo "Cost basis: " . $tradeBalance->getCostBasis() . "\n";
    echo "Current floating valuation: " . $tradeBalance->getCurrentFloatingValuation() . "\n";
    echo "Equity: " . $tradeBalance->getEquity() . "\n";
    echo "Equivalent balance: " . $tradeBalance->getEquivavlentBalance() . "\n";
    echo "Free margin: " . $tradeBalance->getFreeMargin() . "\n";
    echo "Margin amount: " . $tradeBalance->getMarginAmount() . "\n";
    echo "Unrealized net profit loss: " . $tradeBalance->getUnrealizedNetProfitLoss() . "\n";


} catch (Exception $e) {
    echo $e->getMessage();
}
