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
                <button class="Btn" onclick="logout()" >
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
<div id="addInternModal" class="modal">
    <div class="modal-content">
        <span class="close">&times;</span>
        <h2>Add Intern</h2>
        <form id="addInternForm">
            <div>
                <input type="text" id="firstName" name="firstName" placeholder="First Name" required>
            </div>
            <div>
                <input type="text" id="middleName" name="middleName" placeholder="Middle Name">
            </div>
            <div>
                <input type="text" id="lastName" name="lastName" placeholder="Last Name" required>
            </div>
            <div>
                <select id="sex" name="sex" required>
                    <option value="" disabled selected>Sex</option>
                    <option value="M">Male</option>
                    <option value="F">Female</option>
                </select>
            </div>
            <div>
                <input type="number" id="age" name="age" placeholder="Age" required>
            </div>
            <div>
                <?php
                    $fetching = "SELECT * FROM coursetbl";
                    $fetchquery = mysqli_query($conn, $fetching);
                    
                ?>
                <select id="course" name="course" required>
                    <option value="" disabled selected>Course</option>
                    <?php
                        while($row = mysqli_fetch_assoc($fetchquery)){
                            $courseid = $row['courseid'];
                            $course = $row['course'];
                    ?>
                            <option value="<?php $courseid ?>"><?php echo $course;?></option>        
                    <?php
                        }


                    ?>
                    <!-- Add more options as needed -->
                </select>
            </div>
            <div class="form-group">
                <label for="startDate">Start Date</label>
                <input type="date" id="startDate" name="startDate" required>
            </div>
            <div class="form-group">
                <label for="endDate">End Date</label>
                <input type="date" id="endDate" name="endDate" required>
            </div>
            <div>
                <?php
                    $fetch = "SELECT * FROM school ORDER BY schoolname;";
                    $query = mysqli_query($conn, $fetch);

                    

                ?>
                <select id="course" name="course" required>
                    <option value="" disabled selected>School Name</option>
                    <?php
                    while($row = mysqli_fetch_assoc($query)){
                        $Sid = $row['id'];
                        $school = $row['schoolname'];
                    ?>    
                        <option value="<?php $Sid; ?>"><?php echo $school;?></option>
                    <?php
                    }
                    ?>
                    <!-- Add more options as needed -->
                </select>
            </div>
            <div style="flex: 1 1 100%;">
                <button type="submit">Add Intern</button>
            </div>
        </form>
    </div>

</div>

<script>
var modal = document.getElementById("addInternModal");
var btn = document.getElementById("openModal");
var span = document.getElementsByClassName("close")[0];

btn.onclick = function() {
    modal.style.display = "block";
}

span.onclick = function() {
    modal.style.display = "none";
}

window.onclick = function(event) {
    if (event.target == modal) {
        modal.style.display = "none";
    }
}
</script>

            <div class="search-bar-container">
                <div class="search-bar">
                    <form method="POST">
                    <i class="fa fa-search"></i>
                    <input type="text" name="search" placeholder="Search...">
                    
                </div>
                <button type="submit" name="btn" class="filter-button">Filter Results</button>
                </form>
            </div>

            <table>
                <thead>
                    <tr>
                        <th>ID</th>
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
                        if(isset($_POST['btn'])){
                            $search = $_POST['search'];

                            // // $find = "SELECT * FROM studentinfo WHERE id LIKE '%$search%' OR fname LIKE '%$search%' OR mname LIKE '%$search%' OR lname LIKE '%$search%' OR age LIKE '%$search%' OR sex LIKE '%$search%' OR course LIKE '%$search%' OR school LIKE '%$search%';";
                            $find = "SELECT * FROM studentinfo INNER JOIN school ON studentinfo.schoolid = school.id INNER JOIN coursetbl ON coursetbl.courseid = studentinfo.courseid WHERE fname LIKE '%$search%' OR mname LIKE '%$search%' OR lname LIKE '%$search%' OR age LIKE '%$search%' OR sex LIKE '%$search%' OR hrequired LIKE '%$search%' OR startdate LIKE '%$search%' OR end_date LIKE '%$search%' OR schoolname LIKE '%$search%' OR course LIKE '%$search%' OR status LIKE '%$search%' ORDER BY studid DESC;";
                            $searchquery = mysqli_query($conn, $find);
                            $exist = mysqli_num_rows($searchquery);

                            if($exist > 0){
                                while($row = mysqli_fetch_assoc($searchquery)){
                                    $id = $row['studid'];
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
                                    $status = $row['status'];
                                    
                                    echo "<tr class='highlight'>";
                                    echo "<td>" .$id. "</td>";
                                    echo "<td>" .$lname. "," .$fname. " " .$mname. "</td>";
                                    echo "<td>" .$schoolname. "</td>";
                                    echo "<td>" .$course. "</td>";
                                    echo "<td>" .$sex. "</td>";
                                    echo "<td>" .$age. "</td>";
                                    echo "<td>" .$start."</td>";
                                    echo "<td>" .$end. "</td>";
                                    echo "<td>" .$hours. "</td>";
                                    echo "<td></td>";
                                    echo "<td>" .$status."</td>";
                                    echo "</tr>";
                                }
                            }
                            else {
                                echo "<td colspan='9' style='text-align:center'> No Data Found ..... </td>";
                            }
                        }
                        else {
                            $sql = "SELECT * FROM studentinfo INNER JOIN school ON studentinfo.schoolid = school.id INNER JOIN coursetbl ON coursetbl.courseid = studentinfo.courseid ORDER BY studid DESC;";
                            $query = mysqli_query($conn, $sql);

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
                                $status = $row['status'];

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
                                echo "<td>" .$status. "</td>";
                                echo "</tr>";
                            }
                        }
                    ?>
                </tbody>
            </table>
        </main>
    </div>

<!-- Log out -->
<script>
    function logout(){
        let ask = confirm("Are you want to Log-Out?");

        if(ask == true){
            window.location.assign('logout.php');
        }
        else{
            window.location.assign('students.php');
        }
    }
</script>
    
</body>
</html>