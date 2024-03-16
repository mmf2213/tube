<?php require_once('lock.php');
if(isset($_POST) and $_SERVER['REQUEST_METHOD'] == "POST")
{
	$u_id=$_POST['u_id'];
	$m_id=$_POST['m_id'];
	$to_id=$_POST['to_id'];
	$st_date=time();
	$rate=$DBcon->query("select * from shareto WHERE u_id='$u_id' AND m_id='$m_id' AND to_id='$to_id'");
	$vcnt=$rate->num_rows;
	if($vcnt==0){
				if($DBcon->query("INSERT INTO shareto (m_id, u_id, to_id, st_date) VALUES ('$m_id', '$u_id', '$to_id', '$st_date')"))
				{	
				echo "Success" ;
				}else{
				echo "Fails upload ";
				}
	}else{
			echo "already shared ";
		}
				
}
?>