<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/login2.css">
    <title>Login</title>
</head>
<body>
<?php
    require 'server.php'; // Requiring the file that connects to the server
    session_start();
    error_reporting(0);

    // Uncomment these if you want to restrict access to logged-in users
    /*
    if (isset($_SESSION['username'])) {
        header('location: home.php');
        exit();
    }

    if (isset($_SESSION['accrole'])) {
        header('location: admin.php');
        exit();
    }
    */

    if (isset($_POST['login'])) {
        $username = $_POST['userName'];
        $password = $_POST['passWord'];

        if (empty($username) || empty($password)) {
            echo "<script>alert('Please Enter A Valid Account! Thank You!');</script>";
            echo "<script>window.location.assign('index.php');</script>";
        } else {
            $sql = "SELECT * FROM accounttbl WHERE username = '$username';";
            $query = mysqli_query($conn, $sql);
            $exist = mysqli_num_rows($query);

            if ($exist == 0) {
                echo "<script>alert('Username Doesn\'t Exist!');</script>";
                echo "<script>window.location.assign('index.php');</script>";
            } else {
                while ($row = mysqli_fetch_assoc($query)) {
                    $user = $row['username'];
                    $hashpwd = $row['password'];
                    $acctype = $row['accrole'];

                    if ($user == $username) {
                        if (!password_verify($password, $hashpwd)) {
                            echo "<script>alert('Incorrect Password! Please Try Again!');</script>";
                            echo "<script>window.location.assign('index.php');</script>";
                        } else {
                            if ($acctype == 'Administrator') {
                                echo "<script>alert('Login Successfully!');</script>";
                                echo "<script>alert('Welcome " . $user . "!');</script>";
                                $_SESSION['username'] = $user;
                                $_SESSION['accrole'] = 'Administrator';
                                echo "<script>window.location.assign('dashboard.php');</script>";
                            } else {
                                echo "<script>alert('Invalid Credentials!');</script>";
                                echo "<script>window.location.assign('index.php');</script>";
                            }
                        }
                    }
                }
            }
        }
    }
?>

<div class="container">
    <div class="background-left"></div>
    <div class="quote-overlay">
        <div class="quote-container">
            <p id="quote">Loading...</p>
        </div>
    </div>
    <div class="login-form">
        <img src="img/logo-icon.png" alt="Logo" class="logo">
        <h2>Login</h2>
        <!-- Update form to submit to PHP script -->
        <form action="login.php" method="POST">
            <label for="username">Username</label>
            <input type="text" id="username" name="userName" required>
            
            <label for="password">Password</label>
            <input type="password" id="password" name="passWord" required>
            
            <button type="submit" name="login">Login</button>
        </form>
    </div>
</div>
<script src="js/scripts.js"></script>
</body>
</html>
