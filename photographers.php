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
    <?php
    include './include/banner.php';
    ?>


    <div class="photographers_contener">
        <h1>Photographers</h1>
        <hr>
        <div class="photographers_contener_row">
        <?php if ($photographer->getSelectedColumnPhotographers()) {
                foreach ($photographer->getSelectedColumnPhotographers() as $key => $row) { ?>
                    <a href="./photographer_profile.php?photographer_id=<?php echo $row['id']; ?>" style="text-decoration: none !important;">
                        <div class="photographers_item">
                            <img src="<?= $photographer_image_path . $row['image'] ?> " alt="">
                            <h3><?php echo $row['username']; ?></h3>
                            <p><?php echo $row['SUBSTR(description,1,80)']; ?></p>
                        </div>
                    </a>
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