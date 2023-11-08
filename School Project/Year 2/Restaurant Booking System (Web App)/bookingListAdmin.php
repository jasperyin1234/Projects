<?php
session_start();

$Confirmed='Confirmed';
include_once("includes/config.php");
$sql = "SELECT bookinglist.bookingID, bookinglist.bookingDate, bookinglist.bookingTime, userlist.userName, restaurantlist.resName, bookinglist.bookingPax
FROM bookinglist
INNER JOIN userlist
ON bookinglist.userID=userlist.userID
INNER JOIN restaurantlist
ON bookinglist.resID=restaurantlist.resID
WHERE bookingStatus= '$Confirmed'";
$result = mysqli_query($mysqli, $sql);
?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8" />
    <title>Booking List</title>
    <link rel="stylesheet" type="text/css" href="style/mystyle.css">
    <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css'>
</head>

<body>
    <?php include 'includes/adminHeader.php' ?>
	<?php include 'includes/adminNav.php'?>

    <h2>Booking List</h2>
    <button type="button" class="backButton">
		<span class="backButtonIcon"><ion-icon name="arrow-back-outline"></ion-icon></span>
            <span class="backButtonText"><a href="/Group 11/Admin/adminPage.php">Go To Restaurant Details</a></span>
</button><hr>

    <table class="bookingHistoryTable">
        <tr>
            <th class="th">BookingID</th>
            <th class="th">Booking Date</th>
            <th class="th">Booking Time</th>
            <th class="th">Username</th>
            <th class="th">Restaurant</th>
            <th class="th">Pax</th>
            <th class="th">Cancel</th>
        </tr>

        <?php
        if($result-> num_rows > 0){

        while ($row = mysqli_fetch_array($result)) {
            echo "<tr>";
            echo "<td>" . $row['bookingID'] . "</td>";
            echo "<td>" . $row['bookingDate'] . "</td>";
            echo "<td>" . $row['bookingTime'] . "</td>";
            echo "<td>" . $row['userName'] . "</td>";
            echo "<td>" . $row['resName'] . "</td>";
            echo "<td>" . $row['bookingPax'] . "</td>";
            echo "<td><a href='cancelAdminBookingList.php?id=" . $row['bookingID'] . "'>Cancel Booking</a> </td></tr>";
        }
        }
        else{
            echo "<tr>";
            echo "<td colspan='7'><center>No Record Found!</center></td>";
            echo "<tr>";    
        }
        ?>
    </table>

    <?php include 'includes/footer.php' ?>
    <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
	<script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>

</body>
</html>