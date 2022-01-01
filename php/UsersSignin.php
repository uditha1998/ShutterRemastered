<?php

session_start();

include_once  'Client.php';
include_once  'Photographer.php';
include 'Validation.php';

class UsersSignin {
    
    private $email;
    private $password;
   
    private $validation;
    private $client;
    private $photographer;
    
    function __construct($postArray){
       
       // create object
       $this->validation = new Validation();
       $this->client = new Client();
       $this->photographer = new Photographer();
        
        if(isset($postArray["submit"])){

            $this->email = $postArray["email"];
            $this->password = $postArray["password"];
             
           
            
                if($this->validation->emptySigninInput( $this->email , $this->password ) == true){
                   
                       $this->client->setSigninClient($this->email , $this->password );                  
                       $this->photographer->setSigninPhotographer($this->email , $this->password );
         
                }else{
                    header('location:../login.php');
                }
             

        }else{
            header('location:../login.php');
        }

    }
}
// create a UsersSignin class object and pass $_POST array to constractoer
new UsersSignin($_POST);

?>
