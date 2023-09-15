<?php
// Include the database connection file
include('db_connection.php');

$affirmations = [
    "I am confident and capable.",
    "I believe in myself and my abilities.",
    "I attract positive energy and opportunities.",
    "I am in control of my own happiness.",
    "I radiate positivity and attract good things in life.",
    "I am worthy of love and respect.",
    "I am resilient and can overcome any challenge.",
    "I embrace change and grow with every experience.",
    "I am surrounded by supportive and loving people.",
    "I am a magnet for success and prosperity.",
    "I trust the journey of life and follow my heart.",
    "I let go of fear and doubt, replacing them with confidence.",
    "I am grateful for the abundance in my life.",
    "I am at peace with my past and excited about my future.",
    "I am healthy and full of vitality.",
    "I am open to new opportunities and adventures.",
    "I am a source of inspiration to others.",
    "I am constantly evolving and improving.",
    "I am aligned with my purpose and passion.",
    "I am deserving of all the good things that come my way."
];


// Insert 20 random affirmations into the table
for ($i = 0; $i < 20; $i++) {
    $randomAffirmation = $affirmations[array_rand($affirmations)]; // Get a random affirmation
    $sql = "INSERT INTO affirmations (affirmation_text) VALUES ('$randomAffirmation')";

    if ($connection->query($sql) === TRUE) {
        echo "Affirmation inserted successfully: '$randomAffirmation'<br>";
    } else {
        echo "Error inserting affirmation: " . $connection->error . "<br>";
    }
}

// Close the database connection
$connection->close();
?>
