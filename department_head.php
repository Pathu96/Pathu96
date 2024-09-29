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
    <title>Department Head | Product Approval</title>

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
                <h2 class="content-header-title float-left mb-0">Department Head</h2>
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
        <div class="content-body"><!-- Statistics card section start -->
<section id="statistics-card">
  <div class="row">
    <!-- <div class="col-xl-6 col-md-6 col-sm-6">
      <a href="">
        <div class="card text-center">
          <div class="card-content">
            <div class="card-body">
              <div class="avatar bg-rgba-info p-50 m-0 mb-1">
                <div class="avatar-content">
                  <i class="feather icon-eye text-info font-medium-5"></i>
                </div>
              </div>
              <h2 class="text-bold-700">36.9k</h2>
              <p class="mb-0 line-ellipsis">Views</p>
            </div>
          </div>
        </a>  
      </div>
    </div> -->
    <div class="col-xl-6 col-md-6 col-sm-6">
      <a href="request_approve">
        <div class="card text-center">
          <div class="card-content">
            <div class="card-body">
              <div class="avatar bg-rgba-warning p-50 m-0 mb-1">
                <div class="avatar-content">
                  <i class="feather icon-clipboard text-warning font-medium-5"></i>
                </div>
              </div>
              <h2 class="text-bold-700">Fuel Request Approval</h2>
              <!-- <p class="mb-0 line-ellipsis">Comments</p> -->
            </div>
          </div>
        </a>  
      </div>
    </div>
    <div class="col-xl-6 col-md-6 col-sm-6">
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
              <!-- <p class="mb-0 line-ellipsis">Orders</p> -->
            </div>
          </div>
        </a>  
      </div>
    </div>
    <div class="col-xl-6 col-md-6 col-sm-6">
      <a href="approval_status">
        <div class="card text-center">
          <div class="card-content">
            <div class="card-body">
                <div class="avatar bg-rgba-primary p-50 m-0 mb-1">
                  <div class="avatar-content">
                      <i class="feather icon-alert-circle text-primary font-medium-5"></i>
                  </div>
                </div>
                <h2 class="text-bold-700">Request Status</h2>
              <!-- <p class="mb-0 line-ellipsis">Bookmarks</p> -->
            </div>
          </div>
        </a>  
      </div>
    </div>
    <div class="col-xl-6 col-md-6 col-sm-6">
      <a href="">
        <div class="card text-center">
          <div class="card-content">
            <div class="card-body">
              <div class="avatar bg-rgba-success p-50 m-0 mb-1">
                <div class="avatar-content">
                  <i class="feather icon-layout text-success font-medium-5"></i>
                </div>
              </div>
              <h2 class="text-bold-700">Dashboard</h2>
              <!-- <p class="mb-0 line-ellipsis">Reviews</p> -->
            </div>
          </div>
        </a>  
      </div>
    </div>
    <!-- <div class="col-xl-6 col-md-6 col-sm-6">
      <a href="">
        <div class="card text-center">
          <div class="card-content">
            <div class="card-body">
              <div class="avatar bg-rgba-danger p-50 m-0 mb-1">
                <div class="avatar-content">
                  <i class="feather icon-truck text-danger font-medium-5"></i>
                </div>
              </div>
              <h2 class="text-bold-700">2.1k</h2>
              <p class="mb-0 line-ellipsis">Returns</p>
            </div>
          </div>
        </a>  
      </div>
    </div> -->
  </div>
  <!-- <div class="row">
      <div class="col-lg-3 col-sm-6 col-12">
          <div class="card">
              <div class="card-header d-flex align-items-start pb-0">
                  <div>
                      <h2 class="text-bold-700 mb-0">86%</h2>
                      <p>CPU Usage</p>
                  </div>
                  <div class="avatar bg-rgba-primary p-50 m-0">
                      <div class="avatar-content">
                          <i class="feather icon-cpu text-primary font-medium-5"></i>
                      </div>
                  </div>
              </div>
          </div>
      </div>
      <div class="col-lg-3 col-sm-6 col-12">
          <div class="card">
              <div class="card-header d-flex align-items-start pb-0">
                  <div>
                      <h2 class="text-bold-700 mb-0">1.2gb</h2>
                      <p>Memory Usage</p>
                  </div>
                  <div class="avatar bg-rgba-success p-50 m-0">
                      <div class="avatar-content">
                          <i class="feather icon-server text-success font-medium-5"></i>
                      </div>
                  </div>
              </div>
          </div>
      </div>
      <div class="col-lg-3 col-sm-6 col-12">
          <div class="card">
              <div class="card-header d-flex align-items-start pb-0">
                  <div>
                      <h2 class="text-bold-700 mb-0">0.1%</h2>
                      <p>Downtime Ratio</p>
                  </div>
                  <div class="avatar bg-rgba-danger p-50 m-0">
                      <div class="avatar-content">
                          <i class="feather icon-activity text-danger font-medium-5"></i>
                      </div>
                  </div>
              </div>
          </div>
      </div>
      <div class="col-lg-3 col-sm-6 col-12">
          <div class="card">
              <div class="card-header d-flex align-items-start pb-0">
                  <div>
                      <h2 class="text-bold-700 mb-0">13</h2>
                      <p>Issues Found</p>
                  </div>
                  <div class="avatar bg-rgba-warning p-50 m-0">
                      <div class="avatar-content">
                          <i class="feather icon-alert-octagon text-warning font-medium-5"></i>
                      </div>
                  </div>
              </div>
          </div>
      </div>
  </div>
  <div class="row">
      <div class="col-lg-3 col-sm-6 col-12">
          <div class="card">
              <div class="card-header d-flex flex-column align-items-start pb-0">
                  <div class="avatar bg-rgba-primary p-50 m-0">
                      <div class="avatar-content">
                          <i class="feather icon-users text-primary font-medium-5"></i>
                      </div>
                  </div>
                  <h2 class="text-bold-700 mt-1">92.6k</h2>
                  <p class="mb-0">Subscribers Gained</p>
              </div>
              <div class="card-content">
                  <div id="line-area-chart-1"></div>
              </div>
          </div>
      </div>
      <div class="col-lg-3 col-sm-6 col-12">
          <div class="card">
              <div class="card-header d-flex flex-column align-items-start pb-0">
                  <div class="avatar bg-rgba-success p-50 m-0">
                      <div class="avatar-content">
                          <i class="feather icon-credit-card text-success font-medium-5"></i>
                      </div>
                  </div>
                  <h2 class="text-bold-700 mt-1">97.5k</h2>
                  <p class="mb-0">Revenue Generated</p>
              </div>
              <div class="card-content">
                  <div id="line-area-chart-2"></div>
              </div>
          </div>
      </div>
      <div class="col-lg-3 col-sm-6 col-12">
          <div class="card">
              <div class="card-header d-flex flex-column align-items-start pb-0">
                  <div class="avatar bg-rgba-danger p-50 m-0">
                      <div class="avatar-content">
                          <i class="feather icon-shopping-cart text-danger font-medium-5"></i>
                      </div>
                  </div>
                  <h2 class="text-bold-700 mt-1">36%</h2>
                  <p class="mb-0">Quarterly Sales</p>
              </div>
              <div class="card-content">
                  <div id="line-area-chart-3"></div>
              </div>
          </div>
      </div>
      <div class="col-lg-3 col-sm-6 col-12">
          <div class="card">
              <div class="card-header d-flex flex-column align-items-start pb-0">
                  <div class="avatar bg-rgba-warning p-50 m-0">
                      <div class="avatar-content">
                          <i class="feather icon-package text-warning font-medium-5"></i>
                      </div>
                  </div>
                  <h2 class="text-bold-700 mt-1">97.5K</h2>
                  <p class="mb-0">Orders Received</p>
              </div>
              <div class="card-content">
                  <div id="line-area-chart-4"></div>
              </div>
          </div>
      </div>
  </div>
  <div class="row">
      <div class="col-lg-4 col-sm-6 col-12">
          <div class="card">
              <div class="card-header d-flex align-items-start pb-0">
                  <div>
                      <h2 class="text-bold-700">78.9k</h2>
                      <p class="mb-0">Site Traffic</p>
                  </div>
                  <div class="avatar bg-rgba-primary p-50">
                      <div class="avatar-content">
                          <i class="feather icon-monitor text-primary font-medium-5"></i>
                      </div>
                  </div>
              </div>
              <div class="card-content">
                  <div id="line-area-chart-5"></div>
              </div>
          </div>
      </div>
      <div class="col-lg-4 col-sm-6 col-12">
          <div class="card">
              <div class="card-header d-flex align-items-start pb-0">
                  <div>
                      <h2 class="text-bold-700">659.8k</h2>
                      <p class="mb-0">Active Users</p>
                  </div>
                  <div class="avatar bg-rgba-success p-50">
                      <div class="avatar-content">
                          <i class="feather icon-user-check text-success font-medium-5"></i>
                      </div>
                  </div>
              </div>
              <div class="card-content">
                  <div id="line-area-chart-6"></div>
              </div>
          </div>
      </div>
      <div class="col-lg-4 col-sm-6 col-12">
          <div class="card">
              <div class="card-header d-flex align-items-start pb-0">
                  <div>
                      <h2 class="text-bold-700">28.7k</h2>
                      <p class="mb-0">Newsletter</p>
                  </div>
                  <div class="avatar bg-rgba-warning p-50">
                      <div class="avatar-content">
                          <i class="feather icon-mail text-warning font-medium-5"></i>
                      </div>
                  </div>
              </div>
              <div class="card-content">
                  <div id="line-area-chart-7"></div>
              </div>
          </div>
      </div>
  </div> -->
</section>
<!-- // Statistics Card section end-->

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