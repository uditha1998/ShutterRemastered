<?php
include_once '../../class/Include.php';
$PHOTOGRAPHER=new Photographer();
if(isset($_GET['id'])){
    
$PHOTOGRAPHER->setId($_GET['id']);
$PHOTOGRAPHER->delete();

}