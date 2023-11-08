<?php
// Start the session
session_start();

require_once("includes/config.php");

$password = "";

if (isset($_POST['update'])) {
    $password = $_POST['password'];
    $email = $_SESSION['email'];

    if (mysqli_connect_error()) {
        die('Connect Error (' . mysqli_connect_errno() . ') ' . mysqli_connect_error());
    } else {
        $sql1 = "UPDATE userlist SET userPw = '". hash('gost', $password) ."' WHERE userEmail = '$email';";
        if ($mysqli->query($sql1)) {
            echo "<script> alert('Successfully Changed password!');</script>";
        } else {
            echo "Error: " . $sql1 . "<br>" . $mysqli->error;
        }
        $mysqli->close();
        header("Location: memberLogin.php");
    }
}

?>

<!DOCTYPE HTML>
<html>

<head>
    <title>Reset Password</title>
    <link rel="stylesheet" href="style/mystyle.css">
    <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css'>
</head>

<body>
    <?php include 'includes/guestHeader.php' ?>

    <h1 id="resetHeader">Reset Password</h1>
    <hr id="resetHr">

    <form method="post" action="resetPass.php" id="resetForm">
        New Password: <input type="password" name="password" required id="resetinput"> <br>
        <input type="submit" name="update" value="Confirm" id="resetsubmit"> <br><br>
    </form>

    <footer><?php include 'includes/footer.php' ?></footer>

</body>

</html>