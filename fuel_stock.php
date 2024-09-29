<?php  session_start();

include_once('connection.php');
  
if (isset($_SESSION['project_user_id'])){

    $USERID = $_SESSION['project_user_id'];

    // if ($_SESSION['project_user_type'] != "admin") {
    //   header("location:logout");
    // }

    // $LISTING_AVAILABLE = mysqli_query($link,"SELECT `id` FROM `fuel_stock` WHERE `id`='$LISTING_ID' LIMIT 1")->num_rows;

    // $col=mysqli_query($link,"SELECT * FROM `fuel_stock` WHERE `id` = '$LISTING_ID' LIMIT 1");
    // while($row = mysqli_fetch_array($col)){ extract($row); }

}else{
    header("location:login");
}

?>
<!DOCTYPE html>
<html class="loading" lang="en" data-textdirection="ltr">
  <head>
    <title>Fuel Stock | Product Approval</title>

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
                <h2 class="content-header-title text-center mb-0">Fuel Stock ( <?php date_default_timezone_set("Asia/Colombo"); echo date('Y-m-d h:i a'); ?> )</h2>
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
                      <div class="row" id="table-hover-row">
                        <div class="col-12">
                            <div class="card">
                                <div class="card-content">
                                    <div class="table-responsive">
                                        <table class="table table-hover mb-0">
                                            <thead>
                                                <tr>
                                                    <th class="text-center" colspan="10"><h3>Diesel</h3></th>
                                                </tr>
                                                <tr>
                                                    <th>Tank</th>
                                                    <th>Total capacity</th>
                                                    <th>Used capacity</th>
                                                    <th>Available capacity</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr>
                                                    <th scope="row">Tank 1</th>
                                                    <td>22 000</td>
<?php
            $filled_fuel = 0;
            $col=mysqli_query($link,"SELECT `litres` FROM `fuel_stock` WHERE `type`= 'Diesel' AND `tank` = 'Diesel - T1'");
            while($row=mysqli_fetch_array($col)) {

                $filled_fuel = $filled_fuel + $row['litres'];
            }

            $col=mysqli_query($link,"SELECT `issued_littres` FROM `fuel_request` WHERE `type`= 'Diesel' AND `issued_tank`= 'Diesel - T1' AND `id` > 353");
            while($row=mysqli_fetch_array($col)) {

                $filled_fuel = $filled_fuel - $row['issued_littres'];
            }
?>
                                                    <td><?php echo($filled_fuel); ?></td>
                                                    <td><?php echo(22000 - $filled_fuel); ?></td>
                                                </tr>
                                                <tr>
                                                    <th scope="row">Tank 2</th>
                                                    <td>22 000</td>
<?php
            $filled_fuel = 0;
            $col=mysqli_query($link,"SELECT `litres` FROM `fuel_stock` WHERE `type`= 'Diesel' AND `tank` = 'Diesel - T2'");
            while($row=mysqli_fetch_array($col)) {

                $filled_fuel = $filled_fuel + $row['litres'];
            }

            $col=mysqli_query($link,"SELECT `issued_littres` FROM `fuel_request` WHERE `type`= 'Diesel' AND `issued_tank`= 'Diesel - T2' AND `id` > 353");
            while($row=mysqli_fetch_array($col)) {

                $filled_fuel = $filled_fuel - $row['issued_littres'];
            }
?>
                                                    <td><?php echo($filled_fuel); ?></td>
                                                    <td><?php echo(22000 - $filled_fuel); ?></td>
                                                </tr>
                                                <tr>
                                                    <th scope="row">Tank 3</th>
                                                    <td>18 000</td>
<?php
            $filled_fuel = 0;
            $col=mysqli_query($link,"SELECT `litres` FROM `fuel_stock` WHERE `type`= 'Diesel' AND `tank` = 'Diesel - T3'");
            while($row=mysqli_fetch_array($col)) {

                $filled_fuel = $filled_fuel + $row['litres'];
            }

            $col=mysqli_query($link,"SELECT `issued_littres` FROM `fuel_request` WHERE `type`= 'Diesel' AND `issued_tank`= 'Diesel - T3' AND `id` > 353");
            while($row=mysqli_fetch_array($col)) {

                $filled_fuel = $filled_fuel - $row['issued_littres'];
            }
?>
                                                    <td><?php echo($filled_fuel); ?></td>
                                                    <td><?php echo(18000 - $filled_fuel); ?></td>
                                                </tr>
                                                <tr style="background-color: #bfd0ff4a;">
                                                    <th scope="row">Total</th>
                                                    <th>62000</th>
<?php
            $filled_fuel = 0;
            $col=mysqli_query($link,"SELECT `litres` FROM `fuel_stock` WHERE `type`= 'Diesel'");
            while($row=mysqli_fetch_array($col)) {

                $filled_fuel = $filled_fuel + $row['litres'];
            }

            $col=mysqli_query($link,"SELECT `issued_littres` FROM `fuel_request` WHERE `type`= 'Diesel' AND `id` > 353");
            while($row=mysqli_fetch_array($col)) {

                $filled_fuel = $filled_fuel - $row['issued_littres'];
            }
?>
                                                    <th><?php echo($filled_fuel); ?></th>
                                                    <th><?php echo(62000 - $filled_fuel); ?></th>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                            <div class="card">
                                <div class="card-content">
                                    <div class="table-responsive">
                                        <table class="table table-hover mb-0">
                                            <thead>
                                                <tr>
                                                    <th class="text-center" colspan="10"><h3>Petrol</h3></th>
                                                </tr>
                                                <tr>
                                                    <th>Tank</th>
                                                    <th>Total capacity</th>
                                                    <th>Used capacity</th>
                                                    <th>Available capacity</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr>
                                                    <th scope="row">Tank 1</th>
                                                    <td>9 000</td>
<?php
            $filled_fuel = 0;
            $col=mysqli_query($link,"SELECT `litres` FROM `fuel_stock` WHERE `type`= 'Petrol' AND `tank` = 'Petrol - T1'");
            while($row=mysqli_fetch_array($col)) {

                $filled_fuel = $filled_fuel + $row['litres'];
            }
?>
                                                    <td><?php echo($filled_fuel); ?></td>
                                                    <td><?php echo(9000 - $filled_fuel); ?></td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
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