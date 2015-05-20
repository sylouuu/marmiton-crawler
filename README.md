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
$recipe = new Recipe('http://www.marmiton.org/recettes/recette_fondant-au-chocolat_15025.aspx');

// JSON format
$recipe = $recipe->getRecipe();
```

### Output

```json
{
    "recipe_name": "Fondant au chocolat",
    "guests_number": 8,
    "preparation_time": 15,
    "cook_time": 20,
    "ingredients": [
        "200 g de chocolat à cuire",
        "100 g de beurre",
        "100 g de sucre",
        "5 oeufs",
        "4 cuillères à soupe rases de farine"
    ],
    "instructions": "Faire fondre le chocolat et le beurre au bain marie à feu doux, ou au micro ondes sur le programme 'décongélation'.\n\nQuand c'est bien fondu, ajouter les jaunes d?oeufs. Bien battre. Ajouter ensuite le sucre et la farine, puis incorporer les blancs d?oeufs montés en neige bien fermes.\n\nBien graisser et fariner un moule à manqué.\n\nCuire à four moyen (180°C environ) pendant 20 min.\n\n  Remarques : Ce fondant est beaucoup moins calorique que celui qui a déjà été 'publié', et il est vraiment délicieux. \nNDLR : Une parfaite recette de Noel ! C'est un fondant, il est donc normal qu'il soit un peu moins cuit au centre, mais vous pouvez toujours le laisser un peu plus longtemps au four si vous l'aimez plus cuit... Essayez-le, vous ne le regretterez pas, je n'arrête pas de distribuer cette recette à mes amis..."
}
```

## Tests

On project directory:

* `composer install` to retrieve `phpunit`
* `phpunit` to run tests

## Changelog

2015-02-04 - **0.1.0**

* Initial release
