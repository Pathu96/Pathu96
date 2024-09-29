<?php  session_start();

include_once('connection.php');
  
if (isset($_SESSION['project_user_id'])){

  $USERID = $_SESSION['project_user_id'];

  // if ($_SESSION['project_user_type'] != "admin") {
  //   header("location:logout");
  // }

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
                                                  <div class="col-6">
                                                    <h2>Formular</h2>
                                                  </div>
                                                  <div class="col-6">
                                                    <button type="button" class="btn btn-success float-right btn-sm ml-1">AI</button>
                                                    <button type="button" class="btn btn-primary float-right btn-sm ml-1" data-toggle="modal" data-target="#ADD_DATA_MODAL">+</button>
                                                    <button type="button" class="btn btn-info float-right btn-sm ml-1" data-toggle="modal" data-target="#IMPORT_DATA_MODAL">Import</button>
                                                  </div>
                                                </div>
                                                <hr class="mb-3">

                                                <div id="MESSAGE"></div>

                                                <div class="row">
                                                  <div class="col-12">
                                                    <table class="table table-striped table-sm" id="datatable">
                                                      <thead>
                                                        <tr>
                                                          <th style="width: 5px;">#</th>
                                                          <th>Ingrediant</th>
                                                          <th>Quantity</th>
                                                          <th>UOM</th>
                                                          <th class="NoneDisplay" width="150">Action</th>
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
                                                          <td class="NoneDisplay" width="150" style="text-align:center">
                                                            <a class="btn btn-sm btn-info EDIT-DATA" style="color:#fff;"><span style="display:none;"><?php echo (json_encode($row)); ?></span><i class="fa fa-pencil-square-o"></i></a>&nbsp;
                                                            <a deleteid="<?php echo $row["id"]; ?>" class="btn btn-sm btn-danger DELETE-DATA" style="color:#fff;"><i class="fa fa-trash"></i>
                                                          </td>
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
                                                            <input type="text" class="form-control" name="ph" value="<?php if($ph){ echo($ph); }?>">
                                                          </div>
                                                      </div>
                                                  </div>
                                                  <div class="col-12">
                                                      <div class="form-group row">
                                                          <div class="col-md-2">
                                                            <span>Vescosity</span>
                                                          </div>
                                                          <div class="col-md-10">
                                                            <input type="text" class="form-control" name="vescosity" value="<?php if($vescosity){ echo($vescosity); } ?>">
                                                          </div>
                                                      </div>
                                                  </div>
                                                  <div class="col-12">
                                                      <div class="form-group row">
                                                          <div class="col-md-2">
                                                            <span>Color</span>
                                                          </div>
                                                          <div class="col-md-10">
                                                            <input type="color" class="form-control" name="color" value="<?php if($color){ echo($color); } ?>">
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
                                                        <input type="text" class="form-control" name="assign_person" value="<?php if($assign_person){ echo($assign_person); } ?>">
                                                      </div>
                                                  </div>
                                              </div>
                                              <div class="col-12">
                                                  <div class="form-group row">
                                                      <div class="col-md-2">
                                                        <span>Date</span>
                                                      </div>
                                                      <div class="col-md-10">
                                                        <input type="date" class="form-control" name="assign_date" value="<?php if($assign_date){ echo($assign_date); } ?>">
                                                      </div>
                                                  </div>
                                              </div>
                                              <div class="col-12">
                                                  <div class="form-group row">
                                                      <div class="col-md-2">
                                                        <span>Duration</span>
                                                      </div>
                                                      <div class="col-md-10">
                                                        <input type="text" class="form-control" name="assign_duration" value="<?php if($assign_duration){ echo($assign_duration); } ?>">
                                                      </div>
                                                  </div>
                                              </div>

                                          <?php if($qa_remark){ ?>

                                              <div class="col-12">
                                                  <hr class="mb-3">
                                              </div>
                                              <div class="col-12">
                                                  <div class="form-group row">
                                                      <div class="col-md-2">
                                                        <span>QA Remark</span>
                                                      </div>
                                                      <div class="col-md-10">
                                                        <input type="text" class="form-control" value="<?php echo($qa_remark); ?>">
                                                      </div>
                                                  </div>
                                              </div>

                                          <?php } ?>

                                          <?php if($finance_remark){ ?>

                                              <div class="col-12">
                                                  <hr class="mb-3">
                                              </div>
                                              <div class="col-12">
                                                  <div class="form-group row">
                                                      <div class="col-md-2">
                                                        <span>Finance Remark</span>
                                                      </div>
                                                      <div class="col-md-10">
                                                        <input type="text" class="form-control" value="<?php echo($finance_remark); ?>">
                                                      </div>
                                                  </div>
                                              </div>

                                          <?php } ?>

                                              <input type="hidden" name="finance_approve" value="Pending">
                                              <input type="hidden" name="finance_remark" value="">

                                              <input type="hidden" name="ADD_DATA" value="1">
                                              <input type="hidden" name="qa_approve" value="Pending">
                                              <input type="hidden" name="qa_remark" value="">
                                              <input type="hidden" name="psf_id" value="<?php echo($PSF_ID); ?>">

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


<div class="modal fade text-start modal-primary" id="ADD_DATA_MODAL" tabindex="-1" style="display: none;" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Add Ingrediant</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form id="ADD-INGREDIANT-DATA-FORM">

          <div id="ADD_MESSAGE"></div>

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
                  <span>Quantity</span>
                </div>
                <div class="col-md-10">
                  <input type="text" class="form-control" name="quantity">
                </div>
              </div>
            </div>
            <div class="col-12">
              <div class="form-group row">
                <div class="col-md-2">
                  <span>Unit of Measure</span>
                </div>
                <div class="col-md-10">
                  <input type="text" class="form-control" name="uom">
                </div>
              </div>
            </div>
          </div>

          <input type="hidden" name="ADD_DATA" value="1">
          <input type="hidden" name="PSF_ID" value="<?php echo($PSF_ID); ?>">

        </form>
      </div>

      <div class="modal-footer">
        <button type="button" class="btn btn-primary waves-effect waves-float waves-light btn-block SUBMIT-INGREDIANT-ADD-DATA" data-bs-dismiss="modal">Submit</button>
      </div>
    </div>
  </div>
</div>

<div class="modal fade text-start modal-primary" id="EDIT_DATA_MODAL" tabindex="-1" style="display: none;" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Edit Ingrediant</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form id="EDIT-INGREDIANT-DATA-FORM">

        <div id="EDIT_MESSAGE"></div>

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
                  <span>Quantity</span>
                </div>
                <div class="col-md-10">
                  <input type="text" class="form-control" name="quantity">
                </div>
              </div>
            </div>
            <div class="col-12">
              <div class="form-group row">
                <div class="col-md-2">
                  <span>Unit of Measure</span>
                </div>
                <div class="col-md-10">
                  <input type="text" class="form-control" name="uom">
                </div>
              </div>
            </div>
          </div>

          <input type="hidden" name="DATA_ID" value="">
          <input type="hidden" name="EDIT_DATA" value="1">
          <input type="hidden" name="PSF_ID" value="<?php echo($PSF_ID); ?>">

        </form>
      </div>

      <div class="modal-footer">
        <button type="button" class="btn btn-primary waves-effect waves-float waves-light SUBMIT-INGREDIANT-EDIT-DATA" data-bs-dismiss="modal">Submit</button>
      </div>
    </div>
  </div>
</div>

<div class="modal fade text-start modal-primary" id="IMPORT_DATA_MODAL" tabindex="-1" style="display: none;" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Import Formular</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form id="IMPORTANT-DATA">

          <div id="ADD_MESSAGE"></div>

          <div class="row">
            <div class="col-12">
              <div class="form-group row">
                <div class="col-md-2">
                  <span>Ingrediants</span>
                </div>
                <div class="col-md-10">
                  <select class="form-control" name="import_psf_id">
                    <option value="">Select Ingrediant</option>
      <?php
               $row_number =  1;

               $col=mysqli_query($link,"SELECT DISTINCT(fri.`psf_id`) FROM `fr_ingredients` AS fri JOIN `fc` ON fri.`psf_id` = fc.`psf_id` WHERE fc.`rnd_approve` = 'Finalized'");
               while($row=mysqli_fetch_array($col)){

              $TEMP_PSF_ID = $row['psf_id'];
              $TEMP_OPTION_NAME = '';

              $FRI_COL = mysqli_query($link,"SELECT * FROM `fr_ingredients` WHERE `psf_id` = '$TEMP_PSF_ID'");
              while($FRI_ROW = mysqli_fetch_array($FRI_COL)){
                if ($TEMP_OPTION_NAME != '') { $TEMP_OPTION_NAME .= ' | '; }
                $TEMP_OPTION_NAME .= $FRI_ROW['name'].' x '.$FRI_ROW['quantity'].''.$FRI_ROW['uom'];
              }
      ?>
                    <option value="<?= $row['psf_id'] ?>"><?= $TEMP_OPTION_NAME ?></option>

      <?php } ?>

                  </select>
                </div>
              </div>
            </div>
          </div>

          <input type="hidden" name="IMPORT_DATA" value="1">
          <input type="hidden" name="PSF_ID" value="<?php echo($PSF_ID); ?>">

        </form>
      </div>

      <div class="modal-footer">
        <button type="button" class="btn btn-primary waves-effect waves-float waves-light btn-block SUBMIT-IMPORTANT-DATA" data-bs-dismiss="modal">Submit</button>
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
    <script src="app-assets/js/scripts/modal/components-modal.min.js"></script>

    <!-- BEGIN: Page JS-->
    <script src="assets/js/fr.js"></script>
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
    <?php if ( ($finance_approve != "Rejected") && ($qa_approve == "Approved")) { ?>
      <script>$('#ADD-DATA-FORM *').prop('disabled', true);</script>
    <?php } ?>

  </body>
  <!-- END: Body-->
</html>