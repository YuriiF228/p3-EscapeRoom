<?php
session_start();
require_once "dbconnectraf.php";

if (!isset($db)) {
    die("Database connection not established.");
}

$sql = "SELECT DISTINCT name FROM teamnames ORDER BY team_ID DESC LIMIT 1;";
$result = $db->query($sql);

if ($result && $result->num_rows > 0) {
    $row = $result->fetch_assoc();
    echo "Teamnaam: " . htmlspecialchars($row["name"]);
} else {
    echo "No team names found.";
}

$db->close();
?>