<?php
require_once("dbcontroller.php");
$db_handle = new DBController();
if(!empty($_POST["country_id"])) {
	$query ="SELECT DISTINCT district FROM tbl_profile WHERE country= '" . $_POST["country_id"] . "'";
	$results = $db_handle->runQuery($query);
?>
	<option value="">--Select District--</option>
<?php
	foreach($results as $state) {
?>
	<option value="<?php echo $state["district"]; ?>"><?php echo $state["district"]; ?></option>
<?php
	}
}
?>