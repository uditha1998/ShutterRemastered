<?php

include_once  'Package.php';
include 'Validation.php';

class PackageInsert {
    private $id;
    private $eventId;
    private $name;
    private $description;
    private $price;
    private $photographer_id;

    private $package;
    private $validation;

    function __construct($postArray){
       

       $this->validation = new Validation();
       $this->package = new Package();
        
        if(isset($postArray["submit"])){
            $this->id = $postArray["id"];
            $this->eventId = $postArray["event"];
            $this->name = $postArray["name"];
            $this->description = $postArray["description"];
            $this->price = $postArray["price"];
         
           
            
            //    if($this->validation->emptySignupInput( $this->user , $this->email , $this->password , $this->repeatPassword ) == true){
                    
                   $this->package->editeRow($this->id , $this->eventId , $this->name, $this->description, $this->price );        
                      
                        
              //  }
             
               
        }else{
            echo "PackageInsert  error";
        }

    }
}

new PackageInsert($_POST);

?>
