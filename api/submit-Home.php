<?php 

if(  isset($_POST['custvehicle']) && isset($_POST['Liters']) && isset($_POST['custvehicle']) 
&& isset($_POST['custname']) && isset($_POST['custphone']) && isset($_POST['Product']) 
&& isset($_POST['custid']) )
{

 
 session_start();
$dbusername = $_SESSION['username'] ;
 $dbsiteid = $_SESSION['siteid'] ;  
$dbsitename = $_SESSION['sitename'] ;
 

 $custvehicle = htmlentities($_POST["custvehicle"]); 
 $Liters = htmlentities($_POST["Liters"]); 
 $custvehicle = htmlentities($_POST["custvehicle"]); 
 $custname = htmlentities($_POST["custname"]); 
 $custphone = htmlentities($_POST["custphone"]); 
 $Product = htmlentities($_POST["Product"]); 
 $custid = htmlentities($_POST["custid"]);  

 

 $result = array(); 
 $couponcondition = 'none';
 $Couponcheck='none';
 $litersleft='-';




 include('../MainConnect.php');  
 $query = "SELECT sum(rewardbalance) as rewardbalance
  FROM tbltransaction where custvehicle='".$custvehicle."' and coupon_flag=0 and productname='".$Product."'";
 
 $stmt = sqlsrv_query($MainConnect, $query, array(), array("Scrollable" => 'static')) or die(sqlsrv_errors());
 while ($row = sqlsrv_fetch_array($stmt))
 {
 
  $rewardbalance = $row["rewardbalance"];   
} 

$totalCurrentLiters = floatval($Liters) + floatval($rewardbalance);
 

if($totalCurrentLiters >= 100){

$newBalance = $totalCurrentLiters-100;



//select max transaction id

 include('../MainConnect.php');  
  $query = "select count(TransactionID) as id from tbltransaction";
  $stmt = sqlsrv_query($MainConnect, $query, array(), array("Scrollable" => 'static')) or die(sqlsrv_errors());
  while ($row = sqlsrv_fetch_array($stmt))
  {
    $id = $row["id"]; 

  } 
  $id = $id +1; 


 
 

 $query = "insert into tbltransaction(TransactionID,productname,
siteid,sitename,transactionby,transactiondate,custid,custname,custvehicle,coupon_flag,rewardbalance,Liters) 
values (?,?,?,?,?,getdate(),?,?,?,0,?,?) ";

            $params = array(&$id,&$Product,&$dbsiteid,&$dbsitename,&$dbusername,&$custid,&$custname,
              &$custvehicle,&$newBalance,&$Liters);
            $stmt = sqlsrv_prepare($MainConnect, $query, $params);
 
    if (sqlsrv_execute( $stmt ) === false ) 
    {
      $result="Not Inserted";



    }
    else{
      $result="Inserted";


 $query = "update tbltransaction set coupon_flag=1 where custvehicle ='".$custvehicle."' ";
 $stmt = sqlsrv_query($MainConnect, $query, array(), array("Scrollable" => 'static')) or die(sqlsrv_errors());

 $query = "update tbltransaction set coupon_flag=0 where TransactionID ='".$id."' ";
 $stmt = sqlsrv_query($MainConnect, $query, array(), array("Scrollable" => 'static')) or die(sqlsrv_errors());

//select max Reward id


 include('../MainConnect.php');  
  $query = "select count(rewardid) as id from tblreward";
  $stmt = sqlsrv_query($MainConnect, $query, array(), array("Scrollable" => 'static')) or die(sqlsrv_errors());
  while ($row = sqlsrv_fetch_array($stmt))
  {
    $rewardid = $row["id"]; 

  } 
  $rewardid = $rewardid +1; 

$couponCode='Taj-Coupon-'.$rewardid;

 $query = "insert into tblreward(rewardid,custid,couponcode,doc,custvehicle,status)
 values (".$rewardid.",".$custid.",'".$couponCode."',getdate(),'".$custvehicle."',0)";
 
 $stmt = sqlsrv_query($MainConnect, $query, array(), array("Scrollable" => 'static')) or die(sqlsrv_errors());
 
 

    }
 

 $couponcondition = "greater";
 $Couponcheck='Yes';

} else {

	// if current liters are lesser than 100

	$newBalance = $totalCurrentLiters;
$litersleft = 100 - $newBalance;


//select max transaction id

 include('../MainConnect.php');  
  $query = "select count(TransactionID) as id from tbltransaction";
  $stmt = sqlsrv_query($MainConnect, $query, array(), array("Scrollable" => 'static')) or die(sqlsrv_errors());
  while ($row = sqlsrv_fetch_array($stmt))
  {
    $id = $row["id"]; 

  } 
  $id = $id +1; 


 
 

 $query = "insert into tbltransaction(TransactionID,productname,
siteid,sitename,transactionby,transactiondate,custid,custname,custvehicle,coupon_flag,rewardbalance,Liters) 
values (?,?,?,?,?,getdate(),?,?,?,0,?,?) ";

            $params = array(&$id,&$Product,&$dbsiteid,&$dbsitename,&$dbusername,&$custid,&$custname,
              &$custvehicle,&$newBalance,&$Liters);
            $stmt = sqlsrv_prepare($MainConnect, $query, $params);
 
    if (sqlsrv_execute( $stmt ) === false ) 
    {
      $result="Not Inserted";

 

    }
    else{
      $result="Inserted";

 
 
    }
 
 
	$couponcondition = "lesser";
 $Couponcheck='No';

}


$data = array(
  "result"  => $result,
  "couponcondition" => $couponcondition,
  "couponCode"    => $couponCode,
  "Couponcheck"    => $Couponcheck,
	"litersleft"    => $litersleft
);

$json_data = json_encode($data);
print $json_data;
 
}

?>