<?php

session_start();
session_destroy();
echo "<script>window.alert('Log-out Successfully!');</script>";
echo "<script>window.location.assign('login.php');</script>";
exit();

?>