<!DOCTYPE html>
<html>
<head>
    <title>List of Affirmations</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            text-align: center;
        }
        h1 {
            color: #333;
        }
        ul {
            list-style-type: none;
            padding: 0;
        }
        li {
            background-color: #f2f2f2;
            padding: 10px;
            margin: 10px;
            border-radius: 5px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        }
    </style>
</head>
<body>
    <h1>List of Affirmations</h1>

    <ul>
        <?php
        // Include the database connection file
        include('../db_scripts/db_connection.php');

        // Retrieve affirmations from the database
        $sql = "SELECT affirmation_text FROM affirmations";
        $result = $connection->query($sql);

        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $affirmation = htmlspecialchars($row["affirmation_text"]);
                echo "<li>$affirmation</li>";
            }
        } else {
            echo "<li>No affirmations found.</li>";
        }

        // Close the database connection
        $connection->close();
        ?>
    </ul>
</body>
</html>
