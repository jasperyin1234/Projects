<?php
include_once("includes/config.php");
$sql = "SELECT * FROM restaurantlist";
$result = mysqli_query($mysqli, $sql);

?>


<!DOCTYPE html>
<html>

<head>
    <title>Restaurant List</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="style/mystyle.css">
    <link rel="stylesheet" href='https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css'>
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

    <h2 id=restListHeader>Restaurant List</h2>
    <button type="button" class="backButton">
		<span class="backButtonIcon"><ion-icon name="arrow-back-outline"></ion-icon></span>
            <span class="backButtonText"><a href="/Group 11/homepage.php">Back To Discover</a></span>
</button>
    <hr id='restlisthr'>
    <form id='searchFunction' action='searchRestaurantList.php' method='POST'>
        <div class='searchIcon'>
            <label for='search'><i class='fa fa-search'></i></label>
            <input class='searchBox' type='search' placeholder='search' name='search' value="<?php if(isset($_POST['search'])){echo $_POST['search'];}?>">
        </div>
    </form>
    <table>
        <?php

            echo "
            <div class='memberRestList'>
	        <table class='restList'>
		    <tr>
		        <th id='tagR1'>Restaurant Name</th>
		        <th id='tagR2'>Location</th>
		        <th id='tagR3'>Operation Hour</th>
		        <th id='tagR4'>Cuisine</th>
		        <th id='tagR5'>Rating</th>
		    </tr>";

            while ($row = mysqli_fetch_array($result)) {
                echo "<tr>";
                echo "<td><a href='restaurantDetails.php?resID=". $row['resID'] . "'>" . $row['resName'] . "</a></td>";
                echo "<td id='tagR6'>" . $row['location'] . "</td>";
                echo "<td>" . $row['operationTime'] . "</td>";
                echo "<td>" . $row['cuisine'] . "</td>";
                echo "<td>" . $row['rating'] . "<i class='fa fa-star' style='color:#FF0000'></i></td>";
		        echo "</tr>";
            }
            echo "</table></div>";

	?>
    
    </table>
    
    

    <?php include 'includes/footer.php' ?>
    <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
	<script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>

</body>
</html>