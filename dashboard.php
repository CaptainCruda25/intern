<!DOCTYPE html>
<html lang="en-US">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Intern Records</title>
    <link rel="stylesheet" href="css/dashboard.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <link rel="icon" type="png" href="img/logo-icon.png">
</head>

<body>
    <div class="container">
        <?php include 'component/navbar.php'; ?>
        <div class="main-content"></div>
    </div>

    <script>
        function logout() {
            let ask = confirm('Are you want to Log-out?');

            if (ask) {
                window.location.assign('logout.php');
            } else {
                window.location.assign('dashboard.php');
            }
        }
    </script>
</body>

</html>