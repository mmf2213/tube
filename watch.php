<?php require_once("lock.php");
 $cotp=$_GET['v'];
if(empty($_GET['v'])){
  header("location: 404");
}
else{
	 $watch=explode("_",$cotp);
	  $auth=$watch[0];
	  $authid=$watch[1];
    $chkmid=$DBcon->query("SELECT m.*,c.cat_name FROM media m, m_cat c WHERE m.cat_id=c.cat_id AND m_time='$auth' AND m_id='$authid' ");
    $cntmid=$chkmid->num_rows;
	if($cntmid!=1){
	header("location: 404");
	}else{
	$videos=$chkmid->fetch_array();
	$m_id=$videos['m_id'];
    $m_link=$videos['m_link'];
	$m_prv=$videos['m_prv'];
	$m_head=$videos['m_head'];
	$m_desc=$videos['m_desc'];
	$m_time=$videos['m_time'];
	$cat_id=$videos['cat_id'];
	$prv=str_replace("../","",$videos['m_prv']);
	$m_link=str_replace("../","",$videos['m_link']);
	$vdate=time();
	$visiters=$DBcon->query("select * from visiters WHERE u_id='$u_id' AND m_id='$m_id'");
	$vcnt=$visiters->num_rows;
	if($vcnt==0){
	$DBcon->query("INSERT INTO visiters (u_id, m_id, vdate) VALUES ( '$u_id', '$m_id', '$vdate')");
	}
}
} ?>
<!DOCTYPE html>
<html lang="en">
   <head>
      <meta charset="utf-8">
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
      <meta name="description" content="Askbootstrap">
      <meta name="author" content="Askbootstrap">
      <title>Mytube</title>
      <!-- Favicon Icon -->
      <link rel="icon" type="image/png"  href="img/favicon.png">
      <!-- Bootstrap core CSS-->
      <link  href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
      <!-- Custom fonts for this template-->
      <link  href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
      <!-- Custom styles for this template-->
      <link  href="css/osahan.css" rel="stylesheet">
      <!-- Owl Carousel -->
      <link rel="stylesheet"  href="vendor/owl-carousel/owl.carousel.css">
      <link rel="stylesheet"  href="vendor/owl-carousel/owl.theme.css">
	  	  <link href="videolib/video-js.css" rel="stylesheet" />
<script type="text/javascript">
function likes(m_id){
$.ajax({
type: "POST",
url: "likes.php",
data: {m_id:m_id},
success: function(html)
{
$("#rate").load(location.href + " #rate");
}
});
}
</script>
<script type="text/javascript">
function shareto(u_id,m_id){
	var to_id = $("#to_id").val();
	if(to_id!=""){
$.ajax({
type: "POST",
url: "shareto.php",
data: {u_id:u_id, m_id:m_id, to_id:to_id},
success: function(html)
{
$("#sto").load(location.href + " #sto");
}
});
}
}
</script>
	 <script type="text/javascript">
