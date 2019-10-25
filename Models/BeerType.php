<?php
    namespace Models;
    
    //ii. BeerType [ Id, name, description ]
    class BeerType
    {
     private $id;
     private $name;
     private $description;
     
     public function __construct($id,$name,$description)
     {
         $this->setId($id);
         $this->setName($name);
         $this->setDescription($description);
     }

     public function __construct(BeerType $beer)
     {
        $this->setId($beer->getId());
        $this->setName($beer->getName());
        $this->setDescription($beer->getDescription());
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
    }
?>