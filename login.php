<?php  session_start();

include_once('connection.php');
if (isset($_SESSION['project_user_id'])){ header("location:index"); }

?>
<!DOCTYPE>
<html class="loading" lang="en" data-textdirection="ltr">
  <!-- BEGIN: Head-->
  <head>
    <meta http-equiv="Content-Type" content="text; charset=UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
    <meta name="description" content="">
    <meta name="keywords" content="">
    <meta name="author" content="">
    <title>Login Page - Product Approval</title>
    <link rel="apple-touch-icon" href="app-assets/images/ico/apple-icon-120.png">
    <link rel="shortcut icon" type="image/x-icon" href="app-assets/images/ico/favicon.ico">
    <link href="https://fonts.googleapis.com/css?family=Montserrat:300,400,500,600" rel="stylesheet">

    <!-- BEGIN: Vendor CSS-->
    <link rel="stylesheet" type="text/css" href="app-assets/vendors/css/vendors.min.css">
    <!-- END: Vendor CSS-->

    <!-- BEGIN: Theme CSS-->
    <link rel="stylesheet" type="text/css" href="app-assets/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="app-assets/css/bootstrap-extended.min.css">
    <link rel="stylesheet" type="text/css" href="app-assets/css/colors.min.css">
    <link rel="stylesheet" type="text/css" href="app-assets/css/components.min.css">
    <link rel="stylesheet" type="text/css" href="app-assets/css/themes/dark-layout.min.css">
    <link rel="stylesheet" type="text/css" href="app-assets/css/themes/semi-dark-layout.min.css">

    <!-- BEGIN: Page CSS-->
    <link rel="stylesheet" type="text/css" href="app-assets/css/core/menu/menu-types/vertical-menu.min.css">
    <link rel="stylesheet" type="text/css" href="app-assets/css/core/colors/palette-gradient.min.css">
    <link rel="stylesheet" type="text/css" href="app-assets/css/pages/authentication.css">
    <!-- END: Page CSS-->

    <!-- BEGIN: Custom CSS-->
    <link rel="stylesheet" type="text/css" href="assets/css/style.css">
    <!-- END: Custom CSS-->

  </head>
  <!-- END: Head-->

  <!-- BEGIN: Body-->
  <body class="vertical-layout vertical-menu-modern 1-column  navbar-floating footer-static bg-full-screen-image  blank-page blank-page" data-open="click" data-menu="vertical-menu-modern" data-col="1-column">
    <!-- BEGIN: Content-->
    <div class="app-content content">
      <div class="content-overlay"></div>
      <div class="header-navbar-shadow"></div>
      <div class="content-wrapper">
        <div class="content-header row">
        </div>
        <div class="content-body"><section class="row flexbox-container">
    <div class="col-xl-8 col-11 d-flex justify-content-center">
        <div class="card bg-authentication rounded-0 mb-0">
            <div class="row m-0">
                <div class="col-lg-6 d-lg-block d-none text-center align-self-center px-1 py-0">
                    <img src="assets/images/labforma logo.png" alt="LabForma" class="img img-fluid">
                </div>
                <div class="col-lg-6 col-12 p-0">
                    <div class="card rounded-0 mb-0 px-2">
                        <div class="card-header pb-1">
                            <div class="card-title">
                                <h4 class="mb-0">Login</h4>
                            </div>
                        </div>
                        <p class="px-2">Welcome back, please login to your account.</p>

                        <div class="card-content">
                            <div class="card-body pt-1">

                                <div class="message mb-2"></div>

                                <form id="user-login-form">
                                    <fieldset class="form-label-group form-group position-relative has-icon-left">
                                        <input type="text" class="form-control" name="username" placeholder="Username" required>
                                        <div class="form-control-position">
                                            <!-- <i class="feather icon-user"></i> -->
                                        </div>
                                        <label for="user-name">Username</label>
                                    </fieldset>

                                    <fieldset class="form-label-group position-relative has-icon-left">
                                        <input type="password" class="form-control" name="password" placeholder="Password" required>
                                        <div class="form-control-position">
                                            <!-- <i class="feather icon-lock"></i> -->
                                        </div>
                                        <label for="user-password">Password</label>
                                    </fieldset>
                                    <div class="form-group d-flex justify-content-between align-items-center">
                                        <!-- <div class="text-left">
                                            <fieldset class="checkbox">
                                              <div class="vs-checkbox-con vs-checkbox-primary">
                                                <input type="checkbox">
                                                <span class="vs-checkbox">
                                                  <span class="vs-checkbox--check">
                                                    <i class="vs-icon feather icon-check"></i>
                                                  </span>
                                                </span>
                                                <span class="">Remember me</span>
                                              </div>
                                            </fieldset>
                                        </div> -->
                                        <!-- <div class="text-right"><a href="auth-forgot-password" class="card-link">Forgot Password?</a></div> -->
                                    </div>

                                    <input type="hidden" name="user_login" value="1">

                                    <!-- <a href="auth-register" class="btn btn-outline-primary float-left btn-inline">Register</a> -->
                                    <button type="button" class="btn btn-primary btn-block float-right btn-inline user-login-btn">Login</button>
                                </form>
                            </div>
                        </div>
                        <div class="login-footer">
                          <div class="divider">
                            <!-- <div class="divider-text">OR</div> -->
                          </div>
                          <div class="footer-btn d-inline">
                              <!-- <a href="#" class="btn btn-facebook"><span class="fa fa-facebook"></span></a> -->
                              <!-- <a href="#" class="btn btn-twitter white"><span class="fa fa-twitter"></span></a> -->
                              <!-- <a href="#" class="btn btn-google"><span class="fa fa-google"></span></a> -->
                              <!-- <a href="#" class="btn btn-github"><span class="fa fa-github-alt"></span></a>/ -->
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


    <!-- BEGIN: Vendor JS-->
    <script src="app-assets/vendors/js/vendors.min.js"></script>
    <!-- BEGIN Vendor JS-->

    <!-- BEGIN: Page Vendor JS-->
    <!-- END: Page Vendor JS-->

    <!-- BEGIN: Theme JS-->
    <script src="app-assets/js/core/app-menu.min.js"></script>
    <script src="app-assets/js/core/app.min.js"></script>
    <script src="app-assets/js/scripts/components.min.js"></script>
    <!-- END: Theme JS-->

    <script src="assets/js/main.js"></script>

  </body>
  <!-- END: Body-->
</html>