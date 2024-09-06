<?php

require 'server.php';
session_start();
//error_reporting(0);


// if (!empty($_GET['rowid'])) {
//     $rowid = $_GET['rowid'];
//     $fetch = "SELECT * FROM studentinfo INNER JOIN school ON studentinfo.schoolid = school.id INNER JOIN coursetbl ON coursetbl.courseid = studentinfo.courseid WHERE studid LIKE $rowid;";
//     $query = mysqli_query($conn, $fetch);

//     while ($row = mysqli_fetch_assoc($query)) {
//         $studid = $row['studid'];
//         $fname = $row['fname'];
//         $mname = $row['mname'];
//         $lname = $row['lname'];
//         $age = $row['age'];
//         $course = $row['course'];
//         $school = $row['schoolname'];
//         $sex = $row['sex'];
//         $hreq = $row['hrequired'];
//         $school = $row['schoolname'];
//         $start = $row['startdate'];
//         $end = $row['end_date'];
//         $status = $row['status'];
//         $profile = $row['image'];
//         $convertedstart = date("M d, Y", $start);
//         $convertedend = date('M d, Y', $end);
//     }
// }


if (!empty($_GET['timerecord'])) {
    $timeid = $_GET['timerecord'];
    $trfetch = "SELECT * FROM time_record WHERE timeid LIKE $timeid;";
    $trquery = mysqli_query($conn, $trfetch);

    while ($row = mysqli_fetch_assoc($trquery)) {
        $trid = $row['timeid'];
        $trdate = $row['date'];
        $trday = $row['day'];
        $tr_in = $row['time_in'];
        $tr_out = $row['time_out'];
        $tr_render = $row['hours_render'];
        $trHours = $row['remHours'];
        $trOT = $row['allowOT'];
        // $hreq = $row['hrequired'];
        // $school = $row['schoolname'];
        // $start = $row['startdate'];
        // $end = $row['end_date'];
        // $status = $row['status'];
        // $profile = $row['image'];
        // $convertedstart = date("M d, Y", $start);
        // $convertedend = date('M d, Y', $end);
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
                    $img_name = $_FILES['image']['name'];
                    $tmp_name = $_FILES['image']['tmp_name'];
                    $folder = 'uploads/' . $img_name;
                    $img_size = $_FILES['image']['size'];

                    if (empty($status) || empty($age)) {
                        echo "<script>window.alert('Fill All The Fields!')</script>";
                    }
                    else {
                        $update = "UPDATE studentinfo SET status = '$status', image = '$img_name' WHERE studid like $rowid;";
                        $query = mysqli_query($conn, $update);

                        // Validate file Extension
                        $allowed_extension = array('jpeg', 'jpg', 'png', 'gif');
                        $extension = pathinfo($img_name, PATHINFO_EXTENSION);

                        if (!in_array(strtolower($extension), $allowed_extension)) {
                            echo "<script>window.alert('Invalid File Type!')</script>";
                        } elseif (!file_exists($tmp_name)) {
                            echo "<script>window.alert('File Exists!')</script>";
                        } elseif ($imgs_size > 5000000) {
                            echo "<script>window.alert('File Exceed the limit!')</script>";
                        } elseif ($query && move_uploaded_file($tmp_name, $folder)) {
                            echo "<script>window.alert('Update Successfully!')</script>";
                            echo "<script>window.location.assign('internInfo.php?rowid='" . $rowid . "')</script>";
                        }

                        // if($query && move_uploaded_file($tmp_name, $folder)){

                        // }

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
                            <option value="On-Going">On-Going</option>
                            <option value="Completed">Completed</option>
                        </select>
                    </div>
                    <div>
                        <input type="text" name="age" readonly value="<?php echo $age; ?>">
                    </div>
                    <div>
                        <input type="text" id="hours" value="<?php echo $hreq / 3600; ?>" readonly>
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
                        <input type="text" id="startDate" value="<?php echo $convertedend; ?>" readonly>
                    </div>
                    <div class="form-group">
                        <label for="endDate">End Date</label>
                        <input type="text" id="endDate" value="<?php echo $convertedstart; ?>" readonly>
                    </div>
                    <!-- New file input for picture -->
                    <div class="file-upload-container">
                        <label for="fileUpload" class="file-upload-label">Profile Picture</label>
                        <label for="fileUpload" class="custom-file-upload">
                            <span>Choose File</span>
                        </label>
                        <input type="file" id="fileUpload" name="image" accept=".jpg, .jpeg, .png, .gif" style="display: none;" />

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
            $timein = time(); // Get the current Unix timestamp
            $choice = "No";
            $today = new DateTime();
            $sql = "SELECT time_in FROM time_record WHERE date = '$presentdate' AND studid = $studid;";
            $check = mysqli_query($conn, $sql);
            $once = mysqli_num_rows($check);

            foreach ($_POST['choice'] as &$eachkey) {
                if (!empty($eachkey)) {
                    $choice = "Yes";
                }
            }

            $saturday = date('w');
            $sunday = date('w');
            if ($once > 0) {
                echo "<script>alert('Error! Time In Exist!');</script>";
            } else {
                if ($choice == "No" && $saturday == 6) {
                    echo "<script>window.alert('Overtime is not allowed on Saturdays!')</script>";
                } elseif ($choice == 'Yes' && $saturday == 6) {
                    $allow = "INSERT INTO time_record(date, day, time_in, studid, allowOT) VALUES('$date', '$day', $timein, $studid, '$choice');";
                    $query = mysqli_query($conn, $allow);
                    echo "<script>alert('Time In Successfully!')</script>";
                } elseif ($sunday == 0) { // Sunday
                    echo "<script>window.alert('Overtime is not allowed on Sundays!')</script>";
                } else {
                    $allow = "INSERT INTO time_record(date, day, time_in, studid, allowOT) VALUES('$date', '$day', $timein, $studid, '$choice');";
                    $query = mysqli_query($conn, $allow);
                    echo "<script>alert('Time In Successfully!')</script>";
                }
            }

            
        }



       

        if (isset($_POST['timeout'])) {
            $timeout = time(); // Get the current Unix timestamp for time-out
            $presentdate = date("m-d-y");
            $studid = $_GET['rowid']; // Ensure you have the correct student ID


            // Check if time_in exists for the current date and student
            $searchOut = "SELECT time_in, time_out FROM time_record WHERE date = '$presentdate' AND studid = $studid;";
            $searchOutquery = mysqli_query($conn, $searchOut);
            $Outexists = mysqli_num_rows($searchOutquery);
            $T_Out = "SELECT time_out FROM time_record WHERE time_out = 0 AND date = '$presentdate' AND studid = $studid;";
            $T_Outquery = mysqli_query($conn, $T_Out);
            $timeOutrows = mysqli_num_rows($T_Outquery);
            


            if ($Outexists < 1) {
                echo "<script>window.alert('No Time-In Record Found for Today!')</script>";
            } 
            elseif($timeOutrows == 0){
                echo "<script>window.alert('Time Out Exist!')</script>";
            }
            else {
                // Update time_out for the current day and student
                $updateOut = "UPDATE time_record SET time_out = $timeout WHERE date = '$presentdate' AND studid = $studid;";
                mysqli_query($conn, $updateOut);

                // Fetch the time record to calculate hours_render
                $fetchRecord = "SELECT time_in, time_out FROM time_record WHERE date = '$presentdate' AND studid = $studid;";
                $fetchQuery = mysqli_query($conn, $fetchRecord);
                $record = mysqli_fetch_assoc($fetchQuery);

                $timeIn = $record['time_in'];
                $timeOut = $record['time_out'];

                if ($timeIn && $timeOut) {
                    $hoursRender = ($timeOut - $timeIn) - 3600; // Difference in seconds
                    $hours = intdiv($hoursRender, 3600);
                    $minutes = intdiv(($hoursRender % 3600), 60);
                    $convertedRendered = "{$hours}h {$minutes}m";

                    // Update hours_render in the database
                    $updateRender = "UPDATE time_record SET hours_render = $hoursRender WHERE date = '$presentdate' AND studid = $studid;";
                    mysqli_query($conn, $updateRender);

                    // Fetch required hours from studentinfo table
                    $fetchStudentInfo = "SELECT hoursrem FROM studentinfo WHERE studid = $studid;";
                    $studentInfoQuery = mysqli_query($conn, $fetchStudentInfo);
                    $studentInfo = mysqli_fetch_assoc($studentInfoQuery);
                    $hoursrequired = $studentInfo['hoursrem'];



                    // Calculate and update remaining hours in studentinfo table
                    $remHours = $hoursrequired - $hoursRender;

                    // Update remaining hours in the database
                    $updateRemainingHours = "UPDATE time_record SET remHours = $remHours WHERE date = '$presentdate' AND studid = $studid;";
                    mysqli_query($conn, $updateRemainingHours);

                    $updateRemainingHours2 = "UPDATE studentinfo SET hoursrem = $remHours WHERE studid = $studid;";
                    mysqli_query($conn, $updateRemainingHours2);

                    echo "<script>window.alert('Time Out Successfully!')</script>";
                }
            }
        }




        ?>



        <div id="timeInModal" class="modal">
            <div class="modal-content">
                <span class="closes">&times;</span>
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

        <?php

        

        if (isset($_POST['updatetimein'])) {
            $updatedate = $_POST['editdate'];
            $updateday = $_POST['day'];
            $updatetimeIn = $_POST['edittimein'];
            $convert2unix = strtotime($updatetimeIn);


            if (empty($updatedate) || empty($updateday) || empty($updatetimeIn)) {
                echo "<script>window.alert('Fill All The Fields')</script>;";
            } else {
                $updatequery = "UPDATE time_record SET date = '$updatedate', day = '$updateday', time_in = $convert2unix WHERE date = '$presentdate' AND day = '$presentday'  AND studid = $rowid;";
                $upquery = mysqli_query($conn, $updatequery);
                echo "<script>window.alert('Update Successfully!')</script>;";
            }
        }




        
        ?>
        <div id="EdittimeInModal" class="modal">
            <div class="modal-content">
                <span class="close1">&times;</span>
                <h2>Edit Record </h2>
                <form id="timeInModal" method="POST" action="" enctype="multipart/form-data"> <!-- Add enctype attribute for file uploads -->
                    <div>
                        <label for="date">Date</label>
                        <input type="date" id="date" name="editdate" value="<?php echo $format; ?>">
                    </div>
                    <div>
                        <label for="day">Day</label>
                        <select name="day">
                            <option readonly><?php echo $editday; ?></option>
                            <option value="Monday">Monday</option>
                            <option value="Tuesday">Tuesday</option>
                            <option value="Wednesday">Wednesday</option>
                            <option value="Thursday">Thursday</option>
                            <option value="Friday">Friday</option>
                        </select>
                    </div>
                    <div>
                        <label for="day">Time In</la>
                            <input type="time" id="timein" name="edittimein" value="<?php echo $TIMEin; ?>">
                    </div>
                    <div>
                        <label for="day">Time Out</la>
                            <input type="time" id="timein" name="edittimein" value="<?php echo $TIMEout; ?>">
                    </div>
                    <div style="flex: 1 1 100%;">
                        <button type="submit" name="updatetimein">Time In</button>
                    </div>
                </form>
            </div>
        </div>


        <div class="main-content">
            <div class="intern-info">
                <div class="profile">
                    <img src="uploads/<?php echo $profile; ?>" alt="Profile Picture">
                    <h2><?php echo ucfirst($fname); ?></h2>
                    <p><?php echo $school; ?></p>
                </div>
                <div class="details">
                    <div class="detail">Name: <?php echo ucfirst($fname), " ", ucfirst($mname[0]), ". ", ucfirst($lname); ?></div>
                    <div class="detail">Age: <?php echo $age; ?></div>
                    <div class="detail">Course: <?php echo $course; ?></div>
                    <div class="detail">University: <?php echo $school; ?></div>
                    <div class="detail">Sex: <?php echo $sex; ?></div>
                    <div class="detail">Start Date: <?php echo $convertedstart; ?></div>
                    <div class="detail">End Date: <?php echo $convertedend; ?></div>
                    <div class="detail">Hours Required: <?php echo $hreq / 3600 . " " . "hours"; ?></div>
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
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php

                            $timeid = $_GET['timerecord'];
                            $trfetch = "SELECT * FROM time_record WHERE timeid = $trid;";
                            $trquery = mysqli_query($conn, $trfetch);
                            ?>




                            <?php
                            while ($row = mysqli_fetch_assoc($trquery)) {
                                $trid = $row['timeid'];
                                $trdate = $row['date'];
                                $trday = $row['day'];
                                $tr_in = $row['time_in'];
                                $tr_out = $row['time_out'];
                                $tr_render = $row['hours_render'];
                                $trHours = $row['remHours'];
                                $trOT = $row['allowOT'];
                                $timein = $row['time_in'];
                                $time_out = $row['time_out'];
                                $ot = $row['allowOT'];
                                $renderTime = $row['hours_render'];
                                date_default_timezone_set('Asia/Manila');
                                $convertedIN = date("g:i A", $timein);
                                $convertedOUT = date("g:i A", $time_out);




                                if ($renderTime > 0) {
                                    $hours = intdiv($renderTime, 3600);
                                    $minutes = intdiv(($renderTime % 3600), 60);
                                    $seconds = $renderTime % 60;

                                    // Round up minutes if seconds are not zero
                                    if ($seconds > 0) {
                                        $minutes += 1;
                                    }

                                    // Adjust hours if minutes exceed 60 after rounding
                                    if ($minutes >= 60) {
                                        $hours += intdiv($minutes, 60);
                                        $minutes = $minutes % 60;
                                    }

                                    // Build the rendered time string
                                    $convertedrendered = ($hours > 0 ? "{$hours} hr/s " : "") .
                                        ($minutes > 0 ? "{$minutes} min/s" : "0 min/s");
                                } else {
                                    $convertedrendered = "0 min/s";
                                }

                                // Remaining Time Computation
                                $totalRequiredSeconds = $trHours * 3600; // Total required seconds
                                $remainingSeconds = $totalRequiredSeconds - $renderTime;

                                // Debugging output
                                // echo "Total Required Seconds: $totalRequiredSeconds<br>";
                                // echo "Rendered Time (seconds): $renderTime<br>";
                                // echo "Remaining Seconds: $remainingSeconds<br>";

                                // Convert remaining seconds to hours and minutes
                                if ($remainingSeconds > 0) {
                                    $remainingHours = intdiv($remainingSeconds, 3600);
                                    $remainingMinutes = intdiv(($remainingSeconds % 3600), 60);

                                    // Build the remaining time string
                                    $rHrs = intdiv($remainingHours, 3600);
                                    $remHours = ($remainingHours > 0 ? "{$rHrs} hr/s " : "") .
                                        ($remainingMinutes > 0 ? "{$remainingMinutes} min/s" : "0 min/s");
                                } else {
                                    $remHours = "0 min/s";
                                }
                                
                            ?>
                                <tr>
                                    <td><?php echo $trdate; ?></td>
                                    <td><?php echo $trday; ?></td>
                                    <td><?php echo $convertedIN; ?></td>
                                    
                                    <td><button id="Edit"><i class="fas fa-edit"></i></button></td>
                                </tr>
                            <?php

                            }



                            ?>



                        </tbody>
                    </table>
                </div>
                <div>
                    <?php

                    $total = "SELECT SUM(hours_render) as total FROM time_record;";
                    $totalquery = mysqli_query($conn, $total);
                    $totalResult = mysqli_fetch_assoc($totalquery);

                    $totalhours = $totalResult['total'];


                    $requiredHours = "SELECT hrequired FROM studentinfo;";
                    $requiredquery = mysqli_query($conn, $requiredHours);
                    $fetchhours = mysqli_fetch_assoc($requiredquery);

                    $hoursdb = $fetchhours['hrequired'] / 3600;
                    $hoursREM = $fetchhours['hrequired'];

                    $subtract = $hoursREM - $totalhours;

                    $empty = "";


                    $hours = intdiv($subtract, 3600);
                    $minutes = intdiv(($subtract % 3600), 60);
                    $seconds = $subtract % 60;

                    $hREM = $hours . " Hour/s " . $minutes . "minute/s";

                    $hoursREMS = 0;


                    if ($hoursREM == $hoursREMS) {
                        $updateRemHours = "UPDATE studentinfo SET status = 'Completed';";
                        $updateRemHoursquery = mysqli_query($conn, $updateRemHours);
                    }




                    $updateRemHours = "UPDATE studentinfo SET hoursrem = $subtract;";
                    $updateRemHoursquery = mysqli_query($conn, $updateRemHours);
                    $updateRemHours2 = "UPDATE time_record SET remHours = $subtract WHERE date = '$presentdate';";
                    $updateRemHoursquery2 = mysqli_query($conn, $updateRemHours2);





                    ?>
                    <h1>Total Hours Remaining: <?php echo $hREM; ?></h1>
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
    var span1 = document.getElementsByClassName("close")[0];

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

    // // edit time in Modal



    var editModal = document.getElementById("EdittimeInModal");
    var editBtn = document.getElementById("Edit");
    var editClose = document.getElementsByClassName("close1")[0];

    editBtn.onclick = function() {
        editModal.style.display = "block";
    }

    editClose.onclick = function() {
        editModal.style.display = "none";
    }

    window.onclick = function(event) {
        if (event.target == modal) {
            editModal.style.display = "none";
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