<!DOCTYPE html>
<html lang="en-US">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/login.css">
    <link rel="icon" type="image/png" href="img/logo-icon.png">
    <title>LOGIN | GML</title>
    <script type="text/javascript" src="js/function.js"></script>
</head>

<body>
    <?php
    require 'server.php'; // Requiring the file that connects to the server
    session_start();
    error_reporting(0);

    /*
    if ($_SESSION['username']) {
        header('location: home.php');
        exit();
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

    <header></header>
    <main>
    <section id="loginctn">
        <div id="bgctn">
            <img src="img/logo.jpg" alt="User Icon">
            <h4>Login</h4>
            <form action="index.php" method="POST">
                <div id="form-box">
                    <div id="userctn">
                        <input type="text" id="user" name="userName" placeholder="Username">
                    </div>
                    <div id="passctn">
                        <input type="password" id="pass" name="passWord" placeholder="Password">
                    </div>
                    <div id="rememberme">
                        <input type="checkbox" id="remember" name="remember">
                        <label for="remember">Remember Me</label>
                    </div>
                </div>
                <div id="login">
                    <input id="loginbtn" type="submit" name="login" value="Login" onclick="signin()">
                </div>
            </form>
            <p id="forgot"><a href="forgot.php" target="_blank">Forgot Password?</a></p>
        </div>
    </section>
    </main>
</body>

</html>
