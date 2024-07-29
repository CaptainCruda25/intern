<?php

session_start();
error_reporting(0);

if($_SESSION['username']){
    
}


// Log-out Function







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
            <li><a href=""><img class="icon" src="img/profile.png" alt="">Students</a></li>
            <li><a href="#" onclick="logout()"><img src="icon" alt="Log-out"> Log-Out </a></li>
        </ul>
    </aside>
    <main></main>
</body>
<script>
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