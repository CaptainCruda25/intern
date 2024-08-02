<?php

require 'server.php';
session_start();

// if($_SESSION['']){
    
// }


?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Account</title>
    <link rel="stylesheet" href="">
    <link rel="icon" href="img/logo-icon.png">
    <script></script>
</head>

<!-- PHP Code -->

<?php

if(isset($_POST['register'])){
    $username = $_POST['uname'];
    $password = $_POST['pword'];
    $rpword = $_POST['rpass'];

    if(empty($username) || empty($password) || empty($rpword)){
        echo "<script>window.alert('Fill All The Fields!');</script>";

    }
    else {

        if($password !== $rpword){
            echo "<script>window.alert('Password Doesn'/t Match!');</script>";
        }
        else {
            $hashpwd = password_hash($password, PASSWORD_BCRYPT);
            
            $sql = "INSERT INTO accounttbl(username, password) VALUES('$username', '$hashpwd');";

            $query = mysqli_query($conn, $sql);
            echo "<script>window.alert('Register Successfully!');</script>";

        }

    }
}



?>

<body>
    <form action="" method="POST">
        <div class="username">
            <input type="text" name="uname" id="" placeholder="Username">
        </div>
        <div class="pass">
            <input type="password" name="pword" id="" placeholder="Password">
        </div>
        <div class="rpass">
            <input type="password" name="rpass" id="" placeholder="Repeat Your Password">
        </div>
        <div class="addacc">
            <input type="submit" name="register" value="Register">
        </div>
    </form>
</body>
</html>