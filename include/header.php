<?php

//start session
session_start();


include './php/Event.php';
include './php/Package.php';
include './php/Client.php';
include './php/Photographer.php';


$event = new Event();
$package = new Package();
$client = new Client();
$photographer = new Photographer();
$portfolio = new Portfolio();


$event_image_path = "./image/events/";
$photographer_image_path = "./image/photographer_p_image/";
$portfolio_image_path = "./image/portfolio/";


?>


<nav id="nav">
    <div class="logo_menu">
        <a href="index.php" class="logo">
            <img src="./image/logo/logo.png" alt="" />
        </a>

        <div class="menu_box">
            <img id="menu" class="menu" src="./icon/menu.png" alt="" onclick="menuChange()" />
        </div>
    </div>

    <ul id="nav_ul">
        <li><a href="index.php">Home</a></li>
        <li><a href="about.php">About us</a></li>
        <li><a href="contact.php">Contact us</a></li>
        <li><a href="events.php">Events</a></li>
        <li><a href="photographers.php">Photographers</a></li>
        <li><a class="nav_login" href="login.php">Sign in</a></li>
    </ul>

</nav>