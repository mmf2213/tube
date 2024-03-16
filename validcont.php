<?php 
include("dbconnect.php");
$cont = $_POST['ucont'];
$qry=$DBcon->query("select u_cont from users where u_cont='$cont'");
$count=$qry->num_rows;
if($count>=1)
{
	echo "false";
}
else
{
	echo "true";
}       
?>
