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
      <link rel="icon" type="image/png" href="../img/favicon.png">
      <!-- Bootstrap core CSS-->
      <link href="../vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
      <!-- Custom fonts for this template-->
      <link href="../vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
      <!-- Custom styles for this template-->
      <link href="../css/osahan.css" rel="stylesheet">
      <!-- Owl Carousel -->
      <link rel="stylesheet" href="../vendor/owl-carousel/owl.carousel.css">
      <link rel="stylesheet" href="../vendor/owl-carousel/owl.theme.css">
	  
   </head>
   <body id="page-top">
      <?php require_once("navbar.php"); ?>
      <div id="wrapper">
         <!-- Sidebar -->
              <?php require_once("sidebar.php"); ?> 
         <div id="content-wrapper">
            <div class="container-fluid upload-details">
               <div class="row">
                  <div class="col-lg-12">
                     <div class="main-title">
                        <h6>Upload Video</h6>
                     </div>
                  </div>
                  
               </div>
               <hr>
               <div class="row">
			    <form id="loginForm" action='javascript:;' name="loginForm" onsubmit="addcat()" Method="POST" enctype="multipart/form-data">
                  <div class="col-lg-12">
                     <div class="osahan-form">
                        <div class="row">
                           <div class="col-lg-12">
                              <div class="form-group">
                                 <label for="e1">Category Title</label>
                                 <input type="text" placeholder="Category Title" value="" id="ct" name="ct" class="form-control">
                              </div>
                           </div>
                        </div>
                     </div>
                     <div class="osahan-area text-center mt-3">
                        <button type="submit" id="login"  class="btn btn-outline-primary">Save Category</button>
                     </div>
                  </div>
				  </form>
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
      <a class="scroll-to-top rounded" href="../#page-top">
      <i class="fas fa-angle-up"></i>
      </a>
      <!-- Logout Modal-->
       <?php require_once("model.php");?>
      <!-- Bootstrap core JavaScript-->
      <script  src="../vendor/jquery/jquery.min.js"></script>
      <script  src="../vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
      <!-- Core plugin JavaScript-->
      <script  src="../vendor/jquery-easing/jquery.easing.min.js"></script>
      <!-- Owl Carousel -->
      <script  src="../vendor/owl-carousel/owl.carousel.js"></script>
      <!-- Custom scripts for all pages-->
      <script  src="../js/custom.js"></script>
	   <link href="date/jquery-ui.css" rel="Stylesheet" type="text/css" />
    <script type="text/javascript" src="date/jquery-ui.js"></script>
   <script language="javascript">
        $(document).ready(function () {
            $("#pdate").datepicker({
                minDate: 0
            });
        });
    </script>
	<script type="text/javascript" >
  function addcat(){
	 var ct=$("#ct").val();
	if(ct!=""){
	var formData = new FormData($('#loginForm')[0]);
    $.ajax({
        url: 'save_cat.php',
        type: 'POST',
        data: formData,
        async: false,
        success: function (data) {
			alert(data);
		if(data == "Success")
		{ 
		//alert(data);
		  $('#loginForm')[0].reset();
			$('#sucess').text("Media Added successfully");
			$('.toast-top-right').show();
			$('.toast-top-right').focus();
			//$('.toast-top-right').fadeOut(5000);
		}
		else
		{ 
		//alert(data);
		 $('#error').html(data);
			$('.toast-top-center').show();
			$('.toast-top-center').focus();
			//$('.toast-top-center').fadeOut(5000);
			$('#loginForm')[0].reset();
		}
        },
        cache: false,
        contentType: false,
        processData: false
    });
	}else{
			$('#error').text("Please Fill All Mandatory Fields");
			$('.toast-top-center').show();
			$('.toast-top-center').focus();
			//$('.toast-top-center').fadeOut(5000);
			$('#fform')[0].reset();
	}
}
   </script>
   </body>
</html>