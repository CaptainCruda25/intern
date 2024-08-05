<?php

require 'server.php';
session_start();





?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Intern Records</title>
    <link rel="stylesheet" href="css/students.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <link rel="icon" type="png" href="img/logo-icon.png">
</head>
<body>
    <div class="container">
        <nav class="sidebar">
            <div class="logo">EACMed</div>
            <ul>
                <li><a href="dashboard.php"><i class="fas fa-home"></i> Home</a></li>
                <li><a href="students.php"><i class="fas fa-users"></i> Interns</a></li>
                <li><a href="attendance.php"><i class="fas fa-chart-line"></i> Attendance</a></li>
                <li><a href="register.php"><i class="fas fa-file-alt"></i> Add Account</a></li>
            </ul>
        </nav>
        <main class="main-content">
            <header>
                <h1>Intern Records</h1>
                <button class="add-entry">+ Add New Entry</button>
            </header>
            <div class="filter">
                <form action="attendance.php" method="POST">
                    <div class="search-bar">
                        <i class="fas fa-search"></i>
                        <input type="text" name="search" placeholder="Search...">
                    </div>
                    <button type="submit" name="btn">Filter Results</button>
                </form>
            </div>
            <table>
                <thead>
                    <tr>
                        <th>Name</th>
                        <th>School/University</th>
                        <th>Course</th>
                        <th>Sex</th>
                        <th>IN</th>
                        <th>OUT</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                        if(isset($_POST['btn'])){
                            $search = $_POST['search'];

                            $find = "SELECT * FROM studentinfo INNER JOIN school ON studentinfo.schoolid = school.id INNER JOIN coursetbl ON coursetbl.courseid = studentinfo.courseid WHERE fname LIKE '%$search%' OR mname LIKE '%$search%' OR lname LIKE '%$search%' OR sex LIKE '%$search%' LIKE '%$search%' OR schoolname LIKE '%$search%' OR course LIKE '%$search%';";
                            $searchquery = mysqli_query($conn, $find);
                            $exist = mysqli_num_rows($searchquery);

                            if($exist > 0){
                                while($row = mysqli_fetch_assoc($searchquery)){
                                    $fname  = $row['fname'];
                                    $mname  = $row['mname'];
                                    $lname  = $row['lname'];
                                    $course = $row['course'];
                                    $sex = $row['sex'];
                                    $age = $row['age'];
                                    $schoolname = $row['schoolname'];
                                    
                                    echo "<tr class='highlight'>";
                                    echo "<td>" .$lname. "," .$fname. " " .$mname. "</td>";
                                    echo "<td>" .$schoolname. "</td>";
                                    echo "<td>" .$course. "</td>";
                                    echo "<td>" .$sex. "</td>";
                                    echo "<td>IN button</td>";
                                    echo "<td>Out Button</td>";
                                    echo "</tr>";
                                }
                            }
                            else {
                                echo "<td colspan='9' style='text-align:center'> No Data Found ..... </td>";
                            }
                        }
                        else {
                            $sql = "SELECT * FROM studentinfo INNER JOIN school ON studentinfo.schoolid = school.id INNER JOIN coursetbl ON coursetbl.courseid = studentinfo.courseid INNER JOIN datestart ON datestart.dateid = coursetbl.courseid INNER JOIN dateend ON dateend.end_id = school.id INNER JOIN hoursreq ON hoursreq.hreq_id = studentinfo.id;";
                            $query = mysqli_query($conn, $sql);

                            while($row = mysqli_fetch_assoc($query)){
                                $fname  = $row['fname'];
                                $mname  = $row['mname'];
                                $lname  = $row['lname'];
                                $course = $row['course'];
                                $sex = $row['sex'];
                                $age = $row['age'];
                                $school = $row['schoolname'];
                                $start = $row['datestart'];
                                $end = $row['endate'];
                                $hours = $row['hreq'];

                                echo "<tr class='highlight'>";
                                echo "<td>" .$lname. "," .$fname. " " .$mname. "</td>";
                                echo "<td>" .$school. "</td>";
                                echo "<td>" .$course."</td>";
                                echo "<td>" .$sex. "</td>";
                                echo "<td></td>";
                                // echo "<td>" .$start. "</td>";
                                // echo "<td>" .$end. "</td>";
                                // echo "<td>" .$hours. " hours</td>";
                                echo "<td></td>";
                                echo "</tr>";
                            }
                        }
                    ?>
                </tbody>
            </table>
        </main>
    </div>
</body>
</html>