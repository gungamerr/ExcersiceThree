<?php 
    namespace Models;
    use Models\BeerType as BeerType;
    class Beer
    {
        //i. Beer [ id, code, name, description, density, BeerType([ Id, name, description ]), price]

        private $id;
        private $code;
        private $name;
        private $description;
        private $density;
        private $Beertype;
        private $origin;
        private $price;

        public function __construct($id,$code,$name,$description,$density,Beertype $Beertype,$origin, $price)
        {
            $bee = new BeerType($Beertype);
            $this->setId($id);
            $this->setCode($code);
            $this->setName($name);
            $this->setDescription($description);
            $this->setDensity($density);
            $this->setBeertype($bee);
            $this->setOrigin($origin);
            $this->setPrice($price);
        }
        /**
         * Get the value of id
         */ 
        public function getId()
        {
                return $this->id;
        }

        /**
         * Set the value of id
         *
         * @return  self
         */ 
        public function setId($id)
        {
                $this->id = $id;

                return $this;
        }

        /**
         * Get the value of code
         */ 
        public function getCode()
        {
                return $this->code;
        }

        /**
         * Set the value of code
         *
         * @return  self
         */ 
        public function setCode($code)
        {
                $this->code = $code;

                return $this;
        }

        /**
         * Get the value of name
         */ 
        public function getName()
        {
                return $this->name;
        }

        /**
         * Set the value of name
         *
         * @return  self
         */ 
        public function setName($name)
        {
                $this->name = $name;

                return $this;
        }

        /**
         * Get the value of description
         */ 
        public function getDescription()
        {
                return $this->description;
        }

        /**
         * Set the value of description
         *
         * @return  self
         */ 
        public function setDescription($description)
        {
                $this->description = $description;

                return $this;
        }

       
        /**
         * Get the value of density
         */ 
        public function getDensity()
        {
                return $this->density;
        }

        /**
         * Set the value of density
         *
         * @return  self
         */ 
        public function setDensity($density)
        {
                $this->density = $density;

                return $this;
        }

        /**
         * Get the value of Beetype
         */ 
        public function getBeertype()
        {
                return $this->Beertype;
        }

        /**
         * Set the value of Beetype
         *
         * @return  self
         */ 
        public function setBeertype($Beetype)
        {
                $this->Beertype->setId($Beetype->getId());
                $this->Beertype->setName($BeetType->getName());
                $this->Beertype->setDescription($Beetype->getDescription());
                return $this;
        }

        /**
         * Get the value of price
         */ 
        public function getPrice()
        {
                return $this->price;
        }

        /**
         * Set the value of price
         *
         * @return  self
         */ 
        public function setPrice($price)
        {
                $this->price = $price;

                return $this;
        }

        /**
         * Get the value of origin
         */ 
        public function getOrigin()
        {
                return $this->origin;
        }

        /**
         * Set the value of origin
         *
         * @return  self
         */ 
        public function setOrigin($origin)
        {
                $this->origin = $origin;

                return $this;
        }
    }   


?>