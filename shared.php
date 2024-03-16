<?php require_once("lock.php"); ?>
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
      <link rel="icon" type="image/png" href="img/favicon.png">
      <!-- Bootstrap core CSS-->
      <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
      <!-- Custom fonts for this template-->
      <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
      <!-- Custom styles for this template-->
      <link href="css/osahan.css" rel="stylesheet">
      <!-- Owl Carousel -->
      <link rel="stylesheet" href="vendor/owl-carousel/owl.carousel.css">
      <link rel="stylesheet" href="vendor/owl-carousel/owl.theme.css">
   </head>
   <body id="page-top">
     <?php require_once("navbar.php"); ?>
      <div id="wrapper">
         <!-- Sidebar -->
         <?php require_once("sidebar.php"); ?>
         <div id="content-wrapper">
            <div class="container-fluid pb-0">
               
               
               <hr>
               <div class="video-block section-padding">
                  <div class="row" id="display">
                     <div class="col-md-12">
                        <div class="main-title">
                           
                           <h6>TOP Videos</h6>
                        </div>
                     </div>
						<?php $getvid=$DBcon->query("SELECT m.*,c.cat_name,st.to_id,u.u_name FROM media m, m_cat c, shareto st,users u WHERE m.cat_id=c.cat_id AND st.to_id='$ucn' AND st.u_id=u.u_id AND m.m_id=st.m_id AND m.m_flag=1 AND m.l_time <='$ctime'"); 
						$vicnt=$getvid->num_rows;
						if($vicnt>=1){
							  while($vid=$getvid->fetch_array()){
								  $prv=str_replace("../","",$vid['m_prv']); ?>
                     <div class="col-xl-3 col-sm-6 mb-3">
                        <div class="video-card">
                           <div class="video-card-image">
                              <a class="play-icon" href="watch?v=<?php echo $vid['m_time']."_".$vid['m_id']; ?>"><i class="fas fa-play-circle"></i></a>
                              <a href="#"><img class="img-fluid"  src="<?php echo $prv; ?>" alt=""></a>
                              
                           </div>
                           <div class="video-card-body">
                              <div class="video-title">
                                 <a href="#"><?php echo $vid['m_head']; ?></a>
                              </div>
                              <div class="video-page text-success">
                                 <?php echo $vid['cat_name']; ?>  <a title="" data-placement="top" data-toggle="tooltip" href="#" data-original-title="Verified"><i class="fas fa-check-circle text-success"></i></a>
                              </div>
							  <div class="video-page text-success">
                                 Share by <?php echo $vid['u_name']; ?>  <a title="" data-placement="top" data-toggle="tooltip" href="#" data-original-title="Verified"><i class="fas fa-check-circle text-success"></i></a>
                              </div>
                              <div class="video-view">
                                 <?php  $vimain=$DBcon->query("select * from visiters WHERE m_id='".$vid['m_id']."'");
	echo $vmcnt=$vimain->num_rows;  ?> views &nbsp;<i class="fas fa-calendar-alt"></i> <?php echo date('d-M-Y',$vid['l_time']); ?>
                              </div>
                           </div>
                        </div>
                     </div>
						<?php }}else{ ?>
								<div class="alert alert-danger"  style="width:100%; "role="alert">
                           No Video Found
                        </div>
						<?php } ?>
                  </div>
               </div>
               <hr class="mt-0">
            </div>
            <!-- /.container-fluid -->
            <!-- Sticky Footer -->
            <?php require_once("footer.php"); ?>
         </div>
         <!-- /.content-wrapper -->
      </div>
      <!-- /#wrapper -->
      <!-- Scroll to Top Button-->
      <a class="scroll-to-top rounded" href="#page-top">
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
   </body>
</html>