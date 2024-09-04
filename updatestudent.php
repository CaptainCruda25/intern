<?php

require 'server.php';

if (!empty($_GET['rowid'])) {
    $rowid = $_GET['rowid'];
    $status = $_POST['status'];
    $age = $_POST['age'];

    if(empty($status) || empty($age)){
        echo "<script>window.alert('Fill All The Fields!')</script>";
    }
    else {
        $update = "UPDATE studentinfo SET age = '$age', status = '$status' WHERE studid like $rowid;";
        $query = mysqli_query($conn, $update);
        echo "<script>window.alert('Update Successfully!')</script>";
        echo "<script>window.location.assign('internInfo.php?rowid='" .$rowid."')</script>";
        
    }
    
}

