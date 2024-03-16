<?php 
require_once('dbconnect.php');
	if($_SERVER['REQUEST_METHOD'] == "POST")
		{
	$uname=$_POST['uname'];
	$uemail=$_POST['uemail'];
	$ucont=$_POST['ucont'];
	$upass=$_POST['upass'];
		$uflag=1;
		$ad_id=1;
		$qry=$DBcon->query("select u_cont from users where u_cont='$ucont'");
$cnt=$qry->num_rows;
		if($cnt >= 1){
			echo"error";
		}else{
			$password = password_hash($_POST['upass'], PASSWORD_DEFAULT);
  $qry=$DBcon->query("INSERT INTO users (u_name, u_cont, u_email, u_pass, u_flag, ad_id) VALUES ('$uname', '$ucont', '$uemail', '$password', '$uflag', '$ad_id')");
  if($qry==true){
	  echo"Success";
  }else{
	   echo"not";
  }
		}
		}
?>
