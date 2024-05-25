<?php
// Include the file containing database constants
include('config\constants.php');

// Establish database connection
$conn = new mysqli(LOCALHOST, DB_USERNAME, DB_PASSWORD, DB_NAME);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Retrieve form data
$username = $_POST['username'];
$email = $_POST['email'];
$password = $_POST['password'];
$created_at = date('Y-m-d H:i:s');

// Encrypt the password
$hashed_password = password_hash($password, PASSWORD_DEFAULT);

// Insert user data into database
$sql = "INSERT INTO tbl_users (username, email, password,created_at) VALUES ('$username', '$email', '$hashed_password','$created_at')";

if ($conn->query($sql) === TRUE) {
    // Registration successful, redirect to user account
    header("Location: loginuser.php");

} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
?>
