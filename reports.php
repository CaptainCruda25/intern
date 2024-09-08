<?php
// server.php - Your database connection details should be included here
include 'server.php';

// Ensure an image ID is provided
if (isset($_GET['action'])) {
    $action = $_GET['action'];

    if ($action == 'fetch_schools') {
        // Fetching schools
        header('Content-Type: application/json');

        $sql = "SELECT id, schoolname FROM school";
        $result = mysqli_query($conn, $sql);

        $schools = array();
        while ($row = mysqli_fetch_assoc($result)) {
            $schools[] = $row;
        }

        echo json_encode($schools);
        exit;
    } elseif ($action == 'fetch_students' && isset($_GET['school_id'])) {
        // Fetching students by school ID
        header('Content-Type: application/json');
        $schoolId = $_GET['school_id'];

        $sql = "SELECT studid, fname, mname, lname, image FROM studentinfo WHERE schoolid = ?";
        $stmt = mysqli_prepare($conn, $sql);
        mysqli_stmt_bind_param($stmt, 'i', $schoolId);
        mysqli_stmt_execute($stmt);

        $result = mysqli_stmt_get_result($stmt);
        $students = array();
        while ($row = mysqli_fetch_assoc($result)) {
            $students[] = $row;
        }

        echo json_encode($students);
        mysqli_stmt_close($stmt);
        exit;
    } elseif ($action == 'get_image' && isset($_GET['id'])) {
        // Serve student image
        $id = $_GET['id'];
        $sql = "SELECT image FROM studentinfo WHERE studid = ?";
        $stmt = mysqli_prepare($conn, $sql);
        mysqli_stmt_bind_param($stmt, 'i', $id);
        mysqli_stmt_execute($stmt);
        mysqli_stmt_bind_result($stmt, $image);
        mysqli_stmt_fetch($stmt);
        mysqli_stmt_close($stmt);
        mysqli_close($conn);

        if ($image) {
            header('Content-Type: image/jpeg');
            echo $image;
        } else {
            header('Content-Type: image/jpeg');
            readfile('img/default_profile.jpg');
        }
        exit;
    }
}

mysqli_close($conn);
?>

<!DOCTYPE html>
<html lang="en-US">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Intern Records</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <link rel="icon" type="png" href="img/logo-icon.png">
    <link rel="stylesheet" href="css/reports.css">
