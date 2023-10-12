<?php
// Database connection
$servername = "localhost";
$username = "root";
$password = "admin";
$dbname = "loginDB";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Retrieve form data
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST["username"];
    $password = $_POST["password"];

    // Verify user credentials
    $sql = "SELECT * FROM loginDB WHERE username = '$username' AND password = '$password'";
    $result = $conn->query($sql);

    if ($result->num_rows == 1) {
        // Successful login
        session_start();
        $_SESSION["username"] = $username;
        header("Location: hello.html"); // Redirect to a welcome page
        exit();
    } else {
        // Invalid credentials
        echo "Invalid username or password.";
    }
}
$conn->close();


