<?php
$message = 0;

//start session
session_start();

if (isset($_SESSION['AdminAuth'])) {
    header('location:index.php');
}
?>
<!DOCTYPE html>
<html lang="en">

    <head>
        <title>Login</title>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Sign_in</title>
        <link rel="stylesheet" href="./css/style.css">

    </head>

    <body style="background-color: background">
        <div class="login_container">
            <div class="login_form_container">
                <div style="margin-top: 20px;width: 100%;text-align: center">
                    <label>Admin Login</label>
                    <p>www.shutterphotography.lk</p>
                </div>

                <div class="sign_in" id="signInForm">
                    <form class="sign_in_form" action="./helper/admin-login.php" method="POST">
                        <input id="sign_in_email" class="sign_in_up_input" type="email" placeholder="Email" name="email" required="" />
                        <input id="sign_in_password" class="sign_in_up_input" type="password" placeholder="Password" name="password" required="" />

                        <button class="btn_sign_in margin-30" type="submit" name="submit" >Sign In</button>
                        <a class="no-dec" href="#">Forgot password?</a>
                        <?php
                        if ($message == 1) {
                            echo '<div style="color:red">Invalid Username or Password!<div>';
                        } else {
                            echo '';
                        }
                        ?>
                    </form>
                </div>
            </div>
        </div>
    </div>




    <script src="./js/script.js"></script>

</body>

</html>