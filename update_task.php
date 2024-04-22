<?php
// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $task_id = $_POST["task_id"];
    $new_title = $_POST["title"];
    $new_description = $_POST["description"];

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

    // Prepare and execute the UPDATE SQL query
    $sql = "UPDATE tasks SET title = ?, description = ? WHERE id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ssi", $new_title, $new_description, $task_id);

    if ($stmt->execute()) {
        // Task updated successfully
        header("Location: tasks.php"); // Redirect back to the tasks page
    } else {
        // Task update failed
        echo "Error: " . $conn->error;
    }

    // Close the database connection
    $stmt->close();
    $conn->close();
} else {
    // Form not submitted, handle the error
    echo "Form not submitted.";
}
?>
