<?php
    namespace Dao;
    
    use Models\Beer as Beer;
    use Model\BeerType as BeerType;
    class BeerDao
    {   
        //agrego Cerveza
        public function add(Beer $beer)
        {
            $bList = array();
            $bList = $this->retrieveData;
            array_push($bList,$beer);
            $this->savedata($list);
        }
        
        //Devuelvo la lista de Cerveza
        public function getAll()
        {
            return $this->retrieveData();
        }

        //Grabo lista de Cerveza en un archivo .json (beer.json)
        private function saveData($list)
        {
            $arrayToencode = array();

            foreach($list as $beer)
            {
                $valueArray["id"] = $beer->getId();
                $valueArray["code"] = $beer->getCode();
                $valueArray["name"] = $beer->getName();
                $valueArray["description"] = $beer->getDescription();
                $valueArray["density"] = $beer->getDensity();
                $valueArray["idt"] = $beer->getBeerType()->getId();
                $valueArray["namet"] = $beer->getBeerType()->getName();
                $valueArray["desct"] = $beer->getBeerType()->getDescription();
                $valueArray["origin"] = $beer->getOrigin();
                $valuesArray["price"] = $beer->getPrice();
                array_push($arrayToencode,$valueArray);
            }
            $jsonContent = json_encode($arrayToencode,JSON_PRETTY_PRINT);

            file_put_content("Data/beer.json");
        }

        //devuelvo en un arreglo de Cerveza(beer) el contenido de un archivo .json (beer.json)
        private function retrieveData()
        {
            $beerList = array();

            if(file_exists("Data/beer.json"))
            {
                $jsonContent = file_get_contents("Data/beer.json");
                $arrayTodecode = ($jsonContent) ? json_decode($jsonContent,true): array();

                foreach ($arrayTodecode as $values) 
                {
                    $beerType = new BeerType($values["idt"],$values["namet"],$values["desct"]);
                    $beer = new Beer($values["id"],$values["code"],$values["name"],$values["description"],$values["density"],$beerType,$values["origin"],$values["price"]);
                    array_push($beerList,$beer);
                }
            }
            return $beerList;
        }
    }
?>