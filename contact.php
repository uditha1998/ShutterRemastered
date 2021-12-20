<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="./css/style.css">
</head>

<body>

    <?php
    include './include/header.php';
    ?>
    <?php
    include './include/banner.php';
    ?>

    <?php

    if (isset($_POST['submit'])) {
        
        $email = $_POST['email'];
        $subject = $_POST['subject'];
        $message = $_POST['message'];

        if (isset($_SESSION['client_id'])) {

            $client->feedbackInsert($_SESSION['client_id'], $email, $subject, $message);
        } else {
         
            echo '<script language="javascript">';
            echo 'alert("Pleace sign in first")';
            echo '</script>';
        }

      
    }



    ?>

    <div class="contact_contener">

        <div class="contact_contener_item">
            <h3>Feedback</h3>
            <form action="" method="POST">

                <div class="input_item">
                    <label>Email</label>
                    <input type="email" placeholder="email" name="email" required />
                </div>

                <div class="input_item">
                    <label>Subject</label>
                    <input type="text" placeholder="subject" name="subject" required />
                </div>

                <div class="input_item">
                    <label>Message</label>
                    <textarea placeholder="message" rows="4" class="contact_message" name="message"></textarea>
                </div>

                <button name="submit" type="submit">Send</button>

            </form>

        </div>

        <img src="./image/contact.jpg" alt="">


    </div>



    <?php
    include './include/footer.php';
    ?>

    <script src="./js/script.js"></script>
</body>

</html>