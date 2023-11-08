<!DOCTYPE html>
<html>

<head>
	<title>Support Us</title>
	<link rel='stylesheet' href='style/mystyle.css'>
	<link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css'>
	<!-- font -->
	<link rel="preconnect" href="https://fonts.googleapis.com">
	<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
	<link href="https://fonts.googleapis.com/css2?family=Josefin+Sans&display=swap" rel="stylesheet">
</head>

<body>
	<?php

	session_start();
	if (isset($_SESSION['userID'])) {
		include_once("includes/memberHeader.php");
	} else {
		include_once("includes/guestHeader.php");
	}

	?>
	<h2 id="SupportUsPageHeader">Contact Us</h2>
	<div class="email">
		<img id=IconEmail src="images/EmailIcon.png" alt="IconEmail">
		<div class="emailUs">Email Us</div>
	</div>
	<br>
	<div class="emailAddress"><b><a href="mailto:BookToEat@bookingapp.my">BookToEat@bookingapp.my</b></a></div>
	<br>
	<div class="call">
		<img id=IconCall src="images/IconCall.png" alt="IconCall">
		<div class="callUs">Call Us From</div>
		<br>
		<div class="phoneNo"><b>011-1234 5678</b></div>
	</div>
	<br>
	<p id="supportUsDes">We aim to respond to your questions within 24 hours. Our working hours are Monday to Friday,
		9am to 6pm.</p>
	<br>
	<div class="follow">
		<div class="followUs">Follow Us:</div>
		<img id=IconFb src="images/IconFb.png" alt="IconFb">
		<img id=IconInsta src="images/IconInsta.png" alt="IconInsta">
		<img id=IconTwitter src="images/IconTwitter.png" alt="IconTwitter">
	</div>
	<?php include 'includes/footer.php' ?>
</body>

</html>