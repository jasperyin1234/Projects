<?php 
session_start();
include_once 'includes/config.php';
	$sql = "SELECT * FROM userlist";
	$result = mysqli_query($mysqli, $sql);
?>

<!DOCTYPE html>
<html>
<head>
	<title>Member List</title>
	<link rel='stylesheet' href='style/mystyle.css'>
	<link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css'>
</head>
<body>
	<?php include 'includes/adminHeader.php'?>
	<?php include 'includes/adminNav.php'?>

	<h2 id="memberList">Member List</h2>
	<hr id="hrMemberList">
	<form id='searchFunction' action='searchMemberList.php' method='POST'>
        <div class='searchIcon'>
            <label for='search'><i class='fa fa-search'></i></label>
            <input class='searchBox' type='search' placeholder='search' name='search' value="<?php if(isset($_POST['search'])){echo $_POST['search'];}?>">
        </div>
    </form>
	<br>
	<table id="memberListTable">
		<tr>
			<th id="header1">Username</th>
			<th id="header2">Address</th>
			<th id="header3">Phone Number</th>
			<th id="header4">Email Address</th>
		</tr>
		<?php
			while($rows = mysqli_fetch_assoc($result)){
		?>		
				<tr>
					<td><a href="/Group 11/userProfileAdminView.php?userID=<?php echo $rows['userID']?>"><?php echo $rows['userName'];?></a></td>
					<td><?php echo $rows['userAddress'];?></td>
					<td><?php echo $rows['userContact'];?></td>
					<td><?php echo $rows['userEmail'];?></td>
				</tr>
		<?php
			} 
		?>
	</table>
	<?php include 'includes/footer.php'?>
</body>
</html>