<?php
include_once('../includes/config.php');

if (isset($_POST["search"])) {
	$search = $_POST["search"];
	$searchsql = "SELECT * FROM restaurantlist WHERE CONCAT(resName) LIKE '%$search%'";
	$searchResult = mysqli_query($mysqli, $searchsql);
}
?>

<!DOCTYPE html>
<html>

<head>

	<title>Update Restaurant Details</title>
	<link rel='stylesheet' href='../style/mystyle.css'>
	<link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css'>

</head>

<body>
	<?php include '../includes/adminHeader.php' ?>

	<?php include '../includes/adminNav.php' ?>

	<h2 id='adminPageHeader'>Restaurant Details</h2>

	<form id='searchFunction' action='searchRestaurantList.php' method='POST'>
		<div class='searchIcon'>
			<label for='search'><i class='fa fa-search'></i></label>
			<input class='searchBox' type='search' placeholder='search' name='search' value="<?php if (isset($_POST['search'])) {
																									echo $_POST['search'];
																								} ?>">
		</div>
	</form>

	<form id='aRestList' action='' method='POST'>
		<?php
		echo "
			<div class='theRestList'>
			<table id='restList'>
			<tr>
				<th id='tag1'>Restaurant Name</th>
				<th id='tag2'>Location</th>
				<th id='tag3'>Operation Time</th>
				<th id='tag4'>Cuisine</th>
				<th id='tag5'>Rating</th>
				<th id='tag6'></th>
			</tr>
			";
		if ($searchResult->num_rows > 0) {

			while ($data = $searchResult->fetch_assoc()) {
				$resID = $data['resID'];
				$restaurantName = $data['resName'];
				$location = $data['location'];
				$optHour = $data['operationTime'];
				$cuisine = $data['cuisine'];
				$rating = $data['rating'];

				echo "<tr>";
				echo "<td>$restaurantName</td>";
				echo "<td>$location</td>";
				echo "<td>$optHour</td>";
				echo "<td>$cuisine</td>";
				echo "<td>$rating<i class='fa fa-star' style='color:#FF0000'></i></td>";
				echo "<td><input id='restListSelect' type='radio' name='list' value='$resID'></td>
			</tr>";
			}
		} else {
			echo "<tr>";
			echo "<td colspan='6'>No Record Found!</td>";
			echo "<tr>";
		}
		echo "</table></div>";

		?>

		<div class='editRestList'>


			<button onclick='modify()'>Modify Restaurant</button>
			<button onclick='add()'>Register Restaurant</button>

			<button><a href='#' id='remove'>Remove Restaurant</a></button>

		</div>
		<div id='removingRest'>

			<div id='removingRestCont'>
				<h3> Are you sure you want to remove the selected restaurant?</h3>

				<div class='verify-No'>Cancel</div>
				<input class='verify-Yes' type='submit' value='Proceed' onclick='remove();return true;'>
			</div>

		</div>
		<script>
			document.getElementById('remove').addEventListener('click',
				function() {
					document.querySelector('#removingRest').style.display = 'flex';
				}
			);

			document.querySelector('.verify-No').addEventListener('click',
				function() {
					document.querySelector('#removingRest').style.display = 'none';
				}
			);

			function modify() {
				document.getElementById('aRestList').action = '/Group 11/Admin/Functions/modifyRest.php';
			}

			function add() {
				document.getElementById('aRestList').action = '/Group 11/Admin/Functions/addRest.php';
			}

			function remove() {
				document.getElementById('aRestList').action = '/Group 11/Admin/Functions/delete.php';
			}
		</script>

	</form>

	<?php include '../includes/footer.php' ?>
</body>

</html>