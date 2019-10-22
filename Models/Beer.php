<?php 
    namespace Models;

    class Beer
    {
        //i. Beer [ id, code, name, description, density, BeerType([ Id, name, description ]), price]

        private $id;
        private $code;
        private $name;
        private $description;
        private $density;
        private $Beetype;
        private $price;

        public function __construct()
        {
            
        }

    }
?>