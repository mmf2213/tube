<?php
 ini_set('max_execution_time', 3000); //300 seconds = 5 minutes
 ini_set('max_execution_time', 0); // for infinite time of execution 
date_default_timezone_set('Asia/Kolkata');
session_start();
require_once("dbconnect.php");
if (!isset($_SESSION['userSession'])) {
	header("Location: index.php");
}
$query = $DBcon->query("SELECT * FROM users WHERE u_id=".$_SESSION['userSession']);
$userRow=$query->fetch_array();
//$ad_id=$userRow['ad_id']; 
$ctime=strtotime(date('Y-m-d'));
$u_id=$userRow['u_id']; 
$ucn=$userRow['u_cont'];
?>