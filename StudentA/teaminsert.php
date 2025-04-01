<?php

require_once "dbconnectraf.php";

$tnaam = $_POST['teamname'];

$sql = "INSERT INTO `teamnames`(`name`, `score`, `time`) VALUES ('$tnaam', '0', '0')";

if ($db->query($sql) === TRUE) {
    echo "Teamnaam klaar voor gebruik.";
}

?>