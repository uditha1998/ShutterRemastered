<?php

include_once '../../class/Event.php';

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $EVENT = new Event();

    
    $EVENT->setId($id);
    


    $EVENT->Delete();
    
   
}