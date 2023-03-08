<?php
if(isset($_POST['Search']) )
{
	session_start();
	$staffusername = $_SESSION['username'];
	$site = $_SESSION['siteid'];
	$role = $_SESSION['role'];
	$Search = $_POST["Search"]; 
	$result = ''; 
	include('../MainConnect.php');  
	$query = "  select custid,custname,custphone,custvehicle
from tblcustomer where (custvehicle like  '%".$Search."%') and  status='Active'";
 
	$stmt = sqlsrv_query($MainConnect, $query, array(), array("Scrollable" => 'static')) or die(sqlsrv_errors());
	while ($row = sqlsrv_fetch_array($stmt))
	{
		$data["custid"] = $row["custid"]; 
		$data["custname"] = $row["custname"]; 
		$data["custphone"] = $row["custphone"]; 
		$data["custvehicle"] = $row["custvehicle"];  
		$data["result"] = 'Success'; 

	} 
	echo json_encode($data);
}
?>