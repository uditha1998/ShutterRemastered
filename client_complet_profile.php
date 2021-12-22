<?php
session_start();
//return to login if not logged in
if (!isset($_SESSION['first_session_client_id'])) {
    header('location:login.php');
}
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>complet profile</title>
    <link rel="stylesheet" href="./css/style.css">
</head>

<body>

    <div class="complet_profile_container">
        <div class="complet_profile_image">
            <a href="index.php">
                <img src="./image/logo/logo.png" alt="">
            </a>
        </div>
        <hr>
        <div class="complet_profile_form_container">
         
            <form action="./php/ClientCompletProfile.php" method="POST" enctype="multipart/form-data">
            <p>Complet Profile</p>
                <input class="complet_profile_input" type="text" placeholder="Username" name="username" required />
                <div class="complet_profile_radio">
                    <input type="radio" name="gender" value="male" required>
                    <label style="margin-right: 120px;" for="male">Male</label>
                    <input type="radio" name="gender" value="female" required>
                    <label for="female">Female</label>
                </div>
                <input class="complet_profile_input" type="text" placeholder="NIC" name="nic" required />
                <input class="complet_profile_input" type="date" placeholder="Date of birth" name="dob" required />
                <input class="complet_profile_input" type="text" placeholder="Contact Number" name="phone" required />
                <h5>Select Profile Image</h5>
                <div class="complet_profile_pic">
                    <input type="file" name="image" id="image" onchange="preview_image(event);" required />                 
                    <img id="profile_image" alt="" style="max-width: 150px;" >
                </div>
                <button class="btn_complet_profile" type="submit" name="submit">Complet Profile</button>

            </form>
        </div>

    </div>

    <script src="./js/photographer_client.js"></script>

</body>

</html>