<?php

session_start();

include_once  'Client.php';

class ClientCompletProfile {
    
    private $username;
    private $gender;
    private $nic;
    private $dob;
    private $phone;
    private $image;

    private $client;

    function __construct($postArray,$filesArray){
       
       //create a objects
       $this->client = new Client();
        
        if(isset($postArray["submit"])){
            // valuse asing to varibale
            $this->username = $postArray["username"];
            $this->gender = $postArray["gender"];
            $this->nic = $postArray["nic"];
            $this->dob = $postArray["dob"];
            $this->phone = $postArray["phone"];
            $this->image = $filesArray["image"]["tmp_name"];


            $this->image = base64_encode(file_get_contents($this->image ));  // image tmp  name encode to base 64

                    // call setCompletClient funtion in Client class
                    $this->client->setCompletClient( $this->username , $this->gender, $this->nic, $this->dob, $this->phone, $this->image);        
                             
               
        }else{
            header('location:../client_complet_profile.php');
        }

    }
}
// create a ClientCompletProfile class object and pass $_POST array and $_FILES array to constractoer
new ClientCompletProfile($_POST,$_FILES);

?>
