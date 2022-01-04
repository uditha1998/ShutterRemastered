<?php
include_once  'DBconnection.php'; 
class Event extends DBconnection{

    private $id;
    private $name;
    private $image;
    private $admin_id;

    public function __construct(){
        parent::__construct();
    }
    
    public function setAllName(){
        $sql = "SELECT id,name FROM event";
        $result = mysqli_query($this->connection,$sql);  
        $array_res = array();
		while ($row = mysqli_fetch_array($result)) {
			array_push($array_res, $row);
			}
	     return $array_res;
    }

    function getIdbyName($eventId){
        $sql = "SELECT name FROM event WHERE id = '$eventId' ;";
        $result = mysqli_query($this->connection,$sql);
        $row = $result->fetch_assoc();
        $name = $row['name'];
        return $name;
    }

    function getAllEvent(){
        $sql = "SELECT * FROM event";
        $result = mysqli_query($this->connection,$sql);  
        $array_res = array();
		while ($row = mysqli_fetch_array($result)) {
			array_push($array_res, $row);
			}
	     return $array_res;
    }

    public function eventCount(){
        $sql = "SELECT COUNT(id) FROM event";
        $result = mysqli_query($this->connection,$sql);
        $row = $result->fetch_assoc();
        $count = $row['COUNT(id)'];
        return $count;
      }

      function getSelectedPhotographersEvent($photographer_id){
        $sql = "SELECT * FROM `event` WHERE id IN (SELECT DISTINCT `event_id` FROM `package` WHERE `photographer_id` = '$photographer_id')";
        $result = mysqli_query($this->connection,$sql);  
        $array_res = array();
      //  var_dump($result);
          while ($row = mysqli_fetch_array($result)) {
            array_push($array_res, $row);
           }
         return $array_res;
      }


}
