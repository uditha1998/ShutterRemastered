<!DOCTYPE html>
<html>

<head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="../css/photographer_client.css">
    <title>photographer edit profile</title>
</head>

<body>

    <?php include '../include/photographer_side_nav.php'; ?>

    <div class="main">
        <!--This is the button use to shoe the Sidebar in mobile view -->
        <div>
            <span class="breadcumb" style="font-size:30px;cursor:pointer" onclick="openNav()">&#9776; </span>
        </div>

        <p class="title-top">Edit Profile</p>

        <div class="form_view">
            <form action="../php/EditPhotographerProfile.php" method="POST" enctype="multipart/form-data">

                <div class="complet_profile_pic" style="margin-bottom: 40px;">
                    <img id="profile_image" src="<?=$photographer_image_path.$photographer->getimage()?> " alt="" width="200px" height="200px">
                    <input type="file" name="image" id="image" onchange="preview_image(event);"  />
                </div>

                <div class="input_item">
                    <label>Name</label>
                    <input type="text" value="<?php echo $photographer->getuserName() ?>"  name="name" required />
                </div>

                <div class="input_item">
                    <label>NIC</label>
                    <input type="text" value="<?php echo $photographer->getnic() ?>"  name="nic" required />
                </div>

                <div class="input_item">
                    <label>Email</label>
                    <input type="text" value="<?php echo $photographer->getemail() ?>"  name="email" required />
                </div>

                <div class="input_item">
                    <label>Password</label>
                    <input type="text" value="<?php echo $photographer->getpassword() ?>"  name="password" required />
                </div>

                <div class="input_item">
                    <label>Birthday</label>
                    <input type="text" value="<?php echo $photographer->getdob() ?>"  name="dob" required />
                </div>

                <div class="input_item">
                    <label>Phone No</label>
                    <input type="text" value="<?php echo $photographer->getphone() ?>"  name="phone" required />
                </div>

                <div class="input_item">
                    <label>Bank Name</label>
                    <input type="text" value="<?php echo $photographer->getbankName() ?>"  name="bank_name" required />
                </div>

                <div class="input_item">
                    <label>Bank Number</label>
                    <input type="text" value="<?php echo $photographer->getbankNo() ?>"  name="bank_no" required />
                </div>

                <div class="input_item">
                    <label>Description</label>
                    <input type="text" value="<?php echo $photographer->getdescription() ?>" name="description" required />
                </div>

                <button name="submit" type="submit">Edit Profile</button>

            </form>
        </div>


        <div class="form_view">
            <form action="" method="POST" >
                <button name="delete" style="background-color: red;" type="delete">Delete Acount</button>
            </form>
        </div>

        <?php
           if(isset($_POST["delete"])){
                 if($photographer->DeletePhotographer($photographer->getid())) {
                   echo '<script> location.replace("../index.php"); </script>' ;
                 }
              }
           
        ?>




    </div>



    <script src="../js/photographer_client.js"></script>

</body>

</html>