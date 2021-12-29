<!DOCTYPE html>
<html>

<head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="../css/photographer_client.css">
    <title>photographer profile</title>
</head>

<body>

    <?php include '../include/photographer_side_nav.php'; ?>

    <div class="main">
        <div>
            <span class="breadcumb" style="font-size:30px;cursor:pointer" onclick="openNav()">&#9776; </span>
        </div>

        <p class="title-top">Photographer's Profile</p>

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
                                <td class="table-data" ><label>Name:</label></td>
                                <td class="table-data"><label><?php echo $photographer->getuserName() ?></label></td>
                            </tr>

                            <tr>
                                <td class="table-data"><label>Age:</label></td>
                                <td class="table-data"><label><?php echo $photographer->getage() ?></label> </td>
                            </tr>

                            <tr>
                                <td class="table-data"><label>NIC:</label></td>
                                <td class="table-data"><label><?php echo $photographer->getnic() ?></label></td>
                            </tr>

                            <tr>
                                <td class="table-data"><label>Email:</label></td>
                                <td class="table-data"><label><?php echo $photographer->getemail() ?></label></td>

                            </tr>

                            <tr>
                                <td class="table-data"> <label>Bithday:</label></td>
                                <td class="table-data"><label><?php echo $photographer->getdob() ?></label> </td>
                            </tr>

                            <tr>
                                <td class="table-data"><label>Phone no:</label></td>
                                <td class="table-data"> <label><?php echo $photographer->getphone() ?></label></td>
                            </tr>

                            <tr>
                                <td class="table-data"> <label>Bank Name:</label> </td>
                                <td class="table-data"><label><?php echo $photographer->getbankName() ?></label></td>
                            </tr>

                            <tr>
                                <td class="table-data"> <label>Bank Number:</label> </td>
                                <td class="table-data"><label><?php echo $photographer->getbankNo() ?></label></td>
                            </tr>

                            <tr>
                                <td class="table-data"> <label>Gendar:</label> </td>
                                <td class="table-data"><label><?php echo $photographer->getgender() ?></label></td>
                            </tr>

                            <tr>
                                <td class="table-data"> <label>Description:</label> </td>
                                <td class="table-data"><label><?php echo $photographer->getdescription() ?></label></td>
                            </tr>

                            <tr>
                                <td class="table-data"> <label>Enrollment:</label> </td>
                                <td class="table-data"><label><?php echo $photographer->getenrollment_status() ?></label></td>
                            </tr>

                        </table>



                    </div>

                </div>

            </div>

        </div>

    </div>



    <script src="../js/photographer_client.js"></script>

</body>

</html>