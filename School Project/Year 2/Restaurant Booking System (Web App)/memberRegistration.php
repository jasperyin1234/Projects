<html>

<head>
    <title> Member Registration </title>
    <link rel="stylesheet" href="style/mystyle.css">
    <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css'>
</head>
<?php

    include_once("includes/guestHeader.php");

?>
<body>
    <form action="memberRegistration.php" method="post" name="regform" id="registerform">

        <h1 id="registerheader">Member Account Registration</h1>
        <hr id="registerHr">

        <label for="username">Username</label><br>
        <input type="text" name="username" required><br>

        <label for="password">Password</label><br>
        <input type="password" name="password" required><br>

        <label for="phoneNum">Phone Number(xxx-xxx-xxxx)</label><br>
        <input type="tel" name="phoneNum" pattern="[0-9]{3}-[0-9]{3}-[0-9]{4}" required><br>

        <label for="email">Email Address</label><br>
        <input type="email" name="email" required><br>

        <label for="address">Home Address</label><br>
        <textarea name="address" required></textarea><br>

        Recovery Question 1: What is your first pet?<br>
        <label for="answer1">Recovery Answer 1</label>
        <input type="text" name="answer1" required><br>

        Recovery Question 2: What is your primary school?<br>

        <label for="answer2">Recovery Answer 2</label>
        <input type="text" name="answer2" required><br>

        <input type="submit" name="submit" value="Register" id="registerbutton"><br><br>
        <a href="memberLogin.php">Already has an account? Log in now!</a>
    </form>

    <?php

    if (isset($_POST['submit'])) {
        $name = $_POST['username'];
        $password =  hash('gost', $_POST['password']);
        $phoneNum = $_POST['phoneNum'];
        $email = $_POST['email'];
        $address = $_POST['address'];
        $answer1 = $_POST['answer1'];
        $answer2 = $_POST['answer2'];
		
        include_once("includes/config.php");

        if (mysqli_connect_error()) 
		{
            die('Connect Error (' . mysqli_connect_errno() . ') ' . mysqli_connect_error());
        } else {
			
			$sql = "SELECT * FROM userlist WHERE userName = '" . $name . "' OR userEmail = '". $email . "'";
			$result = mysqli_query($mysqli, $sql);
			$row = mysqli_fetch_array($result);
			
			if($name == $row['userName'])
			{
				echo "<script>alert('Username has been taken! Please try again!');</script>";
			}
			elseif($email == $row['userEmail']){
				echo "<script>alert('Email has been taken! Please try again!');</script>";
			}
			else{
				$insertSql = "INSERT INTO userlist(userName,userPw,userContact,userEmail,userAddress,userAnswer1,userAnswer2,userType) 
				VALUES('$name','$password','$phoneNum','$email','$address','$answer1','$answer2','m')";
				if ($mysqli->query($insertSql)) {
					echo "<script>alert('Successfully Registered!');</script>";
					header("Location: memberLogin.php");
				} else {
					echo "Error: " . $insertSql . "<br>" . $mysqli->error;
				}
				$mysqli->close();
			}
        }
    }
    ?>

    <footer>
        <?php include 'includes/footer.php' ?>
    </footer>

</body>

</html>