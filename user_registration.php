<?php  session_start();

include_once('connection.php');
  
if (isset($_SESSION['project_user_id'])){

  $USERID = $_SESSION['project_user_id'];

  // if ($_SESSION['project_user_type'] != "admin") {
  //   header("location:logout");
  // }

}else{
    header("location:login");
}

?>
<!DOCTYPE html>
<html class="loading" lang="en" data-textdirection="ltr">
  <head>
    <title>User Registration | Product Approval</title>

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
                <h2 class="content-header-title text-center mb-0">User Registration</h2>
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
                              <!-- <h4 class="card-title">User Registration Form</h4> -->
                          </div>
                          <div class="card-content">
                              <div class="card-body">
                                  <form class="form form-horizontal">
                                      <div class="form-body">
                                          <div class="row">
                                              <div class="col-md-6 col-12">
                                                  <div class="form-group row">
                                                      <div class="col-md-4">
                                                        <span>Date</span>
                                                      </div>
                                                      <div class="col-md-8">
                                                        <input type="date" class="form-control" name="date"  value ="<?php date_default_timezone_set("Asia/Colombo"); echo date('Y-m-d') ?>"  readOnly="readOnly">
                                                      </div>
                                                  </div>
                                              </div>
                                              <div class="col-md-6 col-12">
                                                  <div class="form-group row">
                                                      <div class="col-md-4">
                                                        <span>EPF</span>
                                                      </div>
                                                      <div class="col-md-8">
                                                        <input type="text" class="form-control" name="email-id">
                                                      </div>
                                                  </div>
                                              </div>
                                              <div class="col-md-6 col-12">
                                                  <div class="form-group row">
                                                      <div class="col-md-4">
                                                        <span>Created User</span>
                                                      </div>
                                                      <div class="col-md-8">
                                                        <input type="text" class="form-control" name="fname" disabled>
                                                      </div>
                                                  </div>
                                              </div>
                                              <div class="col-md-6 col-12">
                                                  <div class="form-group row">
                                                      <div class="col-md-4">
                                                        <span>Full Name</span>
                                                      </div>
                                                      <div class="col-md-8">
                                                        <input type="text" class="form-control" name="email-id">
                                                      </div>
                                                  </div>
                                              </div>
                                              <div class="col-md-12 col-12">
                                                  <div class="form-group row">
                                                      <div class="col-md-2">
                                                        <span>User Name</span>
                                                      </div>
                                                      <div class="col-md-10">
                                                        <input type="text" class="form-control" name="email-id">
                                                      </div>
                                                  </div>
                                              </div>
                                              <div class="col-md-12 col-12">
                                                  <div class="form-group row">
                                                      <div class="col-md-2">
                                                        <span>SBU</span>
                                                      </div>
                                                      <div class="col-md-10">
                                                        <select class="form-control">
                                                          <option value=""></option>
                                                          <option value="MAS Fabric Park">MAS Fabric Park</option>
                                                        </select>
                                                      </div>
                                                  </div>
                                              </div>
                                              <div class="col-md-12 col-12">
                                                  <div class="form-group row">
                                                      <div class="col-md-2">
                                                        <span>Department</span>
                                                      </div>
                                                      <div class="col-md-10">
                                                        <select class="form-control">
                                                          <option value=""></option>
                                                          <option value="H&E">H&E</option>
                                                          <option value="P&E">P&E</option>
                                                          <option value="L&D">L&D</option>
                                                          <option value="PM">PM</option>
                                                        </select>
                                                      </div>
                                                  </div>
                                              </div>
                                              <div class="col-md-12 col-12">
                                                  <div class="form-group row">
                                                      <div class="col-md-2">
                                                        <span>1st Level Approval</span>
                                                      </div>
                                                      <div class="col-md-10">
                                                        <select class="form-control">
                                                          <option value=""></option>
                                                          <option value="Harsha Deraniyagala">Harsha Deraniyagala</option>
                                                          <option value="Nandana Dissanayake">Nandana Dissanayake</option>
                                                          <option value="Deepal Lokugalappaththi">Deepal Lokugalappaththi</option>
                                                          <option value="Gunanda De Silva">Gunanda De Silva</option>
                                                        </select>
                                                      </div>
                                                  </div>
                                              </div>
                                              <div class="col-md-12 col-12">
                                                  <div class="form-group row">
                                                      <div class="col-md-2">
                                                        <span>2nd Level Approval</span>
                                                      </div>
                                                      <div class="col-md-10">
                                                        <select class="form-control">
                                                          <option value=""></option>
                                                          <option value="Yasantha Perera">Yasantha Perera</option>
                                                          <option value="Geethamali Samarasinghe">Geethamali Samarasinghe</option>
                                                        </select>
                                                      </div>
                                                  </div>
                                              </div>
                                              <div class="col-md-6 col-12">
                                                  <div class="form-group row">
                                                      <div class="col-md-4">
                                                        <span>Password</span>
                                                      </div>
                                                      <div class="col-md-8">
                                                        <input type="password" class="form-control" name="fname">
                                                      </div>
                                                  </div>
                                              </div>
                                              <div class="col-md-6 col-12">
                                                  <div class="form-group row">
                                                      <div class="col-md-4">
                                                        <span>Re-Pasword</span>
                                                      </div>
                                                      <div class="col-md-8">
                                                        <input type="password" class="form-control" name="fname">
                                                      </div>
                                                  </div>
                                              </div>
                                              <div class="col-md-12">
                                                  <button type="submit" class="btn btn-primary mr-1 mb-1 btn-block">Submit</button>
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

    <!-- BEGIN: Vendor JS-->
    <script src="app-assets/vendors/js/vendors.min.js"></script>
    <!-- BEGIN Vendor JS-->

    <!-- BEGIN: Page Vendor JS-->
    <!-- END: Page Vendor JS-->

    <!-- BEGIN: Theme JS-->
    <script src="app-assets/js/core/app-menu.min.js"></script>
    <script src="app-assets/js/core/app.min.js"></script>
    <script src="app-assets/js/scripts/components.min.js"></script>
    <script src="app-assets/js/scripts/customizer.min.js"></script>
    <script src="app-assets/js/scripts/footer.min.js"></script>
    <!-- END: Theme JS-->

    <!-- BEGIN: Page JS-->
    <!-- END: Page JS-->

  </body>
  <!-- END: Body-->
</html>