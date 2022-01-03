<?php

session_start();

include_once  'Portfolio.php';
include 'Validation.php';

class PortfolioEdit {
    
    private $eventId;
    private $old_event_id;
    private $image = array();

    private $portfolio;
    private $validation;

    function __construct($postArray,$filesArray){
       

       $this->validation = new Validation();
       $this->portfolio = new Portfolio();
        
        if(isset($postArray["submit"])){

             $this->eventId = $postArray["event"];
             $this->old_event_id = $postArray["old_event_id"];
           
            foreach ($filesArray['image']['tmp_name'] as $key => $image ) {

                $this->image[$key] = $filesArray['image']['tmp_name'][$key];
               
             
            }

           
            $this->image[0] = base64_encode(file_get_contents($this->image[0] ));
            $this->image[1] = base64_encode(file_get_contents($this->image[1] ));
            $this->image[2] = base64_encode(file_get_contents($this->image[2] ));
            $this->image[3] = base64_encode(file_get_contents($this->image[3] ));
            $this->image[4] = base64_encode(file_get_contents($this->image[4] ));

            
         
            $this->photographer_id = $_SESSION['photographer_id'];
            
            //    if($this->validation->emptySignupInput( $this->user , $this->email , $this->password , $this->repeatPassword ) == true){
                    
                   $this->portfolio->setPortfolioEdit( $this->eventId ,  $this->image[0],  $this->image[1],  $this->image[2] ,  $this->image[3] ,  $this->image[4] , $this->photographer_id , $this->old_event_id);        
                      
                        
              //  }
             
               
        }else{
            echo "PortfolioEdit  error";
        }

    }
}

new PortfolioEdit($_POST,$_FILES);

?>
