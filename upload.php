<?php
require_once('lock.php');
$path = "../videos/";
$pathprv = "../thumbvideos/";
$actual_image_name="";
$valid_formats = array("mp4", "avi", "mov", "mpeg","gp3");
$valid_formats_prv = array("jpg","jpeg","JPG","JPEG","png","PNG");
//$watermarkImagePath ='yplogo.png'; 

if(isset($_POST) and $_SERVER['REQUEST_METHOD'] == "POST")
{
	include_once 'includes/getExtension.php';
	$prv = $_FILES['img_upload']['name'];
	$imagename = $_FILES['file_upload']['name'];
	$size = $_FILES['file_upload']['size'];
	 $vt	= $_POST['vt'];
	 $cat_id = $_POST['cat_id'];
	 $vd	= $_POST['vd'];
	 $m_author=$_POST['va'];
	 $pdate	= $_POST['pdate'];
	  $newDate = strtotime($pdate);
	 $m_flag=1;
	if(strlen($imagename) && strlen($prv))
	{
		$douext=explode(".",$imagename);
		$cnt=count($douext);
		$douextprv=explode(".",$prv);
		$cntprv=count($douextprv);
		if($cnt == 2 && $cntprv == 2){
		$ext = strtolower(getExtension($imagename));
		$extprv = strtolower(getExtension($prv));
		if(in_array($ext,$valid_formats) && in_array($extprv,$valid_formats_prv))
		{
				$actual_image_name = time()."_".$ad_id.".".$ext;
				$actual_prv_name = time()."_".$ad_id.".".$extprv;
				$uploadedfile = $_FILES['file_upload']['tmp_name'];	
				$uploadedfileprv = $_FILES['img_upload']['tmp_name'];	
				include('includes/compressImageservice.php');	
				$filename=compressImage($extprv,$uploadedfileprv,$pathprv,$actual_prv_name,350);				
				if(move_uploaded_file($uploadedfile, $path.$actual_image_name))
				{	
			$updt=$path.$actual_image_name;
			$output=$path.time().".mp4";
			$output_vid=time().".mp4";
				$ntime=time();
				// shell_exec('ffmpeg -i '.$updt.' -i '.$watermarkImagePath.' -filter_complex "[0:v][1:v] overlay=10:50" '.$output.'');
				if($DBcon->query("INSERT INTO media (m_head, m_desc, m_prv, m_link, m_time, l_time, m_author, m_flag, ad_id, cat_id) VALUES ('$vt', '$vd','$filename', '$output_vid', '$ntime', '$newDate', '$m_author', '$m_flag', '$ad_id', '$cat_id')"))
				{	
				echo "Success" ;
				}else{
				echo "Fails upload ";}
				}
				else{
				echo "Fail upload folder with read access.";}
		}
		else{
		echo "Invalid file format..";}	
	}
		else{
		echo "Invalid Double extention file format..";}
	}
	else{
	echo "Please select video & Cover Image..!";}
}
?>