<?php
	session_start();
	include_once('db_connect.php');
	$message=array();
	
	
	if(isset($_POST['price_range']) && !empty($_POST['price_range'])){
		$price_range=mysql_real_escape_string($_POST['price_range']);
	
	}else{
		$message[]='price range';
	}


	$countError=count($message);

	if($countError > 0){
		 for($i=0;$i<$countError;$i++){
				  echo '<span class="error">'.$message[$i].'</span>';
				  if($i>=0 && $i<$countError-1){
					  echo'<span class="error"> & </span>';
				  }
		 }
	}else{
		


	//strat my sql//
		
	
			$sql = "INSERT INTO tbl_product (id,category,subcategory,price_range,expire_date,district,u_id) VALUES (' ','$_POST[category]','$_POST[subcategory]','$_POST[price_range]','$_POST[expire_date]','$_POST[district]',".$_SESSION['user_id'].");";
			if(mysqli_query($conn, $sql)) {
					echo  'Congratulation! Product Added';
				
						
					echo"<meta http-equiv='refresh' content='5;url='>";
					//include'footer.php';
			
				}
			else{
				echo  'SorryPlease try again';
					
					
					//include'footer.php';
					
		echo"<meta http-equiv='refresh' content='5;url=index.php'>";
				}
		
	}

	?>