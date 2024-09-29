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
    <title>Notifications | Product Approval</title>

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
        </div>
        <div class="content-body">
          <!-- Dashboard Analytics Start -->
          <section id="dashboard-analytics">
            <div class="row avg-sessions">
              <div class="col-lg-2 col-md-2 col-6">
                <a href="#">
                  <div class="card">
                    <div class="card-header d-flex flex-column align-items-middle">
                      <div class="avatar bg-rgba-primary p-50 m-0">
                          <div class="avatar-content">
                            <i class="feather icon-clipboard text-primary font-medium-5"></i>
                          </div>
                      </div>
                      <h2 class="text-bold-700 mt-1 mb-25"><?php echo(mysqli_query($link,"SELECT `id` FROM `fuel_request` WHERE `status` = 'Rejected'")->num_rows); ?></h2>
                      <p class="text-center text-dark">Rejected<br>Requests</p>
                    </div>
                  </div>
                </a>
              </div>
              <div class="col-lg-2 col-md-2 col-6">
                <a href="#">
                  <div class="card">
                    <div class="card-header d-flex flex-column align-items-middle">
                      <div class="avatar bg-rgba-warning p-50 m-0">
                          <div class="avatar-content">
                            <i class="feather icon-users text-warning font-medium-5"></i>
                          </div>
                      </div>
                      <h2 class="text-bold-700 mt-1 mb-25"><?php echo(mysqli_query($link,"SELECT `id` FROM `fuel_request` WHERE `finance_approve` = 'Approved'")->num_rows); ?></h2>
                      <p class="text-center text-dark">Finance<br>Approved Requests</p>
                    </div>
                  </div>
                </a>
              </div>
              <div class="col-lg-2 col-md-2 col-6">
                <a href="#">
                  <div class="card">
                    <div class="card-header d-flex flex-column align-items-middle">
                      <div class="avatar bg-rgba-info p-50 m-0">
                          <div class="avatar-content">
                            <i class="feather icon-users text-info font-medium-5"></i>
                          </div>
                      </div>
                      <h2 class="text-bold-700 mt-1 mb-25"><?php echo(mysqli_query($link,"SELECT `id` FROM `fuel_request` WHERE `status` = 'Approved'")->num_rows); ?></h2>
                      <p class="text-center text-dark">Department Head<br>Approved Requests</p>
                    </div>
                  </div>
                </a>
              </div>
              <div class="col-lg-2 col-md-2 col-6">
                <a href="#">
                  <div class="card">
                    <div class="card-header d-flex flex-column align-items-middle">
                      <div class="avatar bg-rgba-primary p-50 m-0">
                          <div class="avatar-content">
                            <i class="feather icon-users text-primary font-medium-5"></i>
                          </div>
                      </div>
                      <h2 class="text-bold-700 mt-1 mb-25"><?php echo(mysqli_query($link,"SELECT `id` FROM `fuel_request` WHERE `issued_littres` > 0")->num_rows); ?></h2>
                      <p class="text-center text-dark">Issued<br>Fuel Requests</p>
                    </div>
                  </div>
                </a>
              </div>
              <div class="col-lg-2 col-md-2 col-6">
                <a href="history?department_approval=pending">
                  <div class="card">
                    <div class="card-header d-flex flex-column align-items-middle">
                      <div class="avatar bg-rgba-warning p-50 m-0">
                          <div class="avatar-content">
                            <i class="feather icon-users text-warning font-medium-5"></i>
                          </div>
                      </div>
                      <h2 class="text-bold-700 mt-1 mb-25"><?php echo(mysqli_query($link,"SELECT `id` FROM `fuel_request` WHERE `status` = 'Pending'")->num_rows); ?></h2>
                      <p class="text-center text-dark">Pending Department<br>Approval Requests</p>
                    </div>
                  </div>
                </a>
              </div>
              <div class="col-lg-2 col-md-2 col-6">
                <a href="history?issued=pending">
                  <div class="card">
                    <div class="card-header d-flex flex-column align-items-middle">
                      <div class="avatar bg-rgba-info p-50 m-0">
                          <div class="avatar-content">
                            <i class="feather icon-users text-info font-medium-5"></i>
                          </div>
                      </div>
                      <h2 class="text-bold-700 mt-1 mb-25"><?php echo(mysqli_query($link,"SELECT `id` FROM `fuel_request` WHERE `finance_approve` = 'Approved' OR ( `status` = 'Approved' AND ( `category` != 'MFP - Staff - TM & Staff' AND `category` != 'MFP - Staff - EX & SE' AND `category` != 'SBU Transfer' AND `category` != 'Contractors & Suppliers' ))")->num_rows); ?></h2>
                      <p class="text-center text-dark">Pending<br>Issuance</p>
                    </div>
                  </div>
                </a>
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-md-12 col-12">
                <div class="card">
                  <div class="card-content">
                      <div class="card-body">
                          <div class="row pb-50">
                              <div class="col-lg-6 col-12 d-flex justify-content-between flex-column order-lg-1 order-2 mt-lg-0 mt-2">
                                  <div>
                                      <h2 class="text-bold-700 mb-25">Fuel Remaining</h2>
                                      <p class="text-bold-500 mb-75">In the tanks</p>
                                      <p class="text-bold-500 mb-75"><?php date_default_timezone_set("Asia/Colombo"); echo date('Y-m-d h:i a'); ?></p>
                                  </div>
                                </div>
                              <!-- <a href="#" class="btn btn-primary shadow">View Details <i class="feather icon-chevrons-right"></i></a> -->
                              <!-- <div class="col-lg-6 col-12 d-flex justify-content-between flex-column text-right order-lg-2 order-1">
                                  <div class="dropdown chart-dropdown">
                                      <button class="btn btn-sm border-0 dropdown-toggle p-0" type="button" id="dropdownItem5"
                                        data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        Last 7 Days
                                      </button>
                                      <div class="dropdown-menu dropdown-menu-right" aria-labelledby="dropdownItem5">
                                        <a class="dropdown-item" href="#">Last 28 Days</a>
                                        <a class="dropdown-item" href="#">Last Month</a>
                                        <a class="dropdown-item" href="#">Last Year</a>
                                      </div>
                                  </div>
                                  <div id="avg-session-chart"></div>
                              </div> -->
                          </div>
                          <hr/>
                          <div class="row avg-sessions pt-50">
