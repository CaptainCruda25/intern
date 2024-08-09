<?php

require 'server.php';


    $rowid = $_GET['rowid'];
    $delete = "DELETE FROM studentinfo WHERE studid = $rowid;";
    $query = mysqli_query($conn, $delete);

    echo "<script>window.alert('Deleted Successfully!');</script>";
    echo '<script>window.location.assign("students.php");</script>';





?>