<?php  session_start();

include_once('connection.php');
  
if (isset($_SESSION['project_user_id'])){

  $USERID = $_SESSION['project_user_id'];

  if ($_SESSION['project_user_type'] != "rnd_head") {
    header("location:index");
  }

}else{
    header("location:login");
}

?>
<!DOCTYPE html>
<html class="loading" lang="en" data-textdirection="ltr">
  <head>
    <title>Allergies | Product Approval</title>

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
                <h2 class="content-header-title text-center mb-0">Allergies</h2>
              </div>
            </div>
          </div>
        </div>
        <div class="content-body">
          <section id="basic-horizontal-layouts">
            <div class="row">
              <div class="col-md-12 col-12">
                  <div class="row justify-content-between mb-2">
                    <div class="col-md-2 col-6"></div>
                    <div class="col-md-2 col-6">
                      <button type="button" class="btn btn-primary btn-block" data-toggle="modal" data-target="#ADD_DATA_MODAL">Add</button>
                    </div>
                  </div>
                  <div class="row" id="table-hover-row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-content">
                                <div class="table-responsive">
                                    <table class="table mb-0">
                                        <thead>
                                            <tr>
                                                <th class="text-center">#</th>
                                                <th class="text-center">Name</th>
                                                <th class="text-center">Warning</th>
                                                <th class="text-center">Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
<?php
        if (mysqli_query($link,"SELECT `id` FROM `allergies` $WHERE_QUERY LIMIT 1")->num_rows > 0) {
?>
      <?php
               include("includes/pagination.php");

               $page = (int) (!isset($_GET["page"]) ? 1 : $_GET["page"]);
               $limit = (int) (!isset($_GET["items"]) ? 10 : $_GET["items"]); //if you want to dispaly 10 records per page then you have to change here
               $startpoint = ($page * $limit) - $limit;
               $statement = "`allergies` ".$WHERE_QUERY; //you have to pass your query over here

               $row_number = ($page*$limit)-$limit+1;

               $col=mysqli_query($link,"SELECT *, DATE(`datetime`) AS `datetime` FROM {$statement} ORDER BY `id` DESC LIMIT {$startpoint} , {$limit}");
               while($row=mysqli_fetch_array($col)){

      ?>
                                          <tr>
                                            <td class="text-center"><?= $row_number ?></td>
                                            <td class="text-center"><?= $row['name'] ?></td>
                                            <td class="text-center"><?= $row['warning'] ?></td>
                                            <td class="NoneDisplay" width="150" style="text-align:center">
                                              <a class="btn btn-sm btn-info EDIT-DATA" style="color:#fff;"><span style="display:none;"><?php echo (json_encode($row)); ?></span><i class="fa fa-pencil-square-o"></i></a>&nbsp;
                                              <a dataid="<?php echo $row["id"]; ?>" class="btn btn-sm btn-danger DELETE-DATA" style="color:#fff;"><i class="fa fa-trash"></i>
                                            </td>
                                          </tr>

      <?php $row_number++; } ?>
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


<div class="modal fade text-start modal-primary" id="ADD_DATA_MODAL" tabindex="-1" style="display: none;" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Add Allergy</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form id="ADD-DATA-FORM">
          <div class="row">
            <div class="col-12">
              <div class="form-group row">
                <div class="col-md-2">
                  <span>Name</span>
                </div>
                <div class="col-md-10">
                  <input type="text" class="form-control" name="name">
                </div>
              </div>
            </div>
            <div class="col-12">
              <div class="form-group row">
                <div class="col-md-2">
                  <span>Warning</span>
                </div>
                <div class="col-md-10">
                  <input type="text" class="form-control" name="warning">
                </div>
              </div>
            </div>
          </div>

          <input type="hidden" name="ADD_DATA" value="1">

        </form>
      </div>

      <div class="modal-footer">
        <button type="button" class="btn btn-primary waves-effect waves-float waves-light btn-block SUBMIT-ADD-DATA" data-bs-dismiss="modal">Submit</button>
      </div>
    </div>
  </div>
</div>

<div class="modal fade text-start modal-primary" id="EDIT_DATA_MODAL" tabindex="-1" style="display: none;" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Edit Allergy</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form id="EDIT-DATA-FORM">
          <div class="row">
            <div class="col-12">
              <div class="form-group row">
                <div class="col-md-2">
                  <span>Name</span>
                </div>
                <div class="col-md-10">
                  <input type="text" class="form-control" name="name">
                </div>
              </div>
            </div>
            <div class="col-12">
              <div class="form-group row">
                <div class="col-md-2">
                  <span>Warning</span>
                </div>
                <div class="col-md-10">
                  <input type="text" class="form-control" name="warning">
                </div>
              </div>
            </div>
          </div>

          <input type="hidden" name="DATA_ID" value="">
          <input type="hidden" name="EDIT_DATA" value="1">

        </form>
      </div>

      <div class="modal-footer">
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
    <script src="assets/js/allergies.js"></script>
    <!-- END: Page JS-->

    <script type="text/javascript">
      function exportReportToExcel() {
        $(".NoneDisplay").remove();
        let table = document.getElementsByTagName("table"); // you can use document.getElementById('tableId') as well by providing id to the table tag
        TableToExcel.convert(table[0], { // html code may contain multiple tables so here we are refering to 1st table tag
          name: `Allergies.xlsx`, // fileName you could use any name
          sheet: {
            name: 'Sheet 1' // sheetName
          }
        });
        setTimeout(function() {
          location.reload();
        }, 500);
      }
    </script>

  </body>
  <!-- END: Body-->
</html>