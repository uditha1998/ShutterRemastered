<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="./css/style.css">
</head>

<body>
    <?php
    include './include/header.php';
    ?>
    <?php  $photographer->getIdByPhotographers( $_GET['photographer_id']); ?>
    <div class="p_profile_contener">
        <div class="p_profile_contener_about">
            <div class="name_profile">
                <img src="<?= $photographer_image_path . $photographer->getimage() ?>" alt="">
                <h3><?php echo $photographer->getuserName() ?></h3>
            </div>
            <div class="p_ather_about">
                <div class="p_ather_about_head">
                    <h4>Email : </h4>
                    <h4>Age : </h4>
                    <h4>Countact No : </h4>
                    <h4>About : </h4>
                </div>
                <div class="p_ather_about_body">
                    <p><?php echo $photographer->getemail() ?></p>
                    <p><?php echo $photographer->getage() ?></p>
                    <p><?php echo $photographer->getphone() ?></p>
                    <p><?php echo $photographer->getdescription() ?></p>
                </div>

            </div>
        </div>


        <div class="event_contener">
            <h1>My Events</h1>
            <hr>
            <div class="event_contener_row">
                <?php if ($event->getSelectedPhotographersEvent( $_GET['photographer_id'])) {
                    foreach ($event->getSelectedPhotographersEvent( $_GET['photographer_id']) as $key => $row) { ?>
                        <a href="./event_packages.php?id=<?php echo $row['id']; ?>&name=<?php echo $row['name']; ?>">
                            <div class="event_item">
                                <img src="<?= $event_image_path . $row['image'] ?> " alt="">
                                <h3> <?php echo $row['name']; ?> </h3>

                            </div>
                        </a>

                <?php           }
                } ?>

            </div>


        </div>


        <div class="portfolio_contener">
            <h1>My Portfolio</h1>
            <hr>
            <?php if ($portfolio->getSelectedPhotographerPortfolio( $_GET['photographer_id'])) {
                foreach ($portfolio->getSelectedPhotographerPortfolio( $_GET['photographer_id']) as $key => $row) { ?>

                    <div class="portfolio_contener_row">
                        <p><?php echo $event->getIdbyName($row['event_id']); ?> Photography</p>
                        <div class="portfolio_contener_row_image">
                            <img src="<?= $portfolio_image_path . $row['image1'] ?> " alt="">
                            <img src="<?= $portfolio_image_path . $row['image2'] ?> " alt="">
                            <img src="<?= $portfolio_image_path . $row['image3'] ?> " alt="">
                            <img src="<?= $portfolio_image_path . $row['image4'] ?> " alt="">
                            <img src="<?= $portfolio_image_path . $row['image5'] ?> " alt="">
                        </div>
                    </div>
            <?php           }
            } ?>

        </div>



    </div>






    <?php
    include './include/footer.php';
    ?>

    <script src="./js/script.js"></script>
</body>

</html>