<!DOCTYPE html>
<html lang="EN_US">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>EDIT LIST | GML</title>
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
				<li><a href="list.php">LIST</a></li>
				<li><a href="logout.php">LOGOUT</a></li>
			</ul>
		</nav>
	</header>
	<main>
		<section>
			<div>
				<h1>HOME</h1>
				<h3>Welcome <span><?php echo $user;?></span>!</h3>
				<article></article>
				<center><h1>SELECTED LIST</h1></center>
				<table>
					<tr>
						<th id="id">ID</th>
						<th id="detail">Details</th>
						<th id="datepost">Date Posted</th>
						<th id="dateedit">Date Edited</th>
						<th id="post">Public Post</th>
					</tr>

					<?php
					require 'server.php';


					if(!empty($_GET['rowid'])){
						$dbid = $_GET['rowid'];
						$_SESSION['listID'] = $dbid;					
						$sql = "SELECT * FROM list_tbl WHERE listID = '$dbid';";
						$query = mysqli_query($conn, $sql);
						$choice = "No";
						$exist = true;
						$row = mysqli_num_rows($query);

						if ($row > 0) {
							while ($info = mysqli_fetch_assoc($query)){
								Print "<tr>";
								print "<td >". $info['listID'] ."</td>";
								print "<td>". $info['details'] ."</td>";
								Print "<td>". $info['dateposted']. " at " .$info['timeposted']."</td>";
								echo  "<td>".$info['date_edited']. " at ". $info['time_edited']. "</td>";
								echo "<td>".$info['public']."</td>";
								print '</tr>';
											
							}
						}


						if (!$exist == true) {
							echo '<script>window.alert("There\'s Nothing To Edit!")</script>';

							
						}else {
							$dbid = $_GET['rowid'];
							$_SESSION['listID'] = $dbid;
							$sql = "SELECT * FROM list_tbl WHERE listID = '$dbid';";
							$query = mysqli_query($conn, $sql);
							$row = mysqli_fetch_assoc($query);
							print '<fieldset>
							<legend>ADD TO LIST</legend>
							<form action="" method="POST">
								<div id="input">
									<label for="details">ENTER NEW TO LIST: </label><input type="text" id="details" name="details" placeholder="ENTER NEW TO LIST...">
								</div>
								<div>
									<label for="check">Do you want to post it public?</label><input type="checkbox" id="check" name="public[]" value="yes"><label for="check">Yes</label>
								</div>
								<div>
									<input type="submit" name="editbtn" value="Update List">
								</div>
							</form>
						</fieldset>';
						}
						if(isset($_POST['editbtn'])){
							$detail = mysqli_escape_string($conn, $_POST['details']);
							$date = strftime("%B %d, %Y");
							$time = strftime('%X');
							$dbid = $_SESSION['listID'];	
							$choice = "No";
							
							if (!empty($detail)){
								foreach($_POST['public'] as $choicelist) {
									if(!empty($choicelist)){
										$choice = "Yes";
									}
									
								}
							}
							$update = "UPDATE list_tbl SET details = '$detail', date_edited = '$date', time_edited = '$time', public = '$choice' WHERE listID = '$dbid';";
							$query = mysqli_query($conn, $update);
							echo "<script>window.alert('Updated Successfully!');</script>";
							echo "<script>window.location.assign('home.php');</script>";			
						}
					}


					

					


					?>

				</table>
			</div>
			<?php
			include 'server.php';
				
			?>
		</section>
	</main>
<!--	<footer>
		<address>NAIC, CAVITE</address>
	</footer>  -->
</body>
</html>


