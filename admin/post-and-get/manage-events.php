<?php

include '../../php/DBconnection.php';
include '../class/Event.php';
include '../class/Upload.php';

$EVENT = new Event();


$name = $_POST['name'];
$admin_id = $_POST['admin_id'];



$directory = '../../image/events/';


$UPLOAD = new Upload();

//Process image and return it's name
$image_name = $UPLOAD->getImagename($directory);



$EVENT->setEvents($name, $image_name, $admin_id);

$result = $EVENT->create();

if ($result == true) {
    
    echo "<script>window.location.replace('../manage-events.php')</script>";
    echo "<script>alert('Successfully Created!')</script>";
}

