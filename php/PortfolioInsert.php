<?php

session_start();

include_once  'Portfolio.php';

class PortfolioInsert {
    
    private $eventId;
    private $image = array();

    private $portfolio;

    function __construct($postArray,$filesArray){
       

       $this->portfolio = new Portfolio();
        
        if(isset($postArray["submit"])){

             $this->eventId = $postArray["event"];
           
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
                    
                   $this->portfolio->setPortfolio( $this->eventId ,  $this->image[0],  $this->image[1],  $this->image[2] ,  $this->image[3] ,  $this->image[4] , $this->photographer_id );        
                      
                        
              //  }
             
               
        }else{
            echo "PortfolioInsert  error";
        }

    }
}

new PortfolioInsert($_POST,$_FILES);

?>
