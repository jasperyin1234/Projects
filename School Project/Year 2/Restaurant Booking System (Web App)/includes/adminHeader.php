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
					echo "
					
						<h4><span class='tag'></span>Welcome Admin!</h4>
						<ul>
							<li><a href='/Group 11/memberLogout.php'>Sign Out</a></li>
					 	</ul>";
				?>
			</div>
		</div>
		<div class='adminIcon'>
			<button class='adminSelect'>
				<i class='fa fa-bars fa-4x'></i>
			</button>
			<div class='adminSelection'>
			<ul>
					<li><a href='/Group 11/Admin/adminPage.php'>Update Restaurant Details</a></li>
					<li><a href='/Group 11/userProfileAdminView.php'>Retrieve Customer Information</a></li>
					<li><a href='/Group 11/bookingHistory.php'>View Reservations</a></li>
				</ul>
			</div>
		</div>
	</div>
</header>