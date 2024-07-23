<?php

$conn = mysqli_connect("localhost", "root", "", "interndb");

if (!$conn) {
    echo "<script>window.alert('Connection Failed!')</script>";
}
