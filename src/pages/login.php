<?php
session_start(); // Start a PHP session

// Include the database connection file
include('../db_scripts/db_connection.php');

// Check if the user is already logged in
if (isset($_SESSION['username'])) {
    header("Location: dashboard.php"); // Redirect to the dashboard if already logged in
    exit();
}

// Check if the login form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $inputUsername = $_POST["username"];
    $inputPassword = $_POST["password"];

    // SQL query to retrieve the user's data
    $sql = "SELECT * FROM users WHERE username = ?";
    $stmt = $connection->prepare($sql);
    $stmt->bind_param("s", $inputUsername);

    if ($stmt->execute()) {
        $result = $stmt->get_result();
        if ($result->num_rows === 1) {
            $row = $result->fetch_assoc();
            $hashedPassword = $row["password"];

            if (password_verify($inputPassword, $hashedPassword)) {
                // Valid credentials, start a session
                $_SESSION["username"] = $inputUsername;
                header("Location: dashboard.php"); // Redirect to the dashboard after successful login
                exit();
            } else {
                $errorMessage = "Invalid username or password";
            }
        } else {
            $errorMessage = "Invalid username or password";
        }
    } else {
        $errorMessage = "Error executing the query: " . $connection->error;
    }

    $stmt->close();
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Login</title>
</head>
<body>
    <h1>Login</h1>
    <?php if (isset($errorMessage)) : ?>
        <p style="color: red;"><?php echo $errorMessage; ?></p>
    <?php endif; ?>

    <form method="POST">
        <label for="username">Username:</label>
        <input type="text" id="username" name="username" required><br>

        <label for="password">Password:</label>
        <input type="password" id="password" name="password" required><br>

        <input type="submit" value="Login">
    </form>
</body>
</html>
