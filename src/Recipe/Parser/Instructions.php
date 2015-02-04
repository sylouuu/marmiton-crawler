<?php
    namespace sylouuu\MarmitonCrawler\Recipe\Parser;

    use PHPHtmlParser\Dom;

    /**
     * Instructions Parser
     *
     * @author sylouuu
     * @link https://github.com/sylouuu/marmiton-crawler
     * @version 0.1.0
     * @license MIT
     */
    class Instructions
    {
        /**
         * Extract from DOM object
         *
         * @param object $dom
         * @return string $instructions
         */
        public static function parse ($dom)
        {
            $element = $dom->find('.m_content_recette_todo');

            if ($element->innerHtml !== null) {
                $instructions = $element->innerHtml;
                $instructions = preg_replace('/<br(\s+)?\/?>/i', "\n", $instructions);
                $instructions = strip_tags($instructions);
                $instructions = explode(':', $instructions, 2);
                $instructions = utf8_encode(trim($instructions[1]));

                return $instructions;
            } else {
                return null;
            }
        }
    }
