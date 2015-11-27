<?php
require_once("dbcontroller.php");
$db_handle = new DBController();
$query ="SELECT DISTINCT country FROM tbl_profile ORDER BY country";
$results = $db_handle->runQuery($query);
?>

<!DOCTYPE html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js"> <!--<![endif]-->
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>কৃষক বাজার  | Farmer Bazzar </title>
        <meta name="description" content="">


        <!-- Place favicon.ico and apple-touch-icon.png in the root directory -->
        <link href="http://netdna.bootstrapcdn.com/font-awesome/4.1.0/css/font-awesome.min.css" rel="stylesheet">
		
		<link rel="stylesheet" type="text/css" href="css/custom.css" />
		<link rel="stylesheet" href="ukit/css/uikit.min.css" />
       
    
		<link rel="stylesheet" href="css/bootstrap.css">
		<link href="css/bootstrap.min.css" rel="stylesheet">
        <link rel="stylesheet" href="css/slicknav.css">
        <link rel="stylesheet" href="css/font-awesome.min">
        <link rel="stylesheet" href="css/normalize.css">
    
        <script src="js/vendor/modernizr-2.6.2.min.js"></script>
		<link rel="stylesheet" href="style.css">
		<link rel="stylesheet" href="responsive.css">
		
		<script type="text/javascript">
function validInsert(){
	 var type = document.getElementById("user-list").value;
	  var name=$('#name').val();
	  var email=$('#email').val();
	  var password=$('#password').val();
	  var address=$('#address').val();
	  var phone=$('#phone_number').val();
	  var file=$('#fileToUpload').val();

	  var dataString = 'name='+ name + '&email='+ email + '&password='+ password + '&phone_number='+ phone + '&type='+ type + '&address='+ address;
	  $("#flash").show();
	  $("#flash").fadeIn(400).html('<img src="img/loading.gif" />');
	  $.ajax({
	  type: "POST",
	  url: "signup_val.php",
	  data: dataString,
	  cache: false,
	  success: function(result){
			   var result=trim(result);
			   $("#flash").hide();
			   if(result=='correct'){
					
			   }else{
					 $("#errorMessage").html(result);
			   }
	  }
	  });
}

function trim(str){
	 var str=str.replace(/^\s+|\s+$/,'');
	 return str;
}
</script>
		
		
		
		
		
		
		
		
		
		<script>
function getState(val) {
	$.ajax({
	type: "POST",
	url: "get_district.php",
	data:'country_id='+val,
	success: function(data){
		$("#district-list").html(data);
	}
	});
}

</script>

		<script>
function getArea(val) {
	$.ajax({
	type: "POST",
	url: "get_area.php",
	data:'district_id='+val,
	success: function(data){
		$("#area-list").html(data);
	}
	});
}

