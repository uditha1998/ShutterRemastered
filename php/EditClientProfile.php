<?php
session_start();

include_once  'Client.php';

class EditClientProfile {
    
    private $username;
    private $nic;
    private $dob;
    private $phone;
    private $image;
    private $email;
    private $password;
 

    private $client;

    function __construct($postArray,$filesArray){
       
       //create a object
       $this->client = new Client();
        
        if(isset($postArray["submit"])){
            // asing valuse to varibale
            $this->username = $postArray["name"];
            $this->nic = $postArray["nic"];
            $this->email = $postArray["email"];
            $this->password = $postArray["password"];
            $this->dob = $postArray["dob"];
            $this->phone = $postArray["phone"];
           
            
          if(isset($filesArray["image"]["tmp_name"])){
                $this->image = $filesArray["image"]["tmp_name"];
               
                $this->image = base64_encode(file_get_contents($this->image ));  // image tmp  name encode to base 64
                
          }
            
        //   var_dump( $this->username);
        //   var_dump( $this->nic);
        //   var_dump( $this->email);
        //   var_dump( $this->password);
        //   var_dump( $this->dob);
        //   var_dump( $this->phone);
             //  echo   $this->image ;
           //  var_dump( $this->image);
              

                   // call setEditClient funtion in client class
                   $this->client->setEditClient( $this->username , $this->email , $this->password , $this->nic, $this->dob, $this->phone , $this->image);        
         
        }else{
            header('location:../client/edit_client_profile.php');
        }

    }
}
// create a EditClientProfile class object and pass $_POST array and $_FILES array to constractoer
new EditClientProfile($_POST,$_FILES);

?>
