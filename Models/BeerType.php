<?php
    namespace Models;
    
    //ii. BeerType [ Id, name, description ]
    class BeerType
    {
     private $id;
     private $code;
     private $name;
     private $description;
     private $recipe;

     public function __construct()
     {

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

     /**
      * Get the value of recipe
      */ 
     public function getRecipe()
     {
          return $this->recipe;
     }

     /**
      * Set the value of recipe
      *
      * @return  self
      */ 
     public function setRecipe($recipe)
     {
          $this->recipe = $recipe;

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
    }
?>