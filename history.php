<?php  session_start();

include_once('connection.php');
  
if (isset($_SESSION['project_user_id'])){

  $USERID = $_SESSION['project_user_id'];

  // if ($_SESSION['project_user_type'] != "admin") {
  //   header("location:logout");
  // }

  $WHERE_QUERY = '';

  if(isset($_GET["from"]) || isset($_GET["to"]) || isset($_GET["type"]) || isset($_GET["issued"])){ if(empty($WHERE_QUERY)){ $WHERE_QUERY .= "WHERE"; }}
  if(isset($_GET["from"])){if(!empty($_GET["from"])){ if($WHERE_QUERY != 'WHERE'){ $WHERE_QUERY .= " AND"; } $WHERE_QUERY .= " `issued_date` >= '" . $_GET["from"] . "'"; }}
  if(isset($_GET["to"])){ if(!empty($_GET["to"])){ if($WHERE_QUERY != 'WHERE'){ $WHERE_QUERY .= " AND"; } $WHERE_QUERY .= " `issued_date` <= '" . $_GET["to"] . "'"; }}
  if(isset($_GET["class"])){ if(!empty($_GET["class"])){ if($WHERE_QUERY != 'WHERE'){ $WHERE_QUERY .= " AND"; } $WHERE_QUERY .= " `class` = '" . $_GET["class"] . "'"; }}

}else{
    header("location:login");
}

?>
<!DOCTYPE html>
<html class="loading" lang="en" data-textdirection="ltr">
  <head>
    <title>History | Product Approval</title>

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
                <h2 class="content-header-title text-center mb-0">History</h2>
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
            <div class="card">
              <div class="card-content">
                  <div class="card-body">
                    <form action="" method="get">
                      <div class="row">
                        <div class="pb-1 pb-md-0 col-md-1 col-4">
                          <h5 style="margin-top: 10px">From Date</h5>
                        </div>
                        <div class="pb-1 pb-md-0 col-md-2 col-8">
                          <input type="date" name="from" class="form-control" value="<?php if(isset($_GET["from"])){ if(!empty($_GET["from"])){ echo($_GET["from"]); }} ?>">
                        </div>
                        <div class="pb-1 pb-md-0 col-md-1 col-4">
                          <h5 style="margin-top: 10px">To Date</h5>
                        </div>
                        <div class="pb-1 pb-md-0 col-md-2 col-8">
                          <input type="date" name="to" class="form-control" value="<?php if(isset($_GET["to"])){ if(!empty($_GET["to"])){ echo($_GET["to"]); }} ?>">
                        </div>
                        <div class="pb-1 pb-md-0 col-md-1 col-4">
                          <h5 style="margin-top: 10px;">Class</h5>
                        </div>
                        <div class="pb-1 pb-md-0 col-md-2 col-8">
                          <select class="form-control" name="class">
                            <option value=""></option>
      <?php

              $col=mysqli_query($link,"SELECT `name` FROM `product_classes` ORDER BY `name`");
              while($row=mysqli_fetch_array($col)){

              $temp_class = $row['name'];

      ?>
                            <option value="<?= $row['name'] ?>" <?php if(isset($_GET["class"])){ if($_GET["class"]==$temp_class){ echo('selected'); }} ?>><?= $row['name'] ?></option>

      <?php } ?>
                          </select>
                        </div>
                        <div class="col-md-3 col-12">
                          <button type="submit" class="btn btn-primary btn-block">Search</button>
                        </div>
                      </div>
                    </form>
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
                                                <th class="text-center">Request No</th>
                                                <th class="text-center">Requested Date</th>
                                                <th class="text-center">Customer Name</th>
                                                <th class="text-center">Class</th>
                                                <th class="text-center">Gender</th>
                                                <th class="text-center">Required Date</th>
                                                <th class="text-center">RnD<br>Approval</th>
                                                <th class="text-center">QA<br>Approval</th>
                                                <th class="text-center">Finance<br>Approval</th>
                                                <th class="text-center">Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
