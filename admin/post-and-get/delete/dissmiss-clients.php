<?php
include_once '../../class/Include.php';
$CLIENT=new Client();
if(isset($_GET['id'])){
    
$CLIENT->setId($_GET['id']);
$CLIENT->delete();

}