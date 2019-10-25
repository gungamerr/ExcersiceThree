<?php
    namespace Controllers;

    class HomeController
    {
        public function Index($message = "")
        {
            require_once(VIEWS_PATH."home.php");
        }   
        
        public function AddBeer($message = "")
        {
            require(VIEWS_PATH."add-beer.php");
        }

        public function AddBeerType($message = "")
        {
            require(VIEWS_PATH."add-beertype.php");
        }

        public function BeerList($message = "")
        {
            require(VIEWS_PATH."beer-list.php");
        }

        public function BeerTypeList($message = "")
        {
            require(VIEWS_PATH."beertype-list.php");
        }
    }
?>