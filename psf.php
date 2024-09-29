<?php  session_start();

include_once('connection.php');
  
if (isset($_SESSION['project_user_id'])){

  $USERID = $_SESSION['project_user_id'];

  // if ($_SESSION['project_user_type'] != "admin") {
  //   header("location:logout");
  // }

  $LAST_ID_DATA = mysqli_query($link,"SELECT MAX(id) AS `id` FROM `psf` LIMIT 1");
  $LAST_ID=mysqli_fetch_array($LAST_ID_DATA);

}else{
    header("location:login");
}

?>
<!DOCTYPE html>
<html class="loading" lang="en" data-textdirection="ltr">
  <head>
    <title>PSF Request | Product Approval</title>

    <!-- Area Start -->   
    <?php include('includes/header.php'); ?>
    <!-- Area End -->

    <!-- Area Start -->   
    <?php include('includes/style.php'); ?>
    <!-- Area End -->

  </head>

  <body class="vertical-layout vertical-menu-modern  navbar-floating footer-static  " data-open="click" data-menu="vertical-menu-modern" data-col="">

    <!-- Area Start -->   
    <?php include('includes/nav.php'); ?>
    <!-- Area End -->

    <!-- Area Start -->   
    <?php include('includes/menu.php'); ?>
    <!-- Area End -->

    <div class="app-content content">
      <div class="content-overlay"></div>
      <div class="header-navbar-shadow"></div>
      <div class="content-wrapper">
        <div class="content-header row">
          <div class="content-header-left col-md-12 col-12 mb-2">
            <div class="row breadcrumbs-top">
              <div class="col-12">
                <h2 class="content-header-title text-center mb-0">Product Specification Form Request</h2>
                <!-- <div class="breadcrumb-wrapper col-12">
                  <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="index">Home</a>
                    </li>
                    <li class="breadcrumb-item"><a href="#">Forms</a>
                    </li>
                    <li class="breadcrumb-item active"><a href="#">Form Layouts</a>
                    </li>
                  </ol>
                </div> -->
              </div>
            </div>
          </div>
          <!-- <div class="content-header-right text-md-right col-md-3 col-12 d-md-block d-none">
            <div class="form-group breadcrum-right">
              <div class="dropdown">
                <button class="btn-icon btn btn-primary btn-round btn-sm dropdown-toggle" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="feather icon-settings"></i></button>
                <div class="dropdown-menu dropdown-menu-right"><a class="dropdown-item" href="#">Chat</a><a class="dropdown-item" href="#">Email</a><a class="dropdown-item" href="#">Calendar</a></div>
              </div>
            </div>
          </div> -->
        </div>
        <div class="content-body">
          <section id="basic-horizontal-layouts">
              <div class="row match-height">
                  <div class="col-md-12 col-12">
                      <div class="card">
                          <div class="card-header">
                              <!-- <h4 class="card-title">PSF Request Form</h4> -->
                          </div>
                          <div class="card-content">
                              <div class="card-body">
                                  <form class="form form-horizontal" id="ADD-DATA-FORM">
                                      <div class="form-body">
                                          <div class="row">
                                              <div class="col-12">
                                                <h2>General Details</h2>
                                                <hr class="mb-3">
                                              </div>
                                              <div class="col-12">
                                                  <div class="form-group row">
                                                      <div class="col-md-2">
                                                        <span>Request Number</span>
                                                      </div>
                                                      <div class="col-md-10">
                                                        <input type="text" class="form-control" name="request_number" value="<?php echo($LAST_ID['id']+1); ?>" disabled>
                                                      </div>
                                                  </div>
                                              </div>
                                              <div class="col-12">
                                                  <div class="form-group row">
                                                      <div class="col-md-2">
                                                        <span>Customer Name</span>
                                                      </div>
                                                      <div class="col-md-10">
                                                        <input type="text" class="form-control" name="customer_name">
                                                      </div>
                                                  </div>
                                              </div>
                                              <div class="col-12">
                                                  <div class="form-group row">
                                                      <div class="col-md-2">
                                                        <span>Address</span>
                                                      </div>
                                                      <div class="col-md-10">
                                                        <textarea class="form-control" name="address" rows="3"></textarea>
                                                      </div>
                                                  </div>
                                              </div>
                                              <div class="col-12">
                                                  <div class="form-group row">
                                                      <div class="col-md-2">
                                                        <span>Phone</span>
                                                      </div>
                                                      <div class="col-md-10">
                                                        <input type="text" class="form-control" name="phone">
                                                      </div>
                                                  </div>
                                              </div>
                                              <div class="col-12">
                                                  <div class="form-group row">
                                                      <div class="col-md-2">
                                                        <span>Email</span>
                                                      </div>
                                                      <div class="col-md-10">
                                                        <input type="text" class="form-control" name="email">
                                                      </div>
                                                  </div>
                                              </div>
                                              <div class="col-12 mt-3">
                                                <h2>Product Details</h2>
                                                <hr class="mb-3">
                                              </div>
                                              <div class="col-12">
                                                  <div class="form-group row">
                                                      <div class="col-md-2">
                                                        <span>Class</span>
                                                      </div>
                                                      <div class="col-md-10">
                                                        <select class="form-control" name="class">
                                                          <option value=""></option>
      <?php

               $col=mysqli_query($link,"SELECT `name` FROM `product_classes` ORDER BY `name`");
               while($row=mysqli_fetch_array($col)){

      ?>
                                          <option value="<?= $row['name'] ?>"><?= $row['name'] ?></option>

      <?php } ?>
                                                        </select>
                                                      </div>
                                                  </div>
                                              </div>
                                              <div class="col-12">
                                                  <div class="form-group row">
                                                      <div class="col-md-2">
                                                        <span>Usage</span>
                                                      </div>
                                                      <div class="col-md-10">
                                                        <textarea class="form-control" name="usage_details" rows="3"></textarea>
                                                      </div>
                                                  </div>
                                              </div>
                                              <div class="col-12">
                                                  <div class="form-group row">
                                                      <div class="col-md-2">
                                                        <span>Age Group</span>
                                                      </div>
                                                      <div class="col-md-10">
                                                        <select class="form-control" name="age_group">
                                                          <option value=""></option>
                                                          <option value="Adults">Adults</option>
                                                          <option value="Kids">Kids</option>
                                                        </select>
                                                      </div>
                                                  </div>
                                              </div>
                                              <div class="col-12">
                                                  <div class="form-group row">
                                                      <div class="col-md-2">
                                                        <span>Gender</span>
                                                      </div>
                                                      <div class="col-md-10">
                                                        <select class="form-control" name="gender">
                                                          <option value=""></option>
                                                          <option value="Unisex">Unisex</option>
                                                          <option value="Male">Male</option>
                                                          <option value="Female">Female</option>
                                                        </select>
                                                      </div>
                                                  </div>
                                              </div>
                                              <div class="col-12">
                                                  <div class="form-group row">
                                                      <div class="col-md-2">
                                                        <span>Ingredients</span>
                                                      </div>
                                                      <div class="col-md-10">
                                                        <textarea class="form-control" name="ingredients" rows="3"></textarea>
                                                      </div>
                                                  </div>
                                              </div>
                                              <div class="col-12">
                                                  <div class="form-group row">
                                                      <div class="col-md-2">
                                                        <span>Other Details</span>
                                                      </div>
                                                      <div class="col-md-10">
                                                        <textarea class="form-control" name="other_details" rows="3"></textarea>
                                                      </div>
                                                  </div>
                                              </div>
                                              <div class="col-12">
                                                  <div class="form-group row">
                                                      <div class="col-md-2">
                                                        <span>Required Date</span>
                                                      </div>
                                                      <div class="col-md-10">
                                                        <input type="date" class="form-control" name="required_date">
                                                      </div>
                                                  </div>
                                              </div>

                                              <input type="hidden" name="ADD_DATA" value="1">

                                              <div class="col-md-12">
                                                  <button type="button" class="btn btn-primary mr-1 mb-1 btn-block ADD-DATA">Submit</button>
                                                  <!-- <button type="reset" class="btn btn-outline-warning mr-1 mb-1">Reset</button> -->
                                              </div>
                                          </div>
                                      </div>
                                  </form>
                              </div>
                          </div>
                      </div>
                  </div>
              </div>
          </section>
        </div>
      </div>
    </div>
    <!-- END: Content-->

    <!-- Area Start -->   
    <?php include('includes/footer.php'); ?>
    <!-- Area End -->

    <script src="app-assets/vendors/js/vendors.min.js"></script>

    <script src="app-assets/vendors/js/charts/apexcharts.min.js"></script>
    <script src="app-assets/vendors/js/extensions/toastr.min.js"></script>

    <script src="app-assets/js/core/app-menu.min.js"></script>
    <script src="app-assets/js/scripts/components.min.js"></script>
    <script src="app-assets/js/core/app.min.js"></script>
    <script src="app-assets/js/scripts/customizer.min.js"></script>

    <script src="app-assets/js/scripts/extensions/ext-component-toastr.min.js"></script>
    <script src="app-assets/js/scripts/modal/components-modal.min.js"></script>

    <!-- BEGIN: Page JS-->
    <script src="assets/js/psf.js"></script>
    <!-- END: Page JS-->

  </body>
  <!-- END: Body-->
</html>