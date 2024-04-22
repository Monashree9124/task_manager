<?php
session_start();
require_once("db.php");

$username = $_POST["username"];
$password = $_POST["password"];

$sql = "SELECT * FROM users WHERE username = '".$username."' and password='".$password."'";
$result=$conn->query($sql);

if ($result->num_rows == 0) {
   echo "invalid";
} 
else {
    echo "correct";
}
?>

