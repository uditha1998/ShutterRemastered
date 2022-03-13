<?php
include './class/Include.php';
include './post-and-get/auth.php';
?>
<?php

?>
<!DOCTYPE html>

<html>
    <head>
        <title>Orders</title>
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
                    <h5>Manage Client</h5>
                </div>



                <div class="col-12">

                    <table id="data-table">
                        <tr>
                            <th>Id</th>
                            <th>Client Name</th>
                            <th>NIC</th>
                            <th>Gender</th>
                            <th>Email</th>
                            <th>Contact No </th>
                            <th>Action</th>
                        </tr>
                        <?php
                        foreach ($CLIENT->getAllClients() as $clients){
                            ?>
                            <tr>
                                <td><?= 'CLT_' . $clients['id'] ?></td>
                                <td><?= $clients['username'] ?></td>
                                <td><?= $clients['nic'] ?></td>
                                <td><?= $clients['gender'] ?></td>
                                <td><?= $clients['email'] ?></td>
                                <td><?= $clients['contact_no'] ?></td>
                                <td>
                                    <div class="div-control-btn">
                                        <div class="div-control-btn-center">
                                            <a href="./profile.php?clt=<?=$clients['id']?>"> <button class="btn-save-blue">View Profile</button></a>

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
