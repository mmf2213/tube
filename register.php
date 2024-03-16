<?php require_once("dbconnect.php");?>
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
   <body class="login-main-body">
      <section class="login-main-wrapper">
         <div class="container-fluid pl-0 pr-0">
            <div class="row no-gutters">
               <div class="col-md-5 p-5 bg-white full-height">
                  <div class="login-main-left">
                     <div class="text-center mb-5 login-main-left-header pt-4">
                        <img src="img/favicon.png" class="img-fluid" alt="LOGO">
                        <h5 class="mt-3 mb-3">Welcome to Mytube</h5>
                        <!--p>It is a long established fact that a reader <br> will be distracted by the readable.</p-->
                     </div>
                     <form id="loginForm" action='javascript:;' name="loginForm" onsubmit="" Method="POST">
					    <div class="form-group">
                           <label> Name</label>
                           <input type="text" id="uname" name="uname" class="form-control" placeholder="Enter your name ">
                        </div>
                        <div class="form-group">
                           <label>Mobile number</label>
                           <input type="text" id="ucont" name="ucont" maxlength="10" class="form-control" placeholder="Enter mobile number">
                        </div>
                        <div class="form-group">
                           <label>Password</label>
                           <input type="password" id="upass" name="upass" class="form-control" placeholder="Password">
                        </div>
                        <div class="form-group">
                           <label>email</label>
                           <input type="email" id="uemail" name="uemail" class="form-control" placeholder="Enter email">
                        </div>
                        <div class="mt-4">
                           <button type="submit" class="btn btn-outline-primary btn-block btn-lg">Sign Up</button>
                        </div>
                     </form>
                     <div class="text-center mt-5">
                        <p class="light-gray"> Click Here to go back <a href="admin/home.php"> Back </a></p>
                     </div>
                  </div>
               </div>
               <div class="col-md-7">
                  <div class="login-main-right bg-white p-5 mt-5 mb-5">
                     <div class="owl-carousel owl-carousel-login">
                        <div class="item">
                           <div class="carousel-login-card text-center">
                              <img src="img/login.png" class="img-fluid" alt="LOGO">
                              <h5 class="mt-5 mb-3">​Watch videos offline</h5>
                              <p class="mb-4">when an unknown printer took a galley of type and scrambled<br> it to make a type specimen book. It has survived not <br>only five centuries</p>
                           </div>
                        </div>
                        <div class="item">
                           <div class="carousel-login-card text-center">
                              <img src="img/login.png" class="img-fluid" alt="LOGO">
                              <h5 class="mt-5 mb-3">Download videos effortlessly</h5>
                              <p class="mb-4">when an unknown printer took a galley of type and scrambled<br> it to make a type specimen book. It has survived not <br>only five centuries</p>
                           </div>
                        </div>
                        <div class="item">
                           <div class="carousel-login-card text-center">
                              <img src="img/login.png" class="img-fluid" alt="LOGO">
                              <h5 class="mt-5 mb-3">Create GIFs</h5>
                              <p class="mb-4">when an unknown printer took a galley of type and scrambled<br> it to make a type specimen book. It has survived not <br>only five centuries</p>
                           </div>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </section>
      <!-- Bootstrap core JavaScript-->
      <script src="vendor/jquery/jquery.min.js"></script>
	  <script type="text/javascript" src="vendor/jquery/jquery.validate.min.js"></script>
<script type="text/javascript">
//form validation rules
$(document).ready(function(){
	 $("#loginForm").validate({
                rules:{
                 uname:"required",
				 uemail: {
                               required: true,
                               email:true,
				remote:{
			url: 'validemail.php',
			type: "POST"
       			}
                           },
				ucont: {
                               required: true,
							   minlength:10,
                               number:true,
				remote:{
			url: 'validcont.php',
			type: "POST"
       			}
                           },	   
			upass:{
                        required:true,
			    		minlength:5
                    } 
                },
                messages: {
				 uname:"required",
				 uemail: {
                               required: "required",
                               email:"Enter valid email",
								remote:"Already Exsist"
                           },
				ucont: {
                        required: "required",
						minlength:"Enter valid 10 Digit Number ",
                        number:"Enter valid Number",
						remote:"Already Exsist"
                           },	   
			upass:{
                        required:"required",
			    		minlength:"Atleast enter 5 digit Password"
                    } 
                },
                	submitHandler: function(form) {
						logindata();
                }
            });
        });
</script>
<script type="text/javascript" >
  function logindata(){
	  alert("ok");
	var form = $("#loginForm");
	 $('#loginForm').attr('id', 'aaa');
    $.ajax({
        url: 'save_user.php',
        type: 'POST',
        data: form.serialize(),
        success: function(data){
			alert(data);
		if(data == "Success")
		{ 
		 $('#aaa').attr('id', 'loginForm');
		  $('#loginForm')[0].reset();
			$('#sucess').text(" Successfully Registered");
			$('.toast-top-right').show();
			$('.toast-top-right').focus();
			$('.toast-top-right').fadeOut(5000);
		}
		else
		{ 
		 $('#aaa').attr('id', 'loginForm');
		 $('#error').html(data);
			$('.toast-top-center').show();
			$('.toast-top-center').focus();
			$('.toast-top-center').fadeOut(5000);
			$('#loginForm')[0].reset();
		  }
        }
    });
}
   </script>
      <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
      <!-- Core plugin JavaScript-->
      <script src="vendor/jquery-easing/jquery.easing.min.js"></script>
      <!-- Owl Carousel -->
      <script src="vendor/owl-carousel/owl.carousel.js"></script>
      <!-- Custom scripts for all pages-->
      <script src="js/custom.js"></script>
   </body>
</html>