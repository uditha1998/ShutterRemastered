<?php

include '../../php/DBconnection.php';
include '../class/Event.php';
include '../class/Upload.php';

$EVENT = new Event();
$id=$_POST['id'];
$name = $_POST['name'];

$old_image=$_POST['old_image'];

//Replace the current part to the main directory
//$path = str_replace('\admin\post-and-get', '', dirname(__FILE__));
//
//unlink($path . '\image\event\\' .$old_image );

$directory = '../../image/events/';

$UPLOAD = new Upload();

//Process image and return it's name
$image_name = $UPLOAD->getImagename($directory);
var_dump($image_name);

$EVENT->setId($id);

$EVENT->setEvents($name, $image_name,'');

$result = $EVENT->update();

if ($result == true) {

    echo "<script>window.location.replace('../manage-events.php')</script>";
    echo "<script>alert('Successfully Update!')</script>";
}


