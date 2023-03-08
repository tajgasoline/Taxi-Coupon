<?php


if(  isset($_POST['CouponCode']))
{

 session_start();

$dbusername = $_SESSION['username'] ;   
 $CouponCode = htmlentities($_POST["CouponCode"]); 
 $result = array(); 
 

 include('../MainConnect.php');  
 $query = "select c.custname,c.custvehicle,c.custphone, c.custid,
r.rewardid,r.couponcode,r.cashreward,r.doc,r.status 
from tblreward r
inner join  tblcustomer c  on c.custid=r.custid
where r.status='0' and r.couponcode ='".$CouponCode."'";
 $stmt = sqlsrv_query($MainConnect, $query, array(), array("Scrollable" => 'static')) or die(sqlsrv_errors());
 while ($row = sqlsrv_fetch_array($stmt))
 {

 $custname = $row["custname"];
 $custvehicle = $row["custvehicle"];
 $custphone = $row["custphone"];
 $custid = $row["custid"]; 
  $rewardid = $row["rewardid"];  
  $couponcode = $row["couponcode"]; 
  $cashreward = $row["cashreward"]; 
  $doc = $row["doc"]; 
  $status = $row["status"]; 

} 


$data["staff"] = $dbusername; 
$data["custname"] = $custname; 
$data["custvehicle"] = $custvehicle; 
$data["custphone"] = $custphone;  
$data["custid"] = $custid; 
$data["rewardid"] = $rewardid; 
$data["couponcode"] = $couponcode; 
$data["cashreward"] = $cashreward;  
$data["status"] = $status;  
$data["doc"] = date_format($doc,"Y/m/d H:i:s");  
$json_data = json_encode($data);
print $json_data;


}

?>
