<!DOCTYPE html>
<html>

<head>
	<meta charset="utf-8">
	<title>Homepage</title>
	<link rel='stylesheet' href='style/mystyle.css'>
	<link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css'>
</head>

<body>
	<?php

	session_start();
	include_once("includes/config.php");
	
	if (isset($_SESSION['userID'])) {
		include_once("includes/memberHeader.php");
	} else {
		include_once("includes/guestHeader.php");
	} 
	
	// Latest restaurant from database 3 will change to 4
	$sql1 = "SELECT * FROM restaurantlist ORDER BY resID DESC";
	$result1 = mysqli_query($mysqli, $sql1);
	
	$latest = array();
	
	 while($row1 = mysqli_fetch_array($result1))
	{
	 	array_push($latest, $row1['resLogo']);
	}
	
	?>

	<h1 id="homepageHeader"> Discover & Book Your Ideal Restaurant! </h1>
	<div class="slider">
		<div class="slides">

			<input type="radio" name="radio-btn" id="radio1">
			<input type="radio" name="radio-btn" id="radio2">
			<input type="radio" name="radio-btn" id="radio3">
			<input type="radio" name="radio-btn" id="radio4">

			<div class="slide first">
				<img src=<?php echo ".$latest[0]." ?>></a>
			</div>
			<div class="slide">
				<img src=<?php echo ".$latest[1]." ?>></a>
			</div>
			<div class="slide">
				<img src=<?php echo ".$latest[2]." ?>></a>
			</div>
			<div class="slide">
				<img src=<?php echo ".$latest[0]." ?>></a>
			</div>

			<div class="navigation-auto">
				<div class="auto-btn1"></div>
				<div class="auto-btn2"></div>
				<div class="auto-btn3"></div>
				<div class="auto-btn4"></div>
			</div>

		</div>

		<div class="navigation-manual">
			<label for="radio1" class="manual-btn"></label>
			<label for="radio2" class="manual-btn"></label>
			<label for="radio3" class="manual-btn"></label>
			<label for="radio4" class="manual-btn"></label>
		</div>

	</div>

	<script>
		/* slider */
		var counter = 1;
		setInterval(function() {
			document.getElementById('radio' + counter).checked = true;
			counter++;
			if (counter > 4) {
				counter = 1;
			}
		}, 5000);
	</script>

	<h2 id="homepageTrending"> Trending </h2>
	<?php 
		// Trending 3 will change to 5
		$sql = "SELECT * FROM restaurantlist ORDER BY rating DESC";
		$result = mysqli_query($mysqli, $sql);
		
		$count = 0;
		while($row = mysqli_fetch_array($result) AND $count < 8)
	{
		$resLogo = $row['resLogo'];
		$count++;
		?>
		<img src=<?php echo ".$resLogo." ?> id="trending1"></a>
	<?php	
	}?>
	
	<?php include 'includes/footer.php' ?>
</body>

</html>