<?php

	include_once('../../includes/config.php');
	
	$getResID = $_POST['list'];

	
	$newsql= "SELECT * FROM restaurantlist WHERE resID='$getResID'";
	
	$result = mysqli_query($mysqli,$newsql);

	while($data = mysqli_fetch_array($result))
	{
			$getRestaurantName = $data['resName'];
			$getOperationDay = $data['operationDay'];
			$getOptHour = $data['operationTime'];
			$getLocation = $data['location'];
			$getDescription = $data['description'];
			$getCuisine = $data['cuisine'];
			$getPrice_range = $data['priceRange'];
			$getPayment_opt = $data['paymentOption'];
			$getContact =$data['contact'];
			$getWebsite = $data['website'];
			
			
	}
?>


<!DOCTYPE html>
<html>
<head>

	<title>Edit Restaurant</title>
	
	<link rel='stylesheet' href='../../style/mystyle.css'>
	
	<link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css'>

</head>
<body>
	<?php include '../../includes/adminHeader.php'?>
	
	<?php include '../../includes/adminNav.php'?>
	<h2 id='adminPageHeader'>Edit Restaurant</h2>
	
	<form  action='/Group 11/Admin/Functions/modify/Edits.php' method='POST' enctype='multipart/form-data'>
		<div id='allDetails'>
			<div id='Details'>
			
				<label for='RestName'><b>Restaurant Name:</b> </label><br>
				<input id='theName' type='text' name='RestName' required><br>
				
				<label for='description'><b>About the Restaurant:</b> </label><br>
				<input id='theDesc' type='text' name='description' required><br>
			
				<label for='location'><b>Address:</b> </label><br>
				<input id='theLoc' type='text' name='location' required><br>
			
			</div>
			
			<div id='Details'>
				<label id='extra' for='All'><b>More Details</b> </label><br>
				<div class='Details2'>
					<label for='cuisines'>Cuisines: </label><br>
					<input id='theCuisines' type='text' name='Cuisine' required><br>
				
					<label for='OptDay'>Operation Day: </label><br>
					<input id='theOptDay' type='text' name='OptDay' required><br>
					
					<label for='OptHour'>Hours of operation: </label><br>
					<input id='theOptHour' type='text' name='OptHours' required><br>
				
					<label for='price_range'>Price Range: </label><br>
					<input id='price_rg' type='text' name='price_range' required><br>
					
					<label for='Payment_Opt'>Payment options: </label><br>
					<input id='Paym_Opt' type='text' name='Payment_Opt' required><br>
					
					<label for='Contact'>Contact: </label><br>
					<input id='Cont' type='text' name='Contact' required><br>
					
					<label for='Rating'>Rating: </label><br>
					<input id='rating' type='text' name='Rating' required><br>
					
					<label for='Website'>Website: </label><br>
					<input id='website' type='text' name='Website' required><br>
				</div>
			</div>
				
		</div>
		
		<div id='putRestImg'> 
		
			<label for='Restaurant_Logo'>Restaurant Logo: </label><br>
			<input type='file' name='Restaurant_Logo' required><br>
				
			<label for='Gallery'>Gallery (Maximum 3 images): </label><br>
			<input type='file' name='Gallery1' required><br>
			<input type='file' name='Gallery2' required><br>
			<input id='lastGallery' type='file' name='Gallery3' required><br><br>
			
			<?php
			echo "<input type='hidden' name ='resID' value='$getResID'>";
		?>
		
		<input id='doneEdit' type='submit' name ='doneEdit' value='Done Edit'>
		</div>
		
		
		
	</form>
	
	<?php include '../../includes/footer.php'?>
</body>
</html>