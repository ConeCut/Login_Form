<?php
// Database connection
$servername = "localhost";
$username = "root";
$password = "admin";
$dbname = "loginDB";
$conn = new mysqli($servername, $username, $password, $dbname);
$loginDB = $conn->query("SELECT * from logindb");
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Retrieve form data
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST["username"];
    $password = $_POST["password"];
    $password_hash = $password.hash("md5", $password);
    // Verify user credentials
    $sql = $conn->query("INSERT INTO loginDB(username, password) VALUES ('" . $username . "','" . $password . "');");
        header("Location: success.html"); // Redirect to a welcome page
        exit();
}
$conn->close();
