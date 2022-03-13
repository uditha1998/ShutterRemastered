<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

include './class/Include.php';
include './post-and-get/auth.php';
?>
<?php
$PHOTOGRAPHER = new Photographer();
?>
<!DOCTYPE html>

<html>
    <head>
        <title>Manage Photographers</title>
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

            <div class="row box bg-shadow">

                <div class="col-12 form-title">
                    <h5>Manage Pending Photographers</h5>
                </div>



                <div class="col-12">

                    <table id="data-table">
                        <tr>
                            <th>Id</th>
                            <th>Photographer Name</th>
                            <th>NIC</th>
                            <th>Gender</th>
                            <th>Email</th>
                            <th>Contact No </th>
                            <th>Action</th>
                        </tr>
                        <?php
                        foreach ($PHOTOGRAPHER->getAllSelectedPhotographhers() as $photographer){
                            ?>
                            <tr>
                                <td><?= 'PHTGR_' . $photographer['id'] ?></td>
                                <td><?= $photographer['username'] ?></td>
                                <td><?= $photographer['nic'] ?></td>
                                <td><?= $photographer['gender'] ?></td>
                                <td><?= $photographer['email'] ?></td>
                                <td><?= $photographer['contact_no'] ?></td>
                                <td>
                                    <div class="div-control-btn">
                                        <div class="div-control-btn-center">
                                            <a href="./profile.php?pht=<?=$photographer['id']?>"> <button class="btn-save-blue">View Profile</button></a>

                                        </div>
                                    </div>

                                </td>
                            </tr>
                        <?php } ?>


                    </table>
                </div>
            </div>

        </div>




        <script src="js/script.js" type="text/javascript"></script>

    </body>
</html> 
