=
<?php 
include './class/Include.php';
include './post-and-get/auth.php';

$EVENT = new Event();
?>
<!DOCTYPE html>

<html>
    <head>
        <title>Manage Events</title>
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
                        <h5>Manage Events</h5>
                    </div>
                    <div class="col-12">
                        <div class="row flex-wrap">
                            <?php foreach ($EVENT->RetriveAll() as $events) { ?>
                                <div class="col-4">
                                    <div class="event-list">
                                        <img src="./../image/events/<?= $events['image'] ?>" height="300PX" width="100%">
                                        <div style="background-color: #075877cc;Padding: 20px;">
                                            <div class="row">
                                                <label class="col-7"><?=$events['name']?></label>
                                                <div  class="col-5"style="text-align: right">
                                                    <a href="./post-and-get/delete/delete-event.php?id=<?=$events['id']?>" onclick="return removeEvent();"><span> <i class="fa fa-trash"></i></span></a>
                                                    <span> <i class="fa fa-pencil"></i></span>

                                                </div>

                                            </div>

                                        </div>
                                    </div>
                                </div>
                            <?php } ?>
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
