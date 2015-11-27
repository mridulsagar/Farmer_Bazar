<?

             $host = 'localhost';
             $user = 'root';
             $pass = '';
           
             mysql_connect($host, $user, $pass);

             mysql_select_db('db_doc_chem');
			 
			 $sql=mysql_query("SELECT DISTINCT country from tbl_profile");
			 while($row=mysql_fetch_array($sql))
			 {
			  echo "<option>".$row['country']."</option>";
			 }




?>