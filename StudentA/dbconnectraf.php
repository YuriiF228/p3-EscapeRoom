<?php
$servername = "localhost";
$username = "root";  // Adjust accordingly
$password = "";      // Adjust accordingly
$database = "phpvoorbeelden";  // Change this to your database name

// Create a new database connection
$db = new mysqli($servername, $username, $password, $database);

// Check the connection
if ($db->connect_error) {
    die("Connection failed: " . $db->connect_error);
}

?>