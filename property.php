<?php
ini_set('session.cache_limiter', 'public');
session_cache_limiter(false);
session_start();
include("config.php");
///code								
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Meta Tags -->
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="description" content="Real Estate PHP">
    <meta name="keywords" content="">
    <meta name="author" content="Unicoder">
    <link rel="shortcut icon" href="images/favicon.ico">

    <!--	Fonts
	========================================================-->
    <link href="https://fonts.googleapis.com/css?family=Muli:400,400i,500,600,700&amp;display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Comfortaa:400,700" rel="stylesheet">

    <!--	Css Link
	========================================================-->
    <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="css/bootstrap-slider.css">
    <link rel="stylesheet" type="text/css" href="css/jquery-ui.css">
    <link rel="stylesheet" type="text/css" href="css/layerslider.css">
    <link rel="stylesheet" type="text/css" href="css/color.css" id="color-change">
    <link rel="stylesheet" type="text/css" href="css/owl.carousel.min.css">
    <link rel="stylesheet" type="text/css" href="css/font-awesome.min.css">
    <link rel="stylesheet" type="text/css" href="fonts/flaticon/flaticon.css">
    <link rel="stylesheet" type="text/css" href="css/style.css">

    <!--	Title
	=========================================================-->
    <title>Real Estate PHP</title>
</head>

<body>



    <div id=" page-wrapper" style="background-color:rgb(230, 250, 250)">
        <div class=" row" style="width:100% !important ; margin:0px !important">
            <!--	Header start  -->
            <?php include("include/header.php"); ?>

            <!--	Property Grid
		===============================================================-->
            <div class="full-row">
                <div style="width:90% !important; margin:0 auto !important">
                    <div class="row">

                        <div style="width:70% !important; margin: 30px auto !important">
                            <div class="row" style="justify-content: space-around !important">

                                <?php
                                $query = mysqli_query($con, "SELECT property.*, user.uname,user.utype,user.uimage FROM `property`,`user` WHERE property.uid=user.uid");
                                while ($row = mysqli_fetch_array($query)) {
                                ?>

                                    <div
                                        style="width:30% !important ; margin: 15px 15px !important; background-color:white !important; border-radius:10px !important;overflow: hidden !important;   box-shadow: 0 4px 15px rgba(0, 0, 0, 0.2) !important">
                                        <div class="featured-thumb hover-zoomer mb-4" style="margin-bottom:0px !important">
                                            <div class="overlay-black overflow-hidden position-relative"
                                                style="height:250px !important; width:calc(100% - 30px) !important; margin:15px auto 0px auto !important; border-radius: 10px 10px 0 0 !important; overflow:hidden !important; ">
                                                <img style="height:100% !important; width:100% !important ; object-fit:cover !important"
                                                    src="admin/property/<?php echo $row['18']; ?>" alt="pimage">

                                                <div class="sale bg-success text-white">For <?php echo $row['5']; ?></div>
                                                <div class="price text-primary text-capitalize">$<?php echo $row['13']; ?> <span
                                                        class="text-white"><?php echo $row['12']; ?> Sqft</span></div>

                                            </div>
                                            <div class="featured-thumb-data" style="height:170px !important;   overflow-y: auto !important;">
                                                <div class="p-4">
                                                    <h5 class="text-secondary hover-text-success mb-2 text-capitalize"><a
                                                            href="propertydetail.php?pid=<?php echo $row['0']; ?>"><?php echo $row['1']; ?></a></h5>
                                                    <span class="location text-capitalize"><i class="fas fa-map-marker-alt text-success"></i>
                                                        <?php echo $row['14']; ?></span>
                                                </div>
                                                <div class="px-4 pb-4 d-inline-block w-100" style="padding-bottom:0px !important">
                                                    <div class="float-left text-capitalize"><i class="fas fa-user text-success mr-1"></i>By :
                                                        <?php echo $row['uname']; ?></div>
                                                    <div class="float-right"><i class="far fa-calendar-alt text-success mr-1"></i>
                                                        <?php echo date('d-m-Y', strtotime($row['date'])); ?></div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                <?php } ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>


            <!--	Footer   start-->
            <?php include("include/footer.php"); ?>
            <!--	Footer   start-->


            <a href="#" class="bg-secondary text-white hover-text-secondary" id="scroll"><i class="fas fa-angle-up"></i></a>

        </div>
    </div>
    <!-- Wrapper End -->

    <!--	Js Link
============================================================-->
    <script src="js/jquery.min.js"></script>
    <!--jQuery Layer Slider -->
    <script src="js/greensock.js"></script>
    <script src="js/layerslider.transitions.js"></script>
    <script src="js/layerslider.kreaturamedia.jquery.js"></script>
    <!--jQuery Layer Slider -->
    <script src="js/popper.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/owl.carousel.min.js"></script>
    <script src="js/tmpl.js"></script>
    <script src="js/jquery.dependClass-0.1.js"></script>
    <script src="js/draggable-0.1.js"></script>
    <script src="js/jquery.slider.js"></script>
    <script src="js/wow.js"></script>
    <script src="js/custom.js"></script>
</body>

</html>