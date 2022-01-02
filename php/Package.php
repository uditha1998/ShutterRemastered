<?php
include_once  'DBconnection.php'; 
class Package extends DBconnection{
   
    private $id;
    private $eventId;
    private $name;
    private $description;
    private $price;
    private $photographer_id;


    public function __construct(){
        parent::__construct();
    
    }
    
    function setPackage( $eventId , $name , $description , $price ,$photographer_id ){
        $this->eventId = $eventId;
        $this->name = $name;
        $this->description = $description;
        $this->price = $price;
        $this->photographer_id = $photographer_id;

        $this->insertPackage();
    }

    function insertPackage(){
        $sql = "INSERT INTO package (name, description, price, event_id, photographer_id ) VALUES ('$this->name', '$this->description', '$this->price', '$this->eventId','$this->photographer_id');";
       
        if (mysqli_query($this->connection, $sql)) {
            header('location:../photographer/manage_package.php');
          } else {
            echo '<script language="javascript">';
            echo 'alert("Package Insert error")';
            echo '</script>';
          }
    }

    function getSelectedPhotographerPackage($photographer_id){
        $sql = "SELECT * FROM package WHERE photographer_id =  '$photographer_id';";
        $result = mysqli_query($this->connection,$sql); 
          $array_res = array();
          while ($row = mysqli_fetch_array($result)) {
              array_push($array_res, $row);
              }
           return $array_res;
    }

    function getSelectedEventPackage($event_id){
        $sql = "SELECT * FROM package WHERE event_id =  '$event_id';";
        $result = mysqli_query($this->connection,$sql); 
          $array_res = array();
          while ($row = mysqli_fetch_array($result)) {
              array_push($array_res, $row);
              }
           return $array_res;
    }


    function deleteRow($rowId){
        $sql = "DELETE FROM package WHERE id = '$rowId';";
        if(mysqli_query($this->connection,$sql)){
            header('location:../photographer/manage_package.php');
        } else {
            echo '<script language="javascript">';
            echo 'alert("Package deleteRow error")';
            echo '</script>';
          }
    }

    function editeRow($rowId, $eventId , $name , $description , $price  ){
        $sql = "UPDATE package SET name = '$name' , description = '$description' , price = '$price' , event_id = '$eventId'   WHERE id = '$rowId' ;"; 
        if(mysqli_query($this->connection,$sql)){
            header('location:../photographer/manage_package.php');
        } else {
            echo '<script language="javascript">';
            echo 'alert("Package deleteRow error")';
            echo '</script>';
          }
    }

    function getIdbyName($packageID){
        $sql = "SELECT name FROM package WHERE id = '$packageID' ;";
        $result = mysqli_query($this->connection,$sql);
        $row = $result->fetch_assoc();
        $name = $row['name'];
        return $name;
    }



    public function getid(){return $this->id;}
    public function geteventId(){return $this->eventId;}
    public function getname(){return $this->name;}
    public function getdescription(){return $this->description;}
    public function getprice(){return $this->price;}
    

}



?>