<?php
            $filled_fuel = 0;
            $col=mysqli_query($link,"SELECT `litres` FROM `fuel_stock` WHERE `type`= 'Diesel' AND `tank`= 'Diesel - T1'");
            while($row=mysqli_fetch_array($col)) {

                $filled_fuel = $filled_fuel + $row['litres'];
            }

            $col=mysqli_query($link,"SELECT `issued_littres` FROM `fuel_request` WHERE `type`= 'Diesel' AND `issued_tank`= 'Diesel - T1' AND `id` > 353");
            while($row=mysqli_fetch_array($col)) {

                $filled_fuel = $filled_fuel - $row['issued_littres'];
            }

            $percentage = ($filled_fuel/22000) * 100;
?>
                              <div class="col-md-3 col-12">
                                <h3><b>Diesel <small>( Tank 1 )</small></b></h3>
                                <hr>
                                <h5 class="font-medium-2">
                                    Total :  
                                    <span class="text-warning font-medium-2"><?= number_format(22000) ?></span> <span>L</span>
                                </h5>
                                <h5 class="font-medium-2">
                                    Used :  
                                    <span class="text-primary font-medium-2"><?= number_format($filled_fuel); ?></span> <span>L</span>
                                </h5>
                                <h5 class="font-medium-2">
                                    Available :  
                                    <span class="text-primary font-medium-2"><?= number_format(22000 - $filled_fuel); ?></span> <span>L</span>
                                </h5>
                                <div class="progress progress-bar-danger" style="height: 100px;margin-top: 30px;">
                                  <div class="progress-bar" role="progressbar" aria-valuenow="<?php echo($percentage); ?>" aria-valuemin="<?php echo($percentage); ?>" aria-valuemax="100"
                                    style="width:<?php echo($percentage); ?>%"></div>
                                </div>
                              </div>
