<?php

require 'server.php';
session_start();
error_reporting(0);

if($_SESSION['username']){
    
}










?>

<!DOCTYPE html>
<html lang="en-US">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin</title>
    <link rel="stylesheet" href="css/dashboard.css">
    <link rel="icon" type="png" href="">
</head>
<body>
    <aside>
        <div class="logo-div">
            <img class="logo" src="img/logo.jpg" alt="Logo">
        </div>
        <ul>
            <li><a href=""><img class="icon" src="img/home.png" alt="">Home </a></li>
            <li><a href=""><img class="icon" src="img/lock.png" alt="">Accounts </a></li>
            <li><a href="students.php"><img class="icon" src="img/profile.png" alt="">Students</a></li>
            <li><a href="#" onclick="logout()"><img src="icon" alt="Log-out"> Log-Out </a></li>
        </ul>
    </aside>
    <main>
        <!-- <a href="#" id="insert-btn">Insert</a>
        <div class="popup" >
			<!-- <a href="#" id="close">CLOSE</a> -->
			<div class="overlay"></div>
            <div class="content">
                <h2>Insert New Data</h2>
                <form action="" method="">
                    <div class="course">
                        <input type="text" name="course" id="">
                    </div>
                    
                    <div class="college">
                        <input type="text" name="college" id="">
                    </div>
                    <div class="controls">
                        <a href=""><button class="close-btn"> Cancel</button></a>
                        <input type="submit" class="insert" value="Insert Data" name="insert">
                    </div>
                </form>
            </div>
        </div> -->
    </main>
</body>
<script>
    // Log-out Function

    function logout(){
        let ask = confirm("Do you want to Log-Out?");
        
        if(ask){
            window.location.assign('logout.php');
        }
        else {
            window.location.assign('dashboard.php');
        }
    }
</script>
</html>
