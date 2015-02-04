<?php
    namespace sylouuu\MarmitonCrawler\Recipe\Parser;

    use PHPHtmlParser\Dom;

    /**
     * Ingredients Parser
     *
     * @author sylouuu
     * @link https://github.com/sylouuu/marmiton-crawler
     * @version 0.1.0
     * @license MIT
     */
    class Ingredients
    {
        /**
         * Extract from DOM object
         *
         * @param object $dom
         * @return array $ingredients
         */
        public static function parse ($dom)
        {
            $element = $dom->find('.m_content_recette_ingredients');

            if ($element->innerHtml !== null) {
                $ingredients = trim($element->innerHtml);
                $ingredients = utf8_encode(strip_tags($ingredients));
                $ingredients = explode(':', $ingredients);
                $ingredients = trim($ingredients[1]);
                $ingredients = explode('-', $ingredients);
                array_shift($ingredients);
                $ingredients = array_map('trim', $ingredients);

                return $ingredients;
            } else {
                return null;
            }
        }
    }
