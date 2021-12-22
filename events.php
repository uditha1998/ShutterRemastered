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


    <div class="event_contener">
        <h1>My Events</h1>
        <hr>
        <div class="event_contener_row">
            <?php if ($event->getAllEvent()) {
                foreach ($event->getAllEvent() as $key => $row) { ?>
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





    <?php
    include './include/footer.php';
    ?>
    <script src="./js/script.js"></script>
</body>

</html>