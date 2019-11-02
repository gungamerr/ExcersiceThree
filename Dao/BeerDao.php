<?php
    namespace Dao;
    
    use Models\Beer as Beer;
    use Models\BeerType as BeerType;
    use Dao\BeerTypeDao as BeerTypeDao;

    class BeerDao
    {   
        private $beeTD;
        private $beerType;
        public function __construct()
        {
            $this->beeTD = new BeerTypeDao();
            $this->beerType = new BeerType(); 
        }
        //agrego Cerveza
        public function add(Beer $beer)
        {
            $bList = array();
            $bList = $this->retrieveData();
            array_push($bList,$beer);
            $this->savedata($bList);
        }
        
        //Devuelvo la lista de Cerveza
        public function getAll()
        {
            return $this->retrieveData();
        }

        public function remove_model($model)
        {
            $this->remove_by_model($model);
        }

        //elimina la cerveza por modelo
        private function remove_by_model($model)
        {
            $beerList = $this->retrieveData();
            $pos = 0;
            foreach($beerList as $beer)
            {
                if($beer->getCode() == $model)
                {
                    unset($beerList[$pos]);
                }
                $pos++;
            }
            $this->saveData($beerList);
        }

        //Grabo lista de Cerveza en un archivo .json (beer.json)
        private function saveData($list)
        {
            $arrayToencode = array();

            foreach($list as $beer)
            {
                
                $beerType = $beer->getBeerType();
                $valueArray["id"] = $beer->getId();
                $valueArray["code"] = $beer->getCode();
                $valueArray["name"] = $beer->getName();
                $valueArray["description"] = $beer->getDescription();
                $valueArray["density"] = $beer->getDensity();
                $valueArray["idt"] = $beerType->getId();
                $valueArray["origin"] = $beer->getOrigin();
                $valueArray["price"] = $beer->getPrice();
                array_push($arrayToencode,$valueArray);
            }
            $jsonContent = json_encode($arrayToencode,JSON_PRETTY_PRINT);

            file_put_contents("Data/beer.json",$jsonContent);
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
                    $id = $values["idt"];
                    $beerT =  $this->beeTD->find($id);
                    $beer = new Beer($values["id"],$values["code"],$values["name"],$values["description"],$values["density"],$beerT,$values["origin"],$values["price"]);
                    array_push($beerList,$beer);
                }
            }
            return $beerList;
        }
    }
?>