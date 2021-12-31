<!DOCTYPE html>
<html>
    <head>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="../css/photographer_client.css">
        <title>edit portfolio</title>
    </head>
    <body>

    <?php include '../include/photographer_side_nav.php'; ?>
    <div class="main">
        <!--This is the button use to shoe the Sidebar in mobile view -->
        <div>
            <span class="breadcumb" style="font-size:30px;cursor:pointer" onclick="openNav()">&#9776; </span>
        </div>

        <p class="title-top">Edit Portfolio</p>

        <div class="form_view">
            <form action="../php/PortfolioEdit.php" method="POST" enctype="multipart/form-data">

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
                <input type="text" name="old_event_id" value="<?php echo $_GET["event_id"]; ?>" hidden>
                <h5>Select 5 Images</h5>
              
                    <input type="file" name="image[]" id="image" required multiple/>   
                    <div class="portfolio_images_con">
                    <div class="portfolio_images_con" id="portfolio_images"></div>
                    </div>              
                   
              

                <button name="submit" type="submit">Edit Portfolio</button>

            </form>
        </div>


    

    </div>




    <script src="../js/photographer_client.js"></script>

</body>
</html> 
