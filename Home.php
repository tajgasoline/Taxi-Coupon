<?php 
session_start();
$staffid = $_SESSION['staffid'];
$siteid = $_SESSION['siteid'];
$sitename = $_SESSION['sitename'];
$role = $_SESSION['role']; 
$username = $_SESSION['username']; 
?>  
<!DOCTYPE html>
<html lang="en">
<head>
  <title>Taxi Coupon - Taj Gasoline</title>
  <?php include('meta.php'); ?>
  <!-- App favicon -->
  <link rel="shortcut icon" href="../../favicon.ico">
  <link rel="stylesheet" href="assets/plugins/morris/morris.css">
  <link href="assets/plugins/sweet-alert2/sweetalert2.min.css" rel="stylesheet" type="text/css">
  <!-- App css -->
  <link href="assets/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
  <link href="assets/css/icons.css" rel="stylesheet" type="text/css" />
  <link href="assets/css/metisMenu.min.css" rel="stylesheet" type="text/css" />
  <link href="assets/css/style.css" rel="stylesheet" type="text/css" />
  <script src="https://ajax.aspnetcdn.com/ajax/jQuery/jquery-3.4.1.min.js"></script>
  <!-- Plugins css -->
  <link href="assets/plugins/daterangepicker/daterangepicker.css" rel="stylesheet" />
  <link href="assets/plugins/select2/select2.min.css" rel="stylesheet" type="text/css" />
  <link href="assets/plugins/bootstrap-colorpicker/css/bootstrap-colorpicker.css" rel="stylesheet" type="text/css" />
  <link href="assets/plugins/timepicker/bootstrap-material-datetimepicker.css" rel="stylesheet">
  <link href="assets/plugins/bootstrap-touchspin/css/jquery.bootstrap-touchspin.min.css" rel="stylesheet" />
</head>
<body>
  <!-- Top Bar Start -->
  <?php include "navbar.php"; ?>
  <div class="page-wrapper">
   <?php include "leftbar.php"; ?>
   <!-- Left Sidenav -->
   <!-- Page Content-->
   <div class="page-content">
    <div class="container-fluid">
      <!-- Page-Title -->
      <div class="row">
        <div class="col-sm-12">
          <div class="page-title-box">
            <div class="float-right">
              <ol class="breadcrumb">
               <li class="breadcrumb-item"><a href="javascript:void(0);">Home</a></li> 
             </ol>
           </div>
           <h4 class="page-title">Welcome <?php echo $username .' - '.$sitename .' - ' .$role;?></h4>
         </div><!--end page-title-box-->
       </div><!--end col-->
     </div>
     <div class="row">
      <div class="col-md-12"> 
        <div class="card">
          <div class="card-body">
            <label for="example-text-input" class="col-lg-12 col-form-label   cust-font-rem-Data-title text-center">Taxi Coupon Portal</label>
            <div class="row">
              <div class="col-md-6"> 
               <div class="form-group row">
                <label for="example-text-input" class="col-sm-4 col-form-label  cust-font-rem">Search</label>
                <div class="col-sm-6">
                  <input class="form-control custom-search-field" style=" text-transform: uppercase !important;"  type="text"   placeholder="Search Here..." id="Search">         
                </div>
                <div class="col-sm-2">
                  <button type="button" class="btn btn-primary waves-effect waves-light" id="btnSearch" onclick="Searching();"> Search</button>
                </div>
              </div>
              <div class="form-group row" style="display: none !important;">
                <label for="example-text-input" class="col-sm-4 col-form-label  cust-font-rem">CustID.</label>
                <div class="col-sm-8">
                  <input class="form-control  " type="text" disabled="" placeholder="Vehicle Number" id="custid"><span class="help-block custom-block-hide" id="vv1"><small ></small></span>
                </div>
              </div>
                   <div class="form-group row">
                <label for="example-text-input" class="col-sm-4 col-form-label  cust-font-rem">Vehicle No.</label>
                <div class="col-sm-8">
                  <input class="form-control  " type="text" disabled="" placeholder="Vehicle Number" id="custvehicle"><span class="help-block custom-block-hide" id="vv1"><small ></small></span>
                </div>
              </div>
              <div class="form-group row">
                <label for="example-text-input" class="col-sm-4 col-form-label  cust-font-rem">Customer Name</label>
                <div class="col-sm-8">
                  <input class="form-control  " type="text" disabled="" placeholder="Customer Name" id="custname"><span class="help-block custom-block-hide" id="1v"><small ></small></span>
                </div>
              </div>
              <div class="form-group row">
                <label for="example-text-input" class="col-sm-4 col-form-label  cust-font-rem">Contact</label>
                <div class="col-sm-8">
                  <input class="form-control  " type="text" disabled="" placeholder="Contact Number" id="custphone"><span class="help-block custom-block-hide" id="1v"><small ></small></span>
                  <input class="form-control  " type="text" disabled="" hidden="" id="printid">
                </div>
              </div>
              <div class="form-group row">
     
                <div class="col-md-4"> 
                  <button type="button" onclick="Submitting();" class="btn btn-primary waves-effect waves-light" style="width: 100%;">Save</button>
                </div>
      
              
               <!--  <div class="col-md-4"> 
                  <button type="button" onclick="resetall();" class="btn btn-primary waves-effect waves-light" style="width: 100%;">Clear</button>
                </div> -->
              </div>
            </div>

                    <div class="col-md-6"> 
                        <div class="form-group row">
                          <label for="example-text-input" class="col-sm-4 col-form-label  cust-font-rem">Product</label>
                          <div class="col-sm-8">
                            <select class="form-control" onchange="filterproductprice(this.value); calc2();" id="Product">
                              <option value="null" selected disabled>Select Product</option> 
                              <?php 
                              // include("MainConnect.php");
                              // $query = "select id,site,productid,name,price,discount from careemportalproducts where site = '".$site."'";
                              // $stmt = sqlsrv_query($MainConnect, $query, array(), array("Scrollable" => 'static')) or die(sqlsrv_errors());
                              // while ($row = sqlsrv_fetch_array($stmt))
                              // {
                              //  echo '<option value="'.$row["productid"].'">'.$row["name"].'</option>';
                             // }
                             ?>
                             <option value="Petrol">Petrol</option>
                             <option value="Diesal">Diesal</option>
                           </select>
                           <span class="help-block custom-block-hide" id="vv2"><small ></small></span>
                         </div>
                       </div> 
                       <div class="form-group row">
                        <label for="example-text-input" class="col-sm-4 col-form-label  cust-font-rem">Liters</label>
                        <div class="col-sm-8">
                          <input class="form-control  " type="text" onkeyup="calc1();" placeholder="Liters" id="Liters"><span class="help-block custom-block-hide" id="vv3"><small ></small></span>
                        </div>
                      </div>
                    </div>

          </div> 
        </div>
      </div>
    </div>
  </div><!-- container -->
