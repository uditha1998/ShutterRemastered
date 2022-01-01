<?php
session_start();
if (!isset($_SESSION['client_id'])) {
    header('location:../login.php');
}
include '../php/Client.php';


$client = new Client();


$client->setSelectedClient();
$path ="../image/client_p_image/";


?>


<div id="mySidenav" class="sidenav">
    <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
    <div>
        <div style="text-align:center;width: 100%">
        
            <img  class="res-profile" src="<?=$path.$client->getimage()?>" ></img>
        </div>
        <div class="profile_name">
            <label><?php echo $client->getuserName() ?></label>
        </div>
    </div>
    <div>

        <ul>
            <li> <i class="fa ffa-reply-al"></i> <a href="./client_profile.php">Profile</a></li>
            <li> <a href="./edit_client_profile.php">Edit Profile</a></li>
            <li> <a href="../php/logout.php">Log out </a></li>
 

        </ul>
    </div>


</div>





