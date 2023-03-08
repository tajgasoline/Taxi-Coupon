<?php
if(isset($_POST['username']) &&  isset($_POST['pass']) )
{
	$username = $_POST["username"]; 
	$Password = $_POST["pass"]; 
	$dbstaffid = '';
	$dbname = '';
	$dbusername = '';
	$dbpassword = '';
	$dbrole = '';
	$dbsiteid = '';
	$dbsitename = '';
	$result = array(); 
	include('../MainConnect.php');  
	$query = "select staffid,name,username,password,role,siteid,sitename from tblstaff where username='".$username."'";
	$stmt = sqlsrv_query($MainConnect, $query, array(), array("Scrollable" => 'static')) or die(sqlsrv_errors());
	while ($row = sqlsrv_fetch_array($stmt))
	{
		$dbstaffid = $row["staffid"];
		$dbname = $row["name"];
		$dbusername = $row["username"]; 
		$dbpassword = $row["password"]; 
		$dbrole = $row["role"];
		$dbsiteid = $row["siteid"];
		$dbsitename = $row["sitename"];  
	} 
	if($dbusername == NULL)
	{
		$result = "norecord";
	}	
	else if(strtoupper($dbusername) == strtoupper($username) &&  $Password == $dbpassword )
	{	
		session_start();
		$_SESSION['staffid'] = $dbstaffid;
		$_SESSION['name'] = $dbname; 
		$_SESSION['username'] = $dbusername;   
		$_SESSION['role'] = $dbrole; 
		$_SESSION['siteid'] = $dbsiteid;  
		$_SESSION['sitename'] = $dbsitename;
		$result = "successful";
	} 

$data["dbstaffid"] = $dbstaffid;
$data["dbname"] = $dbname;
$data["dbusername"] = $dbusername; 
$data["dbrole"] = $dbrole;
$data["dbsiteid"] = $dbsiteid;
$data["dbsitename"] = $dbsitename;
$data["result"] = $result;
	echo json_encode($data);
}
?>