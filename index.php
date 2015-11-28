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
		<link rel="stylesheet" href="ukit/css/uikit.min.css" />
       
    
		<link rel="stylesheet" href="css/bootstrap.css">
		<link href="css/bootstrap.min.css" rel="stylesheet">
        <link rel="stylesheet" href="css/slicknav.css">
        <link rel="stylesheet" href="css/font-awesome.min">
        <link rel="stylesheet" href="css/normalize.css">
		
		
		<!--script src="src/bootstrap-rating-input.js"></script-->
		<script src="build/bootstrap-rating-input.min.js"></script>
    
    
        <script src="js/vendor/modernizr-2.6.2.min.js"></script>
		<link rel="stylesheet" href="style.css">
		<link rel="stylesheet" href="responsive.css">
		
		
			<script>
      $(function(){
        $('input').on('change', function(){
          alert("Changed: " + $(this).val())
        });
      });
    </script>
		<script type="text/javascript">
		
		
		function myFunction() {
			
			var category = document.getElementById("s_category_type").value;
			 
			if( category=="")
			 {
				 alert("category Need");
			 }
		
		 
		 
			
			var district = document.getElementById("s_district_list").value;
			var order = document.getElementById("s_order_list").value;
	
		
			// Returns successful data submission message when the entered information is stored in database.
			var dataString = 'category='+category+'&district='+district+'&order='+order;
			
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
		
			<?php 
			
			if(!empty($_SESSION['user_type'])&&$_SESSION['user_type']=='farmer')
			{
				include('navbar2.php');
			}else if(!empty($_SESSION['user_type'])&&$_SESSION['user_type']=='buyer')
			{
				include('navbar3.php');
			}
			else{
				include('navbar1.php');
			}
			//include('navbar1.php');
			
			
			
			?>
		
		
	
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
		<section id="search_area">
							<div class="container">
							<br>
							<br>
								<h3> &nbsp সার্চ  করুন</h3>
		
						<div class="search_area com-xs-12 col-sm-12 col-md-12 col-lg-12">
							
							
							<div class="panel_form com-xs-12 col-sm-12 col-md-12 col-lg-12">
							
						
								
								<form id="form"  name="form" > 
								
							
										  
											<div class="col-xs-12 col-sm-6 col-md-6 col-lg-3">
											
												 <select  id="s_category_type" name="s_category_type" class="custom_input" >
												 
												  <option  value="" >---নির্বাচন করুন---</option>
												  <option value="<?php if(!empty($_GET['category'])) echo $_GET['category'];?>" <?php if(!empty($_GET['category'])) echo 'selected';?> ><?php if(!empty($_GET['category'])) echo $_GET['category'];?></option>
												  <option  value="seed">শস্য</option>
												  <option value="oil">তৈল</option>
												  </select>
								
											</div>
											
											
										
											
											<div class="col-xs-12 col-sm-6 col-md-6 col-lg-3">
											
											<select id="s_district_list" name="district"  class="custom_input"> 
											
											<option value="" >---জেলা নির্বাচন করুন---</option>
											<option value="<?php if(!empty($_GET['district'])) echo $_GET['district'];?>" <?php if(!empty($_GET['district'])) echo 'selected';?>><?php if(!empty($_GET['district'])) echo $_GET['district'];?></option>
											  <option value="sylhet">সিলেট</option>
											  <option value="sunamgonj">ুনামগঞ্জ</option>
											  <option value="hobigonj">হবিগঞ্জ</option>
											  <option value="moulovibazar">মৌলভিবাজার</option>
											</select>
												
											
											</div>
											
											
											<div class="col-xs-12 col-sm-6 col-md-6 col-lg-3">
											
											<select name="s_order_list" id="s_order_list" class="custom_input"> 
											  <option value="category">শ্রেণী</option>
											  <option value="subcategory">উপ-শ্রেণী</option>
											  <option value="district">জেলা </option>
											  <option value="expire_date">মেয়াদ উত্তীর্ণের  তারিখ</option>
											  <option value="id"> ক্রমানুসারে </option>
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

				include("view.php");
				
				?>
				
				</div>
				
				</form>
					
				</div>
				
				
		</section>
		
		
		
		<?php 
		if(!empty($_SESSION['user_type'])&&$_SESSION['user_type']=='farmer')
			{
				include('indexinclude1.php');
			}else if(!empty($_SESSION['user_type'])&&$_SESSION['user_type']=='buyer')
			{
			
			}
			else{
				include('indexinclude.php');
			}
		
		
		
		
		
		
		?>

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

		
		
		<!-- Circle  -->

		
		
		
		 <script src="ukit/js/jquery.js"></script>
        <script src="ukit/js/uikit.min.js"></script>
		
		<script src="js/jquery.slicknav.js"></script>
		<script type="text/javascript">
		$(document).ready(function(){
			$('#menu').slicknav();
		});
		</script>
		
		
        <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
        <script>window.jQuery || document.write('<script src="js/vendor/jquery-1.10.2.min.js"><\/script>')</script>
        <script src="js/bootstrap.min.js"></script>
        <script src="js/plugins.js"></script>
        <script src="js/main.js"></script>       
		
		

    </body>
</html>
