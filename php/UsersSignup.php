<?php

session_start();

include_once  'Client.php';
include_once  'Photographer.php';
include 'Validation.php';

class UsersSignup {
    
    private $user;
    private $email;
    private $password;
    private $repeatPassword;

    private $validation;
    private $client;
    private $photographer;
    
    function __construct($postArray){
       
       // careate object
       $this->validation = new Validation();
       $this->client = new Client();
       $this->photographer = new Photographer();
        
        if(isset($postArray["submit"])){
            // valuse asing for class varibale
            $this->user = $postArray["user"];
            $this->email = $postArray["email"];
            $this->password = $postArray["password"];
            $this->repeatPassword = $postArray["repeatpassword"];
           
            
                if($this->validation->emptySignupInput( $this->user , $this->email , $this->password , $this->repeatPassword ) == true){
                    if($this->validation->passwordLength($this->password) == true){
                       if($this->validation->passwordMatch($this->password , $this->repeatPassword) == true){
                            if( $this->user == "client"){
                                 $this->client->setCreateClient( $this->email , $this->password ); // call setCreateClient funtion in client class
                            }else{
                                 $this->photographer->setPhotographer( $this->email , $this->password ); // call setPhotographer funtion in photographer class
                            }
                       }else{
                           header('location:../login.php');
                       }    
                    }else{
                        header('location:../login.php');
                    }
                        
                }else{
                   header('location:../login.php');
                }
             
               
        }else{
            header('location:../login.php');
        }

    }
}
// create a UsersSignup class object and pass $_POST array to constractoer
new UsersSignup($_POST);

?>
