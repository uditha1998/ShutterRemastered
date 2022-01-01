<?php
session_start();

include_once  'Photographer.php';

class PhotographerCompletProfile {
    
    private $username;
    private $gender;
    private $nic;
    private $dob;
    private $age;
    private $phone;
    private $bankName;
    private $bankNo;
    private $image;
    private $description;
 

    private $photographer;

    function __construct($postArray,$filesArray){
       
       //create a object
       $this->photographer = new Photographer();
        
        if(isset($postArray["submit"])){
            // asing valuse to varibale
            $this->username = $postArray["username"];
            $this->gender = $postArray["gender"];
            $this->nic = $postArray["nic"];
            $this->dob = $postArray["dob"];
            $this->phone = $postArray["phone"];
            $this->bankName = $postArray["bankname"];
            $this->bankNo = $postArray["bankno"];
            $this->description = $postArray["description"];
            
            $this->image = $filesArray["image"]["tmp_name"];

            // get a age given dob
            $this->age = intval(date('Y', time() - strtotime($this->dob))) - 1970;
            
               
                $this->image = base64_encode(file_get_contents($this->image ));  // image tmp  name encode to base 64

                   // call setCompletPhotographer funtion in Photographer class
                   $this->photographer->setCompletPhotographer( $this->username , $this->gender, $this->nic, $this->dob, $this->phone , $this->bankName, $this->bankNo, $this->image, $this->description, $this->age);        
         
        }else{
            header('location:../photographer_complet_profile.php');
        }

    }
}
// create a PhotographerCompletProfile class object and pass $_POST array and $_FILES array to constractoer
new PhotographerCompletProfile($_POST,$_FILES);

?>
