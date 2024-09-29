<?php  session_start();

include_once('connection.php');
  
if (isset($_SESSION['project_user_id'])){

  $USERID = $_SESSION['project_user_id'];

  if ($_SESSION['project_user_type'] != "qa_head") {
    header("location:index");
  }

}else{
    header("location:login");
}

?>
<!DOCTYPE html>
<html class="loading" lang="en" data-textdirection="ltr">
  <head>
    <title>QA Head | Product Approval</title>

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
          <div class="content-header-left col-md-9 col-12 mb-2">
            <div class="row breadcrumbs-top">
              <div class="col-12">
                <h2 class="content-header-title float-left mb-0">QA Head</h2>
                <!-- <div class="breadcrumb-wrapper col-12">
                  <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="index">Home</a>
                    </li>
                    <li class="breadcrumb-item"><a href="#">Cards</a>
                    </li>
                    <li class="breadcrumb-item active">Statistics Cards
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
          <section id="statistics-card">
            <div class="row">
              <div class="col-xl-6 col-md-6 col-sm-6">
                <a href="single_hazzards">
                  <div class="card text-center">
                    <div class="card-content">
                      <div class="card-body">
                        <div class="avatar bg-rgba-warning p-50 m-0 mb-1">
                          <div class="avatar-content">
                            <i class="feather icon-clipboard text-warning font-medium-5"></i>
                          </div>
                        </div>
                        <h2 class="text-bold-700">Single Hazzards</h2>
                      </div>
                    </div>
                  </div>
                </a>
              </div>
              <div class="col-xl-6 col-md-6 col-sm-6">
                <a href="combination_hazzards">
                  <div class="card text-center">
                    <div class="card-content">
                      <div class="card-body">
                          <div class="avatar bg-rgba-primary p-50 m-0 mb-1">
                            <div class="avatar-content">
                                <i class="feather icon-alert-circle text-primary font-medium-5"></i>
                            </div>
                          </div>
                          <h2 class="text-bold-700">Combination Hazzards</h2>
                      </div>
                    </div>
                  </div>
                </a>
              </div>
              <!-- <div class="col-xl-6 col-md-6 col-sm-6">
                <a href="history">
                  <div class="card text-center">
                    <div class="card-content">
                      <div class="card-body">
                        <div class="avatar bg-rgba-danger p-50 m-0 mb-1">
                          <div class="avatar-content">
                            <i class="feather icon-clock text-danger font-medium-5"></i>
                          </div>
                        </div>
                        <h2 class="text-bold-700">History</h2>
                      </div>
                    </div>
                  </div>
                </a>
              </div> -->
              <!-- <div class="col-xl-6 col-md-6 col-sm-6">
                <a href="#">
                  <div class="card text-center">
                    <div class="card-content">
                      <div class="card-body">
                        <div class="avatar bg-rgba-success p-50 m-0 mb-1">
                          <div class="avatar-content">
                            <i class="feather icon-award text-success font-medium-5"></i>
                          </div>
                        </div>
                        <h2 class="text-bold-700">Reports</h2>
                      </div>
                    </div>
                  </div>
                </a>
              </div> -->
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
    <script src="app-assets/vendors/js/charts/apexcharts.min.js"></script>
    <!-- END: Page Vendor JS-->

    <!-- BEGIN: Theme JS-->
    <script src="app-assets/js/core/app-menu.min.js"></script>
    <script src="app-assets/js/core/app.min.js"></script>
    <script src="app-assets/js/scripts/components.min.js"></script>
    <script src="app-assets/js/scripts/customizer.min.js"></script>
    <script src="app-assets/js/scripts/footer.min.js"></script>
    <!-- END: Theme JS-->

    <!-- BEGIN: Page JS-->
    <script src="app-assets/js/scripts/cards/card-statistics.min.js"></script>
    <!-- END: Page JS-->

  </body>
  <!-- END: Body-->
</html>