<!DOCTYPE html>
<html lang="EN_US">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>HOME | WELCOME</title>
	<link rel="stylesheet" href="home.css">
	<link rel="icon" type="png" href="">
</head>

<!-- PHP CODE -->

<?php

require 'server.php';
session_start();

if($_SESSION['username']){
	
}
else {
	header('location: index.php');
	exit();
}
$session = $_SESSION['username'];
$sql = "SELECT * FROM usertbl WHERE username = '$session' OR email = '$session';";
$query = mysqli_query($conn, $sql);
$row = mysqli_fetch_assoc($query);
$user = $row['fname'];
?>

<body>
	<header>
		<nav>
			<ul>
				<li><a href="home.php">HOME</a></li>
				<li><a href="about.php">ABOUT</a></li>
				<li><a href="#popbox">CONTACT US</a></li>
				<li><a href="profile.php">PROFILE</a></li>
				<li><a href="#"><input type="button" value="LOGOUT" onclick="logout()"></a></li>
			</ul>
		</nav>
	</header>
	<main>
		<section>
			<div>
				<h1>HOME</h1>
				<h3>Welcome <span><?php echo $user;?></span>!</h3>
				<article></article>
				<fieldset>
					<legend>ADD TO LIST</legend>
					<form action="add.php" method="POST">
						<div id="input">
							<label for="details">ADD MORE TO LIST: </label><input type="text" id="details" name="details" placeholder="ADD MORE TO LIST...">
						</div>
						<div>
							<label for="check">Do you want to post it public?</label><input type="checkbox" id="check" name="public[]" value="yes"><label for="check">Yes</label>
						</div>
						<div>
							<input type="submit" id="add" name="add" value="Add to List">
						</div>
					</form>
				</fieldset>
				<center><h1>Table List</h1></center>
				<table>
					<tr>
						<th id="id">ID</th>
						<th id="detail">Details</th>
						<th id="datepost">Date Posted</th>
						<th id="dateedit">Date Edited</th>
						<th id="post">Public Post</th>
						<th id="tblaction" colspan="2">Action</th>
					</tr>

					<?php
					require 'server.php';

					$sql = "SELECT * FROM list_tbl;";
					$query = mysqli_query($conn, $sql);

					while ($row = mysqli_fetch_assoc($query)){
						Print "<tr>";
						print "<td >". $row['listID'] ."</td>";
						print "<td>". $row['details'] ."</td>";
						Print "<td>". $row['dateposted']. " at " .$row['timeposted']."</td>";
						echo  "<td>".$row['date_edited']. " at ". $row['time_edited']. "</td>";
						echo "<td>".$row['public']."</td>";
						echo "<td><a target=_blank href='update.php?rowid=".$row['listID']."'><input type=button id=edit value=Edit></a></td>";
						echo "<td><a href='#'><input type='button' id='delete' value='Delete' onclick='del(".$row['listID'].")'></a></td>";
						echo  "</tr>";			
					}


					?>

				</table>
				<div class="popup" id="popbox">
					<a href="#" id="close">CLOSE</a>
					<div></div>
				</div>
				<script>
					function logout(){
						let = logout = confirm("Confirm you want to Log-out?");
						if (logout == true){
							window.location.assign("logout.php");
						}
						else {
							window.location.assign("home.php");
						}
					}
					function del(listID){
						let r = confirm("Are you sure you want to delete this record?");
						if(r == true){
							window.location.assign('delete.php?rowid=' + listID);
						}
					}


				</script>
			</div>
		</section>
	</main>
<!--	<footer>
		<address>NAIC, CAVITE</address>
	</footer>  -->
</body>
</html>


