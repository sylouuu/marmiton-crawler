<?php
    namespace sylouuu\MarmitonCrawler\Recipe\Parser;

    use PHPHtmlParser\Dom;

    /**
     * CookTime Parser
     *
     * @author sylouuu
     * @link https://github.com/sylouuu/marmiton-crawler
     * @version 0.1.0
     * @license MIT
     */
    class CookTime
    {
        /**
         * Extract from DOM object
         *
         * @param object $dom
         * @return int
         */
        public static function parse ($dom)
        {
            $element = $dom->find('.m_content_recette_info span.cooktime');

            if ($element->text !== null) {
                return intval(trim($element->text));
            } else {
                return null;
            }
        }
    }