<?php
        if (mysqli_query($link,"SELECT `id` FROM `psf` $WHERE_QUERY LIMIT 1")->num_rows > 0) {
?>
      <?php
               include("includes/pagination.php");

               $page = (int) (!isset($_GET["page"]) ? 1 : $_GET["page"]);
               $limit = (int) (!isset($_GET["items"]) ? 10 : $_GET["items"]); //if you want to dispaly 10 records per page then you have to change here
               $startpoint = ($page * $limit) - $limit;
               $statement = "`psf` ".$WHERE_QUERY; //you have to pass your query over here

               $col=mysqli_query($link,"SELECT *, DATE(`datetime`) AS `datetime` FROM {$statement} ORDER BY `id` DESC LIMIT {$startpoint} , {$limit}");
               while($row=mysqli_fetch_array($col)){

      ?>
                                          <tr>
                                            <td class="text-center"><?= $row['id'] ?></td>
                                            <td class="text-center"><?= $row['datetime'] ?></td>
                                            <td class="text-center"><?= $row['customer_name'] ?></td>
                                            <td class="text-center"><?= $row['class'] ?></td>
                                            <td class="text-center"><?= $row['gender'] ?></td>
                                            <td class="text-center"><?= $row['required_date'] ?></td>
                                            <td class="text-center"><?= status_check($row['rnd_approve']); ?></td>
                                            <td class="text-center"><?= status_check($row['qa_approve']); ?></td>
                                            <td class="text-center"><?= status_check($row['finance_approve']); ?></td>
                                            <td class="NoneDisplay" width="150" style="text-align:center">
                                              <?php if ($row['rnd_approve'] == 'Pending') { ?>
                                                <a class="btn btn-sm btn-info EDIT-DATA" style="color:#fff;"><span style="display:none;"><?php echo (json_encode($row)); ?></span><i class="fa fa-pencil-square-o"></i></a>&nbsp;
                                              <a dataid="<?php echo $row["id"]; ?>" class="btn btn-sm btn-danger DELETE-DATA" style="color:#fff;"><i class="fa fa-trash"></i>
                                              <?php } ?>
                                            </td>
                                          </tr>

      <?php } ?>
                                        </tbody>
                                    </table>

                                    <div class="pagination-area">
                                       <nav aria-label="Page navigation" style="display: block !important;">
                                          <?php echo pagination($statement,$limit,$page,"history"); ?>
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
            <th class="text-center">Request No</th>
            <th class="text-center">Requested Date</th>
            <th class="text-center">Customer Name</th>
            <th class="text-center">Class</th>
            <th class="text-center">Gender</th>
            <th class="text-center">Required Date</th>
            <th class="text-center">RnD<br>Approval</th>
            <th class="text-center">QA<br>Approval</th>
            <th class="text-center">Finance<br>Approval</th>
          </tr>
        </thead>
        <tbody>
<?php

     $statement = "`psf` ".$WHERE_QUERY; //you have to pass your query over here

     $col=mysqli_query($link,"SELECT *, DATE(`datetime`) AS `datetime` FROM {$statement} ORDER BY `id` DESC");
     while($row=mysqli_fetch_array($col)){
?>
          <tr>
            <td class="text-center"><?= $row['id'] ?></td>
            <td class="text-center"><?= $row['datetime'] ?></td>
            <td class="text-center"><?= $row['customer_name'] ?></td>
            <td class="text-center"><?= $row['class'] ?></td>
            <td class="text-center"><?= $row['gender'] ?></td>
            <td class="text-center"><?= $row['required_date'] ?></td>
            <td class="text-center"><?= status_check($row['rnd_approve']); ?></td>
            <td class="text-center"><?= status_check($row['qa_approve']); ?></td>
            <td class="text-center"><?= status_check($row['finance_approve']); ?></td>
          </tr>

<?php } ?>
        </tbody>
      </table>
    </div>

<div class="modal fade text-start modal-primary" id="EDIT_DATA_MODAL" tabindex="-1" style="display: none;" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Edit PSF</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form id="EDIT-DATA-FORM">
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
                      <input type="text" class="form-control" name="request_number"  disabled>
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
          </div>

          <input type="hidden" name="DATA_ID" value="">
          <input type="hidden" name="EDIT_DATA" value="1">

        </form>
      </div>

      <div class="modal-footer">
        <button type="button" class="btn btn-warning waves-effect waves-float waves-light float-left" onclick="printdiv('EDIT-DATA-FORM');">Print</button>
        <button type="button" class="btn btn-primary waves-effect waves-float waves-light SUBMIT-EDIT-DATA" data-bs-dismiss="modal">Submit</button>
      </div>
    </div>
  </div>
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
    <script src="assets/js/psf.js"></script>
    <!-- END: Page JS-->

    <script>
      function printdiv(elem) {
        var header_str = '<html><head><title>' + document.title  + '</title></head><body>';
        var footer_str = '</body></html>';
        var new_str = document.getElementById(elem).innerHTML;
        var old_str = document.body.innerHTML;
        document.body.innerHTML = header_str + new_str + footer_str;
        window.print();
        document.body.innerHTML = old_str;
        return false;
      }
    </script>
    <script type="text/javascript">
      function exportReportToExcel() {
        let table = document.getElementsByTagName("table"); // you can use document.getElementById('tableId') as well by providing id to the table tag
        TableToExcel.convert(table[1], { // html code may contain multiple tables so here we are refering to 1st table tag
          name: `History of PSF.xlsx`, // fileName you could use any name
          sheet: {
            name: 'Sheet 1' // sheetName
          }
        });
      }
    </script>

  </body>
  <!-- END: Body-->
</html>