<?php

require 'server.php';
session_start();
error_reporting(0);


if (!empty($_GET['rowid'])) {
    $rowid = $_GET['rowid'];
    $fetch = "SELECT * FROM studentinfo INNER JOIN school ON studentinfo.schoolid = school.id INNER JOIN coursetbl ON coursetbl.courseid = studentinfo.courseid WHERE studid LIKE $rowid;";
    $query = mysqli_query($conn, $fetch);

    while ($row = mysqli_fetch_assoc($query)) {
        $studid = $row['studid'];
        $fname = $row['fname'];
        $mname = $row['mname'];
        $lname = $row['lname'];
        $age = $row['age'];
        $course = $row['course'];
        $school = $row['schoolname'];
        $sex = $row['sex'];
        $hreq = $row['hrequired'];
        $school = $row['schoolname'];
        $start = $row['startdate'];
        $end = $row['end_date'];
        $status = $row['status'];
    }
}





?>

<!DOCTYPE html>
<html lang="en-US">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Intern Records</title>
    <link rel="stylesheet" href="css/internInfo.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <link rel="icon" type="png" href="img/logo-icon.png">
</head>

<body>
    <div class="container">
        <?php include 'component/navbar.php'; ?>
        <div id="addInternModal" class="modal">
            <div class="modal-content">
                <?php

                if (isset($_POST['update'])) {
                    $rowid = $_GET['rowid'];
                    $status = $_POST['status'];
                    $age = $_POST['age'];

                    if (empty($status) || empty($age)) {
                        echo "<script>window.alert('Fill All The Fields!')</script>";
                    } else {
                        $update = "UPDATE studentinfo SET age = '$age', status = '$status' WHERE studid like $rowid;";
                        $query = mysqli_query($conn, $update);
                        echo "<script>window.alert('Update Successfully!')</script>";
                        echo "<script>window.location.assign('internInfo.php?rowid='" . $rowid . "')</script>";
                    }
                }


                ?>
                <span class="close">&times;</span>
                <h2>Update Intern</h2>
                <form id="addInternForm" method="POST" action="" enctype="multipart/form-data"> <!-- Add enctype attribute for file uploads -->
                    <div>
                        <input type="text" id="firstName" readonly value="<?php echo ucfirst($fname); ?>">
                    </div>
                    <div>
                        <input type="text" id="middleName" readonly value="<?php echo $mname; ?>">
                    </div>
                    <div>
                        <input type="text" id="lastName" value="<?php echo $lname; ?>" readonly>
                    </div>
                    <div>
                        <select name="status">
                            <option readonly><?php echo $status; ?></option>
                            <option value="Completed">Completed</option>
                        </select>
                    </div>
                    <div>
                        <input type="text" name="age" value="<?php echo $age; ?>">
                    </div>
                    <div>
                        <input type="text" id="hours" value="<?php echo $hreq; ?>" readonly>
                    </div>
                    <div>
                        <select id="course" name="course" readonly>
                            <option readonly value=""><?php echo $course; ?></option>

                            <!-- Add more options as needed -->
                        </select>
                    </div>
                    <div>
                        <select id="">
                            <option value="<?php echo $Sid; ?>"><?php echo $school; ?></option>

                            <!-- Add more options as needed -->
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="startDate">Start Date</label>
                        <input type="date" id="startDate" value="<?php echo $end; ?>" readonly>
                    </div>
                    <div class="form-group">
                        <label for="endDate">End Date</label>
                        <input type="date" id="endDate" value="<?php echo $start; ?>" readonly>
                    </div>
                    <!-- New file input for picture -->
                    <div class="file-upload-container">
                        <label for="fileUpload" class="file-upload-label">Profile Picture</label>
                        <label for="fileUpload" class="custom-file-upload">
                            <span>Choose File</span>
                        </label>
                        <input type="file" id="fileUpload" name="fileUpload" accept="image/*" style="display: none;" />

                    </div>
                    <div style="flex: 1 1 100%;">
                        <button type="submit" name="update">Update Intern</button>
                    </div>
                </form>
            </div>
        </div>

        <!--   Time In Function  -->



        <?php

        $time = date('h:i A');;
        $presentdate = date("m-d-y");
        $presentday = date('l');
        date_default_timezone_set('Asia/Manila');

        if (isset($_POST['timein'])) {
            $studid = $_GET['rowid'];
            $date = $_POST['date'];
            $day = $_POST['day'];
            $timein = date('h:i A');
            $choice = "No";
            $today = new DateTime();
            $sql = "SELECT * FROM time_record WHERE date = '$presentdate' AND studid LIKE $rowid;";
            $check = mysqli_query($conn, $sql);
            $once = mysqli_num_rows($check);

            foreach ($_POST['choice'] as &$eachkey) {
                if (!empty($eachkey)) {
                    $choice = "Yes";
                }
            }

            
            if($once > 0){
                
                echo "<script>alert(Error! Time In Exist!);</script>";

            }
            else{

                echo "<script>alert(Time In Successfully!)</script>";
                $allow = "INSERT INTO time_record(date, day, time_in, studid, allowOT) VALUES('$date', '$day', '$timein', $studid, '$choice');";
                $query = mysqli_query($conn, $allow);
                    
                
            
            }
            





        }


        if(isset($_POST['timeout'])){

            $timeout = date('h:i A');
            $dates = date("m-d-y");
            $out = "UPDATE time_record SET time_out = '$timeout' WHERE date = '$dates';";
            $outquery = mysqli_query($conn, $out);
            echo "<script>window.alert(Time Out Successfully!)</script>";

            $add = "SELECT time_in, time_out FROM time_record;";
            $addquery = mysqli_query($conn, $add);

            while($row = mysqli_fetch_assoc($addquery)){
                $timeIn = $row['time_in'];
                $timeOut = $row['time_out'];
                $dates = date("m-d-y");

                $adding = $timeIn->diff($timeOut);
                $insert = "UPDATE time_record SET hours_render = '$adding' WHERE date = '$dates';";
                $query = mysqli_query($conn, $insert);




            }
        } 


        ?>



        <div id="timeInModal" class="modal">
            <div class="modal-content">
                <span class="close1">&times;</span>
                <h2>Time In </h2>
                <form id="addInternForm" method="POST" action="" enctype="multipart/form-data"> <!-- Add enctype attribute for file uploads -->
                    <div>
                        <label for="date">Date</la>
                            <input type="text" id="day" name="date" readonly value="<?php echo $presentdate; ?>">
                    </div>
                    <div>
                        <label for="day">Day</la>
                            <input type="text" id="day" name="day" readonly value="<?php echo $presentday; ?>">
                    </div>
                    <div class="form-group">
                        <label for="startDate">Allow OT</label>
                        <input type="checkbox" id="startDate" name="choice[]" value="<?php echo $end; ?>" readonly>
                    </div>
                    <div style="flex: 1 1 100%;">
                        <button type="submit" name="timein">Time In</button>
                    </div>
                </form>
            </div>
        </div>

        <div class="main-content">
            <div class="intern-info">
                <div class="profile">
                    <img src="img/profile.png" alt="Profile Picture">
                    <h2><?php echo ucfirst($fname); ?></h2>
                    <p><?php echo $school; ?></p>
                </div>
                <div class="details">
                    <div class="detail">Name: <?php echo ucfirst($fname), " ", ucfirst($mname[0]), ". ", ucfirst($lname); ?></div>
                    <div class="detail">Age: <?php echo $age; ?></div>
                    <div class="detail">Course: <?php echo $course; ?></div>
                    <div class="detail">University: <?php echo $school; ?></div>
                    <div class="detail">Sex: <?php echo $sex; ?></div>
                    <div class="detail">Start Date: <?php echo $start; ?></div>
                    <div class="detail">End Date: <?php echo $end; ?></div>
                    <div class="detail">Hours Required: <?php echo $hreq . " " . "hours"; ?></div>
                    <div class="detail">Remaining Hours: <?php echo $hreq; ?></div>
                    <div class="button-detail">
                        <button class="btn-time" id="openModal">UPDATE</button>
                        <button class="btn-time2" onclick="removestud('<?php echo $studid; ?>')">DELETE</button>
                    </div>
                </div>
                <div class="logo">
                    <img src="img/EACMedOnly.png" alt="EACMed Logo">
                </div>
            </div>
            <div class="attendance-record">
                <div class="table-container">
                    <table>
                        <thead>
                            <tr>
                                <th>Date</th>
                                <th>Day</th>
                                <th>Time in</th>
                                <th>Time Out</th>
                                <th>Rendered Time</th>
                                <th>Remaining Time</th>
                                <th>Allow OT</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php

                            $rowid = $_GET['rowid'];
                            $fetch = "SELECT * FROM studentinfo INNER JOIN school ON studentinfo.schoolid = school.id INNER JOIN coursetbl ON coursetbl.courseid = studentinfo.courseid
                                INNER JOIN time_record ON time_record.studid = studentinfo.studid WHERE studentinfo.studid = $rowid ORDER BY timeid DESC;";
                            $query = mysqli_query($conn, $fetch);
                            ?>

                            <?php
                            while ($row = mysqli_fetch_assoc($query)) {
                                $studid = $row['studid'];
                                $fname = $row['fname'];
                                $mname = $row['mname'];
                                $lname = $row['lname'];
                                $age = $row['age'];
                                $course = $row['course'];
                                $school = $row['schoolname'];
                                $sex = $row['sex'];
                                $hreq = $row['hrequired'];
                                $school = $row['schoolname'];
                                $start = $row['startdate'];
                                $end = $row['end_date'];
                                $status = $row['status'];
                                $date = $row['date'];
                                $day = $row['day'];
                                $timein = $row['time_in'];
                                $time_out = $row['time_out'];
                                $ot = $row['allowOT'];
                            ?>
                                <tr>
                                    <td><?php echo $date; ?></td>
                                    <td><?php echo $day; ?></td>
                                    <td><?php echo $timein; ?></td>
                                    <td><?php echo $time_out; ?></td>
                                    <td></td>
                                    <td></td>
                                    <td><?php echo $ot; ?></td>
                                </tr>
                            <?php

                            }



                            ?>



                        </tbody>
                    </table>
                </div>
                <div class="attendance-buttons">
                    <button class="btn-time" id="btnModal">Time In</button>
                    <form action="" method="POST">
                        <button class="btn-time2" type="submit" name="timeout">Time Out</button>
                    </form>
                </div>
            </div>
        </div>


    </div>

    </div>
</body>
<script>
    var popup = document.getElementById("timeInModal");
    var btn1 = document.getElementById("btnModal");
    var span1 = document.getElementsByClassName("close1")[0];

    btn1.onclick = function() {
        popup.style.display = "block";
    }

    span1.onclick = function() {
        popup.style.display = "none";
    }

    window.onclick = function(event) {
        if (event.target == modal) {
            popup.style.display = "none";
        }
    }

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


    // Log Out

    function removestud(studid) {
        let delrecord = confirm('Are you want to delete this student record? ');

        if (delrecord) {
            window.location.assign('delete.php?rowid=' + studid);
        }
    }
</script>

</html>