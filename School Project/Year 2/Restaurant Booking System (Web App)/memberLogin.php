<?php
session_start();
include_once("includes/config.php");

$username = $password = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $username = $_POST['userName'];
    $password = $_POST['userPw'];

    if (mysqli_connect_errno()) {
        echo "Failed to connect to MySQL: " . mysqli_connect_error();
        exit();
    }

    $sql = "SELECT * FROM userlist WHERE userName = '" . $username . "' AND userPw = '" . hash('gost', $password) . "'";

    $result = mysqli_query($mysqli, $sql);
    $rowcount = mysqli_num_rows($result);
    mysqli_free_result($result);

    if ($rowcount == 1) {

        header("Location:homepage.php");
    } else {
        header("Location:memberLogin.php?message=loginfail");
    }

    $sql = "SELECT userID FROM userlist WHERE userName = '" . $username . "' AND userPw = '" . hash('gost', $password) . "'";
    $result = mysqli_query($mysqli, $sql);
    while ($details = mysqli_fetch_array($result)) {
        $userID = $details['userID'];
        $_SESSION['userID'] = $userID;
    }
    mysqli_free_result($result);
} else {
    if (isset($_GET['message']) && $_GET['message'] == "loginfail") {
        echo "<script>alert('Wrong Username or Password!');</script>";
    }
}

?>

<!DOCTYPE HTML>
<html>

<head>
    <title>Login</title>
    <link rel="stylesheet" href="style/mystyle.css">
    <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css'>
</head>

<body>
    <?php

    include_once("includes/guestHeader.php");

    ?>

    <h1 id="loginheader">Member Account Login</h1>
    <hr id="loginlinebreak">
    <br>

    <form method="post" action="" id="loginform">

        <label for="username">Username</label><br>
        <input type="text" name="userName"> <br>

        <label for="password">Password</label><br>
        <input type="password" name="userPw"><br>

        <input type="submit" name="submit" value="Submit" id="login-btn"> <br>

        <a href="memberRegistration.php">Sign up</a> <br>
        <a href="forgotPass.php">Forgot Password?</a>
    </form>

    <?php include 'includes/footer.php' ?>

</body>

</html>