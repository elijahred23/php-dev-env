<!DOCTYPE html>
<html>
<head>
    <title>PHP and MariaDB Docker Example</title>
</head>
<body>
    <h1>Hello, Docker PHP!</h1>

    <?php
    $host = 'database';  // Use the service name defined in docker-compose.yml
    $user = 'root';
    $password = 'my-secret-pw';
    $database = 'mydb';

    $connection = new mysqli($host, $user, $password, $database);

    if ($connection->connect_error) {
        die("Connection failed: " . $connection->connect_error);
    }

    echo "<p>Connected to MariaDB successfully!</p>";

    // Perform a sample database query
    $sql = "SELECT VERSION() as version";
    $result = $connection->query($sql);

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        echo "<p>MariaDB Version: " . $row["version"] . "</p>";
    } else {
        echo "<p>No data found.</p>";
    }

    $connection->close();
    ?>

</body>
</html>
