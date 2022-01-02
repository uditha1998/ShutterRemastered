<?php

session_start();

include_once  'Package.php';
include 'Validation.php';

class PackageInsert {
    
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

            $this->eventId = $postArray["event"];
            $this->name = $postArray["name"];
            $this->description = $postArray["description"];
            $this->price = $postArray["price"];
         
            $this->photographer_id = $_SESSION['photographer_id'];
            
            //    if($this->validation->emptySignupInput( $this->user , $this->email , $this->password , $this->repeatPassword ) == true){
                    
                   $this->package->setPackage( $this->eventId , $this->name, $this->description, $this->price ,$this->photographer_id );        
                      
                        
              //  }
             
               
        }else{
            echo "PackageInsert  error";
        }

    }
}

new PackageInsert($_POST);

?>
