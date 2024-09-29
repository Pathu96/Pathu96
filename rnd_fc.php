<?php  session_start();

include_once('connection.php');
  
if (isset($_SESSION['project_user_id'])){

  $USERID = $_SESSION['project_user_id'];

  if ($_SESSION['project_user_type'] != "rnd_head") {
    header("location:index");
  }

  if (isset($_GET['fr'])){
    if (!empty($_GET['fr'])){

      $FR_ID = $_GET['fr'];

      $FR_AVAILABLE = mysqli_query($link,"SELECT `id` FROM `fr` WHERE `id`='$FR_ID' LIMIT 1")->num_rows;
      if ($FR_AVAILABLE > 0) {

        $FR_COL = mysqli_query($link,"SELECT * FROM `fr` WHERE `id` = '$FR_ID' LIMIT 1");
        while($FR_ROW = mysqli_fetch_array($FR_COL)){
          extract($FR_ROW);
        }
      }else{
        header("location:finance_fr");
      }

      $PSF_AVAILABLE = mysqli_query($link,"SELECT `id` FROM `psf` WHERE `id`='$psf_id' LIMIT 1")->num_rows;
      if ($PSF_AVAILABLE > 0) {

        $PSF_COL = mysqli_query($link,"SELECT * FROM `psf` WHERE `id` = '$psf_id' LIMIT 1");
        while($PSF_ROW = mysqli_fetch_array($PSF_COL)){
          extract($PSF_ROW);
        }
      }else{
        header("location:finance_fr");
      }

      $FC_AVAILABLE = mysqli_query($link,"SELECT `id` FROM `fc` WHERE `fr_id`='$FR_ID' LIMIT 1")->num_rows;
      if ($FC_AVAILABLE > 0) {

        $FC_COL = mysqli_query($link,"SELECT * FROM `fc` WHERE `fr_id` = '$FR_ID' LIMIT 1");
        while($FC_ROW = mysqli_fetch_array($FC_COL)){
          extract($FC_ROW);
        }
      }
   
    }
  }else{
    header("location:finance_fr");
  }

}else{
    header("location:login");
}

?>

<!DOCTYPE html>
<html class="loading" lang="en" data-textdirection="ltr">
  <head>
    <title>Final Cost | Product Approval</title>

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
                <h2 class="content-header-title text-center mb-0">Final Cost</h2>
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
                                  <form class="form form-horizontal" id="ADD-DATA-FORM">
                                      <div class="form-body">
                                          <div class="row">
                                              <div class="col-12">
                                                <h2>General Details</h2>
                                                <hr class="mb-3">
                                              </div>
                                              <div class="col-6">
                                                  <div class="form-group row">
                                                      <div class="col-md-2">
                                                        <span>Refrence FR</span>
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
                                              <div class="col-12">
                                                  <div class="form-group row justify-content-md-center">
                                                      <div class="col-md-1">
                                                        <span>Sample cost for</span>
                                                      </div>
                                                      <div class="col-md-auto">
                                                        <input type="text" class="form-control" name="sample_value" value="<?php echo($sample_value); ?>" disabled>
                                                      </div>
                                                      <div class="col-md-2">
                                                        <input type="text" class="form-control" name="sample_cost" value="<?php echo($sample_cost); ?>" disabled>
                                                      </div>
                                                  </div>
                                              </div>
                                              <div class="col-12">
                                                  <div class="form-group row justify-content-md-center">
                                                      <div class="col-md-1">
                                                        <span>Final cost for</span>
                                                      </div>
                                                      <div class="col-md-auto">
                                                        <input type="text" class="form-control" name="value_for_cost" value="<?php echo($value_for_cost); ?>" disabled>
                                                      </div>
                                                      <div class="col-md-2">
                                                        <input type="text" class="form-control" name="cost_for_value" value="<?php echo($cost_for_value); ?>" disabled>
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
                                                        <select class="form-control" name="rnd_approve">
                                                          <option value="Pending" <?php if($rnd_approve == "Pending"){ echo("selected"); } ?>>Pending</option>
                                                          <option value="Finalized" <?php if($rnd_approve == "Finalized"){ echo("selected"); } ?>>Finalized</option>
                                                          <option value="Rejected" <?php if($rnd_approve == "Rejected"){ echo("selected"); } ?>>Rejected</option>
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
                                                        <input type="text" class="form-control" name="rnd_remark" value="<?php echo($rnd_remark); ?>">
                                                      </div>
                                                  </div>
                                              </div>

                                              <input type="hidden" name="FC_DATA" value="1">
                                              <!-- <input type="hidden" name="rnd_approve" value="Pending"> -->
                                              <!-- <input type="hidden" name="rnd_remark" value=""> -->
                                              <input type="hidden" name="psf_id" value="<?php echo($psf_id); ?>">
                                              <input type="hidden" name="fr_id" value="<?php echo($FR_ID); ?>">

                                              <div class="col-md-12" id="MESSAGE"></div>

                                              <div class="col-md-12">
                                                  <button type="button" class="btn btn-primary mr-1 mb-1 btn-block SUBMIT-ADD-DATA">Submit</button>
                                                  <a class="btn btn-warning waves-effect waves-float waves-light btn-block" onclick="printdiv('ADD-DATA-FORM');">Print</a>
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
    <script src="assets/js/fc.js"></script>
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
    <?php echo($rnd_approve); if ($rnd_approve == "Finalized") { ?>
      <script>$('#ADD-DATA-FORM *').prop('disabled', true);</script>
    <?php } ?>

  </body>
  <!-- END: Body-->
</html>