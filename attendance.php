<?php

 require 'server.php';


?>

<!DOCTYPE html>
<html lang="en-US">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Intern Records</title>
    <link rel="stylesheet" href="css/attendance.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <link rel="icon" type="png" href="img/logo-icon.png">
</head>
<body>
    <div class="container">
        <?php include 'component/navbar.php';?> 
        <main class="main-content">
            <header>
                <h1>Intern Analytics</h1>
            </header>
            <div class="analytics-cards">
                <div class="card green">
                    <h2>Students</h2>
                    <div class="card-content">
                        <i class="fas fa-users"></i>
                        <?php 
                        $sql = "SELECT * FROM studentinfo WHERE view = 'Yes'; ";
                        $query = mysqli_query($conn, $sql);
                        $rows = mysqli_num_rows($query);

                        ?>
                        <p><?php echo $rows; ?></p>
                    </div>
                </div>
                <div class="card red">
                    <h2>Complete</h2>
                    <div class="card-content">
                        <div class="progress-circle">
                        <?php
                            // $sql = "SELECT * FROM studentinfo; ";
                            // $query = mysqli_query($conn, $sql);
                            $rows = mysqli_num_rows($query);
                            $complete = "SELECT * FROM studentinfo WHERE status = 'Completed' AND view LIKE 'Yes'; ";
                            $query3 = mysqli_query($conn, $complete);
                            $Completed = mysqli_num_rows($query3);
                            $percent = $Completed / $rows * 100;
                        ?>
                        <div class="progress"><?php echo round($percent) . "%"; ?></div>
                        </div>
                    </div>
                </div>
                <div class="card blue">
                    <h2>Ongoing</h2>
                    <div class="card-content">
                        <div class="progress-circle">
                        <?php
                            // $sql = "SELECT * FROM studentinfo; ";
                            // $query = mysqli_query($conn, $sql);
                            $rows = mysqli_num_rows($query);
                            $ongoing = "SELECT * FROM studentinfo WHERE status = 'On-Going' AND view LIKE 'Yes';";
                            $query2 = mysqli_query($conn, $ongoing);
                            $onGoing = mysqli_num_rows($query2);
                            $percent = $onGoing / $rows * 100;
                        ?>
                        <div class="progress"><?php echo round($percent) . "%"; ?></div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="chart-container">
                <canvas id="myChart"></canvas>
            </div>
        </main>
    </div>
    <?php

        $line1 = "SELECT status, COUNT(*) as count FROM studentinfo WHERE status IN ('On-Going', 'Completed') GROUP BY status;";
        $query1= mysqli_query($conn, $line1);

        $ongoingdata = 0;
        $completedData = 0;

        while($row = mysqli_fetch_assoc($query1)){
            if($row['status'] == 'On-Going'){
                $ongoingdata = $row['count'];
            }
            elseif($row['status'] == 'Completed'){
                $completedData = $row['count'];
            }
            

        }


    ?>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script>
        const OnGoing = <?php echo json_encode($ongoingdata); ?>;
        const  Completed = <?php echo json_encode($completedData); ?>
        var ctx = document.getElementById('myChart').getContext('2d');
        var myChart = new Chart(ctx, {
            type: 'bar',
            data: {
                labels: [OnGoing, Completed],
                datasets: [{
                    label: 'Status',
                    data: [OnGoing, CompletedData],
                    backgroundColor: ['blue', 'red'],
                    borderColor: ['blue', 'red'],
                    borderWidth: 1
                }]
            },
            options: {
                responsive: true,
                maintainAspectRatio: false,
                scales: {
                    y: {
                        beginAtZero: true
                    }
                }
            }
        });
        
    </script>
    <script>
        function logout(){
            let ask = confirm('Are you want to log-out?');

            if(ask){
                window.location.assign('logout.php');
            }
        }
    </script>
</body>
</html>
