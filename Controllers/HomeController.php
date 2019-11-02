<?php
    namespace Controllers;

    use Controllers\BeerTypeController as BeerTypeController;
    use Controllers\BeerController as BeerController;
    use Models\BeerType as BeerType;
    class HomeController
    {   
        private $beerTypeC;
        private $beerC;
        public function __construct()
        {
            $this->beerTypeC = new BeerTypeController();
            $this->beerC = new BeerController();
        }
        public function Index($message = "")
        {
            require_once(VIEWS_PATH."home.php");
        }   
        
        public function AddBeer($message = "")
        {
            $typeList = $this->beerTypeC->getAll();
            require(VIEWS_PATH."add-beer.php");
        }

        public function AddBeerType($message = "")
        {
            require(VIEWS_PATH."add-beertype.php");
        }

        public function BeerList($message = "")
        {
            $beerList = $this->beerC->getAll();
            $beerTd = new BeerType();
            require(VIEWS_PATH."beer-list.php");
        }

        public function BeerTypeList($message = "")
        {   
            $beerList = $this->beerTypeC->getAll();
            require(VIEWS_PATH."beertype-list.php");
        }
    }
?>