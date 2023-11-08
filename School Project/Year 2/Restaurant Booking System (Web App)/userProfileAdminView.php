<?php
include_once 'includes/config.php';

if (isset($_GET['userID'])) {
	$userID = mysqli_real_escape_string($mysqli, $_GET['userID']);
	$sql = "SELECT * FROM userlist WHERE userID = '$userID';";
	$result = mysqli_query($mysqli, $sql);
	$sqlbooking = "SELECT bookinglist.bookingStatus, restaurantlist.resName FROM bookinglist INNER JOIN restaurantlist ON bookinglist.resID=restaurantlist.resID WHERE userID = $userID;";
	$resultbooking = mysqli_query($mysqli, $sqlbooking);
	while ($rows = mysqli_fetch_array($result)) {
		$username = $rows['userName'];
		$address = $rows['userAddress'];
		$phoneNo = $rows['userContact'];
		$email = $rows['userEmail'];
	}
}
?>

<!DOCTYPE html>
<html>

<head>
	<title>Profile</title>
	<link rel='stylesheet' href='style/mystyle.css'>
	<link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css'>
</head>

<body>
	<?php include 'includes/adminHeader.php' ?>
	<?php include 'includes/adminNav.php'?>

	<div class="parents">
		<div class="profilePageHeader">
			<h2 id="profilePageHeader2">User Profile</h2>
			<hr id="hrUserProfile">
		</div>
		<div class="parents1">
			<div class="username">
				<p id="username1">Username
				<div id="username2"><?php echo $username; ?></div>
				</p>
			</div>
			<div class="Email">
				<p id="Email1">Email
				<div id="Email2"><?php echo $email; ?></div>
				</p>
			</div>
			<div class="PhoneNumber">
				<p id="PhoneNumber1">Phone Number
				<div id="PhoneNumber2"><?php echo $phoneNo; ?></div>
				</p>
			</div>
		</div>
		<div class="Address">
			<p id="Address1">Address
			<div id="Address2"><?php echo $address; ?></div>
			</p>
		</div>
	</div>
	<table id="bookingHistory">
		<tr>
			<th id="bookingHistoryHeader" colspan="2">Booking History</th>
		</tr>
		<t>
			<th>Booking Restaurant</th>
			<th>Status</th>
		</t>
		<?php
            while($rows1 = mysqli_fetch_assoc($resultbooking)){
        ?>
                <tr>
                    <td><?php echo $rows1['resName'];?></td>
                    <td><?php echo $rows1['bookingStatus'];?></td>
                </tr>
        <?php
            } 
        ?>
		<tfoot>
			<tr>
				<td id="bookingHistoryFooter" colspan="2"><a href="bookingHistoryAdmin.php?userID=<?php echo $userID ?>">View Details</a></td>
			</tr>
		</tfoot>
	</table>
	<?php include 'includes/footer.php' ?>
</body>

</html>