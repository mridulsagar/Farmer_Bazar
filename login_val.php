<?php
	session_start();
	include_once('db_connect.php');
	$message=array();
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

	$countError=count($message);

	if($countError > 0){
		 for($i=0;$i<$countError;$i++){
				  echo '<span class="error">'.$message[$i].'</span>';
				  if($i>=0 && $i<$countError-1){
					  echo'<span class="error"> & </span>';
				  }
		 }
	}else{
		$query="select * from tbl_user where email='$email' AND password='$password'";

		$result=mysqli_query($conn,$query);
				
					if(mysqli_num_rows($result)>0){
					//outpot of data each row//
						
						while($row=mysqli_fetch_assoc($result)){
							
							//echo "".$row['id']." ".$row['password']."";//
						$temp_id=$row['id'];
						$temp_name=$row['name'];
						$temp_email=$row['email'];
						$temp_password=$row['password'];
						$temp_type=$row['type'];
						
						
						

						}
						
						
						
						if(($temp_email==$_POST["email"])&&($temp_password==$_POST["password"]))
							{
								
								$_SESSION['user_name'] = "$temp_name";
								$_SESSION['user_id'] = "$temp_id";
								$_SESSION['user_type'] = "$temp_type";
								

							
							 echo'<script type="text/javascript">window.location = "index.php";</script>';
							exit;
							}
							
						
			 $_SESSION['LOGIN_STATUS']=true;
			 echo 'correct';
		}else{
			 echo '<span class="error">sorry invalid information</span>';
		}
	}

	?>