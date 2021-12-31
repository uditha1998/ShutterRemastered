<!DOCTYPE html>
<html>
    <head>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="../css/photographer_client.css">
        <title>manage portfolio</title>
    </head>
    <body>

    <?php include '../include/photographer_side_nav.php'; ?>
    <div class="main">
        <!--This is the button use to shoe the Sidebar in mobile view -->
        <div>
            <span class="breadcumb" style="font-size:30px;cursor:pointer" onclick="openNav()">&#9776; </span>
        </div>

        <p class="title-top">Add Portfolio</p>

        <div class="form_view">
            <form action="../php/PortfolioInsert.php" method="POST" enctype="multipart/form-data">

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

                <h5>Select 5 Images</h5>
              
                    <input type="file" name="image[]" id="image" required multiple/>   
                    <div class="portfolio_images_con">
                    <div class="portfolio_images_con" id="portfolio_images"></div>
                    </div>              
                   
              

                <button name="submit" type="submit">Add Portfolio</button>

            </form>
        </div>


        <table >
            <tr>
                <th>Id</th>
                <th>Image1</th>
                <th>Image2</th>
                <th>Image3</th>
                <th>Image4</th>
                <th>Image5</th>
                <th>Action</th>
            </tr>

            <?php if ($portfolio->getSelectedPhotographerPortfolio($photographer->getid())) {
               //var_dump($portfolio->getSelectedPhotographerPortfolio($photographer->getid()));
                              foreach ($portfolio->getSelectedPhotographerPortfolio($photographer->getid()) as $key => $row) { ?>
            <tr>
                <td>  <?php echo $event->getIdbyName($row['event_id']); ?>  </td>
                <td>  <img  style="max-width: 100px;" src="<?=$portfolio_image_path.$row['image1']?> " ></img>  </td>
                <td>  <img  style="max-width: 100px;" src="<?=$portfolio_image_path.$row['image2']?> " ></img>  </td>
                <td>  <img  style="max-width: 100px;" src="<?=$portfolio_image_path.$row['image3']?> " ></img>  </td>
                <td>  <img  style="max-width: 100px;" src="<?=$portfolio_image_path.$row['image4']?> " ></img>  </td>
                <td>  <img  style="max-width: 100px;" src="<?=$portfolio_image_path.$row['image5']?> " ></img>  </td>
                <td>
                    <div class="div-control-btn">
                        <div class="div-control-btn-center">
            
                            <a href="../php/PortfolioDeleteGet.php?event_id=<?php echo $row['event_id']; ?>&photographer_id=<?php echo$photographer->getid() ?>"><button class="btn-reject"  >Delete</button></a>
                            <a href="./edit_Portfolio.php?event_id=<?php echo $row['event_id']; ?>&photographer_id=<?php echo$photographer->getid() ?>"><button class="btn-confirm"  >Edit</button></a>
                            
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
