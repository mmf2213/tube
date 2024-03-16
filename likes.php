<?php require_once('lock.php');
if(isset($_POST) and $_SERVER['REQUEST_METHOD'] == "POST")
{
	$m_id=$_POST['m_id'];	
	$rdate=time();
	$rate=$DBcon->query("select * from rating WHERE u_id='$u_id' AND m_id='$m_id' AND rflag='1'");
	$vcnt=$rate->num_rows;
	if($vcnt==0){
				if($DBcon->query("INSERT INTO rating (u_id, m_id, rdate, rflag) VALUES ('$u_id', '$m_id', '$rdate','1')"))
				{	
				echo "Success" ;
				}else{
				echo "Fails upload ";
				}
	}else{
			$DBcon->query("DELETE FROM rating WHERE u_id='$u_id' AND m_id='$m_id' AND rflag='1'");
		}
				
}
?>