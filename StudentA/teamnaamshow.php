<?php
session_start();

if (!isset($_SESSION['team_name'])) {
    $_SESSION['team_name'] = "Cool guys";
}
?>