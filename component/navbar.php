<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Navbar</title>
    <link rel="stylesheet" href="css/navbar.css"> <!-- Link to CSS file -->
</head>

<body>
    <nav class="sidebar">
        <ul>
            <div class="logo">
                <img src="img/logo-icon.png" alt="EACMed Logo">
            </div>
            <li data-page="dashboard"><a href="dashboard.php"><i class="fas fa-home"></i> <span>Home</span></a></li>
            <li data-page="students"><a href="students.php"><i class="fas fa-users"></i> <span>Interns</span></a></li>
            <li data-page="attendance"><a href="attendance.php"><i class="fas fa-chart-line"></i> <span>Analytics</span></a></li>
            <li data-page="settings"><a href="addup.php"><i class="fas fa-cog"></i> <span>Settings</span></a></li>
        </ul>
        <div class="logout-container">
            <button class="Btn" onclick="logout()">
                <div class="sign">
                    <svg viewBox="0 0 512 512">
                        <path
                            d="M377.9 105.9L500.7 228.7c7.2 7.2 11.3 17.1 11.3 27.3s-4.1 20.1-11.3 27.3L377.9 406.1c-6.4 6.4-15 9.9-24 9.9c-18.7 0-33.9-15.2-33.9-33.9l0-62.1-128 0c-17.7 0-32-14.3-32-32l0-64c0-17.7 14.3-32 32-32l128 0 0-62.1c0-18.7 15.2-33.9 33.9-33.9c9 0 17.6 3.6 24 9.9zM160 96L96 96c-17.7 0-32 14.3-32 32l0 256c0 17.7 14.3 32 32 32l64 0c17.7 0 32 14.3 32 32s-14.3 32-32 32l-64 0c-53 0-96-43-96-96L0 128C0 75 43 32 96 32l64 0c17.7 0 32 14.3 32 32s-14.3 32-32 32z"></path>
                    </svg>
                </div>
                <div class="text">Logout</div>
            </button>
        </div>
    </nav>

    <script>
        document.addEventListener('DOMContentLoaded', () => {
            const sidebar = document.querySelector('.sidebar');
            const activeItem = localStorage.getItem('activeSidebarItem');

            // Set the active item on page load
            if (activeItem) {
                document.querySelector(`.sidebar li[data-page="${activeItem}"]`).classList.add('active');
            }

            sidebar.addEventListener('click', function(event) {
                const targetLi = event.target.closest('li');

                if (targetLi) {
                    // Remove 'active' class from all <li> elements
                    document.querySelectorAll('.sidebar li').forEach(li => li.classList.remove('active'));
                    // Add 'active' class to the clicked <li>
                    targetLi.classList.add('active');

                    // Save the active item's data-page attribute to localStorage
                    const page = targetLi.getAttribute('data-page');
                    localStorage.setItem('activeSidebarItem', page);
                }
            });
        });
    </script>

</body>

</html>