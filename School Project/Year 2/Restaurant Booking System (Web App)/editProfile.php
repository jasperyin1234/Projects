<?php 
	session_start();
	include_once 'includes/config.php';
	if (isset($_SESSION['userID'])){
		$userID = $_SESSION['userID'];
		$result = mysqli_query($mysqli, "SELECT * FROM userlist WHERE userID = $userID");
	}
	while($rows = mysqli_fetch_assoc($result)){
			$username = $rows['userName'];
			$address = $rows['userAddress'];
			$phoneNo = $rows['userContact'];
			$email = $rows['userEmail'];
		}
	if (isset($_POST['update'])) {
		$getUsername = $_POST['username1'];
		$getAddress = $_POST['address1'];
		$getPhoneNumber = $_POST['phoneNumber1'];
		$getEmail = $_POST['email1'];
		
		if (mysqli_connect_error()){
            die('Connect Error ('.mysqli_connect_errno() .') ' . mysqli_connect_error());
        }
        else{
            $sql1 = "UPDATE userlist SET userName= '$getUsername', userAddress = '$getAddress', userContact = '$getPhoneNumber', userEmail = '$getEmail' WHERE userID = $userID;";
            if($mysqli->query($sql1)){
                echo "<script> alert('Successfully Inserted Data!');</script>";
            }
            else{
                echo "Error: ". $sql1 . "<br>".$mysqli->error;
            }
            $mysqli->close();
            header("Location: /Group 11/userProfileUserView.php");
       		}
        }
?>

<!DOCTYPE html>
<html>
<head>
	<title>Edit User Profile</title>
	<link rel='stylesheet' href='style/mystyle.css'>
	<link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css'>
</head>
<body>
    <?php include 'includes/memberHeader.php' ?>

	<div class="editProfileHeader">
		<div class="profilePageHeader">
		<h2 id="profilePageHeader2">Edit User Profile</h2>
		<button type="button" class="backButton">
		<span class="backButtonIcon"><ion-icon name="arrow-back-outline"></ion-icon></span>
            <span class="backButtonText"><a href="/Group 11/userProfileUserView.php">Back To User Profile</a></span>
</button>
		<hr id="hrUserProfile">
	</div>
	
	<form id="editProfile" action="" method="POST">
		<div class="editProfile1">
			<label for="username">Username</label>
			<br>
			<input type="text" id="editUsername" name="username1" placeholder="<?php echo $username;?>" required>
			<br>
			<label for="email">Email</label>
			<br>
			<input type="email" id="editEmail" name="email1" placeholder="<?php echo $email;?>" required>
			<br>
			<label for="phoneNumber">Phone Number[xxx-xxx-xxxx]</label>
			<br>
			<input type="tel" id="editPhoneNumber" name="phoneNumber1" placeholder="<?php echo $phoneNo;?>" pattern="[0-9]{3}-[0-9]{3}-[0-9]{4}" required>
		</div>
		<div class="editProfile2">
			<label for="address">Address</label>
			<br>
			<input type="text" id="editAddress" name="address1" placeholder="<?php echo $address;?>" required>
			<br>
			<input type="submit" name="update" value="UPDATE PROFILE">
		</div>
	</form>
	<?php include 'includes/footer.php'?>
	<script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
	<script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>

</body>
</html>