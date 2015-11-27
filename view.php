<?php 

if(isset($_POST["district"]))
{
	$temp_district=$_POST["district"];
	$temp_order=$_POST["order"];

}
else if(isset($_GET["district"]))
{
	$temp_district=$_GET["district"];
	$temp_order=$_GET["order"];
	$pagination;
	
	
}
else{
	
	$temp_district="";
	$temp_order="";
	$pagination="";
	
	}

	
	if(!empty($temp_district))
	{
	
		
	
			require_once("dbcontroller.php");
			$db_handle = new DBController();

			$temp_page=0;
			
			$per_page = 5;
			$adjacents = 5; 

			//Count id how many rows in this table

			$pages_query = mysql_query("SELECT COUNT(id),id from tbl_product WHERE district='".$temp_district."' ORDER BY ".$temp_order." ") or die(mysql_error());

			//get total number of pages to be shown from  total result
			$pages = ceil(mysql_result($pages_query, 0) / $per_page);

			//get current page from URL ,if not present set it to 1
			$page = (isset($_GET['page'])) ? (int)$_GET['page'] : 1 ;

			//calculate actual start page with respect to Mysql 
			$start = ($page - 1) * $per_page;

			//execute a mysql query to retrieve  all result from current page by using LIMIT keyword in mysql
			//if  query  fails stop further execution and show mysql error

			$query = mysql_query("SELECT * from tbl_product  WHERE district='".$temp_district."' ORDER BY ".$temp_order." LIMIT $start, $per_page") or die(mysql_error());

			$pagination="";
			//if current page is first show first only else reduce 1 by current page
			$Prev_Page = ($page==1)?1:$page - 1;

			//if current page is last show last  only else add  1 to  current page
			$Next_Page = ($page>=$pages)?$page:$page + 1;	

			//if we are not on first page show first link
			if($page!=1) $pagination.= '<a href="?page=1&district='.$temp_district.'">First</a>';
			//if we are not on first page show previous link
			if($page!=1) $pagination.='<a href="?page='.$Prev_Page.'&district='.$temp_district.'">Previous</a>';

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
			$pagination.=($x == $page) ? ' <a class="active_pager" href="?page='.$x.'&district='.$temp_district.'">'.$x.'</a>' : ' <a href="?page='.$x.'&district='.$temp_district.'">'.$x.'</a>' ;
			if($x == $page){
				$temp_page=$x;
			}
			}
			//we show next link and last link if user doesn't on last page
			if($page>=1&&$pages!=0)
			{
		
			if($page!=$pages) $pagination.=  '  <a href="?page='.$Next_Page.'&district='.$temp_district.'">Next</a>';
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