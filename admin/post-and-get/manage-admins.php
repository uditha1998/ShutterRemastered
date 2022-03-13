<?php

include '../../php/DBconnection.php';
include '../class/Admin.php';


$ADMIN= new Admin();

$username=$_POST['username'];
$email=$_POST['email'];
$password=$_POST['password'];
$referral_id=$_POST['referral_id'];
$ADMIN->setAll($username, $email, $password, $referral_id);

$result=$ADMIN->create();




