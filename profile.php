<?php
ini_set('session.cache_limiter', 'public');
session_cache_limiter(false);
session_start();
include("config.php");
if (!isset($_SESSION['uemail'])) {
    header("location:login.php");
}

////// code
$error = '';
$msg = '';
if (isset($_POST['insert'])) {
    $name = $_POST['name'];
    $phone = $_POST['phone'];

    $content = $_POST['content'];

    $uid = $_SESSION['uid'];

    if (!empty($name) && !empty($phone) && !empty($content)) {

        $sql = "INSERT INTO feedback (uid,fdescription,status) VALUES ('$uid','$content','0')";
        $result = mysqli_query($con, $sql);
        if ($result) {
            $msg = "<p class='alert alert-success'>Feedback Send Successfully</p> ";
        } else {
            $error = "<p class='alert alert-warning'>Feedback Not Send Successfully</p> ";
        }
    } else {
        $error = "<p class='alert alert-warning'>Please Fill all the fields</p>";
    }
}
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
    <link rel="stylesheet" type="text/css" href="css/color.css">
    <link rel="stylesheet" type="text/css" href="css/owl.carousel.min.css">
    <link rel="stylesheet" type="text/css" href="css/font-awesome.min.css">
    <link rel="stylesheet" type="text/css" href="fonts/flaticon/flaticon.css">
    <link rel="stylesheet" type="text/css" href="css/style.css">
    <link rel="stylesheet" type="text/css" href="css/login.css">

    <!--	Title
	=========================================================-->
    <title>Real Estate PHP</title>
</head>

<body>

    <!--	Page Loader
=============================================================
<div class="page-loader position-fixed z-index-9999 w-100 bg-white vh-100">
	<div class="d-flex justify-content-center y-middle position-relative">
	  <div class="spinner-border" role="status">
		<span class="sr-only">Loading...</span>
	  </div>
	</div>
</div>
-->


    <div id="page-wrapper">
        <div class="row">
            <!--	Header start  -->
            <?php include("include/header.php"); ?>
            <!--	Header end  -->


            <!-- <div class="banner-full-row page-banner" style="background-image:url('images/breadcromb.jpg');">
        <div class="container">
          <div class="row">
            <div style="margin:0px auto !important; text-align:center !important">
              <h2 class="page-name float-left text-white text-uppercase mt-1 mb-0">
                <b>Profile</b>
              </h2>
            </div>
          </div>
        </div>
      </div> -->

            <div class="full-row">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-12">
                            <h2 class="text-secondary double-down-line text-center">Profile</h2>
                        </div>
                    </div>
                    <div class="dashboard-personal-info p-5 bg-white">
                        <form action="#" method="post">
                            <?php echo $msg; ?><?php echo $error; ?>
                            <div class="row">

                        </form>
                        <div class="col-lg-5 col-md-12" style="margin:0 auto !important">
                            <?php
                            $uid = $_SESSION['uid'];
                            $query = mysqli_query($con, "SELECT * FROM `user` WHERE uid='$uid'");
                            while ($row = mysqli_fetch_array($query)) {
                            ?>
                                <div
                                    style="background: linear-gradient(135deg, #ffffff, #f9f9f9); border:1px solid #e6e6e6; border-radius:18px; box-shadow:0 6px 18px rgba(0,0,0,0.12); padding:35px 25px; text-align:center; max-width:420px; margin:auto; transition: all 0.3s ease;">

                                    <!-- Profile Image -->
                                    <img src="admin/user/<?php echo $row['6']; ?>" alt="userimage"
                                        style="width:130px; height:130px; object-fit:cover; border-radius:50%; border:4px solid #4e9eff; box-shadow:0 4px 10px rgba(0,0,0,0.15); transition: transform 0.3s ease;"
                                        onmouseover="this.style.transform='scale(1.05)'" onmouseout="this.style.transform='scale(1)'">

                                    <!-- User Info -->
                                    <div style="margin-top:18px; font-family:'Segoe UI', Arial, sans-serif; color:#2c3e50;">
                                        <div
                                            style="font-size:22px; font-weight:600; text-transform:capitalize; margin-bottom:10px; letter-spacing:0.5px;">
                                            <?php echo $row['1']; ?>
                                        </div>
                                        <div style="font-size:15px; margin-bottom:8px; color:#555;">
                                            <b>Email:</b> <span style="color:#333;"><?php echo $row['2']; ?></span>
                                        </div>
                                        <div style="font-size:15px; margin-bottom:15px; color:#555;">
                                            <b>Contact:</b> <span style="color:#333;"><?php echo $row['3']; ?></span>
                                        </div>
                                    </div>
                                </div>
                            <?php } ?>
                        </div>


                    </div>

                </div>
            </div>
        </div>
        <!--	Submit property   -->


        <!--	Footer   start-->
        <?php include("include/footer.php"); ?>
        <!--	Footer   start-->

        <!-- Scroll to top -->
        <a href="#" class="bg-secondary text-white hover-text-secondary" id="scroll"><i class="fas fa-angle-up"></i></a>
        <!-- End Scroll To top -->
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