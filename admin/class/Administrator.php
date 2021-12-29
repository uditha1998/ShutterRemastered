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
