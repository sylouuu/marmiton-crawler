<?php

    use sylouuu\MarmitonCrawler\Recipe\Recipe;

    /**
     * Recipe Tests
     *
     * @author sylouuu
     * @link https://github.com/sylouuu/marmiton-crawler
     * @version 0.1.0
     * @license MIT
     */
    class RecipeTest extends PHPUnit_Framework_TestCase
    {

        public function testRecipeOk1()
        {
            $recipe = new Recipe('http://www.marmiton.org/recettes/recette_salade-de-papayes-epicee_333809.aspx');
            $recipe = $recipe->getRecipe();
            $recipe = json_decode($recipe, true);

            $this->assertEquals('Salade de papayes épicée', $recipe['recipe_name']);
            $this->assertEquals(4, $recipe['guests_number']);
            $this->assertEquals(20, $recipe['preparation_time']);
            $this->assertEquals(0, $recipe['cook_time']);
            $this->assertEquals('2 papayes mûres', $recipe['ingredients'][0]);
            $this->assertEquals('2 cuillères à soupe de pignons', $recipe['ingredients'][count($recipe['ingredients']) - 1]);
            $this->assertNotNull($recipe['instructions']);
        }

        public function testRecipeOk2()
        {
            $recipe = new Recipe('http://www.marmiton.org/recettes/recette_beignets-a-la-banane_28413.aspx');
            $recipe = $recipe->getRecipe();
            $recipe = json_decode($recipe, true);

            $this->assertEquals('Beignets à la banane', $recipe['recipe_name']);
            $this->assertEquals(6, $recipe['guests_number']);
            $this->assertEquals(10, $recipe['preparation_time']);
            $this->assertEquals(5, $recipe['cook_time']);
            $this->assertEquals('3 bananes', $recipe['ingredients'][0]);
            $this->assertEquals('150 g de farine', $recipe['ingredients'][count($recipe['ingredients']) - 1]);
            $this->assertNotNull($recipe['instructions']);
        }

        public function testRecipeKo()
        {
            $recipe = new Recipe('http://www.marmiton.org/crepe/crepes-sucrees_1.aspx');
            $recipe = $recipe->getRecipe();
            $recipe = json_decode($recipe, true);

            $this->assertNull($recipe['recipe_name']);
            $this->assertNull($recipe['guests_number']);
            $this->assertNull($recipe['preparation_time']);
            $this->assertNull($recipe['cook_time']);
            $this->assertNull($recipe['ingredients']);
            $this->assertNull($recipe['instructions']);
        }

        /**
         * @expectedException \InvalidArgumentException
         * @expectedExceptionMessage This recipe does not ex
         */
        public function testRecipeExceptionNotFound()
        {
            $recipe = new Recipe('http://www.marmiton.org/recettes/notfound');
        }

        /**
         * @expectedException \InvalidArgumentException
         * @expectedExceptionMessage You must provide an URL from the domain "www.marmiton.org".
         */
        public function testRecipeExceptionInvalidDomain()
        {
            $recipe = new Recipe('http://reqr.es/api/users/42');
        }

    }