function dislikes(m_id){
$.ajax({
type: "POST",
url: "dislikes.php",
data: {m_id:m_id},
success: function(html)
{
$("#rate").load(location.href + " #rate");
	}
});
}
</script> 
   </head>
   <body id="page-top">
      <?php require_once("navbar.php"); ?>
      <div id="wrapper">
         <!-- Sidebar -->
         <?php require_once("sidebar.php"); ?>
         <div id="content-wrapper">
            <div class="container-fluid pb-0">
               <div class="video-block section-padding">
                  <div class="row">
                     <div class="col-md-8">
                        <div class="single-video-left">
                           <div class="single-video">
  <video
    id="my-video"
    class="video-js"
    controls
    preload="auto"
	autoplay="auto"
    width="812"
    height="320"
    poster="<?php echo $prv; ?>"
    data-setup="{}">
    <source src="<?php echo $m_link; ?>"  />
  </video>
                           </div>
                           <div class="single-video-title box mb-3">
                              <h2><a  href="#"><?php echo $videos['m_head']; ?></a></h2>
                              <p class="mb-0"><i class="fas fa-eye"></i> <?php  $vimain=$DBcon->query("select * from visiters WHERE m_id='$m_id'");
	echo $vmcnt=$vimain->num_rows; ?> views</p>
                           </div>
						   <div id="sto" class="single-video-title box mb-3">
                                <input list="allNames" autocomplete="off" name="to_id" id="to_id" value="" style="width:90%; display: inline;" class="form-control small" placeholder="Share To">
								    <datalist id="allNames">
									<?php $sto=$DBcon->query("SELECT * FROM users WHERE u_id!=$u_id");
										while($stuid=$sto->fetch_array())
                     						{?>
										<option value="<?php echo $stuid['u_cont']; ?>"> </option>
									<?php } ?>
								    </datalist>
							   <button class="btn btn-danger" onclick="shareto('<?php echo $u_id; ?>','<?php echo $m_id; ?>')" type="button">Share </button>
                           </div>
                           <div class="single-video-author box mb-3" >
                              <div class="float-right" id="rate"> <button onclick="likes(<?php echo $m_id; ?>)" class="btn btn btn-outline-success" type="button"><i class="fas fa-thumbs-up"></i></button><button class="btn btn-success" type="button"><strong><?php $likes=$DBcon->query("select * from rating WHERE m_id='$m_id' AND rflag='1'"); 
	echo $lcnt=$likes->num_rows;?></strong></button> <button onclick="dislikes(<?php echo $m_id; ?>)" class="btn btn btn-outline-danger" type="button"><i class="fas fa-thumbs-down"></i></button><button class="btn btn-danger" type="button"><strong><?php $dislikes=$DBcon->query("select * from rating WHERE m_id='$m_id' AND rflag='2'"); 
	echo $dlcnt=$dislikes->num_rows;?></strong></button></div>
                               <img class="img-fluid" src="img/favicon.png" alt="">
                              <p><a  href="#"><strong><?php echo $videos['cat_name']; ?></strong></a> <span title="" data-placement="top" data-toggle="tooltip" data-original-title="Verified"><i class="fas fa-check-circle text-success"></i></span></p>
                              <small>Published on <?php echo date('d-M-Y',$videos['l_time']); ?></small>
                           </div>
                           <div class="single-video-info-content box mb-3">
                              <h6>Author:</h6>
                              <p><?php echo $videos['m_author']; ?> </p>
                              <h6>About :</h6>
                              <p><?php echo $videos['m_desc']; ?> </p>
                              
                           </div>
                        </div>
                     </div>
                     <div class="col-md-4">
                        <div class="single-video-right">
                           <div class="row">
                              <div class="col-md-12">
							  <?php $related=$DBcon->query("SELECT m.*,c.cat_name FROM media m, m_cat c WHERE c.cat_id=m.cat_id AND m.cat_id='$cat_id' AND m_flag=1 AND m.m_id!='$authid' AND m.l_time <='$ctime'");
							  $recnt=$related->num_rows;
							  if($recnt>=1){
    while($relatedvid=$related->fetch_array()){
		$rprv=str_replace("../","",$relatedvid['m_prv']); ?>
                                 <div class="video-card video-card-list">
                                     <div class="video-card-image">
                                       <a class="play-icon"  href="watch?v=<?php echo $relatedvid['m_time']."_".$relatedvid['m_id']; ?>"><i class="fas fa-play-circle"></i></a>
                                       <a  href="watch?v=<?php echo $relatedvid['m_time']."_".$relatedvid['m_id']; ?>"><img class="img-fluid"  src="<?php echo $rprv; ?>" alt=""></a>
                                      
                                    </div>
                                    <div class="video-card-body">
                                       
                                       <div class="video-title">
                                          <a  href="#"><?php echo $relatedvid['m_head']; ?></a>
                                       </div>
                                       <div class="video-page text-success">
                                          <?php echo $relatedvid['cat_name']; ?>  <a title="" data-placement="top" data-toggle="tooltip"  href="#" data-original-title="Verified"><i class="fas fa-check-circle text-success"></i></a>
                                       </div>
                                       <div class="video-view">
                                          <?php  $vi=$DBcon->query("select * from visiters WHERE m_id='".$relatedvid['m_id']."'");
	echo $vcnt=$vi->num_rows; ?> views &nbsp;<i class="fas fa-calendar-alt"></i> Published On <?php echo date('d-M-Y',$relatedvid['l_time']); ?>
                                       </div>
                                    </div>
                                 </div>
							  <?php }}else{ ?>
							  <div class="adblock">
                                    <div class="img">
                                       No Related video found<br>
                                    </div>
                                 </div>
							  <?php } ?>
                              </div>
                           </div>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
            <!-- /.container-fluid -->
            <!-- Sticky Footer -->
           <?php require_once("footer.php"); ?>
         </div>
         <!-- /.content-wrapper -->
      </div>
      <!-- /#wrapper -->
      <!-- Scroll to Top Button-->
      <a class="scroll-to-top rounded"  href="#page-top">
      <i class="fas fa-angle-up"></i>
      </a>
      <!-- Logout Modal-->
       <?php require_once("model.php");?>
      <!-- Bootstrap core JavaScript-->
      <script src="vendor/jquery/jquery.min.js"></script>
      <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
      <!-- Core plugin JavaScript-->
      <script src="vendor/jquery-easing/jquery.easing.min.js"></script>
      <!-- Owl Carousel -->
      <script src="vendor/owl-carousel/owl.carousel.js"></script>
      <!-- Custom scripts for all pages-->
      <script src="js/custom.js"></script>
	  <script src="videolib/video.js"></script>

  <!-- If you'd like to support IE8 (for Video.js versions prior to v7) -->
  <script src="videolib/videojs-ie8.min.js"></script>
   </body>
</html>