<?php
$host = "localhost";
$username = "host";
$password = "";
$database = "task_manager";

$conn = new mysqli($host, $username, $password, $database);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
