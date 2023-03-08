<?php
  include('../MainConnect.php'); 
// Prepare array

$mysql_data = array();
$result="";
$message="";
if($MainConnect)
{

 

    $query =  "SELECT rewardid,custid,couponcode,cashreward,doc FROM  tblreward where status='0'";
     $stmt = sqlsrv_query($MainConnect, $query, array(), array("Scrollable" => 'static')) or die(sqlsrv_errors());

    if (!$stmt
  )  {


      $result  = "error";
      $message = "query error";
    }
    else
    {
      $result  = "success";
      $message = "query success";
      $empty="";
    while ($row = sqlsrv_fetch_array($stmt))
      {
 
        $mysql_data[] = array
        (
          "rewardid" => $row["rewardid"],
          "custid" => $row["custid"],
          "couponcode" => $row["couponcode"],
          "cashreward" => $row["cashreward"],
          "doc" => $row["doc"]
          
        );
      }
    }
  // Close database connection
  // mysqli_close($connect);
}
// Prepare data
$data = array(
  "result"  => $result,
  "message" => $message,
  "data"    => $mysql_data
);
// Convert PHP array to JSON array
$json_data = json_encode($data);
print $json_data;
?>