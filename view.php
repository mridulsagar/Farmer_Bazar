<?php 
session_start();
if(isset($_POST["category"]))
{
	$temp_district=$_POST["district"];
	$temp_category=$_POST["category"];
	
	$temp_order=$_POST["order"];
	if(empty($_POST["order"]))
	{
		$temp_order=id;
	}

}
else if(isset($_GET["category"]))
{
	$temp_district=$_GET["district"];
	$temp_category=$_GET["category"];
	$temp_order=$_GET["order"];
	if(empty($_GET["order"]))
	{
		$temp_order=id;
	}
	
	
}
else{
	
	$temp_district="";
	$temp_order="id";
	$temp_category="";

	$pagination="";
	
	}

	
	if(!empty($temp_category))
	{
	
		
	
			require_once("dbcontroller.php");
			$db_handle = new DBController();

			$temp_page=0;
			
			$per_page = 2;
			$adjacents = 5; 

			//Count id how many rows in this table
			if(empty($temp_district))
			{
				$pages_query = mysql_query("SELECT COUNT(id),id from tbl_product WHERE category='".$temp_category."' ORDER BY ".$temp_order." ") or die(mysql_error());
				
			}else if(!empty($temp_category)&&!empty($temp_district))
			{
				$pages_query = mysql_query("SELECT COUNT(id),id from tbl_product WHERE category='".$temp_category."' AND district='".$temp_district."' ORDER BY ".$temp_order." ") or die(mysql_error());
			}
			

			//get total number of pages to be shown from  total result
			$pages = ceil(mysql_result($pages_query, 0) / $per_page);

			//get current page from URL ,if not present set it to 1
			$page = (isset($_GET['page'])) ? (int)$_GET['page'] : 1 ;

			//calculate actual start page with respect to Mysql 
			$start = ($page - 1) * $per_page;

			//execute a mysql query to retrieve  all result from current page by using LIMIT keyword in mysql
			//if  query  fails stop further execution and show mysql error
			if(!empty($temp_category)&&empty($temp_district))
			{
				$query = mysql_query("SELECT * from tbl_product  WHERE category='".$temp_category."' ORDER BY ".$temp_order." LIMIT $start, $per_page") or die(mysql_error());
				
			}else if(!empty($temp_category)&&!empty($temp_district))
			{
				$query = mysql_query("SELECT * from tbl_product  WHERE category='".$temp_category."' AND district='".$temp_district."' ORDER BY ".$temp_order." LIMIT $start, $per_page") or die(mysql_error());
			}
			

			$pagination="";
			//if current page is first show first only else reduce 1 by current page
			$Prev_Page = ($page==1)?1:$page - 1;

			//if current page is last show last  only else add  1 to  current page
			$Next_Page = ($page>=$pages)?$page:$page + 1;	

			//if we are not on first page show first link
			if($page!=1) $pagination.= '<a href="?page=1&category='.$temp_category.'&district='.$temp_district.'&order='.$temp_order.'">First</a>';
			//if we are not on first page show previous link
			if($page!=1) $pagination.='<a href="?page='.$Prev_Page.'&category='.$temp_category.'&district='.$temp_district.'&order='.$temp_order.'">Previous</a>';

			//we are going to display 5 links on pagination bar
			$numberoflinks=10;

			//find the number of links to show on right of current page
			$upage=ceil(($page)/$numberoflinks)*$numberoflinks;
			//find the number of links to show on left of current page
			$lpage=floor(($page)/$numberoflinks)*$numberoflinks;
			//if  number of links on left of current page are zero we start from 1
			$lpage=($lpage==0)?1:$lpage;
			//find the number of links to show on right of current page and make sure it must be less than total number of pages
			$upage=($lpage==$upage)?$upage+$numberoflinks:$upage;
			if($upage>$pages)$upage=($pages-1);
			//start building links from left to right of current page
			for($x=$lpage; $x<=$upage+1; $x++){
			//if current building link is current page we don't show link,we show as text else we show as linkn	
			$pagination.=($x == $page) ? ' <a class="active_pager" href="?page='.$x.'&category='.$temp_category.'&district='.$temp_district.'&order='.$temp_order.'">'.$x.'</a>' : ' <a href="?page='.$x.'&category='.$temp_category.'&district='.$temp_district.'&order='.$temp_order.'">'.$x.'</a>' ;
			if($x == $page){
				$temp_page=$x;
			}
			}
			//we show next link and last link if user doesn't on last page
			if($page>=1&&$pages!=0)
			{
		
			if($page!=$pages) $pagination.=  '  <a href="?page='.$Next_Page.'&category='.$temp_category.'&district='.$temp_district.'&order='.$temp_order.'">Next</a>';
			}

			while($row = mysql_fetch_array($query)){
												

								if($row>0)
								{
									
								echo'<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">';
							
								echo'<p><strong> SL No:'.$row["id"].'</strong></p>';
								echo'</div>';
								echo'<div class="view_ticket col-xs-12 col-sm-12 col-md-12 col-lg-12">';
								echo'<p><strong> Category:'.$row["category"].'</strong> <strong> <br> Sub Category:'.$row["subcategory"].'</strong> </p>';
								echo'<p><strong> Price Range:'.$row["price_range"].'</strong> <strong> <br> Expire Date:'.$row["expire_date"].'</strong> </p>';
								echo'<p><strong> District:'.$row["district"].'</strong> <strong>  </p>';
								
									if(!empty($_SESSION['user_type'])&&$_SESSION['user_type']=='buyer')echo'   <p>
									  Rating:
									  <span class="starRating">
										<input id="rating5" type="radio" name="rating" value="5">
										<label for="rating5">5</label>
										<input id="rating4" type="radio" name="rating" value="4">
										<label for="rating4">4</label>
										<input id="rating3" type="radio" name="rating" value="3">
										<label for="rating3">3</label>
										<input id="rating2" type="radio" name="rating" value="2">
										<label for="rating2">2</label>
										<input id="rating1" type="radio" name="rating" value="1">
										<label for="rating1">1</label>
									  </span>
									</p>';
									
								echo'</div>';
								}
								else{
									
									echo'<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">';
									echo'<h2>No Record Found</h2>';
									echo'</div>';
								}
									
								
							}
	}
							

?>

<?php if($pagination!=""){?>
<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
		
	
	
			<ul class="custom_pager">
				<li><?php echo $pagination; ?></li>	    
			</ul>

	
</div>
<?php }?>