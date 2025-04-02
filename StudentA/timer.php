<?php
session_start();

// Start de timer als deze nog niet bestaat
if (!isset($_SESSION['start_time'])) {
    $_SESSION['start_time'] = time();
}

// Bereken verstreken tijd
$elapsed_time = time() - $_SESSION['start_time'];

// Geef de tijd terug als JSON
echo json_encode(["time" => $elapsed_time]);
?>