<?php 
    namespace Controllers;

    use Dao\BeerDao as BeerDao;
    use Models\BeerType as BeerType;
    class BeerController 
    {
        private $beerDao;

        public function __construct()
        {
            $this->beerDao = new BeerDao(); 
        }

        //Devuelve del Dao un array de Cervezas
        public function getAll()
        {
            return $this->beerDao->getAll();
        }

        public function add($code,$name,$type,$description,$density,$origin,$price)
        {
            if(empty($_SESSION["id"]))
            {
                $_SESSION["id"]= 1;
            }else
            {
                $aidi = $_SESSION["id"];
                $list = $this->beerDao->getAll();            
                foreach($list as $value)
                {
                    if($aidi == $value->getId())
                    {
                        $_SESSION["id"]++;
                    }
                }            
            }

            $id = $_SESSION["id"];
            $_SESSION["id"]++;
            $beerT = new BeerType($id,$type,"refrescante");
            $beer = new beer($id,$code,$name,$description,$density,$beerT,$origin,$price);
            $this->beerDao->add($beer);
            require_once("Views/add-beer.php");
        }

    }
?>