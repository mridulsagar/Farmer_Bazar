<?php
	session_start();
	include_once('db_connect.php');
	$message=array();
	
	if(isset($_POST['name']) && !empty($_POST['name'])){
	$name=mysql_real_escape_string($_POST['name']);
	
	}else{
		$message[]='enter name';
	}
	if(isset($_POST['email']) && !empty($_POST['email'])){
		$email=mysql_real_escape_string($_POST['email']);
		
		if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
					$message[] = 'email not valid';
				}
	
	}else{
		$message[]='enter email';
	}
	if(isset($_POST['password']) && !empty($_POST['password'])){
		$password=mysql_real_escape_string($_POST['password']);
	
	}else{
		$message[]='enter password';
	}

	if(isset($_POST['address']) && !empty($_POST['address'])){
		$address=mysql_real_escape_string($_POST['address']);
		
	}else{
		$message[]='enter address';
	}
	if(isset($_POST['phone_number']) && !empty($_POST['phone_number'])){
		$phone_number=mysql_real_escape_string($_POST['phone_number']);
		
	}else{
		$message[]='enter phone_number';
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
		
	
			$sql = "INSERT INTO tbl_user (id,name,email,password,phone_number,address,type) VALUES (' ','$_POST[name]','$_POST[email]','$_POST[password]','$_POST[phone_number]','$_POST[address]','$_POST[type]');";
			if(mysqli_query($conn, $sql)) {
						echo  'Congratulation! Account Created You may Login now';
					
						
					echo"<meta http-equiv='refresh' content='5;url=index.php'>";
					//include'footer.php';
			
				}
				else{
					echo  'SorryPlease try again';
					
					
					//include'footer.php';
					
					echo"<meta http-equiv='refresh' content='5;url=index.php'>";
				}
		
	}

	?>