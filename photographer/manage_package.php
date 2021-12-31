<!DOCTYPE html>
<html>

<head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="../css/photographer_client.css">
    <title>manage package</title>
</head>

<body>

    <?php include '../include/photographer_side_nav.php' ?>

    <div class="main">
        <!--This is the button use to shoe the Sidebar in mobile view -->
        <div>
            <span class="breadcumb" style="font-size:30px;cursor:pointer" onclick="openNav()">&#9776; </span>
        </div>

        <p class="title-top">Manage Package</p>

        <div class="form_view">
            <form action="../php/PackageInsert.php" method="POST">

                <div class="input_item">
                    <label>Event type</label>
                    <select name="event" required>
                        <?php if ($event->setAllName()) {
                            foreach ($event->setAllName() as $key => $row) { ?>
                                <option value="<?php echo $row['id'] ?>"> <?php echo $row['name'] ?></option>
                        <?php   }
                        } ?>
                    </select>
                </div>

                <div class="input_item">
                    <label>Package Name</label>
                    <input type="text" placeholder="Pacage Name" name="name" required />
                </div>

                <div class="input_item">
                    <label>Description</label>
                    <input type="text" placeholder="Description" name="description" required />
                </div>

                <div class="input_item">
                    <label>Price</label>
                    <input type="text" value="Rs." placeholder="Price" name="price" required />
                </div>

                <button name="submit" type="submit">Add Package</button>

            </form>
        </div>


        <table>
            <tr>
                <th>id</th>
                <th>Event</th>
                <th>Package Name</th>
                <th>Descrption</th>
                <th>price</th>
                <th>Action</th>
            </tr>

            <?php if ($package->getSelectedPhotographerPackage($photographer->getid())) {
                foreach ($package->getSelectedPhotographerPackage($photographer->getid()) as $key => $row) { ?>
                    <tr>
                        <td> <?php echo $row['id']; ?> </td>
                        <td> <?php echo $event->getIdbyName($row['event_id']); ?> </td>
                        <td> <?php echo $row['name']; ?> </td>
                        <td> <?php echo $row['description']; ?> </td>
                        <td> <?php echo $row['price']; ?> </td>
                        <td>
                            <div class="div-control-btn">
                                <div class="div-control-btn-center">
                                    <a href="./edit_package.php?id=<?php echo $row['id']; ?>"> <button class="btn-confirm">Edit</button></a>
                                    <a href="../php/DeleteGet.php?id=<?php echo $row['id']; ?>"><button class="btn-reject">Delete</button></a>

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