<?php

require_once "dbconnectraf.php";

$tnaam = $_POST['teamname'];

$sql = "INSERT INTO `teamnames`(`name`, `score`, `time`) VALUES ('$tnaam', '0', '0')";

if ($db->query($sql) === TRUE) {
    echo "Teamnaam klaar voor gebruik.";
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <meta http-equiv="refresh" content="1;url=puzzleoneRaf.php">
</head>
<body>
    
</body>
</html>