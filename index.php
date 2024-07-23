<!DOCTYPE html>
<html lan="EN-US">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="device=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/login.css">
    <link rel="icon" type="png" href="img/userIcon.png">
    <title>LOGIN | GML</title>
    <script type="text/javascript" src="js/function.js"></script>
</head>

<!-- PHP code -->

<?php

require 'server.php'; //requiring the file that connects to the server
session_start();
error_reporting(0);

/*
if ($_SESSION['username']) {
    header('location: home.php');
    exit();
} else {

}

if ($_SESSION['accrole']) {
    header('location: admin.php');
    exit();
}
*/

if (isset($_POST['login'])) {
    $username = $_POST['userName'];
    $password = $_POST['passWord'];

    if (empty($username) || empty($password)) {
        echo "<script>window.alert('Please Enter A Valid Account! Thank You!');</script>";
        echo "<script>window.location.assign('index.php');</script>";
    } else {
        $sql = "SELECT * FROM accounttbl WHERE username = '$username' AND password = '$password';";
        $query = mysqli_query($conn, $sql);
        $exist = mysqli_num_rows($query);
        $user = '';
        $pass = '';


        if ($exist == 0) {
            echo "<script>window.alert('Username Doesn\'t Exist!');</script>";
            echo "<script>window.location.assign('index.php');</script>";
        } else {
            while ($row = mysqli_fetch_assoc($query)) {
                $user = $row['username'];
                $pass = $row['password'];
                $acctype = $row['accrole'];

                if (($user == $username) && ($pass == $password)) {
                    if ($pass !== $password) {
                        echo '<script>window.alert("Incorrect Password! Please Try Again!")</script>';
                        echo "<script>window.location.assign('index.php');</script>";
                    } else {
                        if ($acctype == 'Administrator') {
                            echo "<script>window.alert('Login Successfully!');</script>";
                            echo "<script>window.alert('Welcome " . $user . "!');</script>";
                            $_SESSION['username'] = $user;
                            $_SESSION['accrole'] = 'Administrator';
                            echo "<script>window.location.assign('dashboard.php');</script>";
                        } else {
                            echo "<script>window.alert('Invalid Credentials!');</script>";
                            echo "<script>window.location.assign('index.php');</script>";
                        }
                    }
                }
            }
        }
    }
}






?>


<body>
    <header></header>
    <main>
        <section id="loginctn">
            <div id="bgctn">
                <img src="img/userIcon.png" alt="User Icon">
                <h4>login</h4>
                <form action="index.php" method="POST">
                    <div id="userctn">
                        <input type="text" id="user" name="userName" placeholder="Username">
                    </div>
                    <div id="passctn">
                        <input type="password" id="pass" name="passWord" placeholder="password">
                    </div>
                    <div id="login">
                        <input id="loginbtn" type="submit" name="login" value="login" onclick="signin()">
                    </div>
                </form>
                <p id="forgot"><a id="forgot" href="forgot.php" target="_blank">Forgot Password?</a>
                <p>
                <div class="hr">
                    <p id="or">or</p>
                </div>
            </div>
        </section>
    </main>
    <footer>
        <!--	<address>NAIC, CAVITE</address>-->
    </footer>
</body>

</html>