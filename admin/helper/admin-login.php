<?php

session_start();
include '../class/Administrator.php';


$ADMIN = new Admin();
$email = $_POST['email'];
$password = $_POST['password'];

if (isset($_POST['submit'])) {


    $ADMIN->setLoginCredentials($email, $password);
    
    
}