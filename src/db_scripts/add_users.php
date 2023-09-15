<?php
// Include the database connection file
include('db_connection.php');

// Define an array of user data for 5 users
$users = [
    ["JohnDoe", "john123", "john@example.com"],
    ["JaneSmith", "jane456", "jane@example.com"],
    ["BobJohnson", "bob789", "bob@example.com"],
    ["AliceBrown", "alice101", "alice@example.com"],
    ["EveWhite", "eve202", "eve@example.com"]
];

// Loop through the user data and insert each user into the "users" table
foreach ($users as $userData) {
    $username = $userData[0];
    $password = password_hash($userData[1], PASSWORD_DEFAULT); // Hash the password
    $email = $userData[2];

    // SQL statement to insert the user
    $sql = "INSERT INTO users (username, password, email) VALUES (?, ?, ?)";
    $stmt = $connection->prepare($sql);
    $stmt->bind_param("sss", $username, $password, $email);

    if ($stmt->execute()) {
        echo "User '$username' added successfully!<br>";
    } else {
        echo "Error adding user '$username': " . $stmt->error . "<br>";
    }

    // Close the prepared statement
    $stmt->close();
}

// Close the database connection
$connection->close();
?>
