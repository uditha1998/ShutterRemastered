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


    <div class="package_contener">
        <h1><?php echo $_GET['name'] ?> Packages</h1>
        <hr>


        <?php if ($package->getSelectedEventPackage($_GET['id'])) {
           
                foreach ($package->getSelectedEventPackage($_GET['id']) as $key => $row) { ?>
          <?php $photographer->getIdByPhotographers($row['photographer_id']); ?>
                
        <div class="package_contener_row">
            <div class="package_item">
                <div class="package_item_de">
                    <h2><?php echo  $row['name']; ?></h2>
                    <p>Photographer Name : <?php echo $photographer->getuserName() ?></p>
                    <p><?php echo $row['description']; ?></p>
                    <h3><?php echo $row['price']; ?></h3>
                </div>
                
                <a href="./checkout.php?event_id=<?php echo $_GET['id'] ?>&event_name=<?php echo $_GET['name'] ?>&package_id=<?php echo $row['id']; ?>&pacage_name=<?php echo $row['name']; ?>&photographer_id=<?php echo $row['photographer_id']; ?>&photographer_name=<?php echo $photographer->getuserName() ?>&price=<?php echo $row['price']?>"><button>Order Now</button></a>
            </div>
        </div>

        <?php           }
            } ?>
       

    </div>





    <?php
    include './include/footer.php';
    ?>
    <script src="./js/script.js"></script>
</body>

</html>