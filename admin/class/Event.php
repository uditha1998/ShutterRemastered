<?php

include_once(dirname(__FILE__) .'./../../php/DBconnection.php');

class Event extends DBconnection {

    private $id;
    private $name;
    private $image_name;
    private $admin_id;

    public function __construct() {
        parent::__construct();
    }

    public function create() {

        $sql = "INSERT INTO event (name, image, admin_id) VALUES ('$this->name', '$this->image_name', '$this->admin_id' );";

        if (mysqli_query($this->connection, $sql)) {

            return TRUE;
        } else {
            echo '<script>alert("Unable to create a new Event")</script>';
            return FALSE;
        }
    }

    public function RetriveAll() {
        $sql = "select * from event";
        $result = mysqli_query($this->connection, $sql);
        $array_res = array();
        while ($row = $result->fetch_assoc()) {

            array_push($array_res, $row);
        }
        return $array_res;
    }

    public function RetriveByEventId() {
        $sql = "select * from event where id='$this->id'";
        $result = mysqli_query($this->connection, $sql);
        $array_res = array();
        while ($row = $result->fetch_assoc()) {

            array_push($array_res, $row);
        }
        return $array_res;
    }

    public function RetriveEventsByAdmin() {
        $sql = "select * from event where admin_id='$this->id' ";
        $result = mysqli_query($this->connection, $sql);
        $array_res = array();
        while ($row = $result->fetch_assoc()) {

            array_push($array_res, $row);
        }
        return $array_res;
    }

    public function Delete() {

        $sql = "delete from event where id='$this->id'";

        $EVENT = $this->RetriveByEventId();

        foreach ($EVENT as $event) {

            $this->image_name = $event['image'];
        }

        $path = str_replace('\admin\class', '', dirname(__FILE__));


        chmod($path, 0777);
        unlink($path . '\image\events\\' . $this->image_name);


        $result = mysqli_query($this->connection, $sql);



        header("location:./../../manage-events.php");
    }

    //Setters

    public function setId($id) {
        $this->id = $id;
    }

    public function setEvents($name, $image_name, $admin_id) {

        $this->name = $name;
        $this->image_name = $image_name;
        $this->admin_id = $admin_id;
    }

}
