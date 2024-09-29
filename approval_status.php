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
    <title>Approval Status | Product Approval</title>

    <!-- Area Start -->   
    <?php include('includes/header.php'); ?>
    <!-- Area End -->

    <!-- Area Start -->   
    <?php include('includes/style.php'); ?>
    <!-- Area End -->

  </head>

  <body class="vertical-layout vertical-menu-modern navbar-floating footer-static" data-open="click" data-menu="vertical-menu-modern" data-col="">

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
                <h2 class="content-header-title text-center mb-0">Approval Status</h2>
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
                                                    <th>Request No</th>
                                                    <th class="text-center">Date</th>
                                                    <th class="text-center">Category</th>
                                                    <th class="text-center">Name</th>
                                                    <th class="text-center">Vehicle No</th>
                                                    <th class="text-center">Department Status</th>
                                                    <th class="text-center">Department Approved By</th>
                                                    <th class="text-center">Department Approved On</th>
                                                    <th class="text-center">Finance Status</th>
                                                    <th class="text-center">Finance Approved By</th>
                                                    <th class="text-center">Finance Approved On</th>
                                                    <th class="text-center">Fuel Issued Status</th>
                                                    <th class="text-center">Fuel Issued By</th>
                                                    <th class="text-center">Issued Quantity</th>
                                                    <th class="text-center">Fuel Issued On</th>
                                                    <th class="text-center">Action</th>
                                                </tr>
                                            </thead>
                                            <tbody id="HTML_DATA"></tbody>
                                        </table>
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

    <div class="modal fade text-start modal-primary" id="EDIT_DATA_MODAL" tabindex="-1" style="display: none;" aria-hidden="true">
      <div class="modal-dialog modal-lg">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title">Edit Fuel Request</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            <form id="EDIT-DATA-FORM">
              <div class="row">
                <div class="col-12">
                    <div class="form-group row">
                        <div class="col-md-3">
                          <span>Request Number</span>
                        </div>
                        <div class="col-md-9">
                          <input type="text" class="form-control" name="request_number" value="" disabled>
                        </div>
                    </div>
                </div>
                <div class="col-12">
                    <div class="form-group row">
                        <div class="col-md-3">
                          <span>Date</span>
                        </div>
                        <div class="col-md-9">
                          <input type="date" class="form-control" name="date" value ="<?php echo date('Y-m-d') ?>" disabled>
                        </div>
                    </div>
                </div>
                <div class="col-12">
                    <div class="form-group row">
                        <div class="col-md-3">
                          <span>Fuel Type</span>
                        </div>
                        <div class="col-md-9">
                          <input type="text" class="form-control" name="type" disabled>
                        </div>
                    </div>
                </div>
                <div class="col-12">
                    <div class="form-group row">
                        <div class="col-md-3">
                          <span>Category</span>
                        </div>
                        <div class="col-md-9">
                          <input type="text" class="form-control" name="category" disabled>
                        </div>
                    </div>
                </div>
                <div class="col-12">
                    <div class="form-group row">
                        <div class="col-md-3">
                          <span>Name</span>
                        </div>
                        <div class="col-md-9">
                          <input type="text" class="form-control" name="name" disabled>
                        </div>
                    </div>
                </div>
                <div class="col-12">
                    <div class="form-group row">
                        <div class="col-md-3">
                          <span>Vehicle Number</span>
                        </div>
                        <div class="col-md-9">
                          <input type="text" class="form-control" name="vehicle_number" disabled>
                        </div>
                    </div>
                </div>
                <div class="col-12">
                    <div class="form-group row">
                        <div class="col-md-3">
                          <span>Department</span>
                        </div>
                        <div class="col-md-9">
                          <input type="text" class="form-control" name="department" value="" disabled>
                        </div>
                    </div>
                </div>
                <div class="col-12">
                    <div class="form-group row">
                        <div class="col-md-3">
                          <span>Litres</span>
                        </div>
                        <div class="col-md-9">
                          <input type="number" class="form-control" name="litres" disabled>
                        </div>
                    </div>
                </div>
                <div class="col-12">
                    <div class="form-group row">
                        <div class="col-md-3">
                          <span>SBU</span>
                        </div>
                        <div class="col-md-9">
                          <input type="text" class="form-control" name="sbu" disabled>
                        </div>
                    </div>
                </div>
                <div class="col-12">
                    <div class="form-group row">
                        <div class="col-md-3">
                          <span>Remark</span>
                        </div>
                        <div class="col-md-9">
                          <input type="text" class="form-control" name="remark" disabled>
                        </div>
                    </div>
                </div>
                <div class="col-12">
                    <div class="form-group row">
                        <div class="col-md-3">
                          <span>EPF Number</span>
                        </div>
                        <div class="col-md-9">
                          <input type="text" class="form-control" name="epf" disabled>
                        </div>
                    </div>
                </div>
                <div class="col-12">
                    <div class="form-group row">
                        <div class="col-md-3">
                          <span>Current meter reading ( km )</span>
                        </div>
                        <div class="col-md-9">
                          <input type="text" class="form-control" name="currentmeter" disabled>
                        </div>
                    </div>
                </div>
                <div class="col-12">
                    <div class="form-group row">
                        <div class="col-md-3">
                          <span>Attachment</span>
                        </div>
                        <div class="col-md-9">
                          <a href="" target="_blank" id="attachment-link">
                            <img src="" id="attachment-image" class="img-fluid mx-auto d-block rounded border img-thumbnail" style="max-height: 100px;">
                          </a>
                        </div>
                    </div>
                </div>
                <div class="col-md-12 col-12">
                <hr>
                    <div class="form-group row">
                        <div class="col-md-12">
                          <span>Department Head Comment</span>
                          <br><br>
                          <input type="text" class="form-control" name="dh_comment" disabled>
                        </div>
                    </div>
                </div>
                <div class="col-md-12 col-12">
                <hr>
                    <div class="form-group row">
                        <div class="col-md-12">
                          <span>Finance Head Comment</span>
                          <br><br>
                          <input type="text" class="form-control" name="fh_comment" disabled>
                        </div>
                    </div>
                </div>
              </div>
              <hr>
              <div class="row">
                <div class="col-md-6 col-12">
                    <div class="form-group row">
                        <div class="col-md-3">
                          <span>Issued Date & Time</span>
                        </div>
                        <div class="col-md-9">
                          <input type="text" class="form-control" name="issued_date" readOnly="readOnly" disabled>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-12">
                    <div class="form-group row">
                        <div class="col-md-3">
                          <span>Issued User</span>
                        </div>
                        <div class="col-md-9">
                          <input type="text" class="form-control" name="issued_by" disabled>
                        </div>
                    </div>
                </div>
                <div class="col-md-12 col-12">
                    <div class="form-group row">
                        <div class="col-md-2">
                          <span>Issued Littres</span>
                        </div>
                        <div class="col-md-10">
                          <input type="number" class="form-control" min="0" name="issued_littres" disabled>
                        </div>
                    </div>
                </div>
              </div>
            </form>
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
    <script src="assets/js/approval_status.js"></script>
    <!-- END: Page JS-->

    <script type="text/javascript">
      function exportReportToExcel() {
        let table = document.getElementsByTagName("table"); // you can use document.getElementById('tableId') as well by providing id to the table tag
        TableToExcel.convert(table[0], { // html code may contain multiple tables so here we are refering to 1st table tag
          name: `Approval Status of MFP Fuel.xlsx`, // fileName you could use any name
          sheet: {
            name: 'Sheet 1' // sheetName
          }
        });
      }
    </script>

  </body>
  <!-- END: Body-->
</html>