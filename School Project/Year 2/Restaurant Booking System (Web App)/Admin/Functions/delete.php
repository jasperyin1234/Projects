<?php 
	include_once('../../includes/config.php');
	
	$resID = $_POST['list'];
	$deleteSql = mysqli_query($mysqli, "DELETE FROM restaurantlist WHERE resID='$resID'");

	// After delete redirect to Home, so that latest announcement list will be displayed.
	header("Location:/Group 11/Admin/adminPage.php");
?>