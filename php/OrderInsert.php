<?php

session_start();

include 'Order.php';
include 'Validation.php';

class OrderInsert {
    
    private $package_id;
    private $order_id;
    private $photographer_id;
    private $client_id;

    private $card_type;
    private $card_no;
    private $month;
    private $day;
    private $cvc;


    private $order;
    private $payment;
    private $validation;

    function __construct($postArray){
       
       $this->validation = new Validation();
       $this->order = new Order();

     
        
        if(isset($postArray["submit"])){

            $this->package_id = $postArray["package_id"];
            $this->photographer_id = $postArray["photographer_id"];
            $this->card_type = $postArray["card"];
            $this->card_no = $postArray["card_no"];
            $this->month = $postArray["month"];
            $this->day = $postArray["day"];
            $this->cvc = $postArray["cvc"];
         
                if (isset($_SESSION['client_id'])) {

                   $this->order->setOrder( $_SESSION['client_id'], $this->photographer_id, $this->package_id);  
                   
                } else {
                 
                    echo '<script language="javascript">';
                    echo 'alert("Pleace sign in first")';
                    echo '</script>';
                }

              
      
        }else{
            echo "OrderInsert  error";
        }

        

       

    }
}

new OrderInsert($_POST);

?>
