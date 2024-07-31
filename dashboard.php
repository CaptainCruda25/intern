<?php

require 'server.php';
session_start();
error_reporting(0);

if($_SESSION['username']){
    
}










?>

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
</head>
<body>
    <div class="container">
        <nav class="sidebar">
            <div class="logo">EACMed</div>
            <ul>
                <li><a href="dashboard.php">Home</a></li>
                <li><a href="students.php">Interns</a></li>
                <li><a href="#">Analytics</a></li>
                <li><a href="#">Reports</a></li>
            </ul>
        </nav>
        <main class="main-content">
            <header>
                <h1>Intern Records</h1>
                <button class="add-entry">+ Add New Entry</button>
            </header>
            <div class="filter">
                <form action="students.php" method="POST">
                    <input type="text" name="search" placeholder="Search...">
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
                        <th>Age</th>
                        <th>Started Date</th>
                        <th>End Date</th>
                        <th>Overall Remaining Hours</th>
                    </tr>
                </thead>
                <tbody>
                    <?php


                        if(isset($_POST['btn'])){
                            $search = $_POST['search'];

                            $find = "SELECT * FROM studentinfo WHERE id LIKE '%$search%' OR fname LIKE '%$search%' OR mname LIKE '%$search%' OR lname LIKE '%$search' OR age LIKE '%$search%' OR sex LIKE '%$search%' OR course LIKE '%$search%';";
                            $searchquery = mysqli_query($conn, $find);
                            $exist = mysqli_num_rows($searchquery);

                            if($exist > 0){
                                while($row = mysqli_fetch_assoc($searchquery)){
                                    $fname  = $row['fname'];
                                    $mname  = ($row['mname']);
                                    $lname  = $row['lname'];
                                    $course = $row['course'];
                                    $sex = $row['sex'];
                                    $age = $row['age'];
                                    
                                    echo "<tr class='highlight'>";
                                    echo "<td>" .$lname. "," .$fname. " " .$mname. "</td>";
                                    echo "<td></td>";
                                    echo "<td>" .$course. "</td>";
                                    echo "<td>" .$sex. "</td>";
                                    echo "<td>" .$age. "</td>";
                                    echo "</tr>";
                                }
                            }
                            else {
                                echo "<td colspan='8' style='text-align:center'> No Data Found ..... </td>";
                            }
                        }
                        else {
                            $sql = "SELECT * FROM studentinfo";
                            $query = mysqli_query($conn, $sql);

                            while($row = mysqli_fetch_assoc($query)){
                                $fname  = $row['fname'];
                                $mname  = ($row['mname']);
                                $lname  = $row['lname'];
                                $course = $row['course'];
                                $sex = $row['sex'];
                                $age = $row['age'];
                                
                                // $school = $row['school']; 
                                echo "<tr class='highlight'>";
                                echo "<td>" .$lname. "," .$fname. " " .$mname. "</td>";
                                echo "<td></td>";
                                echo "<td>" .$course. "</td>";
                                echo "<td>" .$sex. "</td>";
                                echo "<td>" .$age. "</td>";
                                echo "</tr>";
                                // echo "<td>" .. "</td>";
                                // // echo "<td>"  "</td>";
                                // // echo "<td>"  "</td>";
                            }
                        }
                        
                        



                    ?>
                        
                    
                    <!-- Add more rows as needed -->
                </tbody>
            </table>
        </main>
    </div>
</body>
<script>
    
    // Log-out Function

    function logout(){
    let ask = confirm("Do you want to Log-Out?");
    
    if(ask){
        window.location.assign('logout.php');
    }
    else {
        window.location.assign('dashboard.php');
        }
    }
</script>
</html>


