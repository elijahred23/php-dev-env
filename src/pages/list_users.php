<?php
// Include the database connection file
include('../db_scripts/db_connection.php');

// SQL statement to retrieve all users from the "users" table
$sql = "SELECT * FROM users";
$result = $connection->query($sql);

if ($result->num_rows > 0) {
    echo "<h1>List of Users</h1>";
    echo "<table>";
    echo "<tr><th>ID</th><th>Username</th><th>Email</th></tr>";
    
    while ($row = $result->fetch_assoc()) {
        echo "<tr>";
        echo "<td>" . $row["id"] . "</td>";
        echo "<td>" . $row["username"] . "</td>";
        echo "<td>" . $row["email"] . "</td>";
        echo "</tr>";
    }
    
    echo "</table>";
} else {
    echo "No users found.";
}

// Close the database connection
$connection->close();
?>
