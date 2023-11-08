<?php
session_start();
if (isset($_POST["Book"])) {
    $getUserID = $_POST["userID"];
    $getResID = $_POST["resID"];
    $getBookingDate = $_POST["bookingDate"];
    $getBookingTime = $_POST["bookingTime"];
    $getBookingPax = $_POST["bookingPax"];
    $getBookingName = $_POST["bookingName"];
    $getBookingContact = $_POST["bookingContact"];
    $getBookingStatus = "Confirmed";

    include_once("includes/config.php");

    if (mysqli_connect_error()) {
        die('Connect Error (' . mysqli_connect_errno() . ') ' . mysqli_connect_error());
    } else {
        $sql = "INSERT INTO bookinglist (userID, resID, bookingDate, bookingTime, bookingPax, bookingName, bookingContact, bookingStatus) VALUES
            ('$getUserID','$getResID','$getBookingDate', '$getBookingTime', '$getBookingPax', '$getBookingName', '$getBookingContact', '$getBookingStatus')";

        if ($mysqli->query($sql)) {
            header('Location: ' . $_SERVER['HTTP_REFERER']);
        } else {
            echo "Error: " . $sql . "<br>" . $mysqli->error;
        }
        $mysqli->close();
    }
}
?>