</head>
<body>
    <?php include 'component/navbar.php'; ?>
    
    <div class="notification-container" id="notification-container"></div>
    <div class="main-content">
        <div class="calendar-container">
            <div class="calendar-column">
                <h2 id="calendar-header">Monthly Calendar</h2>
                <div class="calendar" id="monthly-calendar">
                    <!-- Monthly Calendar will be generated here -->
                </div>
            </div>
            <div class="calendar-column">
                <h2>Weekly Calendar</h2>
                <div class="calendar" id="weekly-calendar">
                    <!-- Weekly Calendar will be generated here -->
                </div>
            </div>
            <div class="calendar-column">
                <h2>Daily Calendar</h2>
                <div class="calendar" id="daily-calendar">
                    <!-- Daily Calendar will be generated here -->
                </div>
            </div>
        </div>

        <div class="second-container">
            <div id="collapsible-container">
                <!-- Collapsible sections will be generated here -->
            </div>
        </div>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', () => {
            generateMonthlyCalendar();
            generateWeeklyCalendar();
            generateDailyCalendar();
            fetchSchools();
        });

        function generateMonthlyCalendar() {
            const calendar = document.getElementById('monthly-calendar');
            const header = document.getElementById('calendar-header');
            const today = new Date();
            const currentMonth = today.getMonth();
            const currentYear = today.getFullYear();

            const monthNames = ["January", "February", "March", "April", "May", "June", 
                        "July", "August", "September", "October", "November", "December"];
    
            header.textContent = `${monthNames[currentMonth]} ${currentYear}`;

            const holidays = {
                "01-01": "New Year's Day",
                "02-25": "People Power Revolution",
                "04-09": "Araw ng Kagitingan",
                "05-01": "Labor Day",
                "06-12": "Independence Day",
                "08-21": "Ninoy Aquino Day",
                "08-28": "National Heroes Day",
                "11-01": "All Saints' Day",
                "11-02": "All Souls' Day",
                "11-30": "Bonifacio Day",
                "12-25": "Christmas Day",
                "12-30": "Rizal Day",
            };

            const firstDay = new Date(currentYear, currentMonth, 1).getDay();
            const daysInMonth = new Date(currentYear, currentMonth + 1, 0).getDate();

            const daysOfWeek = ['S', 'M', 'T', 'W', 'Th', 'F', 'S'];

            const table = document.createElement('table');
            table.className = 'calendar-table';

            const headerRow = document.createElement('tr');
            daysOfWeek.forEach(day => {
                const th = document.createElement('th');
                th.innerHTML = day;
                headerRow.appendChild(th);
            });
            table.appendChild(headerRow);

            let date = 1;
            for (let i = 0; i < 6; i++) {
                const row = document.createElement('tr');

                for (let j = 0; j < 7; j++) {
                    const cell = document.createElement('td');

                    if (i === 0 && j < firstDay) {
                        cell.innerHTML = '';
                    } else if (date > daysInMonth) {
                        break;
                    } else {
                        const monthDay = `${String(currentMonth + 1).padStart(2, '0')}-${String(date).padStart(2, '0')}`;
                        cell.innerHTML = date;
                        
                        if (holidays[monthDay]) {
                            cell.classList.add('holiday');
                            cell.title = holidays[monthDay];
                        }

                        if (date === today.getDate() && currentMonth === today.getMonth() && currentYear === today.getFullYear()) {
                            cell.classList.add('today');
                            cell.classList.remove('holiday');
                        }
                        date++;
                    }
                    row.appendChild(cell);
                }

                table.appendChild(row);
            }

            calendar.appendChild(table);
        }

        function generateWeeklyCalendar() {
            const calendar = document.getElementById('weekly-calendar');
            calendar.innerHTML = '';

            const today = new Date();
            const currentDay = today.getDay();
            const firstDayOfWeek = new Date(today);
            firstDayOfWeek.setDate(today.getDate() - currentDay);

            const daysOfWeek = ['Sunday', 'Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday', 'Saturday'];

            const holidays = {
                "01-01": "New Year's Day",
                "02-25": "People Power Revolution",
                "04-09": "Araw ng Kagitingan",
                "05-01": "Labor Day",
                "06-12": "Independence Day",
                "08-21": "Ninoy Aquino Day",
                "08-28": "National Heroes Day",
                "11-01": "All Saints' Day",
                "11-02": "All Souls' Day",
                "11-30": "Bonifacio Day",
                "12-25": "Christmas Day",
                "12-30": "Rizal Day",
            };

            const table = document.createElement('table');
            table.className = 'weekly-calendar-table';

            for (let i = 0; i < 7; i++) {
                const row = document.createElement('tr');

                const dayCell = document.createElement('th');
                dayCell.innerHTML = daysOfWeek[i];
                row.appendChild(dayCell);

                const dateCell = document.createElement('td');
                const date = new Date(firstDayOfWeek);
                date.setDate(firstDayOfWeek.getDate() + i);

                const options = { month: 'long', day: 'numeric', year: 'numeric' };
                const formattedDate = date.toLocaleDateString(undefined, options);
                dateCell.innerHTML = `${formattedDate}`;

                const monthDay = `${String(date.getMonth() + 1).padStart(2, '0')}-${String(date.getDate()).padStart(2, '0')}`;
                if (holidays[monthDay]) {
                    dayCell.classList.add('holiday');
                    dateCell.classList.add('holiday');
                    dateCell.title = holidays[monthDay];
                }

                const todayDate = today.getDate();
                const todayMonth = today.getMonth();
                const todayYear = today.getFullYear();
                if (date.getDate() === todayDate && date.getMonth() === todayMonth && date.getFullYear() === todayYear) {
                    dayCell.classList.add('today');
                    dateCell.classList.add('today');
                }

                row.appendChild(dateCell);
                table.appendChild(row);
            }

            calendar.appendChild(table);
        }

        function generateDailyCalendar() {
            const calendar = document.getElementById('daily-calendar');

            const table = document.createElement('table');
            table.className = 'daily-calendar-table';

            const headerRow = document.createElement('tr');
            const timeHeader = document.createElement('th');
            timeHeader.innerHTML = 'Time';
            headerRow.appendChild(timeHeader);

            const eventHeader = document.createElement('th');
            eventHeader.innerHTML = 'Event';
            headerRow.appendChild(eventHeader);

            table.appendChild(headerRow);

            for (let i = 8; i <= 18; i++) {
                const row = document.createElement('tr');

                const hourCell = document.createElement('td');

                let hour = i;
                let period = 'AM';

                if (i > 11) {
                    period = 'PM';
                    if (i > 12) {
                        hour = i - 12;
                    }
                }

                hourCell.innerHTML = `${hour}:00 ${period}`;
                hourCell.className = 'hour';
                row.appendChild(hourCell);

                const eventCell = document.createElement('td');
                eventCell.className = 'event';
                eventCell.innerHTML = '';
                row.appendChild(eventCell);

                table.appendChild(row);
            }

            calendar.appendChild(table);
        }

        function fetchSchools() {
            fetch('?action=fetch_schools')
                .then(response => response.json())
                .then(data => {
                    const container = document.getElementById('collapsible-container');
                    data.forEach(school => {
                        const section = document.createElement('div');
                        section.className = 'collapsible-section';

                        const header = document.createElement('div');
                        header.className = 'collapsible-header';
                        header.innerText = school.schoolname;
                        section.appendChild(header);

                        const studentList = document.createElement('div');
                        studentList.className = 'collapsible-content student-list';
                        studentList.dataset.schoolId = school.id;
                        section.appendChild(studentList);

                        container.appendChild(section);

                        // Fetch students for this school
                        fetchStudents(school.id, studentList);

                        // Add click event to toggle collapsible content with debounce
                        header.addEventListener('click', debounce(() => {
                            const content = section.querySelector('.collapsible-content');
                            content.style.display = content.style.display === 'none' ? 'block' : 'none';
                        }, 300));
                    });
                })
                .catch(error => console.error('Error fetching schools:', error));
        }

        function fetchStudents(schoolId, studentList) {
            fetch(`?action=fetch_students&school_id=${schoolId}`)
                .then(response => response.json())
                .then(data => {
                    studentList.innerHTML = ''; // Clear any existing content

                    data.forEach(student => {
                        const img = document.createElement('img');
                        img.src = `?action=get_image&id=${student.studid}`; // Use the new PHP script to get the image
                        img.alt = `${student.fname} ${student.mname} ${student.lname}`;
                        img.className = 'student-image';
                        img.onerror = () => img.src = 'img/default_profile.jpg'; // Fallback if image fails to load
                        studentList.appendChild(img);

                        // Log image URL for debugging
                        console.log('Image URL:', img.src);
                    });
                })
                .catch(error => console.error('Error fetching students:', error));
        }

        function debounce(func, delay) {
            let timeoutId;
            return function(...args) {
                clearTimeout(timeoutId);
                timeoutId = setTimeout(() => func.apply(this, args), delay);
            };
        }

        function logout() {
            let ask = confirm('Are you sure you want to log out?');
            if (ask) {
                window.location.assign('logout.php');
            }
        }
    </script>
</body>
</html>
