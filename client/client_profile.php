<!DOCTYPE html>
<html>

<head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="../css/photographer_client.css">
</head>

<body>

    <?php include '../include/client_side_nav.php'; ?>

    <div class="main">
        <div>
            <span class="breadcumb" style="font-size:30px;cursor:pointer" onclick="openNav()">&#9776; </span>
        </div>

        <p class="title-top">Client's Profile</p>

        <div class="col-12">
            <div class="row mobile-off-flex">
                <div class="col-12 mobile-res">
                    <div>

                        <div class="padding-list">
                            <div>
                                <label>Personal Details</label>
                            </div>
                        </div>

                        <table class="table-details">
                            <tr>
                                <td class="table-data"><label>Name:</label></td>
                                <td class="table-data"><label><?php echo $client->getuserName() ?></label></td>
                            </tr>

                            <tr>
                                <td class="table-data"><label>NIC:</label></td>
                                <td class="table-data"><label><?php echo $client->getnic() ?></label></td>
                            </tr>

                            <tr>
                                <td class="table-data"><label>Email:</label></td>
                                <td class="table-data"><label><?php echo $client->getemail() ?></label></td>

                            </tr>

                            <tr>
                                <td class="table-data"> <label>Bithday:</label></td>
                                <td class="table-data"><label><?php echo $client->getdob() ?></label> </td>
                            </tr>

                            <tr>
                                <td class="table-data"><label>Phone no:</label></td>
                                <td class="table-data"> <label><?php echo $client->getphone() ?></label></td>
                            </tr>

                            <tr>
                                <td class="table-data"> <label>Gendar:</label> </td>
                                <td class="table-data"><label><?php echo $client->getgender() ?></label></td>
                            </tr>

                            <tr>
                    

                        </table>



                    </div>

                </div>

            </div>

        </div>

    </div>



    <script src="../js/photographer_client.js"></script>

</body>

</html>




