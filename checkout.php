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


    <div class="checkout_contener">
        <div class="checkout_order">
            <h3>Order Details</h3>
            <hr>
            <div class="checkout_order_show">
                <div class="checkout_order_show_head">
                    <p>Photographer</p>
                    <p>Event</p>
                    <p>Package</p>
                    <p>Price</p>
                </div>
                <div class="checkout_order_show_body">
                    <p> <?php echo $_GET['photographer_name']  ?> </p>
                    <p><?php echo $_GET['event_name']  ?></p>
                    <p><?php echo $_GET['pacage_name']  ?></p>
                    <p><?php echo $_GET['price']  ?></p>
                </div>
            </div>


        </div>

        <div class="payemant_order">
            <h3>Payment Details</h3>
            <hr>
            <form action="./php/OrderInsert.php" method="POST">
                <div class="payemant_radio">
                    <div class="payemant_radio">
                        <input type="radio" name="card" value="master" required>
                        <img src="./image/logo/master.png" alt="">
                    </div>
                    <div class="payemant_radio">
                        <input type="radio" name="card" value="visa" required>
                        <img src="./image/logo/visa.png" alt="">
                    </div>
                </div>
                <input class="card_no" type="text" placeholder="Card Number" name="card_no" required>

                <div class="selecter_month_day">
                    <select class="selecter_month" name="month" placeholder="Month" required>
                        <option value="January">January</option>
                        <option value="February">February</option>
                        <option value="March">March</option>
                        <option value="April">April</option>
                        <option value="May">May</option>
                        <option value="June">June</option>
                        <option value="July">July</option>
                        <option value="August">August</option>
                        <option value="September">September</option>
                        <option value="October">October</option>
                        <option value="November">November</option>
                        <option value="December">December</option>
                    </select>


                    <select class="selecter_day" name="day" placeholder="Day" required>
                        <option value="01">1</option>
                        <option value="02">2</option>
                        <option value="03">3</option>
                        <option value="04">4</option>
                        <option value="05">5</option>
                        <option value="06">6</option>
                        <option value="07">7</option>
                        <option value="08">8</option>
                        <option value="09">9</option>
                        <option value="10">10</option>
                        <option value="11">11</option>
                        <option value="12">12</option>
                        <option value="13">13</option>
                        <option value="14">14</option>
                        <option value="15">15</option>
                        <option value="16">16</option>
                        <option value="17">17</option>
                        <option value="18">18</option>
                        <option value="19">19</option>
                        <option value="20">20</option>
                        <option value="21">21</option>
                        <option value="22">22</option>
                        <option value="23">23</option>
                        <option value="24">24</option>
                        <option value="25">25</option>
                        <option value="26">26</option>
                        <option value="27">27</option>
                        <option value="28">28</option>
                        <option value="29">29</option>
                        <option value="30">30</option>
                        <option value="31">31</option>
                    </select>
                </div>

                <input type="hidden" value="<?php echo $_GET['photographer_id']  ?>" name="photographer_id" >
                <input type="hidden" value="<?php echo $_GET['package_id']  ?>" name="package_id" >

                <input class="cvc" type="text" placeholder="CVC" name="cvc" required>
                <button type="submit" name="submit">Pay</button>
            </form>
        </div>
    </div>
</body>

</html>