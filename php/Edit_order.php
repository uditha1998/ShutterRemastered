<?php



include 'Order.php';

class Edit_order {
    
   
    private $order_id;
  


    private $order;

    function __construct($getArray){
       
       $this->order = new Order();

    
            $this->order_id = $getArray["id"];
            
     
                   $this->order->Confirm( $this->order_id );  
      
    }
}

new Edit_order($_GET);

?>