<?php
            $filled_fuel = 0;
            $col=mysqli_query($link,"SELECT `litres` FROM `fuel_stock` WHERE `type`= 'Diesel' AND `tank`= 'Diesel - T2'");
            while($row=mysqli_fetch_array($col)) {

                $filled_fuel = $filled_fuel + $row['litres'];
            }

            $col=mysqli_query($link,"SELECT `issued_littres` FROM `fuel_request` WHERE `type`= 'Diesel' AND `issued_tank`= 'Diesel - T2' AND `id` > 353");
            while($row=mysqli_fetch_array($col)) {

                $filled_fuel = $filled_fuel - $row['issued_littres'];
            }

            $percentage = ($filled_fuel/22000) * 100;
?>
                              <div class="col-md-3 col-12">
                                <h3><b>Diesel <small>( Tank 2 )</small></b></h3>
                                <hr>
                                <h5 class="font-medium-2">
                                    Total :  
                                    <span class="text-warning font-medium-2"><?= number_format(22000) ?></span> <span>L</span>
                                </h5>
                                <h5 class="font-medium-2">
                                    Used :  
                                    <span class="text-primary font-medium-2"><?= number_format($filled_fuel); ?></span> <span>L</span>
                                </h5>
                                <h5 class="font-medium-2">
                                    Available :  
                                    <span class="text-primary font-medium-2"><?= number_format(22000 - $filled_fuel); ?></span> <span>L</span>
                                </h5>
                                <div class="progress progress-bar-danger" style="height: 100px;margin-top: 30px;">
                                  <div class="progress-bar" role="progressbar" aria-valuenow="<?php echo($percentage); ?>" aria-valuemin="<?php echo($percentage); ?>" aria-valuemax="100"
                                    style="width:<?php echo($percentage); ?>%"></div>
                                </div>
                              </div>
<?php
            $filled_fuel = 0;
            $col=mysqli_query($link,"SELECT `litres` FROM `fuel_stock` WHERE `type`= 'Diesel' AND `tank`= 'Diesel - T3'");
            while($row=mysqli_fetch_array($col)) {

                $filled_fuel = $filled_fuel + $row['litres'];
            }

            $col=mysqli_query($link,"SELECT `issued_littres` FROM `fuel_request` WHERE `type`= 'Diesel' AND `issued_tank`= 'Diesel - T3' AND `id` > 353");
            while($row=mysqli_fetch_array($col)) {

                $filled_fuel = $filled_fuel - $row['issued_littres'];
            }

            $percentage = ($filled_fuel/18000) * 100;
?>
                              <div class="col-md-3 col-12">
                                <h3><b>Diesel <small>( Tank 3 )</small></b></h3>
                                <hr>
                                <h5 class="font-medium-2">
                                    Total :  
                                    <span class="text-warning font-medium-2"><?= number_format(18000) ?></span> <span>L</span>
                                </h5>
                                <h5 class="font-medium-2">
                                    Used :  
                                    <span class="text-primary font-medium-2"><?= number_format($filled_fuel); ?></span> <span>L</span>
                                </h5>
                                <h5 class="font-medium-2">
                                    Available :  
                                    <span class="text-primary font-medium-2"><?= number_format(18000 - $filled_fuel); ?></span> <span>L</span>
                                </h5>
                                <div class="progress progress-bar-danger" style="height: 100px;margin-top: 30px;">
                                  <div class="progress-bar" role="progressbar" aria-valuenow="<?php echo($percentage); ?>" aria-valuemin="<?php echo($percentage); ?>" aria-valuemax="100"
                                    style="width:<?php echo($percentage); ?>%"></div>
                                </div>
                              </div>
<?php
            $filled_fuel = 0;
            $col=mysqli_query($link,"SELECT `litres` FROM `fuel_stock` WHERE `type`= 'Petrol'");
            while($row=mysqli_fetch_array($col)) {

                $filled_fuel = $filled_fuel + $row['litres'];
            }

            $col=mysqli_query($link,"SELECT `issued_littres` FROM `fuel_request` WHERE `type`= 'Petrol' AND `id` > 353");
            while($row=mysqli_fetch_array($col)) {

                $filled_fuel = $filled_fuel - $row['issued_littres'];
            }

            $percentage = ($filled_fuel/9000) * 100;
