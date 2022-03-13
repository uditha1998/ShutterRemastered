<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

session_start();
include '../class/Admin.php';


$ADMIN = new Admin();


$email = $_POST['email'];
$password = $_POST['password'];

if (isset($_POST['submit'])) {


    $ADMIN->setLoginCredentials($email, $password);
    
    
}