</script>
    </head>
    <body>
        <!--[if lt IE 7]>
            <p class="browsehappy">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
        <![endif]-->

        <!-- Add your site or application content here -->
        <!-- header start here -->

        <header>
		
		<div class="container">
			<div class="row">
				<div class="topbar_left col-xs-12 col-sm-12 col-md-7 col-lg-7" >
				<img class="logoimg" src="img/banner.png" alt="doctor chember" />
				</div>
				
				<div class="topbar_right col-xs-12 col-sm-12 col-md-5 col-lg-5">
				<p> You are logged in</p>
				</div>

			
		</div>
		
		<div class="clearfix"></div>

        </header>
		
			<section class="control_panel">
						<div class="myspnav">
						<div class="h_container">
						
						
						<nav class="mynav navbar navbar-default" role="navigation">
						  <div class="container-fluid">
							<!-- Brand and toggle get grouped for better mobile display -->
							<div class="navbar-header">
							  <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
								<span class="sr-only">Toggle navigation</span>
								<span class="icon-bar"></span>
								<span class="icon-bar"></span>
								<span class="icon-bar"></span>
							  </button>
							  
							</div>

							<!-- Collect the nav links, forms, and other content for toggling -->
							<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
							
						
							  <ul class="custom_nav nav navbar-nav navbar-left ">
								<li><a href="#top_nav_bar"><span class="glyphicon glyphicon-home"></span> হোম </a></li>
								<li><a href="#sign_up_area"><span class="glyphicon glyphicon-share"></span> সাইন আপ </a></li>
								<li><a href="#login_area"><span class="glyphicon glyphicon-user"></span> লগ ইন</a></li>
								<li><a href="#"><span class="glyphicon glyphicon-search"></span> সার্চ </a></li>
								<li class="dropdown">
								  <a href="#" class="dropdown-toggle" data-toggle="dropdown">Account<b class="caret"></b></a>
								  <ul class="dropdown-menu">
									<li><a href="#">Account Settings</a></li>
									<li><a href="#">Profile Settings</a></li>
									<li><a href="#">View Profile</a></li>
									<li class="divider"></li>
									<li><a href="#">Log Out</a></li>
								  </ul>
								</li>
							  </ul>
							</div><!-- /.navbar-collapse -->
						  </div><!-- /.container-fluid -->
						</nav>

		
		
		</section>
		
		
	
			<section id="top_nav_bar" class="top_area">
				
					
					
					<div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
					<!-- Indicators -->
					  <ol class="carousel-indicators">
						<li data-target="#carousel-example-generic" data-slide-to="0" class="active"></li>
						<li data-target="#carousel-example-generic" data-slide-to="1"></li>
						<li data-target="#carousel-example-generic" data-slide-to="2"></li>
						<li data-target="#carousel-example-generic" data-slide-to="3"></li>
					  </ol>

					  <!-- Wrapper for slides -->
					  <div class="carousel-inner" role="listbox">
						<div class="item active">
						  <img src="img/slider1.jpg" alt="...">
						  <div class="carousel-caption">
							...
						  </div>
						</div>
						<div class="item">
						  <img src="img/slider2.jpg" alt="...">
						  <div class="carousel-caption">
							...
						  </div>
						</div>
						<div class="item">
						  <img src="img/slider3.jpg" alt="...">
						  <div class="carousel-caption">
							...
						  </div>
						</div>
						<div class="item">
						  <img src="img/slider4.jpg" alt="...">
						  <div class="carousel-caption">
							...
						  </div>
						</div>
						
					  </div>

					  <!-- Controls -->
					  <a class="left carousel-control" href="#carousel-example-generic" role="button" data-slide="prev">
						<span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
						<span class="sr-only">Previous</span>
					  </a>
					  <a class="right carousel-control" href="#carousel-example-generic" role="button" data-slide="next">
						<span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
						<span class="sr-only">Next</span>
					  </a>
					</div>
					
					
					
					
					
					
			
			
		
	
			
	
		
		</section>
		
		
		
		<section id="sign_up_area" class="top_area">
				
				
							<div class="container">
					
						
							<div class="form_aside col-xs-0 col-sm-0 col-md-6 col-lg-6 ">
							
							<p> কৃষি কাজ নয় আধুনিক কৃষি কাজই আমাদের লক্ষ্য <br>
							এগিয়ে যাছেচ বাংলাদেশ <br>
							কৃষির উন্নতি দেশের উন্নতি<br>
							ডিজিটাল দেশের ডিজিটাল কৃষক<br>
							</p>
							</div>
							<div class="form_area login col-xs-12 col-sm-12 col-md-6 col-lg-6 ">
							
							
								
								<table class="tabledesign">
								<br>
								<h3>সাইন আপ </h3>
								<tr>
								  <td><p>Name</p> </td>
								  <td><input class="custom_input" id="name" type="text" name="name" placeholder="Enter Your Name">
								  </td>
								  
								  </tr>
								 
								  
								  <tr>
								  <td><p>E-mail</p> </td>
								  <td><input class="custom_input" id="email" type="text" name="email" placeholder="email@example.com">
								  </td>
								  
								  </tr>
								  
								 <tr>
								  <td> <p>Password</p> </td>
								  <td> <input class="custom_input" id="password"  type="password" name="password"  placeholder="type your password">
								 </td>
								  
								 </tr>
								 
								 
								 <tr>
								  <td> <p>Address</p> </td>
								  <td> <textarea class="custom_input" id="address"  name="address"  placeholder="type your address"></textarea>
								 </td>
								  
								 </tr>
								 
								  <tr>
								  <td> <p>Phone</p> </td>
								  <td> <input class="custom_input" id="phone_number"  type="text" name="phone_number"  placeholder="01916355002">
								 </td>
								  
								 </tr>
									
									
								<tr>
								  <td> <p>User Type</p> </td>
								  <td> <select name="country" id="user-list" class="custom_input"> 
								  <option value="farmer">Farmer</option>
								  <option value="buyer">Buyer</option>
								 </td>
								  
								 </tr>
								  
								<tr>
								  <td></td>
								  <td> <input type="button" class="btn btn-default btn_book" name="submit" value="Sign Up Now" onclick="validInsert()"></td>
								</tr>
								 
								 
								<tr><td></td><td id="flash"></td></tr>
								  
								<tr><td></td><td id="errorMessage"></td></tr>
								
								
								</table>
							
							
							
							
							
							</div>
				
				
						</div>
				</div>
		

		
		</section>
		
				<section id="login_area" class="top_area">
				
							
							<div class="container">
					
						
						
							<div class="form_area login col-xs-12 col-sm-12 col-md-6 col-lg-6 ">
							
							
								
								<table class="tabledesign">
								<br>
								<h3>লগ ইন</h3>
								<tr>
								
								  <tr>
								  <td><p>E-mail</p> </td>
								  <td><input class="custom_input" id="email" type="text" name="email" placeholder="email@example.com">
								  </td>
								  
								  </tr>
								  
								 <tr>
								  <td> <p>Password</p> </td>
								  <td> <input class="custom_input" id="password"  type="password" name="password"  placeholder="type your password">
								 </td>
								  
								 </tr>
								 
					
								<tr>
								  <td></td>
								  <td> <input type="button" class="btn btn-default btn_book" name="submit" value="Log in" onclick="validLogin()"></td>
								</tr>
								 
								 
								<tr><td></td><td id="flash"></td></tr>
								  
								<tr><td></td><td id="errorMessage"></td></tr>
								
								
								</table>
							
							
							
							
							
							</div>
							
							<div class="form_aside col-xs-0 col-sm-0 col-md-6 col-lg-6 ">
							
							<p> কৃষি কাজ নয় আধুনিক কৃষি কাজই আমাদের লক্ষ্য <br>
							এগিয়ে যাছেচ বাংলাদেশ <br>
							কৃষির উন্নতি দেশের উন্নতি<br>
							ডিজিটাল দেশের ডিজিটাল কৃষক<br>
							</p>
							</div>
				
				
						</div>
				</div>
		

		
		</section>

        
		

        <!-- footer start here -->
        <footer>
				<div class="container">
			
					  
					  <div class="footer_area center col-xs-12 col-sm-12 col-md-4 col-lg-4">
								
						<span class="custom_icon icon_color_12 glyphicon glyphicon-map-marker col-xs-12 col-sm-12 col-md-12 col-lg-12"></span></a>
						
						<h3>যোগাযোগের ঠিকানা</h3>
						<p>বাংলাদেশ<br>: ০১৯১৬৩৫৫০০২</p>
					  </div>
					  
					  <div class="footer_area center col-xs-12 col-sm-12 col-md-4 col-lg-4">
								
						<i class="custom_icon uk-icon-facebook icon_color_5"></i>
						<i class="custom_icon uk-icon-linkedin icon_color_6"></i>
						<i class="custom_icon uk-icon-twitter icon_color_7"></i>
						<h3>অনুসরন করুন</h3>
						<p>ফেসবুক, টুইটার এবং লিঙ্কড ইন </p>
					  </div>
					  
							
					   <div class="footer_area center col-xs-12 col-sm-12 col-md-4 col-lg-4">
								
						<span class="custom_icon icon_color_8 glyphicon glyphicon-barcode col-xs-12 col-sm-12 col-md-12 col-lg-12"></span>
						
						
						<h4> নিরমাতা দল </h4>
						<p> ত্রিপল ওয়ান - Triple One &#169; <?php echo date("Y")?></p>
						</div>
						
						
		 </div>
	

		

        </footer>
        <!-- footer ends here -->


        <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
        <script>window.jQuery || document.write('<script src="js/vendor/jquery-1.10.2.min.js"><\/script>')</script>
        <script src="js/bootstrap.min.js"></script>
        <script src="js/plugins.js"></script>
        <script src="js/main.js"></script>       
		
		<!-- Circle  -->
		<script src="js/circular-progress.js"></script>
		<script>


		(function () {
		  var n, id, progress;

		  progress = new CircularProgress({
			radius: 50,
			lineWidth: 2,
			strokeStyle: 'black',
			initial: {
			  lineWidth: 4,
			  strokeStyle: '#fba919'
			}
		  });

		  document.getElementById('counter1').appendChild(progress.el); 

		  n = 0;
		  id = setInterval(function () {
			if (n == 75) clearInterval(id);
			progress.update(n++);
		  }, 70);
		})();
		
		(function () {
		  var n, id, progress;

		  progress = new CircularProgress({
			radius: 50,
			lineWidth: 2,
			strokeStyle: 'black',
			initial: {
			  lineWidth: 4,
			  strokeStyle: '#fba919'
			}
		  });

		  document.getElementById('counter2').appendChild(progress.el); 

		  n = 0;
		  id = setInterval(function () {
			if (n == 63) clearInterval(id);
			progress.update(n++);
		  }, 70);
		})();
		
		(function () {
		  var n, id, progress;

		  progress = new CircularProgress({
			radius: 50,
			lineWidth: 2,
			strokeStyle: 'black',
			initial: {
			  lineWidth: 4,
			  strokeStyle: '#fba919'
			}
		  });

		  document.getElementById('counter3').appendChild(progress.el); 

		  n = 0;
		  id = setInterval(function () {
			if (n == 57) clearInterval(id);
			progress.update(n++);
		  }, 70);
		})();

		</script>

		
		
		<!-- Circle  -->

		
		
		
		 <script src="ukit/js/jquery.js"></script>
        <script src="ukit/js/uikit.min.js"></script>
		
		<script src="js/jquery.slicknav.js"></script>
		<script type="text/javascript">
		$(document).ready(function(){
			$('#menu').slicknav();
		});
		</script>
		

    </body>
</html>
