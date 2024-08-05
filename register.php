

<!-- PHP Code  -->

<?php

include 'server.php';


if(isset($_POST['Register'])){
    $Fname = $_POST['fname'];
    $Mname = $_POST['mname'];
    $Lname = $_POST['lname'];
    $sex = $_POST['sex'];
    $age = $_POST['age'];
    $course = $_POST['course'];
    $school = $_POST['school'];
    $reqhours = $_POST['rhours'];
    $Sdate = $_POST['s-date'];
    $Edate = $_POST['e-date'];
    


    if(empty($Fname) || empty($Mname) || empty($Lname) || empty($sex) || empty($age) || empty($course) || empty($school) || empty($reqhours) || empty($Sdate) || empty($Edate)){
        echo "<script>window.alert('Fill All The Fields! Please Try Again!');</script>";
    }
    else {
        
        // $rhours = "INSERT INTO hoursreq(hreq) VALUES('$reqhours')";
        // $start = "INSERT INTO datestart(datestart) VALUES('$Sdate')";
        // $end = "INSERT INTO dateend(endate) VALUES('$Edate');";

        
        // $query3 = mysqli_query($conn, $rhours); 
        // $query4 = mysqli_query($conn, $start); 
        // $query5 = mysqli_query($conn, $end);

        // $startsql = "SELECT dateid FROM datestart";
        // $endsql = "SELECT end_id FROM dateend ;";
        // $querystart = mysqli_query($conn, $startsql);
        // $queryend = mysqli_query($conn, $endsql);

        // $s = mysqli_fetch_array($querystart);
        // $Start = $s['dateid'];

        // $e = mysqli_fetch_array($queryend);
        // $End = $e['end_id'];
        
        $student = "INSERT INTO studentinfo(fname, mname, lname, age, sex, courseid, schoolid, hrequired, startdate, end_date) VALUES('$Fname','$Mname','$Lname', '$age', '$sex','$course', '$school', '$reqhours', '$Sdate', '$Edate');";
        $query = mysqli_query($conn, $student); 

        echo "<script>window.alert('Register Successfully!');</script>";
        echo "<script>window.location,assign('dashboard.php')</script>";
    }



}





?>

<!DOCTYPE html>
<html lang="en-US">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Account | EAC Medical Center</title>
    <link rel="stylesheet" href="">
    <link rel="icon" type="png" href="img/logo-icon.png">
    <link rel="stylesheet" href="css/register.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css" />
    
</head>
<body>
    <div class="main-container">
        <h2>REGISTER</h2>
        <form action="" method="POST">
            <div class="input-box">
                <input type="text" name="fname" placeholder="First Name" id="">
            </div>
            <div class="input-box">
                <input type="text" name="mname" placeholder="Middle Name" id="">
            </div>
            <div class="input-box">
                <input type="text" name="lname" placeholder="Last Name" id="">
            </div>
            <div class="sex">
                <select name="sex" id="">
                    <option value=""> -- Choose Sex -- </option>
                    <option value="M"> M </option>
                    <option value="F"> F </option>
                </select>
                <i class="fa-solid fa-angle-down"></i>
            </div>
            <div class="age-div">
                <input type="text" name="age" placeholder="Age" id="">
            </div>
            <div class="course-div">
                <select name="course" id="">
                    <option value=""> -- Choose Course -- </option>
                    <?php
                        $coursetbl = "SELECT * FROM coursetbl";
                        $query = mysqli_query($conn, $coursetbl);
                        
                        while($row = mysqli_fetch_assoc($query)){
                            echo '<option value='.$row['courseid'].'>' .$row['course']. '</option>';
                            
                        }
                        
                        ?>
                </select>
                <i class="fa-solid fa-angle-down"></i>
            </div>
            <div class="school-div">
                <select name="school" id="">
                    <option value=""> -- Choose School -- </option>
                    <?php
                        $school = "SELECT * FROM school";
                        $query = mysqli_query($conn, $school);
                        
                        while($row = mysqli_fetch_assoc($query)){
                            echo '<option value='.$row['id'].'>' .$row['schoolname']. '</option>';
                            
                        }
                    
                    ?>
                </select>
                <i class="fa-solid fa-angle-down"></i>
            </div>
            <div class="req-hours">
                <input type="text" name="rhours" class="hours" placeholder="Required Hours">
            </div>
            <label for="En-date" style="font-weight: bold;">Start Date:</label>
            <div class="s-date">
                <input type="date" name="s-date" id="St-date">
            </div>
            <label for="En-date" style="font-weight: bold;">End Date:</label>
            <div class="e-date">
                <input type="date" name="e-date" id="En-date">
            </div>
            <div class="btn-submit">
                <input type="submit" name="Register" value="Register">
            </div>
        </form>
    </div>
</body>
</html>