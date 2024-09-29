<?php  session_start();

include_once('connection.php');
  
if (isset($_SESSION['project_user_id'])){

  $USERID = $_SESSION['project_user_id'];

  if ($_SESSION['project_user_type'] != "qa_head") {
    header("location:index");
  }

  if (isset($_GET['psf'])){
    if (!empty($_GET['psf'])){

      $PSF_ID = $_GET['psf'];

      $PSF_AVAILABLE = mysqli_query($link,"SELECT `id` FROM `psf` WHERE `id`='$PSF_ID' LIMIT 1")->num_rows;
      if ($PSF_AVAILABLE > 0) {

        $PSF_COL = mysqli_query($link,"SELECT * FROM `psf` WHERE `id` = '$PSF_ID' LIMIT 1");
        while($PSF_ROW = mysqli_fetch_array($PSF_COL)){
          extract($PSF_ROW);
        }
      }else{
        header("location:rnd_psf");
      }

      $FR_AVAILABLE = mysqli_query($link,"SELECT `id` FROM `fr` WHERE `psf_id`='$PSF_ID' LIMIT 1")->num_rows;
      if ($FR_AVAILABLE > 0) {

        $FR_COL = mysqli_query($link,"SELECT * FROM `fr` WHERE `psf_id` = '$PSF_ID' LIMIT 1");
        while($FR_ROW = mysqli_fetch_array($FR_COL)){
          extract($FR_ROW);
        }
      }
   
    }
  }else{
    header("location:rnd_psf");
  }

}else{
    header("location:login");
}

?>
<!DOCTYPE html>
<html class="loading" lang="en" data-textdirection="ltr">
  <head>
    <title>Formular Receipt | Product Approval</title>

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
                <h2 class="content-header-title text-center mb-0">Formular Receipt</h2>
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
                              <!-- <h4 class="card-title">PSF Request Form</h4> -->
                          </div>
                          <div class="card-content">
                              <div class="card-body">
                                  <form class="form form-horizontal" id="DATA-FORM">
                                      <div class="form-body">
                                          <div class="row">
                                              <div class="col-12">
                                                <h2>General Details</h2>
                                                <hr class="mb-3">
                                              </div>
                                              <div class="col-6">
                                                  <div class="form-group row">
                                                      <div class="col-md-2">
                                                        <span>Refrence PSF</span>
                                                      </div>
                                                      <div class="col-md-10">
                                                        <input type="text" class="form-control" value="<?php echo($id); ?>" disabled>
                                                      </div>
                                                  </div>
                                              </div>
                                              <div class="col-6">
                                                  <div class="form-group row">
                                                      <div class="col-md-2">
                                                        <span>Customer</span>
                                                      </div>
                                                      <div class="col-md-10">
                                                        <input type="text" class="form-control" value="<?php echo($customer_name); ?>" disabled>
                                                      </div>
                                                  </div>
                                              </div>
                                              <div class="col-6">
                                                  <div class="form-group row">
                                                      <div class="col-md-2">
                                                        <span>Age Group</span>
                                                      </div>
                                                      <div class="col-md-10">
                                                        <input type="text" class="form-control" value="<?php echo($age_group); ?>" disabled>
                                                      </div>
                                                  </div>
                                              </div>
                                              <div class="col-6">
                                                  <div class="form-group row">
                                                      <div class="col-md-2">
                                                        <span>Ingredients</span>
                                                      </div>
                                                      <div class="col-md-10">
                                                        <input type="text" class="form-control" value="<?php echo($ingredients); ?>" disabled>
                                                      </div>
                                                  </div>
                                              </div>
                                              <div class="col-6">
                                                  <div class="form-group row">
                                                      <div class="col-md-2">
                                                        <span>Usage</span>
                                                      </div>
                                                      <div class="col-md-10">
                                                        <textarea class="form-control" rows="3" disabled><?php echo($usage_details); ?></textarea>
                                                      </div>
                                                  </div>
                                              </div>
                                              <div class="col-6">
                                                  <div class="form-group row">
                                                      <div class="col-md-2">
                                                        <span>Other Details</span>
                                                      </div>
                                                      <div class="col-md-10">
                                                        <textarea class="form-control" rows="3" disabled><?php echo($other_details); ?></textarea>
                                                      </div>
                                                  </div>
                                              </div>
                                              <div class="col-12">
                                                  <hr class="mb-3">
                                              </div>
                                              <div class="col-6">
                                                <div class="row">
                                                  <div class="col-12">
                                                    <h2>Formular</h2>
                                                  </div>
                                                </div>
                                                <hr class="mb-3">

                                                <div class="row">
                                                  <div class="col-12">
                                                    <table class="table table-striped table-sm" id="datatable">
                                                      <thead>
                                                        <tr>
                                                          <th style="width: 5px;">#</th>
                                                          <th>Ingrediant</th>
                                                          <th>Quantity</th>
                                                          <th>UOM</th>
                                                        </tr>
                                                      </thead>
                                                      <tbody>
