<?php 
	include('../../../includes/config.php');
	
	$getResID = $_POST['resID'];
	
	$newsql= "SELECT * FROM restaurantlist WHERE resID='$getResID'";
	
	// Fetech user data based on id
	$result = mysqli_query($mysqli,$newsql);
	
	if (isset($_POST['doneEdit'])
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
				$editSql = "UPDATE `restaurantlist` SET resName='$getRestaurantName', 
				`operationDay`='$getOperationDay', `operationTime`='$getOptHour', `location`='$getLocation',
				`description`='$getDescription', `rating`='$getRating', `cuisine`='$getCuisine', 
				`priceRange`='$getPrice_range', `paymentOption`='$getPayment_opt', 
				`contact`='$getContact', `website`='$getWebsite', `resLogo`='$getRestLogo_dir',
				`gal1`='$getGallery1_dir', `gal2`='$getGallery2_dir', `gal3`='$getGallery3_dir'
				WHERE resID='$getResID'";
				
				if($mysqli->query($editSql)){
					echo "<script>  
						alert('Successfully Inserted Data!');
						</script>";
				}
				else{
					echo "Error: ". $editSql . "<br>".$mysqli->error;
				}	
			$mysqli->close();
			header("Location: /Group 11/Admin/adminPage.php");	
			}

		
	}
	
	
?>