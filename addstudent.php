<?php

require 'server.php';

// if(isset($_POST['action'])){
//     if($_POST['action'] == 'insert'){
//         insert();

//     }
// }




// function insert(){
//     global $conn;
//     global $age;

//     $fname = $_POST['fname'];
//     $mname = $_POST['mname'];
//     $lname = $_POST['lname'];
//     $sex = $_POST['sex'];
//     $bday = $_POST['bday'];
//     $internage = $_POST['age'];
//     $course = $_POST['course'];
//     $school = $_POST['school'];
//     $reqhours = $_POST['hours'];
//     $Sdate = $_POST['startDate'];
//     // $Edate = $_POST['endDate'];
//     $intern_image = $_FILES['profile']['name'];
//     $intern_temp_name = $_FILES['profile']['tmp_name'];
//     $img_folder = 'uploads/'.$intern_image;
//     date_default_timezone_set('Asia/Manila');


//     if (empty($fname) || empty($mname) || empty($lname) || empty($sex) || empty($bday) || empty($course) || empty($school) || empty($reqhours) || empty($Sdate)) {
//         echo "Fill All The Fields! Please Try Again";
//         // echo "<script>window.location.assign('students.php');</script>";
//     } else {

//         // $timestamp = strtotime($Sdate);
//         // $unix_reqhours = $reqhours * 3600;
//         // $End = $timestamp + $unix_reqhours ;

//         $timestamp = strtotime($Sdate); // Convert start date to Unix timestamp
//         $unix_reqhours = $reqhours * 3600; // Convert required hours to seconds

//         // Calculate the number of workdays required (8 hours per workday)
//         $workdays_required = ceil($reqhours / 8);

//         // Calculate the number of full weeks and remaining days
//         $full_weeks = floor($workdays_required / 5);
//         $remaining_days = $workdays_required % 5;

//         // Calculate the end date
//         $end_date = strtotime("+$full_weeks weeks", $timestamp);
//         $end_date = strtotime("+$remaining_days weekdays", $end_date);
        
//         // Validating File Extension

//         $file_extension = array('jpeg', 'jpg', 'png', 'gif');
//         $allowed_extension = pathinfo($intern_image, PATHINFO_EXTENSION);


//         if(!file_exists($intern_temp_name)){
//             echo "Image Exists! Please Try Again";
//             // echo "<script>window.location.assign('students.php');</script>";
//         }
//         elseif(!in_array(strtolower($allowed_extension), $file_extension)){
//             echo "Error! File Not Supported";
//             // echo "<script>window.location.assign('students.php');</script>";
//         }
//         else{
//             $student = "INSERT INTO studentinfo(fname, mname, lname, bday, age, sex, courseid, schoolid, hrequired, hoursrem, startdate, end_date, image) VALUES('$fname','$mname','$lname',
//             '$bday', '$age', '$sex','$course', '$school', $unix_reqhours, $reqhours * 3600, $timestamp, $end_date, '$intern_image');";
//             $query = mysqli_query($conn, $student);

//             if($query && move_uploaded_file($intern_temp_name, $img_folder)){
//                 echo "Register Successfully";
//                 // echo "<script>window.location.assign('students.php')</script>";
//             }
//             else{
//                 echo "Register Failed";
//                 // echo "<script>window.location.assign('students.php')</script>";
//             }
//         }
// }
// function getAge($bday){
//         $date = new DateTime();
//         $date2 = new DateTime($bday);
//         $result = $date->diff($date2);
//         return $result->y;
// }
// $age = getAge($bday);





if (isset($_POST['add'])) {
    $Fname = $_POST['firstName'];
    $Mname = $_POST['middleName'];
    $Lname = $_POST['lastName'];
    $sex = $_POST['sex'];
    $bday = $_POST['bday'];
    $internage = $_POST['age'];
    $courses = $_POST['course'];
    $school = $_POST['school'];
    $reqhours = $_POST['hours'];
    $Sdate = $_POST['startDate'];
    // $Edate = $_POST['endDate'];
    $intern_image = $_FILES['image']['name'];
    $intern_temp_name = $_FILES['image']['tmp_name'];
    $img_folder = 'uploads/'.$intern_image;
    date_default_timezone_set('Asia/Manila');

    function getAge($bday)
    {
        $date = new DateTime();
        $date2 = new DateTime($bday);
        $result = $date->diff($date2);
        return $result->y;
    }
    $age = getAge($bday);

    if (empty($Fname) || empty($Mname) || empty($Lname) || empty($sex) || empty($bday) || empty($courses) || empty($school) || empty($reqhours) || empty($Sdate)) {
        echo "<script>window.alert('Fill All The Fields! Please Try Again!');</script>";
        echo "<script>window.location.assign('interns.php');</script>";
    } else {

        // $timestamp = strtotime($Sdate);
        // $unix_reqhours = $reqhours * 3600;
        // $End = $timestamp + $unix_reqhours ;

        $timestamp = strtotime($Sdate); // Convert start date to Unix timestamp
        $unix_reqhours = $reqhours * 3600; // Convert required hours to seconds

        // Calculate the number of workdays required (8 hours per workday)
        $workdays_required = ceil($reqhours / 8);

        // Calculate the number of full weeks and remaining days
        $full_weeks = floor($workdays_required / 5);
        $remaining_days = $workdays_required % 5;

        // Calculate the end date
        $end_date = strtotime("+$full_weeks weeks", $timestamp);
        $end_date = strtotime("+$remaining_days weekdays", $end_date);
        
        // Validating File Extension

        $file_extension = array('jpeg', 'jpg', 'png', 'gif');
        $allowed_extension = pathinfo($intern_image, PATHINFO_EXTENSION);


        if(!file_exists($intern_temp_name)){
            echo "<script>window.alert('Image Exists! Please Try Again!');</script>";
            echo "<script>window.location.assign('interns.php');</script>";
        }
        elseif(!in_array(strtolower($allowed_extension), $file_extension)){
            echo "<script>window.alert('Error! File Not Supported!');</script>";
            echo "<script>window.location.assign('interns.php');</script>";
        }
        else{
            $student = "INSERT INTO studentinfo(fname, mname, lname, bday, age, sex, courseid, schoolid, hrequired, hoursrem, startdate, end_date, image) VALUES('$Fname','$Mname','$Lname',
            '$bday', '$age', '$sex','$courses', '$school', $unix_reqhours, $reqhours * 3600, $timestamp, $end_date, '$intern_image');";
            $query = mysqli_query($conn, $student);

            if($query && move_uploaded_file($intern_temp_name, $img_folder)){
                echo "<script>window.alert('Register Successfully!');</script>";
                echo "<script>window.location.assign('interns.php')</script>";
            }
            else{
                echo "<script>window.alert('Register Failed!');</script>";
                echo "<script>window.location.assign('interns.php')</script>";
            }
        }
        
        
    }

    // if($query){
    //     move_uploaded_file($intern_temp_name, $img_folder);

    // }
    // else {
    //     echo "<script>window.alert('Error Occured!')</script>";
    // }

    // if($query){

    //     $res = [
    //         'status' => 200,
    //         'message' => 'Register Successfully'
    //     ];
    //     echo json_encode($res);
    //     return true;

    // }
    // else {

    //     $res = [
    //         'status' => 500,
    //         'message' => 'Intern Not Created'
    //     ];
    //     echo json_encode($res);
    //     return false;

    // }




}
