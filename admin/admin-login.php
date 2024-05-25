<?php
// Start the session
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

// Check if user is already logged in, redirect to manage-admin page
if (isset($_SESSION['isLoggedIn']) && $_SESSION['isLoggedIn'] === true) {
    header("Location: manage-admin.php");
    exit;
}

// Check if the login form is submitted and process login
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Check if the username and password are correct
    $username = $_POST["username"];
    $password = $_POST["password"];

    // Perform the authentication (replace this with your authentication logic)
    if ($username === "admin" && $password === "admin123") {
        // Set a flag to indicate successful login
        $_SESSION['isLoggedIn'] = true;

        // Redirect to manage-admin page
        header("Location: manage-admin.php");
        exit;
    } else {
        $error = "Invalid username or password";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Login</title>
    <!-- Add your CSS styles here -->
    <style>
        /* Add your CSS styles here */
    </style>
</head>
<body>
    <!-- Your HTML login form -->
    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
        <label for="username">Username:</label><br>
        <input type="text" id="username" name="username"><br>
        <label for="password">Password:</label><br>
        <input type="password" id="password" name="password"><br><br>
        <input type="submit" value="Login">
    </form>

    <?php
    // Display error message if login fails
    if (isset($error)) {
        echo "<p>$error</p>";
    }
    ?>
</body>
</html>
