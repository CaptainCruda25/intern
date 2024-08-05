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
    <ul>
        <div class="logo">
        <img src="img/logo-icon.png" alt="EACMed Logo">

        </div>
        <li><a href="dashboard.php"><i class="fas fa-home"></i> <span>Home</span></a></li>
        <li><a href="students.php"><i class="fas fa-users"></i> <span>Interns</span></a></li>
        <li><a href="attendance.php"><i class="fas fa-chart-line"></i> <span>Attendance</span></a></li>
        <li><a href="register.php"><i class="fas fa-file-alt"></i> <span>Add Account</span></a></li>
    </ul>
</nav>
        <main class="main-content">
            <header>
                <h1>Intern Records</h1>
                <button class="add-entry">+ Add New Entry</button>
            </header>
            <div class="search-bar-container">
    <div class="search-bar">
        <i class="fa fa-search"></i>
        <form action="" method="POST">
            <input type="text" name="search" placeholder="Search...">
            
    </div>
    <button type="submit" name="btn" class="filter-button">Filter Results</button>
        </form>
</div>

            <table>
                <thead>
                    <tr>
                        <th>Name</th>
                        <th>School/University</th>
                        <th>Course</th>
                        <th>Sex</th>
                        <th>Age</th>
                        <th>Started Date</th>
                        <th>End Date</th>
                        <th>Hours Required</th>
                        <th>Overall Remaining Hours</th>
                        <th>Status</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                        if(isset($_POST['btn'])){
                            $search = $_POST['search'];

                            // // $find = "SELECT * FROM studentinfo WHERE id LIKE '%$search%' OR fname LIKE '%$search%' OR mname LIKE '%$search%' OR lname LIKE '%$search%' OR age LIKE '%$search%' OR sex LIKE '%$search%' OR course LIKE '%$search%' OR school LIKE '%$search%';";
                            $find = "SELECT * FROM studentinfo INNER JOIN school ON studentinfo.schoolid = school.id INNER JOIN coursetbl ON coursetbl.courseid = studentinfo.courseid WHERE fname LIKE '%$search%' OR mname LIKE '%$search%' OR lname LIKE '%$search%' OR age LIKE '%$search%' OR sex LIKE '%$search%' OR hrequired LIKE '%$search%' OR startdate LIKE '%$search%' OR end_date LIKE '%$search%' OR schoolname LIKE '%$search%' OR course LIKE '%$search%';";
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
                                    $hours = $row['hrequired'];
                                    $start = $row['startdate'];
                                    $end = $row['end_date'];

                                    
                                    echo "<tr class='highlight'>";
                                    echo "<td>" .$lname. "," .$fname. " " .$mname. "</td>";
                                    echo "<td>" .$schoolname. "</td>";
                                    echo "<td>" .$course. "</td>";
                                    echo "<td>" .$sex. "</td>";
                                    echo "<td>" .$age. "</td>";
                                    echo "<td>" .$start."</td>";
                                    echo "<td>" .$end. "</td>";
                                    echo "<td>" .$hours. "</td>";
                                    echo "<td></td>";
                                    echo "<td></td>";
                                    echo "</tr>";
                                }
                            }
                            else {
                                echo "<td colspan='9' style='text-align:center'> No Data Found ..... </td>";
                            }
                        }
                        else {
                            $sql = "SELECT * FROM studentinfo INNER JOIN school ON studentinfo.schoolid = school.id INNER JOIN coursetbl ON coursetbl.courseid = studentinfo.courseid;";
                            $query = mysqli_query($conn, $sql);

                            while($row = mysqli_fetch_assoc($query)){
                                $fname  = $row['fname'];
                                $mname  = $row['mname'];
                                $lname  = $row['lname'];
                                $course = $row['course'];
                                $sex = $row['sex'];
                                $age = $row['age'];
                                $school = $row['schoolname'];
                                $start = $row['startdate'];
                                $end = $row['end_date'];
                                $hours = $row['hrequired'];

                                echo "<tr class='highlight'>";
                                echo "<td>" .$lname. "," .$fname. " " .$mname. "</td>";
                                echo "<td>" .$school. "</td>";
                                echo "<td>" .$course."</td>";
                                echo "<td>" .$sex. "</td>";
                                echo "<td>" .$age. "</td>";
                                echo "<td>" .$start. "</td>";
                                echo "<td>" .$end. "</td>";
                                echo "<td>" .$hours. " hours</td>";
                                echo "<td></td>";
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