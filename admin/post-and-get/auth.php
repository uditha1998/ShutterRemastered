<?php
session_start();







if (!isset($_SESSION['AdminAuth'])) {
   

     header('location:./login.php');
}else{
    
    $message=$_GET['message'];
     $admin_id=$_SESSION['AdminAuth'];
}
    ?>

