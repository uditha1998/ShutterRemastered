<?php


include 'Order.php';

class Delect_order {
    
   
    private $order_id;
  


    private $order;

    function __construct($getArray){
       
       $this->order = new Order();

    
            $this->order_id = $getArray["id"];
            
     
                   $this->order->orederDelete( $this->order_id );  
      
    }
}

new Delect_order($_GET);

?>
