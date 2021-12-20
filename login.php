<?php
	//start session
	session_start();
	//redirect if complet profile in 2nd session
    if(isset($_SESSION['photographer_id'])){
        $_SESSION['first_session_photographer_id'] = null;  // asing nall valuse for 1st session
		header('location:./photographer/photographer_profile.php');
	}
	if(isset($_SESSION['client_id'])){
        $_SESSION['first_session_client_id'] = null;  // asing nall valuse for 1st session
		header('location:./client/client_profile.php');
	}

   //redirect if logged in 1st session
    if(isset($_SESSION['first_session_client_id'])){
		header('location:./client_complet_profile.php');
	}
    if(isset($_SESSION['first_session_photographer_id'])){
		header('location:./photographer_complet_profile.php');
	}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign in and sign up </title>
    <!-- css file link -->
    <link rel="stylesheet" href="./css/style.css">
    
</head>

<body>
    <div class="login_container">
        <div class="login_image">
            <a href="index.php">
            <!-- logo -->
            <img src="./image/logo/logo.png" alt="">
            </a>           
        </div>
        <hr>
        <div class="login_form_container">
            <div class="signin_signup">
                <button class="btn_sign_in_change" id="signIn">Sign In</button>
                <button class="btn_sign_up_change" id="signUp">Sign Up</button>
            </div>
             <!-- sign in form -->
            <div class="sign_in" id="signInForm">
                <form class="sign_in_form" action="./php/UsersSignin.php" method="POST">
                    <input id="sign_in_email" class="sign_in_up_input" type="email" placeholder="Email" name="email" required />
                    <input id="sign_in_password" class="sign_in_up_input" type="password" placeholder="Password" name="password" required />
                    <a class="forgot_password" href="#">Forgot your password?</a>
                    <button class="btn_sign_in" type="submit" name="submit" onclick="sign_in(document.getElementById('sign_in_email').value,document.getElementById('sign_in_password').value)" >Sign In</button>
                </form>
            </div>
            <!-- sign up form -->
            <div class="sign_up" id="signUpForm">
                <form class="sign_in_form" action="./php/UsersSignup.php" method="POST">

                    <div class="sign_up_radio">
                        <input id="client" type="radio" id="user" name="user" value="client" >
                        <label style="margin-right: 120px;" for="male">Client</label>
                        <input id="photographer" type="radio" id="user" name="user" value="photographer" >
                        <label for="female">Photographer</label>
                    </div>
                    <input id="sign_up_email" class="sign_in_up_input " type="email" placeholder="Email" name="email"  />
                    <input id="sign_up_password" class="sign_in_up_input " type="password" placeholder="Password" name="password"  />
                    <input id="sign_up_repeatpassword" class="sign_in_up_input " type="password" placeholder="Re-Password" name="repeatpassword"  />
                    <button class="btn_sign_up" type="submit" name="submit"  onclick="sign_up(document.getElementById('sign_up_email').value,document.getElementById('sign_up_password').value,document.getElementById('sign_up_repeatpassword').value)" >Sign Up</button>

                </form>
            </div>

        </div>
    </div>
    

    <script src="./js/script.js"></script>
    <!-- validestion js file link -->
    <script src="./js/validation.js"></script>
  
</body>

</html>