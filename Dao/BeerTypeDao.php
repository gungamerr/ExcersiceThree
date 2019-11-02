<?php
    namespace Dao;

    use Models\BeerType as BeerType;
    class BeerTypeDao
    {
        public function __construct()
        {

        }
        
         //agrego Tipo de Cerveza
         public function add(BeerType $beerType)
         {
             $btList = array();
             $btList = $this->retrieveData();
             array_push($btList,$beerType);
             $this->savedata($btList);
         }
         
         //Devuelvo la lista de Cerveza
         public function getAll()
         {
             return $this->retrieveData();
         }
         
         public function eliminar($id)
         {
            $this->remove($id);
         }

         public function find($id)
         {
            return $this->findT($id);
         }

         //Grabo lista de Tipos de Cerveza en un archivo .json (beerType.json)
         private function saveData($list)
         {
             $arrayToencode = array();
 
             foreach($list as $beerType)
             {
                 $valueArray["id"] = $beerType->getId();
                 $valueArray["code"] = $beerType->getCode();
                 $valueArray["name"] = $beerType->getName();
                 $valueArray["description"] = $beerType->getDescription();
                 $valueArray["recipe"] = $beerType->getRecipe();
                 array_push($arrayToencode,$valueArray);
             }

             $jsonContent = json_encode($arrayToencode,JSON_PRETTY_PRINT);
 
             file_put_contents("Data/beerType.json",$jsonContent);
         }
 
         //devuelvo en un arreglo de Cerveza(beer) el contenido de un archivo .json (beer.json)
         private function retrieveData()
         {
             $beerTypeList = array();
 
             if(file_exists("Data/beerType.json"))
             {
                 $jsonContent = file_get_contents("Data/beerType.json");
                 $arrayTodecode = ($jsonContent) ? json_decode($jsonContent,true): array();
 
                 foreach ($arrayTodecode as $values) 
                 {
                     $beerType = new BeerType();
                     $beerType->setId($values["id"]);
                     $beerType->setCode($values["code"]);
                     $beerType->setName($values["name"]);
                     $beerType->setDescription($values["description"]);
                     $beerType->setRecipe($values["recipe"]);
                     array_push($beerTypeList,$beerType);
                     
                 }
             }
             return $beerTypeList;
         }
         //Elimina de un array
         private function remove($id)
         {
            $list = $this->retrieveData();
            $pos = 0;
            foreach ($list as $beerType) 
            {
                if($id == $beerType->getId())
                {
                    unset($list[$pos]);
                    break;
                }
                $pos++;
            }
            $this->saveData($list);
            
         }
         //devuelvo lo encontrado
         private function findT($id)
         {
            $list = $this->retrieveData();
            foreach($list as $type)
            {
                if($id == $type->getId())
                {
                    return $type;
                }
            }

         }
    }
?>