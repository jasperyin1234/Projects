<?php

include_once("includes/config.php");
$id = $_GET['id'];
$result = mysqli_query($mysqli, "UPDATE bookinglist set bookingStatus='Cancelled'WHERE bookingID=$id");

header("Location:bookingHistory.php");
?>