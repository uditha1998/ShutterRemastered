<!DOCTYPE html>
<html>

<head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="../css/photographer_client.css">
</head>

<body>

    <?php include '../include/photographer_side_nav.php'; ?>
    <div class="main">
        <!--Include this to every page,This is the button use to shoe the Sidebar in mobile view -->
        <div>
            <span class="breadcumb" style="font-size:30px;cursor:pointer" onclick="openNav()">&#9776; </span>
        </div>


        <p class="title-top">Manage Customer Orders</p>
        <table id="customers">
            <tr>
                <th>id</th>
                <th>Date</th>
                <th>payment_status</th>
                <th>client_name</th>
                <th>client_Email</th>
                <th>Pacage </th>
                <th>Action</th>
            </tr>

            <?php if ($order->getSelectedPhotographerOrder($photographer->getid())) {
                              foreach ($order->getSelectedPhotographerOrder($photographer->getid()) as $key => $row) { ?>
            <tr>
                <td><?php echo $row['id']; ?> </td>
                <td><?php echo $row['date']; ?> </td>
                <td><?php echo $row['payment_status']; ?> </td>
                <td> <?php echo $client->getIdbyName($row['client_id']); ?></td>
                <td> <?php echo $client->getIdbyEmail($row['client_id']); ?></td>
                <td><?php echo $package->getIdbyName($row['package_id']); ?></td>
                <td>
                    <div class="div-control-btn">
                        <div class="div-control-btn-center">
                            <a href="../php/Edit_order.php?id=<?php echo $row['id']; ?>">  <button  class="btn-confirm" >Confirm</button></a>
                            <a href="../php/Delete_order.php?id=<?php echo $row['id']; ?>"><button class="btn-reject"  >Reject</button></a>
                        </div>
                    </div>

                </td>
            </tr>
           
            <?php           } 
                 } ?>

        </table>
    </div>




    <script src="../js/photographer_client.js"></script>

</body>

</html>