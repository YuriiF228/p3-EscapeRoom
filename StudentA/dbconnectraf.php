<?php
$servername = "localhost";
$username = "root";
$password = "";
$database = "phpvoorbeelden";

$db = new mysqli($servername, $username, $password, $database);

if ($db->connect_error) {
    die("Connection failed: " . $db->connect_error);
}

?>