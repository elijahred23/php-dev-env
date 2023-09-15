<?php
// Include the database connection file
include('db_connection.php');

// SQL statement to create the affirmations table
$sql = "
CREATE TABLE IF NOT EXISTS affirmations (
    id INT AUTO_INCREMENT PRIMARY KEY,
    affirmation_text TEXT NOT NULL
)";

// Execute the SQL query
if ($connection->query($sql) === TRUE) {
    echo "Affirmations table created successfully!";
} else {
    echo "Error creating affirmations table: " . $connection->error;
}

// Close the database connection
$connection->close();
?>
