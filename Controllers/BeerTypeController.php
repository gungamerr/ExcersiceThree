<?php
    namespace Controllers;

    use Dao\BeerTypeDao as BeerT;
    use Models\BeerType as BeerType;
    use Controller\HomeController as HomerController;
    class BeerTypeController
    {
        
        private $beerTypeDao;
        public function __construct()
        {
            $this->beerTypeDao = new BeerT();
            
        }

        public function find_by_id($id)
        {
            return $this->beerTypeDao->find($id);
        }

        //Devuelve del Dao un array de Cervezas
        public function getAll()
        {
            return $this->beerTypeDao->getAll();
        }

        public function add($code,$name,$desc,$recipe)
        {
            if(empty($_SESSION["id"]))
            {
                $_SESSION["id"]= 1;
            }else
            {
                $aidi = $_SESSION["id"];
                $list = $this->beerTypeDao->getAll();            
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
            $beerT->setId($id);
            $beerT->setCode($code);
            $beerT->setName($name);
            $beerT->setDescription($desc);
            $beerT->setRecipe($recipe);
            $this->beerTypeDao->add($beerT);
            require_once("Views/add-beerType.php");
        }

        public function eliminar($id)
        {
            $this->beerTypeDao->eliminar($id);
            $this->home = new HomeController();
            $this->home->BeerTypeList();
        }
    }
?>