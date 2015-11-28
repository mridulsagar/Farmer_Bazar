<?php session_start();?>
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
		
		<!-- ukit  -->
		
		<link rel="stylesheet" href="ukit/css/uikit.min.css" />
        <script src="ukit/js/jquery.js"></script>
        <script src="ukit/js/uikit.min.js"></script>
		
		 <link rel="stylesheet" href="ukit/css/uikit.docs.min.css">
       
        <script src="ukit/js/jquery.js"></script>
        <script src="ukit/js/components/datepicker.js"></script>
        <script src="ukit/js/components/form-select.js"></script>
		
		<!-- ukit  -->
       
    
		<link rel="stylesheet" href="css/bootstrap.css">
		<link href="css/bootstrap.min.css" rel="stylesheet">
        <link rel="stylesheet" href="css/slicknav.css">
        <link rel="stylesheet" href="css/font-awesome.min">
        <link rel="stylesheet" href="css/normalize.css">
    
        <script src="js/vendor/modernizr-2.6.2.min.js"></script>
		<link rel="stylesheet" href="style.css">
		<link rel="stylesheet" href="responsive.css">

		<script type="text/javascript">
		
		
		function myFunction() {
			var district = document.getElementById("s_district_list").value;
			var order = document.getElementById("s_order_list").value;
	
		
			// Returns successful data submission message when the entered information is stored in database.
			var dataString = 'district='+district+'&order='+order;
			
			// AJAX code to submit form.
			$.ajax({
			type: "POST",
			url: "view.php",
			data: dataString,
			cache: false,
			success: function(data) {
			$("#result").html(data);
			}
			});
			
			
			}

		
		</script>		
		
		
		
