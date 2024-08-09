<?php

require 'server.php';
session_start();





?>




<!DOCTYPE html>
<html lang="en-US">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Intern Records</title>
    <link rel="stylesheet" href="css/student.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <link rel="icon" type="png" href="img/logo-icon.png">
</head>
<body>
    <div class="container">
        <nav class="sidebar">
            <ul>
                <li class="logo-container">
                    <img src="img/logo-icon.png" class="logo" alt="EACMed Logo">
                </li>
                <li><a href="dashboard.php"><i class="fas fa-home"></i> <span>Home</span></a></li>
                <li><a href="students.php"><i class="fas fa-users"></i> <span>Interns</span></a></li>
                <li><a href="attendance.php"><i class="fas fa-chart-line"></i> <span>Attendance</span></a></li>
            </ul>
            <div class="logout-container">
                <button class="Btn">
                    <div class="sign">
                        <svg viewBox="0 0 512 512">
                            <path d="M377.9 105.9L500.7 228.7c7.2 7.2 11.3 17.1 11.3 27.3s-4.1 20.1-11.3 27.3L377.9 406.1c-6.4 6.4-15 9.9-24 9.9c-18.7 0-33.9-15.2-33.9-33.9l0-62.1-128 0c-17.7 0-32-14.3-32-32l0-64c0-17.7 14.3-32 32-32l128 0 0-62.1c0-18.7 15.2-33.9 33.9-33.9c9 0 17.6 3.6 24 9.9zM160 96L96 96c-17.7 0-32 14.3-32 32l0 256c0 17.7 14.3 32 32 32l64 0c17.7 0 32 14.3 32 32s-14.3 32-32 32l-64 0c-53 0-96-43-96-96L0 128C0 75 43 32 96 32l64 0c17.7 0 32 14.3 32 32s-14.3 32-32 32z"></path>
                        </svg>
                    </div>
                    <div class="text">Logout</div>
                </button>
            </div>
        </nav>



        <main class="main-content">
            <header>
                <h1>Intern Records</h1>
                <button type="button" class="button" id="openModal">
                    <span class="button__text">Add Intern</span>
                    <span class="button__icon">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" viewBox="0 0 24 24" stroke-width="2" stroke-linejoin="round" stroke-linecap="round" stroke="currentColor" height="24" fill="none" class="svg">
                            <line y2="19" y1="5" x2="12" x1="12"></line>
                            <line y2="12" y1="12" x2="19" x1="5"></line>
                        </svg>
                    </span>
                </button>
            </header>
                <!-- Modal -->

</script>

            <div class="search-bar-container">
                <div class="search-bar">
                    <i class="fa fa-search"></i>
                    <input type="text" placeholder="Search...">
                </div>
                <button class="filter-button">Filter Results</button>
            </div>

            <table>
                <thead>
                    <tr>
                        <th>Name</th>
                        <th>School
                            /University</th>
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
               
                    <?php
                        

                        if(!empty($_GET['rowid'])){
                            $studid = $_GET['rowid'];
                            $fetch = "SELECT * FROM studentinfo INNER JOIN school ON studentinfo.schoolid = school.id INNER JOIN coursetbl ON coursetbl.courseid = studentinfo.courseid WHERE studid LIKE $studid;";
                            $query = mysqli_query($conn, $fetch);

                            while($row = mysqli_fetch_assoc($query)){
                                $id = $row['studid'];
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
                                echo "<td>" .$id. "</td>";
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