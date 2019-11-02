<?php 
    namespace Controllers;

    use Dao\BeerDao as BeerDao;
    use Models\BeerType as BeerType;
    use Models\Beer as Beer;
    class BeerController 
    {
        private $beerDao;
        private $homeC;
        public function __construct()
        {
            $this->beerDao = new Beerdao();
        }

        //Devuelve del Dao un array de Cervezas
        public function getAll()
        {
            return $this->beerDao->getAll();
        }

        public function remove_by_model($model)
        {
            $this->beerDao->remove_model($model);
            
        }

        public function add($code,$name,$type,$description,$density,$origin,$price)
        {
            $beerTController = new BeerTypeController();
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
            $beerT = new BeerType();
            $beerT = $beerTController->find_by_id($type);
            $beer = new beer($id,$code,$name,$description,$density,$beerT,$origin,$price);
            $this->beerDao->add($beer);
            require_once("Views/add-beer.php");
        }

    }
?>