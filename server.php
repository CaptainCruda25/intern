<?php

$conn = mysqli_connect("localhost", "root", "", "interndb");

if (!$conn) {
    echo "<script>window.alert('Connection Failed!')</script>";
}

// $conn = mysqli_connect("dono-01.danbot.host", "root", "grade7class", "interndb", 1499);

// if (!$conn) {
//     echo "<script>window.alert('Connection Failed!')</script>";
// }


