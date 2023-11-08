<!DOCTYPE html>
<html>

<head>
	<title>About Us</title>
	<link rel='stylesheet' href='style/mystyle.css'>
	<link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css'>
	<!--font-->
	<link rel="preconnect" href="https://fonts.googleapis.com">
	<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
	<link href="https://fonts.googleapis.com/css2?family=Josefin+Sans&display=swap" rel="stylesheet">
	<link rel="preconnect" href="https://fonts.googleapis.com">
	<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
	<link href="https://fonts.googleapis.com/css2?family=Alfa+Slab+One&family=Josefin+Sans&display=swap" rel="stylesheet">
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

	<?php include 'includes/footer.php' ?>

	<h2 id="AboutUsPageHeader">About Us</h2>
	<img id="banner" src="/Group 11/images/banner.jpg" alt="banner">
	<div class="aboutUsDesc">Founded in 2013, Eatigo’s mission is to connect empty tables with empty stomachs by offering
		time-based discounts of up to 50% every day at all of its participating restaurants through its online website and
		mobile applications. Having seated over 5 million diners at more than 4,000 venues across the region, eatigo is the
		leading online reservations platform for restaurants in Asia, downloaded by more than 1.5 million users. Backed by
		Tripadvisor, Eatigo is available in Hong Kong, Singapore, Thailand, Malaysia, India, the Philippines, & Indonesia,
		and is expanding to more countries. Users can choose to dine anywhere, from upscale hotels to popular food chains,
		and enjoy the same discounts with no strings attached, while restaurants get to fill their empty seats during
		off-peak hours. The best part? It’s completely free to use.</div>

</body>

</html>