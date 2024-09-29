<?php  session_start();

include_once('connection.php');
  
if (isset($_SESSION['project_user_id'])){

  $USERID = $_SESSION['project_user_id'];

  if ($_SESSION['project_user_type'] != "finance_head") {
    header("location:index");
  }

}else{
    header("location:login");
}

?>
<!DOCTYPE html>
<html class="loading" lang="en" data-textdirection="ltr">
  <head>
    <title>Formula Receipts | Product Approval</title>

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
                <h2 class="content-header-title text-center mb-0">Formula Receipts</h2>
              </div>
            </div>
          </div>
        </div>
        <div class="content-body">
          <section id="basic-horizontal-layouts">
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
                                                <th class="text-center">Assigned Person</th>
                                                <th class="text-center">Date</th>
                                                <th class="text-center">Duration</th>
                                                <th class="text-center">FR Status</th>
                                                <th class="text-center">FC Status</th>
                                                <th class="text-center">Marketing Status</th>
                                                <th class="text-center">Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
<?php
        if (mysqli_query($link,"SELECT `id` FROM `fr` WHERE fr.`qa_approve` = 'Approved' LIMIT 1")->num_rows > 0) {
?>
      <?php
              include("includes/pagination.php");

              $page = (int) (!isset($_GET["page"]) ? 1 : $_GET["page"]);
              $limit = (int) (!isset($_GET["items"]) ? 10 : $_GET["items"]); //if you want to dispaly 10 records per page then you have to change here
              $startpoint = ($page * $limit) - $limit;
              $statement = "`fr` LEFT OUTER JOIN `psf` ON psf.`id` = fr.`psf_id` WHERE fr.`qa_approve` = 'Approved' "; //you have to pass your query over here

              $col=mysqli_query($link,"SELECT fr.*,psf.`customer_name`, DATE(fr.`datetime`) AS `datetime` FROM {$statement} ORDER BY `id` DESC LIMIT {$startpoint} , {$limit}");
              while($row=mysqli_fetch_array($col)){

              $TEMP_FR = $row['id'];
              $marketing_approve = "";
              $FC_AVAILABLE = mysqli_query($link,"SELECT `id` FROM `fc` WHERE `fr_id`='$TEMP_FR' LIMIT 1")->num_rows;
              if ($FC_AVAILABLE > 0) {
                $status = '<span class="badge bg-success">Created</span>';

                $FC_COL = mysqli_query($link,"SELECT `marketing_approve` FROM `fc` WHERE `fr_id`='$TEMP_FR' LIMIT 1");
                while($FC_ROW = mysqli_fetch_array($FC_COL)){ $marketing_approve = $FC_ROW['marketing_approve']; }

              }else{
                $status = '<span class="badge bg-warning">Pending</span>';
              }
      ?>
                                          <tr>
                                            <td class="text-center"><?= $row['id'] ?></td>
                                            <td class="text-center"><?= $row['datetime'] ?></td>
                                            <td class="text-center"><?= $row['customer_name'] ?></td>
                                            <td class="text-center"><?= $row['assign_person'] ?></td>
                                            <td class="text-center"><?= $row['assign_date'] ?></td>
                                            <td class="text-center"><?= $row['assign_duration'] ?></td>
                                            <td class="text-center"><?= status_check($row['finance_approve']); ?></td>
                                            <td class="text-center"><?= $status ?></td>
                                            <td class="text-center"><?php if($FC_AVAILABLE > 0){ echo(status_check($marketing_approve)); } ?></td>
                                            <td class="NoneDisplay" width="150" style="text-align:center">
                                              <a class="btn btn-sm btn-info" style="color:#fff;" href="finance_fr?psf=<?= $row['psf_id'] ?>"><i class="fa fa-eye"></i></a>
                                              <?php if ($FC_AVAILABLE > 0) { ?>
                                              <a href="fc?fr=<?= $row['id'] ?>" class="btn btn-sm btn-primary"><i class="fa fa-edit text-white"></i></a>
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

    <script type="text/javascript">
      function exportReportToExcel() {
        let table = document.getElementsByTagName("table"); // you can use document.getElementById('tableId') as well by providing id to the table tag
        TableToExcel.convert(table[1], { // html code may contain multiple tables so here we are refering to 1st table tag
          name: `Formula Receipts.xlsx`, // fileName you could use any name
          sheet: {
            name: 'Sheet 1' // sheetName
          }
        });
      }
    </script>

  </body>
  <!-- END: Body-->
</html>