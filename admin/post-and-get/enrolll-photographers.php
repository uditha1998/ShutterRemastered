<?php
include_once '../class/Include.php';
$PHOTOGRAPHER=new Photographer();
$pid=$_GET['id'];
$admin_id=$_GET['admin'];
if(!empty($pid)&&!empty($admin_id)){
    

$PHOTOGRAPHER->setId($pid);
$PHOTOGRAPHER->setApprove($admin_id);
$PHOTOGRAPHER->enrollPhotographer();


}