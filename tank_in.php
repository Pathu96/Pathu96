<?php  session_start();

include_once('connection.php');
  
if (isset($_SESSION['project_user_id'])){

  $USERID = $_SESSION['project_user_id'];

  // if ($_SESSION['project_user_type'] != "admin") {
  //   header("location:logout");
  // }

  $WHERE_QUERY = '';

}else{
    header("location:login");
}

?>
<!DOCTYPE html>
<html class="loading" lang="en" data-textdirection="ltr">
  <head>
    <title>Tank In | Product Approval</title>

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
              <div class="col-md-12 col-12">
                <h2 class="content-header-title text-center mb-0">Tank In</h2>
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
                              <!-- <h4 class="card-title">Tank In Form</h4> -->
                          </div>
                          <div class="card-content">
                              <div class="card-body">
                                  <form class="form form-horizontal" id="ADD-DATA-FORM">
                                      <div class="form-body">
                                          <div class="row">
                                              <div class="col-md-6 col-12">
                                                  <div class="form-group row">
                                                      <div class="col-md-4">
                                                        <span>Date & Time<small class="text-danger">*</small></span>
                                                      </div>
                                                      <div class="col-md-8">
                                                        <input type="datetime-local" class="form-control" name="date">
                                                      </div>
                                                  </div>
                                              </div>
                                              <div class="col-md-6 col-12">
                                                  <div class="form-group row">
                                                      <div class="col-md-4">
                                                        <span>User <small class="text-danger">*</small></span>
                                                      </div>
                                                      <div class="col-md-8">
                                                        <input type="text" class="form-control" name="user"  value ="<?php echo($_SESSION['project_user_name']); ?>"  readOnly="readOnly">
                                                      </div>
                                                  </div>
                                              </div>
                                              <div class="col-md-12 col-12">
                                                  <div class="form-group row">
                                                      <div class="col-md-2">
                                                        <span>Fuel Type <small class="text-danger">*</small></span>
                                                      </div>
                                                      <div class="col-md-10">
                                                        <select class="form-control" name="type">
                                                          <option value=""></option>
                                                          <option value="Diesel">Diesel</option>
                                                          <option value="Petrol">Petrol</option>
                                                        </select>
                                                      </div>
                                                  </div>
                                              </div>
                                              <div class="col-md-12 col-12">
                                                  <div class="form-group row">
                                                      <div class="col-md-2">
                                                        <span>Tank <small class="text-danger">*</small></span>
                                                      </div>
                                                      <div class="col-md-10">
                                                        <select class="form-control" name="tank">
                                                          <option value=""></option>
                                                          <option value="Diesel - T1">Diesel - T1 ( Remaining Litres =  )</option>
                                                          <option value="Diesel - T2">Diesel - T2 ( Remaining Litres =  )</option>
                                                          <option value="Diesel - T3">Diesel - T3 ( Remaining Litres =  )</option>
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
?>
                                                          <option value="Petrol - T1">Petrol - T1 ( Remaining = <?php echo(9000 - $filled_fuel); ?> Litres )</option>
                                                        </select>
                                                      </div>
                                                  </div>
                                              </div>
                                              <div class="col-md-12 col-12">
                                                  <div class="form-group row">
                                                      <div class="col-md-2">
                                                        <span>Litres <small class="text-danger">*</small></span>
                                                      </div>
                                                      <div class="col-md-10">
                                                        <input type="number" class="form-control" name="litres">
                                                      </div>
                                                  </div>
                                              </div>

                                              <input type="hidden" name="ADD_DATA" value="1">

                                              <div class="col-md-12">
                                                  <button type="button" class="btn btn-primary mr-1 mb-1 btn-block ADD-DATA">Submit</button>
                                              </div>
                                          </div>
                                      </div>
                                  </form>
                              </div>
                          </div>
                      </div>
                  </div>
              </div>
            <div class="row">
              <div class="col-md-12 col-12">
                  <div class="row" id="table-hover-row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-content">
                                <div class="table-responsive">
                                    <table class="table mb-0">
                                        <thead>
                                            <tr>
                                                <th class="text-center">No</th>
                                                <th class="text-center">Date & Time</th>
                                                <th class="text-center">User</th>
                                                <th class="text-center">Type</th>
                                                <th class="text-center">Tank</th>
                                                <th class="text-center">Litres</th>
                                            </tr>
                                        </thead>
                                        <tbody>