</div>
<!-- end page content -->
</div>
<!-- end page-wrapper -->
<!-- jQuery  -->
<script src="assets/js/jquery.min.js"></script>
<script src="assets/js/bootstrap.bundle.min.js"></script>
<script src="assets/js/metisMenu.min.js"></script>
<script src="assets/js/waves.min.js"></script>
<script src="assets/js/jquery.slimscroll.min.js"></script>
<!--Plugins-->
<script src="functions/Home.js"></script>
<script src="assets/plugins/moment/moment.js"></script>
<!-- Required datatable js -->
<script src="assets/plugins/datatables/jquery.dataTables.min.js"></script>
<script src="assets/plugins/datatables/dataTables.bootstrap4.min.js"></script>
<script src="assets/plugins/datatables/dataTables.responsive.min.js"></script>
<script src="assets/plugins/datatables/responsive.bootstrap4.min.js"></script>
<script src="assets/plugins/sweet-alert2/sweetalert2.min.js"></script>
<script src="assets/pages/jquery.sweet-alert.init.js"></script>
<!--         <script src="functions/Staff.js"></script> -->
<!-- App js -->
<script src="assets/js/app.js"></script>
<!-- Plugins js -->
<script src="assets/plugins/moment/moment.js"></script>
<script src="assets/plugins/daterangepicker/daterangepicker.js"></script>
<script src="assets/plugins/select2/select2.min.js"></script>
<script src="assets/plugins/bootstrap-colorpicker/js/bootstrap-colorpicker.min.js"></script>
<script src="assets/plugins/timepicker/bootstrap-material-datetimepicker.js"></script>
<script src="assets/plugins/bootstrap-maxlength/bootstrap-maxlength.min.js"></script>
<script src="assets/plugins/bootstrap-touchspin/js/jquery.bootstrap-touchspin.min.js"></script>
<script src="assets/pages/jquery.forms-advanced.js"></script>
<!-- <script src="printer.js"></script> -->
</body>
</html>