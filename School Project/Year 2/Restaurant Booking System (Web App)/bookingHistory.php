<?php
session_start();

$userID = $_SESSION['userID'];
include_once("includes/config.php");
$sql = "SELECT bookinglist.bookingID, bookinglist.bookingDate, bookinglist.bookingTime, restaurantlist.resName, bookinglist.bookingPax, bookinglist.bookingStatus
FROM bookinglist
INNER JOIN restaurantlist
ON bookinglist.resID=restaurantlist.resID
WHERE userID = '$userID'";
$result = mysqli_query($mysqli, $sql);
?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8" />
    <title>Booking history</title>
    <link rel="stylesheet" type="text/css" href="style/mystyle.css">
    <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css'>
</head>

<body>
    <?php include 'includes/memberHeader.php' ?>


    <h2>Booking History</h2>
    <button type="button" class="backButton">
		<span class="backButtonIcon"><ion-icon name="arrow-back-outline"></ion-icon></span>
            <span class="backButtonText"><a href="/Group 11/homepage.php">Go To Discover</a></span>
</button><hr>

    <table class="bookingHistoryTable">
        <tr>
            <th class="th">Booking ID</th>
            <th class="th">Date</th>
            <th class="th">Time</th>
            <th class="th">Restaurant</th>
            <th class="th">Pax</th>
            <th class="th">Booking Status</th>
            <th class="th">Cancel</th>
        </tr>

        <?php
        $confirm = "Confirmed";
        if($result-> num_rows > 0){
        
        while ($row = mysqli_fetch_array($result)) {
            echo "<tr>";
            echo "<td>" . $row['bookingID'] . "</td>";
            echo "<td>" . $row['bookingDate'] . "</td>";
            echo "<td>" . $row['bookingTime'] . "</td>";
            echo "<td>" . $row['resName'] . "</td>";
            echo "<td>" . $row['bookingPax'] . "</td>";
            echo "<td>" . $row['bookingStatus'] . "</td>";

            if ($confirm == $row['bookingStatus']) {
                echo "<td><a href='cancelBookingHistory.php?id=" . $row['bookingID'] . "'>Cancel Booking</a> </td></tr>";
            } else
                echo "<td></td>";
        }
    }
    else{
        echo "<tr>";
        echo "<td colspan='7'><center>No Record Found!</center></td>";
        echo "<tr>";    }
        ?>
    </table>
    <?php include 'includes/footer.php' ?>
    <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
	<script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>

</body>
</html>