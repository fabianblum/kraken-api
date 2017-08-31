# Kraken-API
[![Gitter chat](https://badges.gitter.im/hanisch-it/kraken-api.png)](https://gitter.im/hanischit-kraken-api/Lobby)
![PHP 5.5](https://img.shields.io/badge/PHP-5.5-brightgreen.svg)
![PHP 5.6](https://img.shields.io/badge/PHP-5.6-brightgreen.svg)
![PHP 7](https://img.shields.io/badge/PHP-7-brightgreen.svg)
![PHP 7.1](https://img.shields.io/badge/PHP-7.1-brightgreen.svg)
[![Version](https://img.shields.io/github/tag/Hanisch-IT/kraken-api.svg)](https://packagist.org/packages/hanischit/kraken-api)
[![Scrutinizer Code Quality](https://scrutinizer-ci.com/g/Hanisch-IT/kraken-api/badges/quality-score.png?b=master)](https://scrutinizer-ci.com/g/Hanisch-IT/kraken-api/?branch=master)
[![Code Coverage](https://scrutinizer-ci.com/g/Hanisch-IT/kraken-api/badges/coverage.png?b=master)](https://scrutinizer-ci.com/g/Hanisch-IT/kraken-api/?branch=master)

Simple API client to work with kraken.

All calls of the api are implemented: https://www.kraken.com/help/api

## Installation & loading
Kraken api is available on [Packagist](https://packagist.org/packages/hanischit/kraken-api) (using semantic versioning), and installation via composer is the recommended way to install Kraken-api. Just add this line to your `composer.json` file:

```json
"hanischit/kraken-api": "^1.1.3"
```

or run

```sh
composer require hanischit/kraken-api
```

The API declares the namespace `\HanischIt\KrakenApi`.


## Example


```php
require_once(__DIR__ . '/../vendor/autoload.php');

try {
    $api = new \HanischIt\KrakenApi\KrakenApi("Your-API-Key", "Your-API-Sign");

    $serverTimeResponse = $api->getServerTime();

    echo "UnixTime: " . $serverTimeResponse->getUnixTime() . "\n";
    echo "rfc1123: " . $serverTimeResponse->getRfc1123();
} catch (Exception $e) {
    echo $e->getMessage();
}

```
See  [examples](https://github.com/Hanisch-IT/kraken-api/tree/master/example) folder for more examples.

## Tests
There is a PHPUnit test script in the [test](https://github.com/Hanisch-IT/kraken-api/tree/master/tests) folder. 

Build status: [![Build Status](https://travis-ci.org/Hanisch-IT/kraken-api.svg?branch=master)](https://travis-ci.org/Hanisch-IT/kraken-api)


## Security

Please disclose any vulnerabilities found responsibly - report any security problems found to the maintainers privately.

## Contributing
Please submit bug reports, suggestions and pull requests to the [GitHub issue tracker](https://github.com/Hanisch-IT/kraken-api/issues).
