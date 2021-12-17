<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>home</title>
    <link rel="stylesheet" href="./css/style.css">

</head>

<body>
    <!-- include nav bar  -->
    <?php
    include './include/header.php';
    ?>
    <!-- include carousel -->
    <?php
    include './include/carousel.php';
    ?>


    <!-- home about us content -->
    <div class="contener">

        <div class="home_about">
            <h3>ABOUT US</h3>
            <hr>

            <p>Lorem ipsum dolor sit, amet consectetur adipisicing elit.
                Eos nihil sint porro esse veniam in tempore, magni et placeat eligendi tenetur velit unde ipsum voluptatem pariatur,
                doloribus debitis nemo nisi.Lorem ipsum dolor sit, amet consectetur adipisicing elit.
                Eos nihil sint porro esse veniam in tempore, magni et placeat eligendi tenetur velit </p>

            <a href="about.php">
            <!-- button for go to about us page -->
                <button>MORE ABOUT US</button> 
            </a>
        </div>


 <!-- home event content -->
        <div class="home_event">
            <h3>OUR EVENTS</h3>
            <hr>
            <div class="home_event_row">
                <div class="home_event_row_item1">
                    <img src="./image/events/1.jpg" alt="">
                    <div class="home_event_p1">
                        <p>Wedding</p>
                        <p>Photography</p>
                    </div>
                    <hr>
                </div>
                <div class="home_event_row_item2">
                    <img src="./image/events/2.jpg" alt="">
                    <div class="home_event_p2">
                        <p>Portrait </p>
                        <p>Photography</p>
                    </div>
                    <hr>
                </div>
                <div class="home_event_row_item1">
                    <img src="./image/events/3.jpg" alt="">
                    <div class="home_event_p1">
                        <p>Product</p>
                        <p>Photography</p>
                    </div>
                    <hr>
                </div>
                <div class="home_event_row_item2">
                    <img src="./image/events/4.jpg" alt="">
                    <div class="home_event_p2">
                        <p>Sporty</p>
                        <p>Photography</p>
                    </div>
                    <hr>
                </div>

            </div>
            <a href="events.php">
              <!-- button for go to event page -->
                <button>MORE EVENTS</button>
            </a>
        </div>

    </div>

<!-- client , photographer , event count  -->
    <div class="all_counts">
        <div class="all_counts_item">
            <h1>CLIENTS</h1>          
            <h1><?php echo $client->clientCount() ?></h1>          
        </div>
        <div class="all_counts_item">
            <h1>PHOTOGRAPHERS</h1>
            <h1><?php echo $photographer->photographerCount() ?></h1>
        </div>
        <div class="all_counts_item">
            <h1>EVENTS</h1>
            <h1><?php echo $event->eventCount() ?></h1>
        </div>
    </div>



<!-- home photographers content -->
    <div class="contener">
        <div class="home_photographers">

            <h3>OUR PHOTOGRPHERS</h3>
            <hr>
            <div class="home_photographers_row">

                <div class="home_photographers_item">
                    <img id="image1" src="./image/photogrphers/man1.jpg" alt="">
                    <a href="#" id="photographers_name1">Hirusha Ravishan</a>
                    <p id="photographers_dis1">Lorem ipsum dolor sit amet consectetur adipisicing elit.
                        Soluta dignissimos repudiandae laudantium delectus ...</p>
                    <a style="font-size: 13px;" href="">READ MOER -></a>
                </div>

                <div class="home_photographers_item">
                    <img id="image2" src="./image/photogrphers/man2.jpg" alt="">
                    <a href="#" id="photographers_name2">Namal Dhanushaka</a>
                    <p id="photographers_dis2">Lorem ipsum dolor sit amet consectetur adipisicing elit.
                        Soluta dignissimos repudiandae laudantium delectus...</p>
                    <a style="font-size: 13px;" href="">READ MOER -></a>
                </div>

                <div class="home_photographers_item">
                    <img id="image3" src="./image/photogrphers/man3.jpg" alt="">
                    <a href="#" id="photographers_name3">Asanka Sanjeewa</a>
                    <p id="photographers_dis3">Lorem ipsum dolor sit amet consectetur adipisicing elit.
                        Soluta dignissimos repudiandae laudantium delectus ...</p>
                    <a style="font-size: 13px;" href="">READ MOER -></a>
                </div>
            </div>
            <a class="home_photographers_btn" href="photographers.php">
                <button>MORE PHOTOGRPHERS</button>
            </a>
        </div>

    </div>



   <!-- include footer -->
    <?php
    include './include/footer.php';
    ?>

    
    <script src="./js/script.js"></script>
</body>

</html>