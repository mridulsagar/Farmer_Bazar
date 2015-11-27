<?php
require_once("dbcontroller.php");
$db_handle = new DBController();
if(!empty($_POST["district_id"])) {
	$query ="SELECT DISTINCT area FROM tbl_profile WHERE district= '" . $_POST["district_id"] . "'";
	$results = $db_handle->runQuery($query);
?>
	<option value="">--Select Area--</option>
<?php
	foreach($results as $area) {
?>
	<option value="<?php echo $area["area"]; ?>"><?php echo $area["area"]; ?></option>
<?php
	}
}
?>