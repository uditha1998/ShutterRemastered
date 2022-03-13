<
<!DOCTYPE html>
<html lang="en">

    <head>
        <title>Login</title>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Sign_in</title>
        
        <script src="./js/validation.js"></script>
        <style>
            .login_container{
                display: flex;
                max-width: 100%;
                height: 100vh;
                flex-direction: row;
                align-items: center;
                justify-content: space-evenly;
                position: relative;
            }

            .login_form_container{
                display: flex;
                width: 28%;
                flex-direction: column;
                align-items: center;
                background-color: #ffffff;
                justify-content: center;
                position: relative;
            }
            .signin_signup{
                display: flex;
                width: 100%;
                justify-content: center;
                flex-direction: row;
                background-color: #ffffff;

            }
            .btn_sign_in_change{
                width: 100%;
                position: relative;
                background-color: #7F38EC;
                color: #FFFFFF;
                font-size: 15px;
                font-weight: bold;
                padding: 12px 45px;
                border: 0px;
            }
            .btn_sign_in_change_click{
                width: 100%;
                position: relative;
                background-color: #eee;
                color: #000000;
                font-size: 15px;
                font-weight: bold;
                padding: 12px 45px;
                border: 0px;
            } 

            .btn_sign_up_change_click{
                width: 100%;
                position: relative;
                background-color: #7F38EC;
                color: #FFFFFF;
                font-size: 15px;
                font-weight: bold;
                padding: 12px 45px;
                border: 0px;
            } 
            .sign_in{
                display: flex;
                flex-direction: column;
                position: relative;
                width: 70%;
                visibility: visible;
            }

            .sign_in_form{
                display: flex;
                margin-top: 40px;
                margin-bottom: 40px;
                background-color: #ffffff;
                flex-direction: column;
                align-items: center;
                width: 100%;
                position: relative;
            }
            .sign_in_up_input{
                margin-top: 20px;
                width: 100%;
                background-color: #eee;
                border: none;
                padding-top: 15px;
                padding-bottom: 15px;
                padding-right: 15px;
                padding-left: 15px;
                position: relative;
            }
            .forgot_password{
                margin-top: 30px;
                margin-bottom: 30px;
                position: relative;
                text-decoration: none;
            }
            .btn_sign_in {
                width: 220px;
                background: transparent;
                border-color: #000000;
                color: #000000;
                font-size: 14px;
                padding-top: 15px;
                padding-bottom: 12px;
                border-radius: 4px;
            }
            .btn_sign_in:hover{
                background-color: #7F38EC;
                color: #ffffff;
                border-color: transparent;
            }

            .login_form_container label{
                font-size: 30px;
                border-bottom: 2px solid;
            }
            .margin-30{
                margin: 30px 0px 30px 0;
            }
            .no-dec{
                text-decoration: none;
            }
        </style>
    </head>

    <body style="background-color: background">
        <div class="login_container">


            <div class="login_form_container">
                <div style="margin-top: 20px;width: 100%;text-align: center">
                    <label>Admin Login</label>
                    <p>www.shutterphotography.lk</p>
                </div>

                <div class="sign_in" id="signInForm">
                    <form class="sign_in_form" action="./post-and-get/admin-login.php" method="POST">
                        <input id="sign_in_email" class="sign_in_up_input" type="email" placeholder="Email" name="email" required="" />
                        <input id="sign_in_password" class="sign_in_up_input" type="password" placeholder="Password" name="password" required="" />

                        <button class="btn_sign_in margin-30" type="submit" name="submit" >Sign In</button>
                        <a class="no-dec" href="#">Forgot password?</a>
       \
                    </form>
                </div>


            </div>
        </div>
    </div>







    <script src="./js/script.js"></script>

</body>

</html>