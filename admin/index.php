=
<?php
include './class/Include.php';
include './post-and-get/auth.php';
?>
<!DOCTYPE html>

<html>
    <head>
        <title>Home</title>
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

                    <div class="col-12 form-title">
                        <h5>Welcome <?=$admin_name?> to the Shutter Control Panel !</h5>
                    </div>
                    <div class="col-12">
                        <div class="row flex-wrap">
                           
                        </div>
                    </div>

                </div>

            </div>

        </div>




        <script src="js/script.js" type="text/javascript"></script>
        <script>
                    function removeEvent() {
                        var result = confirm("Are You Really Want to Delete?");

                        if (result === true) {
                            return true;
                        } else {
                            return false;
                        }

                    }
        </script>

    </body>
</html> 
