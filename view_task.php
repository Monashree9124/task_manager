<?php
// Database connection parameters
$servername = "your_servername";
$username = "your_username";
$password = "your_password";
$dbname = "your_database";

// Create a connection to the database
$conn = new mysqli($servername, $username, $password, $dbname);

// Check the database connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Retrieve tasks from the database
$sql = "SELECT id, title, description FROM tasks";
$result = $conn->query($sql);

// Close the database connection
$conn->close();
?>

<!DOCTYPE html>
<html>
<head>
    <title>Task Management - Tasks</title>
    <!-- Include any necessary CSS and Bootstrap here -->
</head>
<body>
    <!-- Your HTML and Bootstrap structure here -->
    <div class="container mt-5">
        <div class="row">
            <div class="col-md-6">
                <div class="card task-card">
                    <div class="card-header task-card-header">
                        <h4 class="text-center">Your Tasks</h4>
                    </div>
                    <div class="card-body">
                        <ul class="list-group">
                            <?php
                            if ($result->num_rows > 0) {
                                while ($row = $result->fetch_assoc()) {
                                    echo '<li class="list-group-item">';
                                    echo '<span class="task-title">' . $row["title"] . '</span>';
                                    echo '<button class="btn btn-info btn-sm view-task" data-toggle="modal" data-target="#viewTaskModal">View</button>';
                                    echo '</li>';
                                }
                            } else {
                                echo '<p>No tasks available.</p>';
                            }
                            ?>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- View Task Modal -->
    <div class="modal fade" id="viewTaskModal" tabindex="-1" role="dialog" aria-labelledby="viewTaskModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="viewTaskModalLabel">Task Details</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <!-- Display task details here -->
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
