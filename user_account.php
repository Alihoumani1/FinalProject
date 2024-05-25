<?php
// Include the file containing database constants
include('config\constants.php');

// Establish database connection
$conn = new mysqli(LOCALHOST, DB_USERNAME, DB_PASSWORD, DB_NAME);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}


$id = 133; 
$sql = "SELECT username, email, created_at FROM tbl_users WHERE id = $id";

$result = $conn->query($sql);

if ($result && $result->num_rows > 0) {
    // User found, fetch data
    $row = $result->fetch_assoc();
    $username = $row['username'];
    $email = $row['email'];
    $created_at = $row['created_at'];
} else {
    // User not found
    echo "User not found.";
    exit();
}

$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Account - Food Order System</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <style>
        /* Reset CSS */
        * {
            box-sizing: border-box;
            margin: 0;
            padding: 0;
        }

        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background-color: #f9f9f9;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }

        .user-account-container {
            background-color: #fff;
            max-width: 600px;
            width: 100%;
            border-radius: 10px;
            box-shadow: 0 0 20px rgba(0, 0, 0, 0.1);
            padding: 20px;
        }

        .user-info {
            margin-bottom: 20px;
        }

        .user-info h2 {
            margin-bottom: 10px;
            font-weight: bold;
            color: #333;
        }

        .user-info p {
            color: #777;
        }

        .user-actions {
            display: flex;
            justify-content: space-between;
            margin-top: 20px;
        }

        .user-actions a {
            color: #007bff;
            text-decoration: none;
            padding: 10px 20px;
            border-radius: 5px;
            border: 1px solid #007bff;
            transition: background-color 0.3s ease;
        }

        .user-actions a:hover {
            background-color: #007bff;
            color: #fff;
        }
    </style>
</head>
<body>
    <div class="user-account-container">
        <div class="user-info">
            <h2>Welcome, <?php echo $username; ?></h2>
            <p>Email: <?php echo $email; ?></p>
            <p>Member Since: <?php echo $created_at; ?></p>
        </div>
        <div class="user-actions">
            <a href="index.php">Back To Home</a>
            <a href="view_orders.php">View Orders</a>
            <a href="logoutuser.php">Logout</a> <!-- Assuming logout functionality is implemented in logout.php -->
        </div>
    </div>
</body>
</html>
