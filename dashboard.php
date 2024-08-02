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
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
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
            <li><a href="#"><i class="fas fa-chart-line"></i> <span>Attendance</span></a></li>
            <li><a href="#"><i class="fas fa-file-alt"></i> <span>Reports</span></a></li>
            <li><a href="#"><i class="fas fa-file-alt"></i> <span>Logout</span></a></li>
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
        <input type="text" placeholder="Search...">
    </div>
    <button class="filter-button">Filter Results</button>
</div>

            <table>
                <thead>
                    <tr>
                        <th>Name</th>
                        <th>School/University</th>
                        <th>Course</th>
                        <th>IN</th>
                        <th>OUT</th>
                        <th>Started Date</th>
                        <th>End Date</th>
                        <th>Overall Rendered Hours</th>
                        <th>Overall Remaining Hours</th>
                    </tr>
                </thead>
                <tbody></tbody>
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


