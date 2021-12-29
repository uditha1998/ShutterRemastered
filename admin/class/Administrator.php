<?php

include_once(dirname(__FILE__) . './Connection.php');

class Admin extends DBconnection {

    private $id;
    private $userName;
    private $email;
    private $password;
    private $referral_id;

    public function __construct() {
        parent::__construct();
    }

    public function create() {

        $sql = "INSERT INTO admin (username, email, password,referral_id) VALUES ('$this->userName', '$this->email', '$this->password' ,'$this->referral_id');";

        if (mysqli_query($this->connection, $sql)) {

            echo '<script>alert("You have Succesfully Created a new Admin")</script>';
            header('location:../manage-admin.php');
        } else {
            echo '<script>alert("Unable to create a new Admin")</script>';
        }
    }

    public function Login() {

        $sql = "SELECT id FROM admin WHERE email = '$this->email' AND password = '$this->password'";
        $result = mysqli_query($this->connection, $sql);
        $row = $result->fetch_assoc();
        $id = $row['id'];
        echo $id;
        if (mysqli_num_rows($result) > 0) {

            $_SESSION['AdminAuth'] = $id;
            header('location:../index.php');
        } else {

            header('location:../login.php?message=1');
        }
    }

    public function getterAdmin() {
        $sql = "select * from admin where id='$this->id'";
        $result = mysqli_query($this->connection, $sql);
        $array_res = array();
        while ($row = $result->fetch_assoc()) {

            array_push($array_res, $row);
        }
        return $array_res;
    }

    public function getterReferrelledAdmin() {
        $sql = "select * from admin where  referral_id=' $this->id' ";
        $result = mysqli_query($this->connection, $sql);
        $array_res = array();
        while ($row = $result->fetch_assoc()) {

            array_push($array_res, $row);
        }
        return $array_res;
    }

    public function removeAdmin() {
        $sql = "delete from admin where id='$this->id'";
        $result = mysqli_query($this->connection, $sql);
        if ($result) {
            header("location:../../manage-admin.php");
        } else {
            header("location:./../manage-admin.php");
        }
    }

    //Later Implementation for View Profile in Admin Panel
    public function SetAllfromDb() {
        $sql = "SELECT * FROM admin WHERE id = '$this->id';";

        $result = mysqli_query($this->connection, $sql);
        $row = $result->fetch_assoc();
        if (mysqli_num_rows($result) > 0) {

            $this->userName = $row['username'];
            $this->email = $row['email'];
            $this->referral_id = $row['referral_id'];
        } else {
            return FALSE;
        }
    }

    //Setters

    public function setId($id) {
        $this->id = $id;
    }

    function setAll($userName, $email, $password, $referral_id) {
        $this->userName = $userName;
        $this->email = $email;
        $this->password = $password;
        $this->referral_id = $referral_id;
    }

    function setLoginCredentials($email, $password) {
        $this->email = $email;
        $this->password = $password;

        $this->Login();
    }
    //Solo Getters
    
    public function getName(){
        return $this->userName;
    }

}