<?php
        if (mysqli_query($link,"SELECT `id` FROM `fr_ingredients` WHERE `psf_id` = '$PSF_ID' LIMIT 1")->num_rows > 0) {
?>
      <?php

               $row_number =  1;

               $col=mysqli_query($link,"SELECT * FROM `fr_ingredients` WHERE `psf_id` = '$PSF_ID' ORDER BY `id`");
               while($row=mysqli_fetch_array($col)){

      ?>
                                                        <tr>
                                                          <td><?= $row_number ?></td>
                                                          <td><?= $row['name'] ?></td>
                                                          <td><?= $row['quantity'] ?></td>
                                                          <td><?= $row['uom'] ?></td>
                                                        </tr>

      <?php $row_number++; } ?>
                                                      </tbody>
                                                    </table>

<?php }else{ ?>
                                                        <tr>
                                                          <td colspan="99" class="text-center">No Data Found</td>
                                                        </tr>
                                                      </tbody>
                                                    </table>
<?php } ?>
                                                  </div>
                                                </div>
                                              </div>
                                              <div class="col-6">
                                                <h2>Attributes</h2>
                                                <hr class="mb-3">
                                                <div class="row">
                                                  <div class="col-12">
                                                      <div class="form-group row">
                                                          <div class="col-md-2">
                                                            <span>Characters</span>
                                                          </div>
                                                          <div class="col-md-10">
                                                            <span>Value</span>
                                                          </div>
                                                      </div>
                                                  </div>
                                                  <div class="col-12">
                                                      <div class="form-group row">
                                                          <div class="col-md-2">
                                                            <span>PH</span>
                                                          </div>
                                                          <div class="col-md-10">
                                                            <input type="text" class="form-control" name="ph" value="<?php echo($ph); ?>" disabled>
                                                          </div>
                                                      </div>
                                                  </div>
                                                  <div class="col-12">
                                                      <div class="form-group row">
                                                          <div class="col-md-2">
                                                            <span>Vescosity</span>
                                                          </div>
                                                          <div class="col-md-10">
                                                            <input type="text" class="form-control" name="vescosity" value="<?php echo($vescosity); ?>" disabled>
                                                          </div>
                                                      </div>
                                                  </div>
                                                  <div class="col-12">
                                                      <div class="form-group row">
                                                          <div class="col-md-2">
                                                            <span>Color</span>
                                                          </div>
                                                          <div class="col-md-10">
                                                            <input type="color" class="form-control" name="color" value="<?php echo($color); ?>" disabled>
                                                          </div>
                                                      </div>
                                                  </div>
                                                </div>
                                              </div>
                                              <div class="col-12">
                                                  <div class="form-group row">
                                                      <div class="col-md-2">
                                                        <span>Assigned Person Responsible</span>
                                                      </div>
                                                      <div class="col-md-10">
                                                        <input type="text" class="form-control" name="assign_person" value="<?php echo($assign_person); ?>" disabled>
                                                      </div>
                                                  </div>
                                              </div>
                                              <div class="col-12">
                                                  <div class="form-group row">
                                                      <div class="col-md-2">
                                                        <span>Date</span>
                                                      </div>
                                                      <div class="col-md-10">
                                                        <input type="date" class="form-control" name="assign_date" value="<?php echo($assign_date); ?>" disabled>
                                                      </div>
                                                  </div>
                                              </div>
                                              <div class="col-12">
                                                  <div class="form-group row">
                                                      <div class="col-md-2">
                                                        <span>Duration</span>
                                                      </div>
                                                      <div class="col-md-10">
                                                        <input type="text" class="form-control" name="assign_duration" value="<?php echo($assign_duration); ?>" disabled>
                                                      </div>
                                                  </div>
                                              </div>
                                              <div class="col-12">
                                                  <hr class="mb-3">
                                              </div>
                                              <div class="col-12" id="MESSAGE"></div>
                                              <div class="col-12">
                                                  <div class="form-group row">
                                                      <div class="col-md-2">
                                                        <span>Status</span>
                                                      </div>
                                                      <div class="col-md-10">
                                                        <select class="form-control" name="qa_approve">
                                                          <option value="Pending" <?php if($qa_approve == "Pending"){ echo("selected"); } ?>>Pending</option>
                                                          <option value="Approved" <?php if($qa_approve == "Approved"){ echo("selected"); } ?>>Approved</option>
                                                          <option value="Rejected" <?php if($qa_approve == "Rejected"){ echo("selected"); } ?>>Rejected</option>
                                                        </select>
                                                      </div>
                                                  </div>
                                              </div>
                                              <div class="col-12">
                                                  <div class="form-group row">
                                                      <div class="col-md-2">
                                                        <span>Remark</span>
                                                      </div>
                                                      <div class="col-md-10">
                                                        <input type="text" class="form-control" name="qa_remark" value="<?php echo($qa_remark); ?>">
                                                      </div>
                                                  </div>
                                              </div>

                                              <input type="hidden" name="QA_APPROVE" value="1">
                                              <input type="hidden" name="fr_id" value="<?php echo($id); ?>">

                                              <div class="col-md-12">
                                                  <a class="btn btn-warning mr-1 mb-1 btn-block" onclick="printdiv('DATA-FORM');">Print</a>
                                                  <button type="button" class="btn btn-primary mr-1 mb-1 btn-block SUBMIT-DATA">Submit</button>
                                                  <!-- <button type="reset" class="btn btn-outline-warning mr-1 mb-1">Reset</button> -->
                                              </div>
                                          </div>
                                      </div>
                                  </form>
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

    <script src="app-assets/vendors/js/vendors.min.js"></script>

    <script src="app-assets/vendors/js/charts/apexcharts.min.js"></script>
    <script src="app-assets/vendors/js/extensions/toastr.min.js"></script>

    <script src="app-assets/js/core/app-menu.min.js"></script>
    <script src="app-assets/js/scripts/components.min.js"></script>
    <script src="app-assets/js/core/app.min.js"></script>
    <script src="app-assets/js/scripts/customizer.min.js"></script>

    <script src="app-assets/js/scripts/extensions/ext-component-toastr.min.js"></script>
    <script src="app-assets/js/scripts/modal/components-modal.min.js"></script>

    <!-- BEGIN: Page JS-->
    <script src="assets/js/qa_fr.js"></script>
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
    <?php echo($qa_approve); if ($qa_approve == "Approved") { ?>
      <script>$('#DATA-FORM *').prop('disabled', true);</script>
    <?php } ?>

  </body>
  <!-- END: Body-->
</html>