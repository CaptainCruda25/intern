<?php

require 'server.php';

session_start();
error_reporting(0);




?>




<!DOCTYPE html>
<html lang="en-US">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Intern Records</title>
    <link rel="stylesheet" href="css/interns.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <link rel="icon" type="png" href="img/logo-icon.png">
</head>

<!-- PHP for add intern -->

<body>

    <?php include 'component/navbar.php'; ?>

    <div class="main-content">
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
                <form id="addInternForm" method="POST" action="addstudent.php" enctype="multipart/form-data"> <!-- Add enctype attribute for file uploads -->
                    <div>
                        <input type="text" id="firstName" name="firstName" placeholder="First Name">
                    </div>
                    <div>
                        <input type="text" id="middleName" name="middleName" placeholder="Middle Name">
                    </div>
                    <div>
                        <input type="text" id="lastName" name="lastName" placeholder="Last Name">
                    </div>
                    <div>
                        <select name="sex" id="sex">
                            <option value="" disabled selected>Sex</option>
                            <option value="M"> Male </option>
                            <option value="F"> Female </option>
                        </select>
                    </div>
                    <div>
                        <select id="school" name="school">
                            <option disabled selected>School Name</option>
                            <?php
                            $school = "SELECT * FROM school ORDER BY schoolname";
                            $query = mysqli_query($conn, $school);

                            while ($row = mysqli_fetch_assoc($query)) {
                                $Sid = $row['id'];
                                $school = $row['schoolname'];
                            ?>
                                <option value="<?php echo $Sid; ?>"><?php echo $school; ?></option>
                            <?php
                            }
                            ?>
                            <!-- Add more options as needed -->
                        </select>
                    </div>
                    <div>
                        <select id="course" name="course">
                            <option value="" disabled selected>Course</option>
                            <?php
                            $fetching = "SELECT * FROM coursetbl";
                            $fetchquery = mysqli_query($conn, $fetching);

                            while ($row = mysqli_fetch_assoc($fetchquery)) {
                                $courseid = $row['courseid'];
                                $course = $row['course'];
                            ?>
                                <option value="<?php echo $courseid; ?>"><?php echo $course; ?></option>
                            <?php
                            }


                            ?>
                            <!-- Add more options as needed -->
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="bday">Birthday</label>
                        <input type="date" id="bday" name="bday">
                    </div>
                    <div class="form-group">
                        <label for="startDate">Student Age</label>
                        <input type="text" name="age" placeholder="Age">
                    </div>
                    <div class="form-group">
                        <label for="startDate">Start Date</label>
                        <input type="date" id="startDate" name="startDate">
                    </div>
                    <div class="form-group">
                        <label for="endDate">End Date</label>
                        <input type="date" id="endDate" name="endDate">
                    </div>
                    <div>
                        <input type="text" id="hours" name="hours" placeholder="Hours Required">
                    </div>
                    <!-- New file input for picture -->
                    <div class="file-upload-container">
                        <label for="fileUpload" class="file-upload-label">Profile Picture</label>
                        <label for="fileUpload" class="custom-file-upload">
                            <span>Choose File</span>
                        </label>
                        <input type="file" id="fileUpload" name="image" accept="image/*" style="display: none;" />

                    </div>
                    <div style="flex: 1 1 100%;">
                        <button type="submit" name="add" onclick="register('insert')">Add Intern</button>
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
                <i class="fa fa-search"></i>
                <form action="" method="POST">
                    <input type="text" name="search" placeholder="Search...">
            </div>
            <button class="filter-button" type="submit" name="btn">Filter Results</button>
            </form>
        </div>

        <div class="table-container">
            <table id="myTable">
                <thead>
                    <tr>
                        <th>Image</th>
                        <th onclick="sortTable(0)">Name</th>
                        <th onclick="sortTable(1)">School / University</th>
                        <th onclick="sortTable(2)">Course</th>
                        <th onclick="sortTable(3)">Started Date</th>
                        <th onclick="sortTable(4)">End Date</th>
                        <th onclick="sortTable(5)">Hours Required</th>
                        <th onclick="sortTable(6)">Overall Remaining Hours</th>
                        <th onclick="sortTable(7)">Status</th>

                    </tr>
                </thead>
                <tbody id="tableBody">
                    <?php
                    if (isset($_POST['btn'])) {
                        $search = $_POST['search'];

                        $find = "SELECT * FROM studentinfo INNER JOIN school ON studentinfo.schoolid = school.id INNER JOIN coursetbl ON coursetbl.courseid = studentinfo.courseid WHERE (fname LIKE '%$search%' OR 
                mname LIKE '%$search%' OR lname LIKE '%$search%' OR age LIKE '%$search%' OR sex LIKE '%$search%' OR hrequired LIKE '%$search%' OR hoursrem LIKE '%$search%'
                OR startdate LIKE '%$search%' OR end_date LIKE '%$search%' OR schoolname LIKE '%$search%' OR course LIKE '%$search%') AND view LIKE 'Yes' ORDER BY studentinfo.studid DESC;";
                        $searchquery = mysqli_query($conn, $find);
                        $exist = mysqli_num_rows($searchquery);


                        if ($exist > 0) {
                            while ($row = mysqli_fetch_all($searchquery)) {
                                $fname  = $row['fname'];
                                $mname  = $row['mname'];
                                $lname  = $row['lname'];
                                $course = $row['course'];
                                $sex = $row['sex'];
                                $age = $row['age'];
                                $schoolname = $row['schoolname'];
                                $hours = $row['hrequired'];
                                $hoursrem = $row['hoursrem'];
                                $start = $row['startdate'];
                                $end = $row['end_date'];
                                $profile = $row['image'];
                                $convertedstart = date("Y-m-d", $start);
                                $convertedend = date('Y-m-d', $end);




                                $hours = intdiv($hoursrem, 3600);
                                $minutes = intdiv(($hoursrem % 3600), 60);
                                $seconds = $hoursrem % 60;

                                $hREM = $hours . "h " . $minutes . "m";


                                echo "<tr class='highlight'>";
                                echo "<td><a href=internInfo.php?rowid='" . $id . "'><img id='profile' src='uploads/" . $profile . "' alt='Profile Image'></a></td>";
                                echo "<td><a href=internInfo.php?rowid='" . $id . "'>" . "<strong>" . $lname . "</strong>" . ", " . $fname . " " . $mname . "</a></td>";
                                echo "<td>" . $lname . ", " . $fname . " " . $mname . "</td>";
                                echo "<td>" . $schoolname . "</td>";
                                echo "<td>" . $course . "</td>";
                                echo "<td>" . $convertedstart . "</td>";
                                echo "<td>" . $convertedend . "</td>";
                                echo "<td>" . $hours / 3600 . "h</td>";
                                echo "<td>" . $hREM . "</td>"; // Adjust this for remaining hours
                                echo "<td></td>"; // Adjust this for status
                                echo "</tr>";
                            }
                        } else {
                            echo "<tr><td colspan='8' style='text-align:center'> No Data Found ..... </td></tr>";
                        }
                    } else {
                        $sql = "SELECT * FROM studentinfo INNER JOIN school ON studentinfo.schoolid = school.id INNER JOIN coursetbl ON coursetbl.courseid = studentinfo.courseid 
                            WHERE view = 'Yes' ORDER BY studentinfo.studid DESC;";
                        $query = mysqli_query($conn, $sql);


                        while ($row = mysqli_fetch_assoc($query)) {
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
                            $hreq = $row['hrequired'];
                            $hoursrem = $row['hoursrem'];
                            $status = $row['status'];
                            $profile = $row['image'];
                            $convertedstart = date("Y-m-d", $start);
                            $convertedend = date('Y-m-d', $end);

                            $hours = intdiv($hoursrem, 3600);
                            $minutes = intdiv(($hoursrem % 3600), 60);
                            $seconds = $hoursrem % 60;

                            $hREM = $hours . "h " . $minutes . "m";


                            echo "<tr class='highlight'>";
                            echo "<td><a href='internInfo.php?rowid=" . $id . "'><img id='profile' src='uploads/" . $profile . "' alt='Profile Image'></a></td>";
                            echo "<td><a href=internInfo.php?rowid='" . $id . "'>" . "<strong>" . $lname . "</strong>" . ", " . $fname . " " . $mname . "</a></td>";
                            echo "<td>" . $school . "</td>";
                            echo "<td>" . $course . "</td>";
                            echo "<td>" . $convertedstart . "</td>";
                            echo "<td>" . $convertedend . "</td>";
                            echo "<td>" . $hreq / 3600 . "h</td>";
                            echo "<td>" . $hREM . "</td>"; // Adjust this for remaining hours
                            echo "<td>" . $status . "</td>"; // Adjust this for status
                            echo "</tr>";
                        }
                    }
                    ?>
                </tbody>
            </table>

            </main>
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
            // PHP code for fetching student id 

            <?php

            $id = "SELECT * FROM studentinfo";
            $query = mysqli_query($conn, $id);

            while ($get = mysqli_fetch_assoc($query)) {
                $studid = $get['studid'];
            }

            ?>

            function sortTable(columnIndex) {
                var table = document.getElementById("myTable");
                var rows = table.rows;
                var switching = true;
                var shouldSwitch;
                var direction = "asc";
                var switchCount = 0;

                while (switching) {
                    switching = false;
                    var rowsArray = Array.prototype.slice.call(rows, 1);

                    for (var i = 0; i < rowsArray.length - 1; i++) {
                        shouldSwitch = false;
                        var x = rowsArray[i].getElementsByTagName("TD")[columnIndex];
                        var y = rowsArray[i + 1].getElementsByTagName("TD")[columnIndex];

                        var xValue = x.innerHTML.toLowerCase();
                        var yValue = y.innerHTML.toLowerCase();

                        if (direction === "asc") {
                            if (xValue > yValue) {
                                shouldSwitch = true;
                                break;
                            }
                        } else if (direction === "desc") {
                            if (xValue < yValue) {
                                shouldSwitch = true;
                                break;
                            }
                        }
                    }

                    if (shouldSwitch) {
                        rowsArray[i].parentNode.insertBefore(rowsArray[i + 1], rowsArray[i]);
                        switching = true;
                        switchCount++;
                    } else {
                        if (switchCount === 0 && direction === "asc") {
                            direction = "desc";
                            switching = true;
                        }
                    }
                }
            }
        </script>

        
        <script>
            function logout() {
                let ask = confirm('Are you want to Log-out?');

                if (ask) {
                    window.location.assign('logout.php');
                } else {
                    window.location.assign('interns.php');
                }
            }
        </script>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
        <script>
            $(document).ready(function() {
        // Register button click handler or call register function
    });

    // function register(action) {
    //     let data = {
    //         action: action,
    //         fname: $('#firstName').val(),
    //         mname: $('#middleName').val(),
    //         lname: $('#lastName').val(),
    //         sex: $('#sex').val(),
    //         school: $('#school').val(),
    //         course: $('#course').val(),
    //         bday: $('#bday').val(),
    //         startDate: $('#startDate').val(),
    //         reqhours: $('#hours').val(),
    //         profile: $('#fileUpload')[0].files[0] // Handling file upload correctly
    //     };

    //     $.ajax({
    //         url: 'addstudent.php',
    //         method: 'POST',
    //         data: data,
    //         processData: false, // Important for file upload
    //         contentType: false, // Important for file upload
    //         success: function(response) {
    //             alert(response);
    //             $('#tableBody').load(location.href + " #tableBody");
    //         }
    //     });
    // }
            // function register(action) {
            //     $(document).ready(function() {
            //         let data = {
            //             action: action,
            //             fname: $('#firstName').val(),
            //             mname: $('#middleName').val(),
            //             lname: $('#lastName').val(),
            //             sex: $('#sex').val(),
            //             school: $('#school').val(),
            //             course: $('#course'),
            //             bday: $('#bday').val(),
            //             startDate: $('#startDate').val(),
            //             reqhours: $('#hours').val(),
            //             profile: $('#fileUpload')[0].files[0],


            //         }
            //         $.ajax({
            //             url: 'addstudent.php',
            //             method: 'POST',
            //             data: data,
            //             processData: false,
            //             contentType: false,
            //             success: function(response) {
            //                 alert(response);
            //                 $('#tableBody').load(location.href + " #tableBody");
            //             }
            //         });
            //     });
            // }
        </script>



</body>

</html>