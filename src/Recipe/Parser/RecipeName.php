<?php
    namespace sylouuu\MarmitonCrawler\Recipe\Parser;

    use PHPHtmlParser\Dom;

    /**
     * RecipeName Parser
     *
     * @author sylouuu
     * @link https://github.com/sylouuu/marmiton-crawler
     * @version 0.1.0
     * @license MIT
     */
    class RecipeName
    {
        /**
         * Extract from DOM object
         *
         * @param object $dom
         * @return string
         */
        public static function parse ($dom)
        {
            $element = $dom->find('h1.m_title span.item span.fn');

            if ($element->text !== null) {
                return utf8_encode(trim($element->text));
            } else {
                return null;
            }
        }
    }
