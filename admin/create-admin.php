<?php 
include './class/Include.php';
include './post-and-get/auth.php';?>
<!DOCTYPE html>

<html>
    <head>
        <title>Create Administrators</title>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <link href="css/style.css" rel="stylesheet" type="text/css"/>

    </head>
    <body >
        <div class="admin-nav">


            <div class="admin-nav-titile">
                Administrator Dashboard    
            </div>



        </div>     

        <?php include './side-nav.php'; ?>  


        <div class="main">
            <div>
                <span class="breadcumb" onclick="openNav()"><i class="fa fa-bars"></i> </span>

            </div>





            <div class="col-12">

                <div class="row box bg-shadow">
                    <div class="form-title">
                        <h5>Create a 2nd Line Administrator</h5>
                    </div>
                    <form class="form-main" method="POST" enctype="multipart/form-data" action="./post-and-get/manage-admins.php">
                       
                        <div class="row">

                            <label class="col-2 ">Username</label>
                            <input class="col-10" type="text" name="username" id="username" required="">
                        </div>
                        <div class="row">

                            <label class="col-2 ">Email</label>
                            <input class="col-10" type="email" name="email" id="email" required="">
                        </div>
                        <div class="row">

                            <label class="col-2 ">Password</label>
                            <input class="col-10" type="password" name="password" id="password" required="">
                        </div>

                        <input type="hidden" name="referral_id" value="<?=$admin_id?>">
                        <div class="row">
                            <div class="col-12 right">
                                <button class="btn-cancel">Clear</button>
                                <button name="create"class="btn-save-blue">Create</button>
                                

                            </div>

                        </div>



                    </form>
                </div>

            </div>

        </div>




        <script src="js/script.js" type="text/javascript"></script>

    </body>
</html> 
