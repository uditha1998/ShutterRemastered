<?php
include './class/Include.php';
include './post-and-get/auth.php';

if (isset($_GET['pht'])) {

    $id = $_GET['pht'];
    $type = 'Photographer';
    $OBJ = new Photographer();

    $PORTFOLIO = new Portfolio();




    $DATA = $OBJ->getIdByPhotographers($id);
} elseif (isset($_GET['clt'])) {
    $id = $_GET['clt'];
    $type = 'Client';
    $OBJ = new Client();
    $OBJ->setId($id);
    $DATA = $OBJ->getClientsById();
}
?>
<!DOCTYPE html>

<html>
    <head>
        <title>View Profile</title>
        <meta name="viewport" content="width=device-width, initial-scale=1">


        <!--      Refered From Font Awesome net to get Edit delete and Side nav collapse icon-->
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

        <link href="css/style.css" rel="stylesheet" type="text/css"/>

    </head>
    <body >
        <div class="admin-nav">


            <div class="admin-nav-titile">
                Administrator Dashboard    
            </div>



        </div>     

        <?php include './side-nav.php'; ?>  


        <div class="main">
            <div>
                <span class="breadcumb" onclick="openNav()"><i class="fa fa-bars"></i> </span>

            </div>





            <div class="col-12">

                <div class="row box bg-shadow">
                    <div class="form-title">
                        <h5>View <?= $type ?> Profile</h5>
                    </div>
                    <div class="form-title-mini">
                        <label>Personal Information</label>
                    </div>
                    <div class="row">
                        <div class="col-8">
                            <div class="pro-container">

                                <div class="profile-details row flex-wrap">
                                    <div class="single-row col-12">
                                        <label class="col-2">Name </label>  
                                        <label class="col-10">: <?= $OBJ->getuserName() ?></label>  
                                    </div>



                                </div>
                                <div class="profile-details row flex-wrap">
                                    <div class="single-row col-12">
                                        <label class="col-2">Gender </label>  
                                        <label class="col-10">: <?= $OBJ->getgender() ?></label>  
                                    </div>



                                </div>                
                                <div class="profile-details row flex-wrap">
                                    <div class="single-row col-12">
                                        <label class="col-2">NIC Number </label>  
                                        <label class="col-10">: <?= $OBJ->getnic() ?></label>  
                                    </div>



                                </div>                
                                <div class="profile-details row flex-wrap">
                                    <div class="single-row col-12">
                                        <label class="col-2">Email </label>  
                                        <label class="col-10">: <?= $OBJ->getemail() ?></label>  
                                    </div>



                                </div>                
                                <div class="profile-details row flex-wrap">
                                    <div class="single-row col-12">
                                        <label class="col-2">Date of Birth </label>  
                                        <label class="col-10">: <?= $OBJ->getdob() ?></label>  
                                    </div>



                                </div>
                                <div class="profile-details row flex-wrap">
                                    <div class="single-row col-12">
                                        <label class="col-2">Contact No </label>  
                                        <label class="col-10">: <?= $OBJ->getphone() ?></label>  
                                    </div>



                                </div>
                                <?php
                                if ($type == 'Photographer') {
                                    ?>

                                    <!--Photographer Only Field set-->

                                    <div class = "profile-details row flex-wrap">
                                        <div class = "single-row col-12">
                                            <label class = "col-2">Bank No </label>
                                            <label class = "col-10">: <?= $OBJ->getbankName()
                                    ?></label>  
                                        </div>



                                    </div>
                                    <div class="profile-details row flex-wrap">
                                        <div class="single-row col-12">
                                            <label class="col-2">Bank Name </label>  
                                            <label class="col-10">: <?= $OBJ->getbankName() ?></label>  
                                        </div>



                                    </div>
                                    <?php
                                    if ($OBJ->getenrollment_status() == 1) {
                                        $ADMIN = new Admin();
                                        $ADMIN->setId($OBJ->getApproveBy());
                                        $ADMIN->SetAllfromDb();
                                        ?>
                                        <div class="profile-details row flex-wrap">
                                            <div class="single-row col-12">
                                                <label class="col-2">Approved By </label>  
                                                <label class="col-10">: <?= $ADMIN->getName() ?></label>  
                                            </div>



                                        </div>
                                        <?php
                                    }
                                }
                                ?>
                            </div>







                        </div>
                        <div class="col-4">
                            <div class="row">
                                <?php
                                if ($type == 'Photographer') {

                                    if (!empty($OBJ->getimage())) {
                                        ?>
                                        <img src="../image/photographer_p_image/<?= $OBJ->getimage() ?>" width="100%">

                                    <?php } else { ?>

                                        <img src="./image/administrator.jpg" width="100%">
                                        <?php
                                    }
                                } else if ($type == 'Client') {


                                    if (!empty($OBJ->getimage())) {
                                        ?>
                                        <img src="../image/client_p_image/<?= $OBJ->getimage() ?>" width="100%">

                                    <?php } else { ?>

                                        <img src="./image/administrator.jpg" width="100%">


                                        <?php
                                    }
                                }
                                ?>
                            </div>
                            <div class="col-12">
                                <div class="row">
                                    <?php
                                    if ($type == 'Photographer') {

                                        if (!empty($OBJ->getenrollment_status() == 0)) {
                                            ?>
                                            <div class="col-6">
                                                <a href="./post-and-get/enrolll-photographers.php?id=<?= $id ?>&admin=<?=$admin_id?>" onclick="return Enroll();" ><button class="btn-accept-green full-width">Approve</button></a>

                                            </div>
                                            <div class="col-6">
                                                <a href="./post-and-get/delete/dissmiss-photographers.php?id=<?= $id ?>" onclick="return Dissmiss();" > <button class="btn-reject-red full-width">Reject</button>

                                            </div>

                                        <?php } else if ($OBJ->getenrollment_status() == 1) { ?>

                                            <div class="col-12">
                                             <a href="./post-and-get/delete/dissmiss-photographers.php?id=<?= $id ?>" onclick="return Dissmiss();" ><button class="btn-reject-red full-width">Click Here to Ban This Account</button></a>

                                            </div>
                                            <?php
                                        }
                                    } else if ($type == 'Client') {
                                        ?>

                                        <div class="col-12">
                                            <a href="./post-and-get/delete/dissmiss-clients.php?id=<?= $id ?>" onclick="return Dissmiss();" ><button class="btn-reject-red full-width">Click Here to Ban This Account</button></a>

                                        </div>

                                        <?php
                                    }
                                    ?>




                                </div>
                            </div>



                        </div>
                    </div>
                    <?php
                    if ($type == 'Photographer') {
                        ?>
                        <div class="form-title-mini margin-t-30">
                            <label>Portfolio</label>
                        </div>
                        <?php
                        foreach ($PORTFOLIO->getSelectedPhotographerPortfolio($id) as $key => $portfolio) {
                            $key++;
                            ?>
                            <div class="portfolio-container">
                                <div class="row">
                                    <div class="portfolio-title full-width"><?= 'Portfolio-' . $key ?></div>
                                </div>
                                <div class="col-12">
                                    <div class="row flex-wrap ">
                                        <div class="col-1 full-width"></div>
                                        <div class="col-2 margin-portfolio"><a href="../image/portfolio/<?= $portfolio['image1'] ?>"><img src="../image/portfolio/<?= $portfolio['image1'] ?>" width="100%"></a></div>
                                        <div class="col-2 margin-portfolio"> <a href="../image/portfolio/<?= $portfolio['image2'] ?>"><img src="../image/portfolio/<?= $portfolio['image2'] ?>" width="100%"></a></div>
                                        <div class="col-2 margin-portfolio"><a href="../image/portfolio/<?= $portfolio['image3'] ?>"><img src="../image/portfolio/<?= $portfolio['image3'] ?>" width="100%"></a></div>
                                        <div class="col-2 margin-portfolio"><a href="../image/portfolio/<?= $portfolio['image4'] ?>"><img src="../image/portfolio/<?= $portfolio['image4'] ?>" width="100%"></a></div>
                                        <div class="col-2 margin-portfolio"> <a href="../image/portfolio/<?= $portfolio['image5'] ?>"><img src="../image/portfolio/<?= $portfolio['image5'] ?>" width="100%"></a></div>
                                        <div class="col-1 full-width"></div>


                                    </div>
                                </div>
                            </div>
                            <?php
                        }
                    }
                    ?>

                </div>

            </div>

        </div>




        <script src="js/script.js" type="text/javascript"></script>
        <script>
                    function Dissmiss() {
                        var result = confirm("Are You Really Want to Delete?");

                        if (result === true) {
                            return true;
                        } else {
                            return false;
                        }

                    }
                    function Enroll() {
                        var result = confirm("Are You Really Want to Enroll?");

                        if (result === true) {
                            return true;
                        } else {
                            return false;
                        }

                    }
        </script>

    </body>
</html> 
