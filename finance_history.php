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
                    <div class="row">
                      <div class="pb-1 pb-md-0 col-md-1 col-4">
                        <h5 style="margin-top: 10px">From Date</h5>
                      </div>
                      <div class="pb-1 pb-md-0 col-md-2 col-8">
                        <input type="date" name="from" class="form-control">
                      </div>
                      <div class="pb-1 pb-md-0 col-md-1 col-4">
                        <h5 style="margin-top: 10px">To Date</h5>
                      </div>
                      <div class="pb-1 pb-md-0 col-md-2 col-8">
                        <input type="date" name="to" class="form-control">
                      </div>
                      <div class="pb-1 pb-md-0 col-md-1 col-4">
                        <h5 style="margin-top: 10px">Category</h5>
                      </div>
                      <div class="pb-1 pb-md-0 col-md-2 col-8">
                        <select class="form-control">
                          <option value=""></option>
                          <option value="Diesel">Diesel</option>
                          <option value="Petrol">Petrol</option>
                        </select>
                      </div>
                      <div class="col-md-3 col-12">
                        <a class="btn btn-primary btn-block" href="#">Generate</a>
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
                                    <table class="table table-hover mb-0">
                                        <thead>
                                            <tr>
                                                <th>Request No</th>
                                                <th class="text-center">Date</th>
                                                <th class="text-center">Category</th>
                                                <th class="text-center">Name</th>
                                                <th class="text-center">Vehicle No</th>
                                                <th class="text-center">Status</th>
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
                <a class="btn btn-info btn-block" href="index">Dashboard</a>
              </div>
              <div class="col-md-2 col-6">
                <a class="btn btn-warning btn-block" href="#">Print</a>
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
                      <select class="form-control" name="type">
                        <option value=""></option>
                        <option value="Diesel">Diesel</option>
                        <option value="Petrol">Petrol</option>
                      </select>
                    </div>
                </div>
            </div>
            <div class="col-12">
                <div class="form-group row">
                    <div class="col-md-3">
                      <span>Category</span>
                    </div>
                    <div class="col-md-9">
                      <select class="form-control" name="category">
                        <option value=""></option>
                        <option value="MFP - Staff - AM & Above">MFP - Staff - AM & Above</option>
                        <option value="MFP - Staff - TM & Staff">MFP - Staff - TM & Staff</option>
                        <option value="MFP - Staff - EX & SE">MFP - Staff - EX & SE</option>
                        <option value="MFP - Van - Transport">MFP - Van - Transport</option>
                        <option value="SBU Transfer">SBU Transfer</option>
                        <option value="Firewqod Lorry">Firewqod Lorry</option>
                        <option value="Contractors & Suppliers">Contractors & Suppliers</option>
                        <option value="MFP - Generators">MFP - Generators</option>
                        <option value="MFP - Vehicles">MFP - Vehicles</option>
                      </select>
                    </div>
                </div>
            </div>
            <div class="col-12">
                <div class="form-group row">
                    <div class="col-md-3">
                      <span>Name</span>
                    </div>
                    <div class="col-md-9">
                      <input type="text" class="form-control" name="name">
                    </div>
                </div>
            </div>
            <div class="col-12">
                <div class="form-group row">
                    <div class="col-md-3">
                      <span>Vehicle Number</span>
                    </div>
                    <div class="col-md-9">
                      <input type="text" class="form-control" name="vehicle_number">
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
                      <input type="number" class="form-control" name="litres">
                    </div>
                </div>
            </div>
            <div class="col-12">
                <div class="form-group row">
                    <div class="col-md-3">
                      <span>SBU</span>
                    </div>
                    <div class="col-md-9">
                      <select class="form-control" name="sbu">
                        <option value="MAS Fabric">MAS Fabric</option>
                      </select>
                    </div>
                </div>
            </div>
            <div class="col-12">
                <div class="form-group row">
                    <div class="col-md-3">
                      <span>Remark</span>
                    </div>
                    <div class="col-md-9">
                      <input type="text" class="form-control" name="remark">
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

    <!-- BEGIN: Page JS-->
    <script src="assets/js/finance_fuel_request.js"></script>
    <!-- END: Page JS-->

  </body>
  <!-- END: Body-->
</html>