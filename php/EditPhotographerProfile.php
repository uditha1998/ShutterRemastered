<?php
session_start();

include_once  'Photographer.php';

class EditPhotographerProfile {
    
    private $username;
    private $nic;
    private $dob;
    private $age;
    private $phone;
    private $bankName;
    private $bankNo;
    private $image;
    private $description;
    private $email;
    private $password;
 

    private $photographer;

    function __construct($postArray,$filesArray){
       
       //create a object
       $this->photographer = new Photographer();
        
        if(isset($postArray["submit"])){
            // asing valuse to varibale
            $this->username = $postArray["name"];
            $this->nic = $postArray["nic"];
            $this->email = $postArray["email"];
            $this->password = $postArray["password"];
            $this->dob = $postArray["dob"];
            $this->phone = $postArray["phone"];
            $this->bankName = $postArray["bank_name"];
            $this->bankNo = $postArray["bank_no"];
            $this->description = $postArray["description"];
            
          if(isset($filesArray["image"]["tmp_name"])){
                $this->image = $filesArray["image"]["tmp_name"];
                $this->image = base64_encode(file_get_contents($this->image ));  // image tmp  name encode to base 64
              //  var_dump( $this->image);
          }
          

            // get a age given dob
            $this->age = intval(date('Y', time() - strtotime($this->dob))) - 1970;
            
               
             //  echo   $this->image ;
              

                   // call setEditPhotographer funtion in Photographer class
                   $this->photographer->setEditPhotographer( $this->username , $this->email , $this->password , $this->nic, $this->dob, $this->phone , $this->bankName, $this->bankNo, $this->image, $this->description, $this->age);        
         
        }else{
            header('location:../photographer/edit_photographer_profile.php');
        }

    }
}
// create a EditPhotographerProfile class object and pass $_POST array and $_FILES array to constractoer
new EditPhotographerProfile($_POST,$_FILES);

?>
