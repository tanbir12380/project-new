<?php
session_start();
require("config.php");
////code

if (!isset($_SESSION['auser'])) {
  header("location:index.php");
}

//// code insert
//// add code
$error = "";
$msg = "";
if (isset($_POST['add'])) {
  $pid = $_REQUEST['id'];

  $title = $_POST['title'];
  $content = $_POST['content'];
  $ptype = $_POST['ptype'];
  $bed = $_POST['bed'];
  $balc = $_POST['balc'];
  $hall = $_POST['hall'];
  $stype = $_POST['stype'];
  $bath = $_POST['bath'];
  $kitc = $_POST['kitc'];
  $price = $_POST['price'];
  $city = $_POST['city'];
  $asize = $_POST['asize'];
  $loc = $_POST['loc'];
  $state = $_POST['state'];
  $status = $_POST['status'];
  $uid = $_POST['uid'];
  $feature = $_POST['feature'];

  $totalfloor = $_POST['totalfl'];


  $aimage = $_FILES['aimage']['name'];
  $aimage1 = $_FILES['aimage1']['name'];
  $aimage2 = $_FILES['aimage2']['name'];
  $aimage3 = $_FILES['aimage3']['name'];
  $aimage4 = $_FILES['aimage4']['name'];

  $fimage = $_FILES['fimage']['name'];
  $fimage1 = $_FILES['fimage1']['name'];
  $fimage2 = $_FILES['fimage2']['name'];

  $temp_name  = $_FILES['aimage']['tmp_name'];
  $temp_name1 = $_FILES['aimage1']['tmp_name'];
  $temp_name2 = $_FILES['aimage2']['tmp_name'];
  $temp_name3 = $_FILES['aimage3']['tmp_name'];
  $temp_name4 = $_FILES['aimage4']['tmp_name'];

  $temp_name5 = $_FILES['fimage']['tmp_name'];
  $temp_name6 = $_FILES['fimage1']['tmp_name'];
  $temp_name7 = $_FILES['fimage2']['tmp_name'];

  move_uploaded_file($temp_name, "property/$aimage");
  move_uploaded_file($temp_name1, "property/$aimage1");
  move_uploaded_file($temp_name2, "property/$aimage2");
  move_uploaded_file($temp_name3, "property/$aimage3");
  move_uploaded_file($temp_name4, "property/$aimage4");

  move_uploaded_file($temp_name5, "property/$fimage");
  move_uploaded_file($temp_name6, "property/$fimage1");
  move_uploaded_file($temp_name7, "property/$fimage2");


  $sql = "UPDATE property SET title= '{$title}', pcontent= '{$content}', type='{$ptype}', stype='{$stype}',
	bedroom='{$bed}', bathroom='{$bath}', balcony='{$balc}', kitchen='{$kitc}', hall='{$hall}', 
	size='{$asize}', price='{$price}', location='{$loc}', city='{$city}', state='{$state}', feature='{$feature}',
	pimage='{$aimage}', pimage1='{$aimage1}', pimage2='{$aimage2}', pimage3='{$aimage3}', pimage4='{$aimage4}',
	uid='{$uid}', status='{$status}', mapimage='{$fimage}', topmapimage='{$fimage1}', groundmapimage='{$fimage2}', 
	totalfloor='{$totalfloor}', WHERE pid = {$pid}";

  $result = mysqli_query($con, $sql);
  if ($result == true) {
    $msg = "<p class='alert alert-success'>Property Updated</p>";
    header("Location:propertyview.php?msg=$msg");
  } else {
    $msg = "<p class='alert alert-warning'>Property Not Updated</p>";
    header("Location:propertyview.php?msg=$msg");
  }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0">
  <title>LM HOMES | Property</title>

  <!-- Favicon -->
  <link rel="shortcut icon" type="image/x-icon" href="assets/img/favicon.png">

  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="assets/css/bootstrap.min.css">

  <!-- Fontawesome CSS -->
  <link rel="stylesheet" href="assets/css/font-awesome.min.css">

  <!-- Feathericon CSS -->
  <link rel="stylesheet" href="assets/css/feathericon.min.css">

  <!-- Main CSS -->
  <link rel="stylesheet" href="assets/css/style.css">

  <!--[if lt IE 9]>
			<script src="assets/js/html5shiv.min.js"></script>
			<script src="assets/js/respond.min.js"></script>
		<![endif]-->
</head>

<body>


  <!-- Header -->
  <?php include("header.php"); ?>
  <!-- /Sidebar -->

  <!-- Page Wrapper -->
  <div class="page-wrapper">
    <div class="content container-fluid">

      <!-- Page Header -->
      <div class="page-header">
        <div class="row">
          <div class="col">
            <h3 class="page-title">Property</h3>
            <ul class="breadcrumb">
              <li class="breadcrumb-item"><a href="dashboard.php">Dashboard</a></li>
              <li class="breadcrumb-item active">Property</li>
            </ul>
          </div>
        </div>
      </div>
      <!-- /Page Header -->

      <div class="row">
        <div class="col-md-12">
          <div class="card">
            <div class="card-header">
              <h4 class="card-title">Update Property Details</h4>
              <?php echo $error; ?>
              <?php echo $msg; ?>
            </div>
            <form method="post" enctype="multipart/form-data">

              <?php

              $pid = $_REQUEST['id'];
              $query = mysqli_query($con, "select * from property where pid='$pid'");
              while ($row = mysqli_fetch_row($query)) {
              ?>


                <div class="card-body">
                  <h5 class="text-secondary">Basic Information</h5>
                  <hr>

                  <div class="row">
                    <div class="col-xl-12">
                      <div class="form-group row">
                        <label class="col-lg-2 col-form-label">Title</label>
                        <div class="col-lg-9">
                          <input type="text" class="form-control" name="title" required placeholder="Enter Title">
                        </div>
                      </div>
                      <div class="form-group row">
                        <label class="col-lg-2 col-form-label">Content</label>
                        <div class="col-lg-9">
                          <textarea class=" form-control" name="content" rows="10" cols="30"></textarea>
                        </div>
                      </div>

                    </div>
                    <div class="col-xl-6">
                      <div class="form-group row">
                        <label class="col-lg-3 col-form-label">Property Type</label>
                        <div class="col-lg-9">
                          <select class="form-control" required name="ptype">
                            <option value="">Select Type</option>
                            <option value="apartment">Apartment</option>
                            <option value="flat">Flat</option>
                            <option value="building">Building</option>
                            <option value="house">House</option>
                            <option value="villa">Villa</option>
                            <option value="office">Office</option>
                          </select>
                        </div>
                      </div>
                      <div class="form-group row">
                        <label class="col-lg-3 col-form-label">Selling Type</label>
                        <div class="col-lg-9">
                          <select class="form-control" required name="stype">
                            <option value="">Select Status</option>
                            <option value="rent">Rent</option>
                            <option value="sale">Sale</option>
                          </select>
                        </div>
                      </div>
                      <div class="form-group row">
                        <label class="col-lg-3 col-form-label">Bathroom</label>
                        <div class="col-lg-9">
                          <input type="text" class="form-control" name="bath" required placeholder="Enter Bathroom">
                        </div>
                      </div>
                      <div class="form-group row">
                        <label class="col-lg-3 col-form-label">Kitchen</label>
                        <div class="col-lg-9">
                          <input type="text" class="form-control" name="kitc" required placeholder="Enter Kitchen">
                        </div>
                      </div>

                    </div>
                    <div class="col-xl-6">

                      <div class="form-group row">
                        <label class="col-lg-3 col-form-label">Bedroom</label>
                        <div class="col-lg-9">
                          <input type="text" class="form-control" name="bed" required placeholder="Enter Bedroom ">
                        </div>
                      </div>
                      <div class="form-group row">
                        <label class="col-lg-3 col-form-label">Balcony</label>
                        <div class="col-lg-9">
                          <input type="text" class="form-control" name="balc" required placeholder="Enter Balcony ">
                        </div>
                      </div>
                      <div class="form-group row">
                        <label class="col-lg-3 col-form-label">Hall</label>
                        <div class="col-lg-9">
                          <input type="text" class="form-control" name="hall" required placeholder="Enter Hall ">
                        </div>
                      </div>

                    </div>
                  </div>
                  <h5 class="text-secondary">Price & Location</h5>
                  <hr>
                  <div class="row">
                    <div class="col-xl-6">
                      <div class="form-group row">
                        <label class="col-lg-3 col-form-label">Price</label>
                        <div class="col-lg-9">
                          <input type="text" class="form-control" name="price" required placeholder="Enter Price">
                        </div>
                      </div>
                      <div class="form-group row">
                        <label class="col-lg-3 col-form-label">City</label>
                        <div class="col-lg-9">
                          <input type="text" class="form-control" name="city" required placeholder="Enter City">
                        </div>
                      </div>
                      <div class="form-group row">
                        <label class="col-lg-3 col-form-label">State</label>
                        <div class="col-lg-9">
                          <input type="text" class="form-control" name="state" required placeholder="Enter State">
                        </div>
                      </div>
                    </div>
                    <div class="col-xl-6">
                      <div class="form-group row">
                        <label class="col-lg-3 col-form-label">Total Floor</label>
                        <div class="col-lg-9">
                          <input type="text" class="form-control" name="totalfl" required
                            placeholder="Enter number of floor">
                        </div>
                      </div>
                      <div class="form-group row">
                        <label class="col-lg-3 col-form-label">Area Size</label>
                        <div class="col-lg-9">
                          <input type="text" class="form-control" name="asize" required
                            placeholder="Enter Area Size (in sqrt)">
                        </div>
                      </div>
                      <div class="form-group row">
                        <label class="col-lg-3 col-form-label">Address</label>
                        <div class="col-lg-9">
                          <input type="text" class="form-control" name="loc" required placeholder="Enter Address">
                        </div>
                      </div>

                    </div>
                  </div>

                  <div class="form-group row">
                    <label class="col-lg-2 col-form-label">Feature</label>
                    <div class="col-lg-9">
                      <p class="alert alert-danger">* Important Please Do Not Remove Below Content Only Change <b>Yes</b>
                        Or <b>No</b> or Details and Do Not Add More Details</p>

                      <textarea class="tinymce form-control" name="feature" rows="10" cols="30">
												<!---feature area start--->
												<div class="col-md-4">
														<ul>
														<li class="mb-3"><span class="text-secondary font-weight-bold">Property Age : </span>10 Years</li>
														<li class="mb-3"><span class="text-secondary font-weight-bold">Swiming Pool : </span>Yes</li>
														<li class="mb-3"><span class="text-secondary font-weight-bold">Parking : </span>Yes</li>
														<li class="mb-3"><span class="text-secondary font-weight-bold">GYM : </span>Yes</li>
														</ul>
													</div>
													<div class="col-md-4">
														<ul>
														<li class="mb-3"><span class="text-secondary font-weight-bold">Type : </span>Apartment</li>
														<li class="mb-3"><span class="text-secondary font-weight-bold">Security : </span>Yes</li>
														<li class="mb-3"><span class="text-secondary font-weight-bold">Dining Capacity : </span>10 People</li>
														<li class="mb-3"><span class="text-secondary font-weight-bold">Church/Temple  : </span>No</li>
														
														</ul>
													</div>
													<div class="col-md-4">
														<ul>
														<li class="mb-3"><span class="text-secondary font-weight-bold">3rd Party : </span>No</li>
														<li class="mb-3"><span class="text-secondary font-weight-bold">Elevator : </span>Yes</li>
														<li class="mb-3"><span class="text-secondary font-weight-bold">CCTV : </span>Yes</li>
														<li class="mb-3"><span class="text-secondary font-weight-bold">Water Supply : </span>Ground Water / Tank</li>
														</ul>
													</div>
												<!---feature area end---->
											</textarea>
                    </div>
                  </div>

                  <h5 class="text-secondary">Image & Status</h5>
                  <hr>
                  <div class="row">
                    <div class="col-xl-6">

                      <div class="form-group row">
                        <label class="col-lg-3 col-form-label">Image1</label>
                        <div class="col-lg-9">
                          <input class="form-control" name="aimage" type="file" required="">
                        </div>
                      </div>
                      <div class="form-group row">
                        <label class="col-lg-3 col-form-label">Image 3</label>
                        <div class="col-lg-9">
                          <input class="form-control" name="aimage2" type="file" required="">
                        </div>
                      </div>
                      <div class="form-group row">
                        <label class="col-lg-3 col-form-label">Image 5</label>
                        <div class="col-lg-9">
                          <input class="form-control" name="aimage4" type="file" required="">
                        </div>
                      </div>
                      <div class="form-group row">
                        <label class="col-lg-3 col-form-label">Basement Floor Plan Image</label>
                        <div class="col-lg-9">
                          <input class="form-control" name="fimage1" type="file">
                        </div>
                      </div>
                      <div class="form-group row">
                        <label class="col-lg-3 col-form-label">Status</label>
                        <div class="col-lg-9">
                          <select class="form-control" required name="status">
                            <option value="">Select Status</option>
                            <option value="available">Available</option>
                            <option value="sold out">Sold Out</option>
                          </select>
                        </div>
                      </div>

                    </div>
                    <div class="col-xl-6">

                      <div class="form-group row">
                        <label class="col-lg-3 col-form-label">Image 2</label>
                        <div class="col-lg-9">
                          <input class="form-control" name="aimage1" type="file" required="">
                        </div>
                      </div>
                      <div class="form-group row">
                        <label class="col-lg-3 col-form-label">image 4</label>
                        <div class="col-lg-9">
                          <input class="form-control" name="aimage3" type="file" required="">
                        </div>
                      </div>

                      <div class="form-group row">
                        <label class="col-lg-3 col-form-label">Floor Plan Image</label>
                        <div class="col-lg-9">
                          <input class="form-control" name="fimage" type="file">
                        </div>
                      </div>
                      <div class="form-group row">
                        <label class="col-lg-3 col-form-label">Ground Floor Plan Image</label>
                        <div class="col-lg-9">
                          <input class="form-control" name="fimage2" type="file">
                        </div>
                      </div>
                    </div>
                  </div>

                  <hr>

                  <div class="row">

                    <div class="col-md-6">
                    </div>
                  </div>


                  <div style="width:100%; text-align:center">
                    <input type="submit" value="Submit Property" class="btn btn-info" name="add"
                      style="border-radius:10px; background-color:green ; border:0px !important">
                  </div>

                </div>

            </form>

          <?php
              }
          ?>

          </div>
        </div>
      </div>

    </div>
  </div>
  <!-- /Main Wrapper -->


  <!-- jQuery -->
  <script src="assets/js/jquery-3.2.1.min.js"></script>
  <script src="assets/plugins/tinymce/tinymce.min.js"></script>
  <script src="assets/plugins/tinymce/init-tinymce.min.js"></script>
  <!-- Bootstrap Core JS -->
  <script src="assets/js/popper.min.js"></script>
  <script src="assets/js/bootstrap.min.js"></script>

  <!-- Slimscroll JS -->
  <script src="assets/plugins/slimscroll/jquery.slimscroll.min.js"></script>

  <!-- Custom JS -->
  <script src="assets/js/script.js"></script>

</body>

</html>