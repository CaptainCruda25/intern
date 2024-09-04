<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Course and School Modal</title>
    <link rel="stylesheet" href="css/add-school-courses.css">
</head>

<body>
    <!-- Container for Content -->
    <div class="container">
        <h1>Settings</h1>
        <button id="openModalBtn" class="open-modal-btn">Add Course/School</button>

        <!-- Modal Structure -->
        <div id="myModal" class="modal">
            <div class="modal-content">
                <span class="close">&times;</span>
                <h2>Add Course and School</h2>
                <form id="addForm">
                    <div class="form-group">
                        <label for="course">Course Name:</label>
                        <input type="text" id="course" name="course" required>
                    </div>
                    <div class="form-group">
                        <label for="school">School Name:</label>
                        <input type="text" id="school" name="school" required>
                    </div>
                    <button type="submit">Submit</button>
                    <div id="responseMessage"></div>
                </form>
            </div>
        </div>
    </div>

    <script src="js/add-school-courses.js"></script>
</body>

</html>