<?php
include_once  'DBconnection.php'; 
class Order extends DBconnection{

  private $package_id;
  private $order_id;
  private $photographer_id;
  private $client_id;

    public function __construct(){
        parent::__construct();
    }
    
    function setOrder( $client_id , $photographer_id , $package_id ){
      $this->client_id = $client_id;
      $this->photographer_id = $photographer_id;
      $this->package_id = $package_id;
      //  check set valuse
      // var_dump($this->client_id);
      // var_dump($this->photographer_id);
      // var_dump($this->package_id);
      $this->insertOrder();
  }

  function insertOrder(){

    // var_dump($this->client_id);
    // var_dump($this->photographer_id);
    // var_dump($this->package_id);

      $sql1 = "INSERT INTO `order` ( `client_id`, `photographer_id`, `package_id`) VALUES ('$this->client_id', '$this->photographer_id', '$this->package_id');";
     
  //  var_dump(mysqli_query($this->connection, $sql1)) ;
      if (mysqli_query($this->connection, $sql1)) {
       
        header('location:../index.php');
        } else {
          echo '<script language="javascript">';
          echo 'alert("Order Insert error")';
          echo '</script>';
        }
  }

  function getSelectedPhotographerOrder($photographer_id){
    $sql = "SELECT * FROM `order` WHERE photographer_id =  '$photographer_id'  AND  order_status = 0;";
    $result = mysqli_query($this->connection,$sql); 
      $array_res = array();
      while ($row = mysqli_fetch_array($result)) {
          array_push($array_res, $row);
          }
       return $array_res;
}


function Confirm($orderID){
  $sql = "UPDATE `order` SET order_status = 1  WHERE id = '$orderID' ;"; 
  if(mysqli_query($this->connection,$sql)){
      header('location:../photographer/pending_orders.php');
  } else {
      echo '<script language="javascript">';
      echo 'alert("order confirm error")';
      echo '</script>';
    }
}

function orederDelete($orderID){
  $sql = "DELETE FROM `order` WHERE id = '$orderID';";
  if(mysqli_query($this->connection,$sql)){
      header('location:../photographer/pending_orders.php');
  } else {
      echo '<script language="javascript">';
      echo 'alert("order deleteRow error")';
      echo '</script>';
    }
}

  


}

?>