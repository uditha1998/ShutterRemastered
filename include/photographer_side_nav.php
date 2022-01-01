<?php
session_start();
if (!isset($_SESSION['photographer_id'])) {
    header('location:../login.php');
}
include_once '../php/Photographer.php';
include_once '../php/Event.php';
include_once '../php/Package.php';
include_once '../php/Portfolio.php';
include_once '../php/Client.php';
include_once '../php/Order.php';



$photographer = new Photographer();
$event = new Event();
$package = new Package();
$portfolio = new Portfolio();
$client = new Client();
$order = new Order();


$photographer->getSelectedPhotographers();
$photographer_image_path ="../image/photographer_p_image/";
$portfolio_image_path ="../image/portfolio/";


?>


<div id="mySidenav" class="sidenav">
    <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
    <div>
        <div style="text-align:center;width: 100%">
        
            <img  class="res-profile" src="<?=$photographer_image_path.$photographer->getimage()?> " ></img>
        </div>
        <div class="profile_name">
            <label><?php echo $photographer->getuserName() ?></label>
        </div>
    </div>
    <div>

        <ul>
            <li> <i class="fa ffa-reply-al"></i> <a href="./photographer_profile.php">Profile</a></li>
            <li> <a href="./pending_orders.php">Pending Orders</a></li>
            <li> <a href="./manage_package.php">Manage Package</a></li>
            <li> <a href="./manage_portfolio.php">Manage Portforlio</a></li>
            <li> <a href="./edit_photographer_profile.php">Edit Profile</a></li>
            <li> <a href="../php/logout.php">Log out </a></li>



        </ul>
    </div>


</div>





