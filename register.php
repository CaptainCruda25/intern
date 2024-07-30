<?php
    include 'server.php';

?>

<!DOCTYPE html>
<html lang="en-US">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Account | EAC Medical Center</title>
    <link rel="stylesheet" href="">
    <link rel="icon" type="png" href="img/logo-icon.png">
    
</head>

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

    if(empty($Fname) || empty($Mname) || empty($Lname) || empty($sex) || empty($age) || empty($course) || empty($reqhours) || empty($Sdate) || empty($Edate)){
        echo "<script>window.alert('Fill All The Fields! Please Try Again!');</script>";
    }
    else {
        $student = "INSERT INTO studentinfo(fname, mname, lname, age, sex, course) VALUES('$Fname','$Mname','$Lname', '$age', '$sex','$course')";
        $schoolName = "INSERT INTO school(schoolname) VALUES('$school')";
        $rhours = "INSERT INTO hoursreq(hreq) VALUES('$reqhours')";
        $start = "INSERT INTO datestart(datestart) VALUES('$Sdate')";
        $end = "INSERT INTO dateend(endate) VALUES('$Edate');";

        $query = mysqli_query($conn, $student); 
        $query3 = mysqli_query($conn, $rhours); 
        $query4 = mysqli_query($conn, $start); 
        $query5 = mysqli_query($conn, $end);

        echo "<script>window.alert('Register Successfully!');</script>";
        echo "<script>window.location,assign('dashboard.php')</script>";
    }



}





?>


<body>
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
                        echo '<option value='.$row['course'].'>' .$row['course']. '</option>';
                
                    }
                
                ?>
            </select>
        </div>
        <div class="school-div">
            <select name="school" id="">
                <option value=""> -- Choose School -- </option>
                <?php
                    $school = "SELECT * FROM school";
                    $query = mysqli_query($conn, $school);
                    
                    while($row = mysqli_fetch_assoc($query)){
                        echo '<option value='.$row['schoolname'].'>' .$row['schoolname']. '</option>';
                        // echo '<option value="BSCpE">' BSCpE '</option>';
                        // echo '<option value="BSIS">' BSIS '</option>';
                        // echo '<option value="BSIT">' BSIT '</option>';
                    }
                
                ?>
            </select>
        </div>
        <div class="req-hours">
            <input type="text" name="rhours" class="hours" placeholder="Required Hours">
        </div>
        <div class="s-date">
            <label for="St-date">Start Date: </label>
            <input type="date" name="s-date" id="St-date">
        </div>
        <div class="e-date">
            <label for="En-date">End Date:</label>
            <input type="date" name="e-date" id="En-date">
        </div>
        <div class="btn-submit">
            <input type="submit" name="Register" value="Register">
        </div>
    </form>
</body>
</html>