<script type="text/javascript">
		
		
function validProduct(){
	 var category = document.getElementById("category_type").value;
	 
	if( category=="")
	 {
		 alert("category Need");
	 }
	 else {
		
		
			 
			 if(category =="oil")
			 {
				 var subcate = document.getElementById("oil_sub_type").value;
				 if( subcate=="")
				 {
					 alert("Oil Sub category Need");
				 }
		 
			 }
			 else if(category =="seed")
			 {
				 var subcate = document.getElementById("seed_sub_type").value;
				 if( subcate=="")
				 {
					 alert("Seed Sub category Need");
				 }
				
			 }
	 }
		 
		 
	 
	 
	 
	 var district = document.getElementById("district-list").value;
	 if(district=="")
	 {
		 alert("District Need");
	 }
	 
	  var price=$('#price_range').val();
	  var expire=$('#expire_date').val();
	 
	   
	  var dataString = 'category='+ category + '&subcategory='+ subcate + '&price_range='+ price+'&district='+ district+'&expire_date='+ expire;
	  $("#flash").show();
	  $("#flash").fadeIn(400).html('<img src="img/loading.gif" />');
	  $.ajax({
	  type: "POST",
	  url: "product_val.php",
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

<script type="text/javascript">
function validLogin(){
	  var email=$('#email_in').val();
	  var password=$('#password_in').val();

	  var dataString = 'email='+ email + '&password='+ password;
	  $("#flash_in").show();
	  $("#flash_in").fadeIn(400).html('<img src="img/loading.gif" />');
	  $.ajax({
	  type: "POST",
	  url: "login_val.php",
	  data: dataString,
	  cache: false,
	  success: function(result){
			   var result=trim(result);
			   $("#flash_in").hide();
			   if(result=='correct'){
					
			   }else{
					 $("#errorMessage_in").html(result);
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
				<p> <?php if(!empty($_SESSION['user_name'])&&!empty($_SESSION['user_type'])){echo'Hello '.$_SESSION['user_name'].'<br>You are Looged in as '.$_SESSION['user_type'].'';}?></p>
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
								<li><a href="#product_area"><span class="glyphicon glyphicon-share"></span> নতুন পণ্য যোগ করুন </a></li>
								<li><a href="#login_area"><span class="glyphicon glyphicon-user"></span> লগ ইন</a></li>
								<li><a href="#search_area"><span class="glyphicon glyphicon-search"></span> সার্চ </a></li>
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
		
		
		
		<section id="product_area" class="top_area">
				
				
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
								<h3> নতুন পণ্য যোগ করুন</h3>
								<tr>
								  <td><p>Category</p> </td>
								  <td>
								  <select onchange="yesnoCheck(this);"  id="category_type" name="category_type" class="custom_input" >
								  <option  value="" >---Select---</option>
								  <option  value="seed">Seed</option>
								  <option value="oil">Oil</option>
								  </select>
								  </td>
								</tr>
								
								
								<tr>
								  <td><p id="seed_sub" style="display:none">Seed Sub</p></td>
								  <td>
								  <select id="seed_sub_type" style="display:none" name="seed_sub_type" class="custom_input" >
								  <option  value="" >---Select---</option>
								  <option  value="rice">Rice</option>
								  <option value="gom">Gom</option>
								  </select>
								  </td>
								</tr>
								
								<tr>
								 <td><p id="oil_sub" style="display:none">Oil Sub</p></td>
								  <td>
								  <select id="oil_sub_type" style="display:none"  name="oil_sub_type" class="custom_input" >
								  <option  value="" >---Select---</option>
								  <option  value="soya">Soya</option>
								  <option value="sorisa">Sorisa</option>
								  </select>
								  </td>
								</tr>
								 
								  
								  <tr>
								  <td><p>Price Range</p> </td>
								  <td><input class="custom_input" id="price_range" type="text" name="price_range" placeholder="35-40 TK">
								  </td>
								  
								  </tr>
								  
								  
								  <tr>
								  <td> <p>District</p> </td>
								  <td> <select name="district" id="district-list" class="custom_input"> 
								  <option value="sylhet">Sylhet</option>
								  <option value="sunamgonj">Sunamgonj</option>
								  <option value="hobigonj">Hobigonj</option>
								  <option value="moulovibazar">Moulovibazar</option>
								  </select>
								  
								 </td>
								  
								 </tr>
				
								  <tr>
								  <td> <p>Expire Date</p> </td>
								  <td> <input class="custom_input" id="expire_date"  type="text" name="expire_date" value="<?php echo date('d-m-Y')?>" data-uk-datepicker="{format:'DD-MM-YYYY',minDate:0}" placeholder="dd-mm-yyyy" readonly>
								 </td>
								  
								 </tr>
									
									
								<tr>
								  <td> <p>User Type</p> </td>
								  <td> <input class="custom_input" id="u_id" type="text" name="u_id" value="<?php if(!empty($_SESSION['user_id']))echo $_SESSION['user_id'];?>"placeholder="user id">
								 </td>
								  
								 </tr>
								  
								<tr>
								  <td></td>
								  <td> <input type="button" class="btn btn-default btn_book" name="submit" value="Enter" onclick="validProduct()"> </td>
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
								  <td><input class="custom_input" id="email_in" type="text" name="email" placeholder="email@example.com">
								  </td>
								  
								  </tr>
								  
								 <tr>
								  <td> <p>Password</p> </td>
								  <td> <input class="custom_input" id="password_in"  type="password" name="password"  placeholder="type your password">
								 </td>
								  
								 </tr>
								 
					
								<tr>
								  <td></td>
								  <td> <input type="button" class="btn btn-default btn_book" name="submit" value="Log in" onclick="validLogin()"></td>
								</tr>
								 
								 
								<tr><td></td><td id="flash_in"></td></tr>
								  
								<tr><td></td><td id="errorMessage_in"></td></tr>
								
								
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
		
		
		
		<section id="search_area">
				
					<div class="container">
								<h3> &nbsp সার্চ  করুন</h3>
		
						<div class="search_area com-xs-12 col-sm-12 col-md-12 col-lg-12">
							
							
							<div class="panel_form com-xs-12 col-sm-12 col-md-12 col-lg-12">
							
						
								
								<form id="form"  name="form" > 
								
							
										  
											<div class="col-xs-12 col-sm-6 col-md-6 col-lg-3">
											
												 <select onchange="SearchCheck(this);"  id="s_category_type" name="s_category_type" class="custom_input" >
												  <option  value="" >---Select Category---</option>
												  <option  value="seed">Seed</option>
												  <option value="oil">Oil</option>
												  </select>
								
											</div>
											
											<div id="s_seed_sub" style="display:none" class="col-xs-12 col-sm-6 col-md-6 col-lg-3">
											
													
													  <select id="s_seed_sub_type" style="display:none" name="seed_sub_type" class="custom_input" >
													  <option  value="" >---Select Seed Sub Category---</option>
													  <option  value="rice">Rice</option>
													  <option value="gom">Gom</option>
													  </select>
													
											</div>		
											<div id="s_oil_sub" style="display:none" class="col-xs-12 col-sm-6 col-md-6 col-lg-3">		
													  <select id="s_oil_sub_type" style="display:none"  name="oil_sub_type" class="custom_input" >
													  <option  value="" >---Select Oil Sub Category---</option>
													  <option  value="soya">Soya</option>
													  <option value="sorisa">Sorisa</option>
													  </select>
													  </td>
													</tr>
											</div>		
											
											
											
											<div class="col-xs-12 col-sm-6 col-md-6 col-lg-3">
											
											<select id="s_district_list" name="district"  class="custom_input"> 
											  <option value="sylhet">Sylhet</option>
											  <option value="sunamgonj">Sunamgonj</option>
											  <option value="hobigonj">Hobigonj</option>
											  <option value="moulovibazar">Moulovibazar</option>
											</select>
												
											
											</div>
											
											
											<div class="col-xs-12 col-sm-6 col-md-6 col-lg-3">
											
											<select name="s_order_list" id="s_order_list" class="custom_input"> 
											  <option value="category">Category</option>
											  <option value="subcategory">Sub Category</option>
											  <option value="district">District </option>
											  <option value="id"> Serial Wise </option>
											</select>
											
												
											
											</div>
											
											
											
													
							
							</div>
							
								<input id="submit" onclick="myFunction()" class="button_custom btn btn-default btn_book" type="button" name="submit" value="Search">
								
							
						</div>
					</div>
			
			
	
		
		</section>
		 <section class="search_result">
		
				<div class="container">
				<div id="result" class="search_result_show col-xs-12 col-sm-12 col-md-12 col-lg-12">
				<tr><td></td><td id="flash3"></td></tr>
				<?php

				//include("search_result_view.php");
				
				?>
				
				</div>
				
				</form>
					
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

		    <script>
    function yesnoCheck(that) {
        if (that.value == "seed") {
         
            document.getElementById("seed_sub").style.display = "block";
            document.getElementById("seed_sub_type").style.display = "block";
        }else {
          
			document.getElementById("seed_sub").style.display = "none";
            document.getElementById("seed_sub_type").style.display = "none";
        }
		
		if (that.value == "oil") {
             document.getElementById("oil_sub").style.display = "block";
            document.getElementById("oil_sub_type").style.display = "block";
			
        } else {
              document.getElementById("seed_sub").style.display = "none";
            document.getElementById("s_oil_sub_type").style.display = "none";
        }

    }
</script>
		
		
		
<script>
    function SearchCheck(that) {
        if (that.value == "seed") {
         
            document.getElementById("s_seed_sub").style.display = "block";
            document.getElementById("s_seed_sub_type").style.display = "block";
        }else {
          
			document.getElementById("s_seed_sub").style.display = "none";
            document.getElementById("s_seed_sub_type").style.display = "none";
        }
		
		if (that.value == "oil") {
             document.getElementById("s_oil_sub").style.display = "block";
            document.getElementById("s_oil_sub_type").style.display = "block";
			
        } else {
               document.getElementById("s_oil_sub").style.display = "none";
            document.getElementById("oil_sub_type").style.display = "none";
        }

    }
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
