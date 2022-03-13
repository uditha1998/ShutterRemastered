<?php 
include './class/Include.php';
include './post-and-get/auth.php';
?>
<!DOCTYPE html>

<html>
    <head>
        <title>Create Events</title>
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
                        <h5>Create a new Event</h5>
                    </div>
                    <form class="form-main" method="POST" enctype="multipart/form-data" action="./post-and-get/manage-events.php">
                        <div class="row">

                            <label class="col-2 ">Event Name</label>
                            <input class="col-10"type="text" name="name" id="name" required="">
                        </div>
                        <div class="row">
                            <label class="col-2">Event Image</label>
                            <input class="col-10" type="file" name="image_name" id="image_name" required="">
                        </div>
                        <input type="hidden" name="admin_id" value="<?=$admin_id?>">
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
