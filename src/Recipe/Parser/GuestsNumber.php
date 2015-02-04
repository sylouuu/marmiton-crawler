<?php
    namespace sylouuu\MarmitonCrawler\Recipe\Parser;

    use PHPHtmlParser\Dom;

    /**
     * GuestsNumber Parser
     *
     * @author sylouuu
     * @link https://github.com/sylouuu/marmiton-crawler
     * @version 0.1.0
     * @license MIT
     */
    class GuestsNumber
    {
        /**
         * Extract from DOM object
         *
         * @param object $dom
         * @return int $guests_number
         */
        public static function parse ($dom)
        {
            $element = $dom->find('.m_content_recette_ingredients span')[0];

            if ($element !== null) {
                $guests_number = trim($element->text);
                preg_match_all('/\d+/', $guests_number, $matches);
                $guests_number = intval($matches[0][0]);

                return $guests_number;
            } else {
                return null;
            }
        }
    }
