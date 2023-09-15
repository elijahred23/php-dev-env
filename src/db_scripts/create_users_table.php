<?php
// Include the database connection file
include('db_connection.php');

// SQL statement to create the "users" table
$sql = "
CREATE TABLE IF NOT EXISTS users (
    id INT AUTO_INCREMENT PRIMARY KEY,
    username VARCHAR(255) NOT NULL,
    password VARCHAR(255) NOT NULL,
    email VARCHAR(255) NOT NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
)";

// Execute the SQL query
if ($connection->query($sql) === TRUE) {
    echo "Users table created successfully!";
} else {
    echo "Error creating users table: " . $connection->error;
}

// Close the database connection
$connection->close();
?>
