<?php

include_once '../../class/Include.php';

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $ADMIN = new Admin();

    
    $ADMIN->setId($id);
    


    $ADMIN->removeAdmin();
    
   
}