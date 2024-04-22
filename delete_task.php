<?php
// Check if the task_id is provided via GET or POST
if (isset($_REQUEST['task_id'])) {
    $task_id = $_REQUEST['task_id'];

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

    // Prepare and execute the DELETE SQL query
    $sql = "DELETE FROM tasks WHERE id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $task_id);

    if ($stmt->execute()) {
        // Task deleted successfully
        header("Location: tasks.php"); // Redirect back to the tasks page
    } else {
        // Task deletion failed
        echo "Error: " . $conn->error;
    }

    // Close the database connection
    $stmt->close();
    $conn->close();
} else {
    // Task ID not provided, handle the error
    echo "Task ID not provided.";
}
?>