?>
                              <div class="col-md-3 col-12">
                                <h3><b>Petrol</b></h3>
                                <hr>
                                <h5 class="font-medium-2">
                                    Total :  
                                    <span class="text-warning font-medium-2"><?= number_format(9000); ?></span> <span>L</span>
                                </h5>
                                <h5 class="font-medium-2">
                                    Used :  
                                    <span class="text-primary font-medium-2"><?= number_format($filled_fuel); ?></span> <span>L</span>
                                </h5>
                                <h5 class="font-medium-2">
                                    Available :  
                                    <span class="text-primary font-medium-2"><?= number_format(9000 - $filled_fuel); ?></span> <span>L</span>
                                </h5>
                                <div class="progress progress-bar-success" style="height: 100px;margin-top: 30px;">
                                  <div class="progress-bar" role="progressbar" aria-valuenow="<?php echo($percentage); ?>" aria-valuemin="<?php echo($percentage); ?>" aria-valuemax="100"
                                    style="width:<?php echo($percentage); ?>%"></div>
                                </div>
                              </div>
                          </div>
                      </div>
                  </div>
                </div>
              </div>
              <div class="col-lg-12 col-12">
                <div class="card">
                  <div class="card-header">
                    <h4 class="card-title">Fuel Matrix</h4>
                  </div>
                  <div class="card-content">
                    <div class="card-body">
                      <ul class="activity-timeline timeline-left list-unstyled">
                        <li>
                          <div class="timeline-icon bg-primary">
                            <i class="feather icon-plus font-medium-2 align-middle"></i>
                          </div>
                          <div class="timeline-info">
                            <p class="font-weight-bold mb-0">Fuel Request</p>
                            <!-- <span class="font-small-3">Vestibulum purus quam scelerisque ut</span> -->
                          </div>
                          <!-- <small class="text-muted">15 days ago</small> -->
                        </li>
                        <li>
                          <div class="timeline-icon bg-warning">
                            <i class="feather icon-alert-circle font-medium-2 align-middle"></i>
                          </div>
                          <div class="timeline-info">
                            <p class="font-weight-bold mb-0">Department Head Approval</p>
                            <!-- <span class="font-small-3">Vestibulum purus quam scelerisque ut</span> -->
                          </div>
                          <!-- <small class="text-muted">15 days ago</small> -->
                        </li>
                        <li>
                          <div class="timeline-icon bg-danger">
                            <i class="feather icon-check font-medium-2 align-middle"></i>
                          </div>
                          <div class="timeline-info">
                            <p class="font-weight-bold mb-0">Finance Admin Approval</p>
                            <!-- <span class="font-small-3">Vestibulum purus quam scelerisque ut</span> -->
                          </div>
                          <!-- <small class="text-muted">20 days ago</small> -->
                        </li>
                        <li>
                          <div class="timeline-icon bg-success">
                            <i class="feather icon-check font-medium-2 align-middle"></i>
                          </div>
                          <div class="timeline-info">
                            <p class="font-weight-bold mb-0">Fuel Station User Issuing Fuel</p>
                            <!-- <span class="font-small-3">Vestibulum purus quam scelerisque ut</span> -->
                          </div>
                          <!-- <small class="text-muted">25 days ago</small> -->
                        </li>
                      </ul>
                    </div>
                  </div>
                </div>
              </div>
              <!-- <div class="col-md-6 col-12">
                <a href="#">
                <div class="card">
                    <div class="card-header d-flex justify-content-between pb-0">
                        <h4 class="card-title">Support Tracker</h4>
                        <div class="dropdown chart-dropdown">
                            <button class="btn btn-sm border-0 dropdown-toggle p-0" type="button" id="dropdownItem4"
                              data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                              Last 7 Days
                            </button>
                            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="dropdownItem4">
                        
                      </div>      <a class="dropdown-item" href="#">Last 28 Days</a>
                            <a class="dropdown-item" href="#">Last Month</a>
                            <a class="dropdown-item" href="#">Last Year</a>
                          </div>
                      </div>
                  </div>
                  <div class="card-content">
                      <div class="card-body pt-0">
                          <div class="row">
                              <div class="col-sm-2 col-12 d-flex flex-column flex-wrap text-center">
                                  <h1 class="font-large-2 text-bold-700 mt-2 mb-0">163</h1>
                                  <small>Tickets</small>
                              </div>
                              <div class="col-sm-10 col-12 d-flex justify-content-center">
                                  <div id="support-tracker-chart"></div>
                              </div>
                          </div>
                          <div class="chart-info d-flex justify-content-between">
                              <div class="text-center">
                                  <p class="mb-50">New Tickets</p>
                                  <span class="font-large-1">29</span>
                              </div>
                              <div class="text-center">
                                  <p class="mb-50">Open Tickets</p>
                                  <span class="font-large-1">63</span>
                              </div>
                              <div class="text-center">
                                  <p class="mb-50">Response Time</p>
                                  <span class="font-large-1">1d</span>
                              </div>
                          </div>
                      </div>
                  </div>
                </div>
              </div> -->
          </div>
          <!-- <div class="row match-height"> -->
              <!-- <div class="col-lg-4 col-12">
                <a href="#">
                <div class="card">
                    <div class="card-header d-flex justify-content-between pb-0">
                        <h4>Product Orders</h4>
                        <div class="dropdown chart-dropdown">
                            <button class="btn btn-sm border-0 dropdown-toggle p-0" type="button" id="dropdownItem2"
                              data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                              Last 7 Days
                            </button>
                            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="dropdownItem2">
                        
                      </div>      <a class="dropdown-item" href="#">Last 28 Days</a>
                            <a class="dropdown-item" href="#">Last Month</a>
                            <a class="dropdown-item" href="#">Last Year</a>
                          </div>
                      </div>
                  </div>
                  <div class="card-content">
                      <div class="card-body">
                          <div id="product-order-chart" class="mb-3"></div>
                          <div class="chart-info d-flex justify-content-between mb-1">
                              <div class="series-info d-flex align-items-center">
                                  <i class="fa fa-circle-o text-bold-700 text-primary"></i>
                                  <span class="text-bold-600 ml-50">Finished</span>
                              </div>
                              <div class="product-result">
                                  <span>23043</span>
                              </div>
                          </div>
                          <div class="chart-info d-flex justify-content-between mb-1">
                              <div class="series-info d-flex align-items-center">
                                  <i class="fa fa-circle-o text-bold-700 text-warning"></i>
                                  <span class="text-bold-600 ml-50">Pending</span>
                              </div>
                              <div class="product-result">
                                  <span>14658</span>
                              </div>
                          </div>
                          <div class="chart-info d-flex justify-content-between mb-75">
                              <div class="series-info d-flex align-items-center">
                                  <i class="fa fa-circle-o text-bold-700 text-danger"></i>
                                  <span class="text-bold-600 ml-50">Rejected</span>
                              </div>
                              <div class="product-result">
                                  <span>4758</span>
                              </div>
                          </div>
                      </div>
                  </div>
                </div>
              </div>
              <div class="col-lg-4 col-12">
                <a href="#">
                <div class="card">
                    <div class="card-header d-flex justify-content-between align-items-start">
                      <div>
                        <h4 class="card-title">Sales Stats</h4>
                        <p class="text-muted mt-25 mb-0">Last 6 months</p>
                      </div>
                        <p class="mb-0"><i class="feather icon-more-vertical font-medium-3 text-muted cursor-pointer"></i></p>
                    </div>
                    <div class="card-content">
                        
                      </div><div class="card-body px-0">
                          <div id="sales-chart"></div>
                      </div>
                  </div>
                </div>
              </div> -->
          <!-- </div> -->
          <!-- <div class="row">
            <div class="col-12">
              <a href="#">
              <div class="card">
                  <div class="card-header">
                    <h4 class="mb-0">Dispatched Orders</h4>
                  </div>
                  <div class="card-content">
                    <div class="table-responsive mt-1">
                      <table class="table table-hover-animation mb-0">
                        <thead>
                          <tr>
                      
                    </div>      <th>ORDER</th>
                          <th>STATUS</th>
                          <th>OPERATORS</th>
                          <th>LOCATION</th>
                          <th>DISTANCE</th>
                          <th>START DATE</th>
                          <th>EST DEL. DT</th>
                        </tr>
                      </thead>
                      <tbody>
                        <tr>
                          <td>#879985</td>
                          <td><i class="fa fa-circle font-small-3 text-success mr-50"></i>Moving</td>
                          <td class="p-1">
                            <ul class="list-unstyled users-list m-0  d-flex align-items-center">
                              <li data-toggle="tooltip" data-popup="tooltip-custom"  data-placement="bottom"
                              data-original-title="Vinnie Mostowy" class="avatar pull-up">
                                <img class="media-object rounded-circle" src="app-assets/images/portrait/small/avatar-s-5.jpg" alt="Avatar" height="30" width="30">
                              </li>
                              <li data-toggle="tooltip" data-popup="tooltip-custom"  data-placement="bottom"
                              data-original-title="Elicia Rieske" class="avatar pull-up">
                                <img class="media-object rounded-circle" src="app-assets/images/portrait/small/avatar-s-7.jpg" alt="Avatar" height="30" width="30">
                              </li>
                              <li data-toggle="tooltip" data-popup="tooltip-custom"  data-placement="bottom"
                              data-original-title="Julee Rossignol" class="avatar pull-up">
                                <img class="media-object rounded-circle" src="app-assets/images/portrait/small/avatar-s-10.jpg" alt="Avatar" height="30" width="30">
                              </li>
                              <li data-toggle="tooltip" data-popup="tooltip-custom"  data-placement="bottom"
                              data-original-title="Darcey Nooner" class="avatar pull-up">
                                <img class="media-object rounded-circle" src="app-assets/images/portrait/small/avatar-s-8.jpg" alt="Avatar" height="30" width="30">
                              </li>
                            </ul>
                          </td>
                          <td>Anniston, Alabama</td>
                          <td>
                            <span>130 km</span>
                            <div class="progress progress-bar-success mt-1 mb-0">
                              <div class="progress-bar" role="progressbar" style="width: 80%" aria-valuenow="80" aria-valuemin="0" aria-valuemax="100"></div>
                            </div>
                          </td>
                          <td>14:58 26/07/2018</td>
                          <td>28/07/2018</td>
                        </tr>
                        <tr>
                          <td>#156897</td>
                          <td><i class="fa fa-circle font-small-3 text-warning mr-50"></i>Pending</td>
                          <td class="p-1">
                            <ul class="list-unstyled users-list m-0  d-flex align-items-center">
                              <li data-toggle="tooltip" data-popup="tooltip-custom"  data-placement="bottom"
                              data-original-title="Trina Lynes" class="avatar pull-up">
                                <img class="media-object rounded-circle" src="app-assets/images/portrait/small/avatar-s-1.jpg" alt="Avatar" height="30" width="30">
                              </li>
                              <li data-toggle="tooltip" data-popup="tooltip-custom"  data-placement="bottom"
                              data-original-title="Lilian Nenez" class="avatar pull-up">
                                <img class="media-object rounded-circle" src="app-assets/images/portrait/small/avatar-s-2.jpg" alt="Avatar" height="30" width="30">
                              </li>
                              <li data-toggle="tooltip" data-popup="tooltip-custom"  data-placement="bottom"
                              data-original-title="Alberto Glotzbach" class="avatar pull-up">
                                <img class="media-object rounded-circle" src="app-assets/images/portrait/small/avatar-s-3.jpg" alt="Avatar" height="30" width="30">
                              </li>
                            </ul>
                          </td>
                          <td>Cordova, Alaska</td>
                          <td>
                            <span>234 km</span>
                            <div class="progress progress-bar-warning mt-1 mb-0">
                              <div class="progress-bar" role="progressbar" style="width: 60%" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100"></div>
                            </div>
                          </td>
                          <td>14:58 26/07/2018</td>
                          <td>28/07/2018</td>
                        </tr>
                        <tr>
                          <td>#568975</td>
                          <td><i class="fa fa-circle font-small-3 text-success mr-50"></i>Moving</td>
                          <td class="p-1">
                            <ul class="list-unstyled users-list m-0  d-flex align-items-center">
                              <li data-toggle="tooltip" data-popup="tooltip-custom"  data-placement="bottom"
                              data-original-title="Lai Lewandowski" class="avatar pull-up">
                                <img class="media-object rounded-circle" src="app-assets/images/portrait/small/avatar-s-6.jpg" alt="Avatar" height="30" width="30">
                              </li>
                              <li data-toggle="tooltip" data-popup="tooltip-custom"  data-placement="bottom"
                              data-original-title="Elicia Rieske" class="avatar pull-up">
                                <img class="media-object rounded-circle" src="app-assets/images/portrait/small/avatar-s-7.jpg" alt="Avatar" height="30" width="30">
                              </li>
                              <li data-toggle="tooltip" data-popup="tooltip-custom"  data-placement="bottom"
                              data-original-title="Darcey Nooner" class="avatar pull-up">
                                <img class="media-object rounded-circle" src="app-assets/images/portrait/small/avatar-s-8.jpg" alt="Avatar" height="30" width="30">
                              </li>
                              <li data-toggle="tooltip" data-popup="tooltip-custom"  data-placement="bottom"
                              data-original-title="Julee Rossignol" class="avatar pull-up">
                                <img class="media-object rounded-circle" src="app-assets/images/portrait/small/avatar-s-10.jpg" alt="Avatar" height="30" width="30">
                              </li>
                              <li data-toggle="tooltip" data-popup="tooltip-custom"  data-placement="bottom"
                              data-original-title="Jeffrey Gerondale" class="avatar pull-up">
                                <img class="media-object rounded-circle" src="app-assets/images/portrait/small/avatar-s-9.jpg" alt="Avatar" height="30" width="30">
                              </li>
                            </ul>
                          </td>
                          <td>Florence, Alabama</td>
                          <td>
                            <span>168 km</span>
                            <div class="progress progress-bar-success mt-1 mb-0">
                              <div class="progress-bar" role="progressbar" style="width: 70%" aria-valuenow="70" aria-valuemin="0" aria-valuemax="100"></div>
                            </div>
                          </td>
                          <td>14:58 26/07/2018</td>
                          <td>28/07/2018</td>
                        </tr>
                        <tr>
                          <td>#245689</td>
                          <td><i class="fa fa-circle font-small-3 text-danger mr-50"></i>Canceled</td>
                          <td class="p-1">
                            <ul class="list-unstyled users-list m-0  d-flex align-items-center">
                              <li data-toggle="tooltip" data-popup="tooltip-custom"  data-placement="bottom"
                              data-original-title="Vinnie Mostowy" class="avatar pull-up">
                                <img class="media-object rounded-circle" src="app-assets/images/portrait/small/avatar-s-5.jpg" alt="Avatar" height="30" width="30">
                              </li>
                              <li data-toggle="tooltip" data-popup="tooltip-custom"  data-placement="bottom"
                              data-original-title="Elicia Rieske" class="avatar pull-up">
                                <img class="media-object rounded-circle" src="app-assets/images/portrait/small/avatar-s-7.jpg" alt="Avatar" height="30" width="30">
                              </li>
                            </ul>
                          </td>
                          <td>Clifton, Arizona</td>
                          <td>
                            <span>125 km</span>
                            <div class="progress progress-bar-danger mt-1 mb-0">
                              <div class="progress-bar" role="progressbar" style="width: 95%" aria-valuenow="95" aria-valuemin="0" aria-valuemax="100"></div>
                            </div>
                          </td>
                          <td>14:58 26/07/2018</td>
                          <td>28/07/2018</td>
                        </tr>
                      </tbody>
                    </table>
                  </div>
                </div>
              </div>
            </div>
          </div> -->
        </section>
        <!-- Dashboard Analytics end -->

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
    <script src="app-assets/vendors/js/extensions/tether.min.js"></script>
    <script src="app-assets/vendors/js/extensions/shepherd.min.js"></script>
    <!-- END: Page Vendor JS-->

    <!-- BEGIN: Theme JS-->
    <script src="app-assets/js/core/app-menu.min.js"></script>
    <script src="app-assets/js/core/app.min.js"></script>
    <script src="app-assets/js/scripts/components.min.js"></script>
    <script src="app-assets/js/scripts/customizer.min.js"></script>
    <script src="app-assets/js/scripts/footer.min.js"></script>
    <!-- END: Theme JS-->

    <!-- BEGIN: Page JS-->
    <!-- <script src="app-assets/js/scripts/pages/dashboard-analytics.min.js"></script> -->
    <!-- END: Page JS-->

  </body>
  <!-- END: Body-->
</html>