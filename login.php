<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/login2.css">
    <title>Login</title>
</head>
<body>
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
        <form>
            <label for="username"></label>
            <input type="text" id="username" name="username" placeholder="Username" required>
            
            <label for="password"></label>
            <input type="password" id="password" name="password" placeholder="Password" required>
            
            <button type="submit">Login</button>
        </form>
    </div>
</div>
<script src="js/scripts.js"></script>
</body>
</html>
