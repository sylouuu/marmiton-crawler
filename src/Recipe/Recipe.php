<?php
    namespace sylouuu\MarmitonCrawler\Recipe;

    use sylouuu\MarmitonCrawler\Recipe\Parser;
    use sylouuu\Curl\Method as Curl;
    use PHPHtmlParser\Dom;

    /**
     * Recipe
     *
     * Get Marmiton recipes
     *
     * @author sylouuu
     * @link https://github.com/sylouuu/marmiton-crawler
     * @version 0.1.0
     * @license MIT
     */
    class Recipe
    {
        private $data = [];

        /**
         * Constructor
         *
         * @param string $url
         * @throws \InvalidArgumentException
         */
        public function __construct ($url)
        {
            $html = $this->_loadUrl($url);

            if ($html !== null) {
                $dom = new Dom;

                $dom->load($html);

                $this->data = $this->_extractData($dom);
            } else {
                throw new \InvalidArgumentException('This recipe does not exists.');
            }
        }

        /**
         * JSON encoding
         *
         * @return string
         */
        public function getRecipe () {
            return json_encode($this->data);
        }

        /**
         * Extract all data from DOM
         *
         * @param object $dom
         * @return array
         */
        private function _extractData ($dom) {
            return [
                'recipe_name'      => Parser\RecipeName::parse($dom),
                'guests_number'    => Parser\GuestsNumber::parse($dom),
                'preparation_time' => Parser\PreparationTime::parse($dom),
                'cook_time'        => Parser\CookTime::parse($dom),
                'ingredients'      => Parser\Ingredients::parse($dom),
                'instructions'     => Parser\Instructions::parse($dom)
            ];
        }

        /**
         * Load recipe url
         *
         * @param string $url
         * @throws \InvalidArgumentException
         * @return mixed
         */
        private function _loadUrl ($url) {
            $url_components = parse_url($url);

            if ($url_components['host'] !== 'www.marmiton.org') {
                throw new \InvalidArgumentException('You must provide an URL from the domain "www.marmiton.org".');
            } else {
                $request = new Curl\Get($url);
                $request->setCurlOption(CURLOPT_USERAGENT, 'Mozilla/5.0');

                $request->send();

                if ($request->getStatus() === 200) {
                    return utf8_decode($request->getResponse());
                } else {
                    return null;
                }
            }
        }

    }
