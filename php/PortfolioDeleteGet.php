<?php


include 'Portfolio.php';

class PortfolioDeleteGet {
    
   
    private $portfolio_id;
    private $photographer_id;
  


    private $order;

    function __construct($getArray){
       
       $this->portfolio = new Portfolio();

    
            $this->portfolio_id = $getArray["event_id"];
            $this->photographer_id = $getArray["photographer_id"];
            
     
                   $this->portfolio->deleteRow( $this->portfolio_id , $this->photographer_id);  
      
    }
}

new PortfolioDeleteGet($_GET);

?>