<?php
        if (mysqli_query($link,"SELECT `id` FROM `fuel_stock` $WHERE_QUERY LIMIT 1")->num_rows > 0) {
?>
      <?php
               include("includes/pagination.php");

               $page = (int) (!isset($_GET["page"]) ? 1 : $_GET["page"]);
               $limit = (int) (!isset($_GET["items"]) ? 10 : $_GET["items"]); //if you want to dispaly 10 records per page then you have to change here
               $startpoint = ($page * $limit) - $limit;
               $statement = "`fuel_stock` ".$WHERE_QUERY; //you have to pass your query over here

               $col=mysqli_query($link,"SELECT * FROM {$statement} {$SORT} LIMIT {$startpoint} , {$limit}");
               while($row=mysqli_fetch_array($col)){
      ?>
                                          <tr>
                                            <td class="text-center"><?= $row['id'] ?></td>
                                            <td class="text-center"><?php if (strpos($row['date'], 'T') !== false){ echo(date_format(date_create($row['date']),"Y-m-d h:i A")); }else{ echo($row['date']); }?></td>
                                            <td class="text-center"><?= $row['user'] ?></td>
                                            <td class="text-center"><?= $row['type'] ?></td>
                                            <td class="text-center"><?= $row['tank'] ?></td>
                                            <td class="text-center"><?= $row['litres'] ?></td>
                                          </tr>

              <?php } ?>
                                        </tbody>
                                    </table>

                                    <div class="pagination-area">
                                       <nav aria-label="Page navigation" style="display: block !important;">
                                          <?php echo pagination($statement,$limit,$page,"tank_in"); ?>
                                       </nav>
                                    </div>
<?php }else{ ?>
                                          <tr>
                                            <td colspan="99" class="text-center">No Results Found</td>
                                          </tr>
                                        </tbody>
                                    </table>
<?php } ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
              </div>
            </div>
            <div class="row justify-content-between">
              <div class="col-md-2 col-6">
                <a class="btn btn-info btn-block" href="dashboard">Dashboard</a>
              </div>
              <div class="col-md-2 col-6">
                <button class="btn btn-warning btn-block" id="btnExport" onclick="exportReportToExcel(this)">Export to Excel</button>
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

    <div class="d-none">
      <table class="table mb-0">
        <thead>
          <tr>
            <th class="text-center">No</th>
            <th class="text-center">Date & Time</th>
            <th class="text-center">User</th>
            <th class="text-center">Type</th>
            <th class="text-center">Tank</th>
            <th class="text-center">Litres</th>
          </tr>
        </thead>
        <tbody>
<?php
$statement = "`fuel_stock` ".$WHERE_QUERY; //you have to pass your query over here

$col=mysqli_query($link,"SELECT * FROM {$statement}");
while($row=mysqli_fetch_array($col)){
?>
          <tr>
            <td class="text-center"><?= $row['id'] ?></td>
            <td class="text-center"><?php if (strpos($row['date'], 'T') !== false){ echo(date_format(date_create($row['date']),"Y-m-d h:i A")); }else{ echo($row['date']); }?></td>
            <td class="text-center"><?= $row['user'] ?></td>
            <td class="text-center"><?= $row['type'] ?></td>
            <td class="text-center"><?= $row['tank'] ?></td>
            <td class="text-center"><?= $row['litres'] ?></td>
          </tr>

<?php } ?>
        </tbody>
      </table>
    </div>

    <script src="app-assets/vendors/js/vendors.min.js"></script>

    <script src="app-assets/vendors/js/charts/apexcharts.min.js"></script>
    <script src="app-assets/vendors/js/extensions/toastr.min.js"></script>

    <script src="app-assets/js/core/app-menu.min.js"></script>
    <script src="app-assets/js/scripts/components.min.js"></script>
    <script src="app-assets/js/core/app.min.js"></script>
    <script src="app-assets/js/scripts/customizer.min.js"></script>

    <script src="app-assets/js/scripts/extensions/ext-component-toastr.min.js"></script>
    <script src="https://cdn.jsdelivr.net/gh/linways/table-to-excel@v1.0.4/dist/tableToExcel.js"></script>

    <!-- BEGIN: Page JS-->
    <script src="assets/js/tank_in.js"></script>
    <!-- END: Page JS-->

    <script type="text/javascript">
      function exportReportToExcel() {
        let table = document.getElementsByTagName("table"); // you can use document.getElementById('tableId') as well by providing id to the table tag
        TableToExcel.convert(table[1], { // html code may contain multiple tables so here we are refering to 1st table tag
          name: `History of Tank In.xlsx`, // fileName you could use any name
          sheet: {
            name: 'Sheet 1' // sheetName
          }
        });
      }
    </script>

  </body>
  <!-- END: Body-->
</html>