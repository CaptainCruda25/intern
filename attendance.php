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
        <nav class="sidebar">
            <ul>
                <div class="logo">
                    <img src="img/logo-icon.png" alt="EACMed Logo">
                </div>
                <li><a href="dashboard.php"><i class="fas fa-home"></i> <span>Home</span></a></li>
                <li><a href="students.php"><i class="fas fa-users"></i> <span>Interns</span></a></li>
                <li><a href="attendance.php"><i class="fas fa-chart-line"></i> <span>Analytics</span></a></li>
            </ul>
            <div class="logout-container">
                <button class="Btn" onclick="logout()">
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
                <h1>Intern Analytics</h1>
            </header>
            <div class="analytics-cards">
                <div class="card green">
                    <h2>Students</h2>
                    <div class="card-content">
                        <i class="fas fa-users"></i>
                        <?php 
                        $sql = "SELECT * FROM studentinfo; ";
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
                            <div class="progress">76%</div>
                        </div>
                    </div>
                </div>
                <div class="card blue">
                    <h2>Ongoing</h2>
                    <div class="card-content">
                        <div class="progress-circle">
                            <div class="progress">24%</div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="chart-container">
                <canvas id="myChart"></canvas>
            </div>
        </main>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script>
        var ctx = document.getElementById('myChart').getContext('2d');
        var myChart = new Chart(ctx, {
            type: 'line',
            data: {
                labels: ['0', '1', '2', '3', '4', '5', '6', '7', '8', '9'],
                datasets: [{
                    label: 'Dataset 1',
                    data: [250, 150, 300, 500, 400, 600, 350, 550, 200, 450],
                    borderColor: 'blue',
                    fill: false
                }, {
                    label: 'Dataset 2',
                    data: [150, 200, 250, 400, 300, 500, 450, 400, 350, 600],
                    borderColor: 'green',
                    fill: false
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
