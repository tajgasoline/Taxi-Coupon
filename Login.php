<!DOCTYPE html>
<html lang="en">
<head> 
    <title>Taj Corporation</title> 
    <?php include('meta.php'); ?>
    <!-- App favicon -->
    <link rel="shortcut icon" href="assets/images/favicon.ico">
    <!-- App css -->
    <link href="assets/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
    <link href="assets/css/icons.css" rel="stylesheet" type="text/css" />
    <link href="assets/css/metisMenu.min.css" rel="stylesheet" type="text/css" />
    <link href="assets/css/style.css" rel="stylesheet" type="text/css" />
    <link href="assets/plugins/sweet-alert2/sweetalert2.min.css" rel="stylesheet" type="text/css">
    <link href="assets/plugins/animate/animate.css" rel="stylesheet" type="text/css">
    <link href="assets/plugins/dropify/css/dropify.min.css" rel="stylesheet">
    <link href="assets/plugins/filter/magnific-popup.css" rel="stylesheet" type="text/css" />
    <link href="assets/plugins/daterangepicker/daterangepicker.css" rel="stylesheet" />
    <link href="assets/plugins/select2/select2.min.css" rel="stylesheet" type="text/css" />
    <link href="assets/plugins/bootstrap-colorpicker/css/bootstrap-colorpicker.css" rel="stylesheet" type="text/css" />
    <link href="assets/plugins/timepicker/bootstrap-material-datetimepicker.css" rel="stylesheet">
    <link href="assets/plugins/bootstrap-touchspin/css/jquery.bootstrap-touchspin.min.css" rel="stylesheet" />
    <link rel="manifest" href="manifest.json">
    <link rel="apple-touch-icon" href="https://ssp.taj.com/Taj/Inventory/assets/images/logo-sm.png">
</head>
<body class="account-body bg-gredient-red"  >
    <!-- Log In page -->
    <div class="row vh-100 ">
        <div class="col-12 align-self-center">
            <div class="auth-page">
                <div class="card auth-card shadow-lg">
                    <div class="card-body">
                        <div class="px-3">
                            <div class="auth-logo-box">
                                <a href="assets/images/tajlogo.png" class="logo logo-admin"><img src="assets/images/tajlogo2.png" height="55" alt="logo" class="auth-logo"></a>
                            </div><!--end auth-logo-box-->
                            <center>
                                <div class="login-logo">
                                    <br><br> 
                                    <p style="font-size: 16px;"><strong>Login </strong></p>
                                    <p style="font-size: 14px;" id="date"></p>
                                    <p style="font-size: 20px;" id="time" class="bold"></p>
                                </div>
                            </center>
                            <form class="form-horizontal auth-form my-4" >
                                <div class="form-group">
                                    <label for="username" style="color:#fff;">User Name</label>
                                    <div class="input-group mb-3">
                                        <span class="auth-form-icon">
                                            <i class="dripicons-user"></i> 
                                        </span>                                                                                                              
                                        <input type="text" class="form-control" onchange="getsite();" id="Email" placeholder="Site Name">
                                    </div>                                    
                                </div><!--end form-group-->
                         
                                <div class="form-group">
                                    <label for="userpassword" style="color:#fff;">Password</label>                                            
                                    <div class="input-group mb-3"> 
                                        <span class="auth-form-icon">
                                            <i class="dripicons-lock"></i> 
                                        </span>                                                       
                                        <input type="password" class="form-control" id="Password" placeholder="Enter password">
                                    </div>                               
                                </div><!--end form-group--> 

                                <div class="form-group mb-0 row">
                                    <div class="col-12 mt-2">
                                        <button class="btn btn-primary btn-round btn-block waves-effect waves-light" onclick="login();" id="btnlogin" type="button">Log In <i class="fas fa-sign-in-alt ml-1"></i></button>
                                    </div><!--end col--> 
                                </div> <!--end form-group-->                           
                            </form><!--end form-->
                        </div><!--end /div-->
                    </div><!--end card-body-->
                </div><!--end card-->
            </div><!--end auth-page-->
        </div><!--end col-->           
    </div><!--end row-->
    <!-- End Log In page -->
    <!-- jQuery  -->
    <script src="assets/js/jquery.min.js"></script>
    <script src="assets/js/bootstrap.bundle.min.js"></script>
    <script src="assets/js/metisMenu.min.js"></script>
    <script src="assets/js/waves.min.js"></script>
    <script src="assets/js/jquery.slimscroll.min.js"></script>
    <script src="https://ajax.aspnetcdn.com/ajax/jQuery/jquery-3.4.1.min.js"></script>
    <script src="assets/plugins/daterangepicker/daterangepicker.js"></script>
    <script src="assets/plugins/select2/select2.min.js"></script>
    <script src="assets/plugins/bootstrap-colorpicker/js/bootstrap-colorpicker.min.js"></script>
    <script src="assets/plugins/timepicker/bootstrap-material-datetimepicker.js"></script>
    <script src="assets/plugins/bootstrap-maxlength/bootstrap-maxlength.min.js"></script>
    <script src="assets/plugins/bootstrap-touchspin/js/jquery.bootstrap-touchspin.min.js"></script>
    <script src="assets/pages/jquery.forms-advanced.js"></script>
    <script src="assets/plugins/sweet-alert2/sweetalert2.min.js"></script>
    <script src="assets/pages/jquery.sweet-alert.init.js"></script>
    <script src="assets/plugins/dropify/js/dropify.min.js"></script>
    <script src="assets/pages/jquery.profile.init.js"></script>
    <script src="assets/plugins/filter/isotope.pkgd.min.js"></script>
    <script src="assets/plugins/filter/masonry.pkgd.min.js"></script>
    <script src="assets/plugins/filter/jquery.magnific-popup.min.js"></script>
    <script src="assets/pages/jquery.gallery.inity.js"></script>
    <script src="functions/Login.js"></script>
    <script src="pwaindex.js"></script>
    <!-- App js -->
    <script src="assets/js/app.js"></script> 
    <script type="text/javascript">
        var input = document.getElementById("Password");
        input.addEventListener("keyup", function(event) {
          if (event.keyCode === 13) {
            event.preventDefault();
            document.getElementById("btnlogin").click();
        }
    });
</script>
</body>
</html>