<!DOCTYPE html>
<html>

<head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="../css/photographer_client.css">
    <title>edit package</title>
</head>

<body>

    <?php include '../include/photographer_side_nav.php'; ?>
    <div class="main">
        <!--This is the button use to shoe the Sidebar in mobile view -->
        <div>
            <span class="breadcumb" style="font-size:30px;cursor:pointer" onclick="openNav()">&#9776; </span>
        </div>

        <p class="title-top">Edit Package</p>

        <div class="form_view">
            <form action="../php/PackageEdit.php?id=$_GET['id']" method="POST">

                <div class="input_item">
                   <label>Event type</label>
                    <select name="event" required>
                      <?php if ($event->setAllName()) {
                              foreach ($event->setAllName() as $key => $row) { ?>
                        <option value="<?php echo $row['id'] ?>" > <?php echo $row['name'] ?></option>
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

                <button name="submit" type="submit">Edit Package</button>

            </form>
        </div>

    </div>




    <script src="../js/photographer_client.js"></script>

</body>

</html>