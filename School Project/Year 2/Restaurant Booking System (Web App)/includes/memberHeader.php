<?php
include_once('config.php');
if (isset($_SESSION['userID'])) {
	$userID = $_SESSION['userID'];
	$header = mysqli_query($mysqli, "SELECT userName FROM userlist WHERE userID = $userID");
}
?>

<header id='adminHeader'>
	<a id='homeLink' href='/Group 11/homepage.php'><img id='AppLogo' src='/Group 11/images/AppLogo.png' alt='App_Logo'>
		<h1 id='appName'>BookToEat</h1>
	</a>

	<div class='admin'>
		<div class='adminIcon'>
			<button class='adminProfile'>
				<i class='fa fa-user fa-4x'></i>
			</button>
			<div class='adminData'>
				<?php
				while ($row = mysqli_fetch_array($header)) {

					echo "
					<h4><span class='tab'></span>Welcome " . $row['userName'] . "</h4>

						<ul>
							<li><a href='/Group 11/memberLogout.php'>Sign Out</a></li>
					 	</ul>";
				}
				?>
			</div>
		</div>
		<div class='adminIcon'>
			<button class='adminSelect'>
				<i class='fa fa-bars fa-4x'></i>
			</button>
			<div class='adminSelection'>
				<ul>
					<li><a href='/Group 11/userProfileUserView.php'>View User Profile</a></li>
					<li><a href='/Group 11/editProfile.php'>Manage User Profile</a></li>
					<li><a href='/Group 11/restaurantList.php'>Restaurant List</a></li>
					<li><a href='/Group 11/bookingHistory.php'>Booking History</a></li>
				</ul>
			</div>
		</div>
	</div>
</header>