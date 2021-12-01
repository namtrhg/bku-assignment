<?php
include_once "../../class/Backend.php";
$Backend = new Backend;
session_start();

$para  = $_SESSION['para_id_sec'];
if($_POST['action'] == 'call_this') {
		$result = $Backend->get_job_detail($para);
    		if ( mysqli_num_rows($result) > 0) {
      		$row = $result->fetch_assoc() ;
		$row["QUANTITY"] = $row["QUANTITY"] - 1;
		$Backend->update_job($para_id, $row["NAME"], $row["SALARY"], $row["DESCRIPTION"], $row["SUMMARY"], $row["QUANTITY"], $row["CATEGORY"]);
		}
}
?>