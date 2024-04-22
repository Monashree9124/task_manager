<?php
session_start();
require_once("db.php");

if (isset($_SESSION["user_id"])) {
    $title = $_POST["title"];
    $description = $_POST["description"];

    $user_id = $_SESSION["user_id"];
    $sql = "INSERT INTO tasks (id, title, description) VALUES ('$user_id','$title','$description')";
    $conn->query($sql);
}

header("Location: tasks.php");

$conn->close();
