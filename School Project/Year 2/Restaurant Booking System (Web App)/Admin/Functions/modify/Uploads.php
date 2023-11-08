<?php 
	include('../../../includes/config.php');
	
	if (isset($_POST['Confirm_Registration']) 
		&& isset($_FILES['Restaurant_Logo']) 
		&& isset($_FILES['Gallery1']) 
		&& isset($_FILES['Gallery2']) 
		&& isset($_FILES['Gallery3'])){
		
			$getRestaurantName = $_POST['RestName'];
			$getOperationDay = $_POST['OptDay'];
			$getDescription = $_POST['description'];
			$getLocation = $_POST['location'];
			$getCuisine = $_POST['Cuisine'];
			$getOptHour = $_POST['OptHours'];
			$getPrice_range = $_POST['price_range'];
			$getPayment_opt = $_POST['Payment_Opt'];
			$getContact = $_POST['Contact'];
			$getRating = $_POST['Rating'];
			$getWebsite = $_POST['Website'];
			
			$getRestLogo_name = $_FILES['Restaurant_Logo']['name'];
			$getRestLogo_dir = '/Group 11/images/$getRestLogo_name';
			
			$getGallery1_name = $_FILES['Gallery1']['name'];
			$getGallery1_dir = '/Group 11/images/$getGallery1_name';
			
			$getGallery2_name= $_FILES['Gallery2']['name'];
			$getGallery2_dir = '/Group 11/images/$getGallery2_name';
			
			$getGallery3_name =$_FILES['Gallery3']['name'];
			$getGallery3_dir = '/Group 11/images/$getGallery3_name';
			
			
		if (mysqli_connect_error()){
			die('Connect Error ('.mysqli_connect_errno() .') ' . mysqli_connect_error());
		}
		else{
			$insertSql = "INSERT INTO `restaurantlist` (`resName`, `operationDay`, `operationTime`,
			`location`, `description`, `rating`, `cuisine`, `priceRange`, `paymentOption`, `contact`, `website`, `resLogo`,
			`gal1`, `gal2`, `gal3`)
				VALUES ('$getRestaurantName', '$getOperationDay', '$getOptHour', '$getLocation', '$getDescription',
				'$getRating', '$getCuisine', '$getPrice_range', '$getPayment_opt', '$getContact', '$getWebsite', '$getRestLogo_dir',
				'$getGallery1_dir', '$getGallery2_dir','$getGallery3_dir')";
		if($mysqli->query($insertSql)){
				echo "<script>  
					alert('Successfully Inserted Data!');
					</script>";
			}
			else{
				echo "Error: ". $insertSql . "<br>".$mysqli->error;
			}
			$mysqli->close();
		}
	
	header("Location:/Group 11/Admin/adminPage.php");	
}
	
	
?>
