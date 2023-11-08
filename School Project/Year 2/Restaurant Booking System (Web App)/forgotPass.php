<?php
// Start the session
session_start();

require_once("includes/config.php");

$email = $answer1 = $answer2 = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $email = $_POST['email'];
    $_SESSION['email'] = "$email";
    $answer1 = $_POST['answer1'];
    $answer2 = $_POST['answer2'];

    if (mysqli_connect_errno()) {
        echo "Failed to connect to MySQL: " . mysqli_connect_error();
        exit();
    }

    $sql = "SELECT * FROM userlist WHERE userEmail = '" . $email . "' AND userAnswer1 = '" . $answer1 . "' AND userAnswer2 = '" . $answer2 . "'";
    $result = mysqli_query($mysqli, $sql);
    $rowcount = mysqli_num_rows($result);

    if ($rowcount == 1) {
        header("Location:resetPass.php");
    } else {
        echo "<script>alert('Wrong email or Recovery Answer!');</script>";
    }
}
?>

<!DOCTYPE HTML>
<html>

<head>
    <title>Forgot Password</title>
    <link rel="stylesheet" href="style/mystyle.css">
    <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css'>
</head>

<body>
    <?php include 'includes/guestHeader.php' ?>
    <h1 id="forgotHeader">Forgot Password</h1>
    <hr id="forgotHr">

    <form method="post" action="forgotPass.php" id="forgotform">
        Email: <input type="email" name="email" id="forgotemail" required>
        <br>
        Recovery Question 1: What is your first pet?<br>
        <input type="text" name="answer1" required><br>
        Recovery Question 2: What is your primary school?<br>
        <input type="text" name="answer2" required><br>
        <input type="submit" name="submit" value="Reset password" id="forgotsubmit"> <br><br>
    </form>

    <?php include 'includes/footer.php' ?>

</body>

</html>