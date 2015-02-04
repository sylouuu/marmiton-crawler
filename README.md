# Marmiton Crawler

[![Build Status](http://img.shields.io/travis/sylouuu/marmiton-crawler.svg?style=flat)](https://travis-ci.org/sylouuu/marmiton-crawler)
[![Version](http://img.shields.io/packagist/v/sylouuu/marmiton-crawler.svg?style=flat)](https://packagist.org/packages/sylouuu/marmiton-crawler)
[![CodeClimate](http://img.shields.io/codeclimate/github/sylouuu/marmiton-crawler.svg?style=flat)](https://codeclimate.com/github/sylouuu/marmiton-crawler)

## Requirements

* PHP >= 5.4
* [cURL](http://php.net/manual/fr/book.curl.php/) library enabled

## Install

### Composer

```js
{
    "require": {
        "sylouuu/marmiton-crawler": "0.1.*"
    }
}
```

```php
require_once './vendor/autoload.php';
```

## Usage

```php
use sylouuu\MarmitonCrawler\Recipe\Recipe;

// Fetch the recipe
$recipe = new Recipe('http://www.marmiton.org/recettes/recette_salade-de-papayes-epicee_333809.aspx');

// JSON format
$recipe = $recipe->getRecipe();
```

## Tests

On project directory:

* `composer install` to retrieve `phpunit`
* `phpunit` to run tests

## Changelog

2014-02-04 - **0.1.0**

* Initial release
