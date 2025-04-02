<?php

require_once "dbconnectraf.php";

$tnaam = $_POST['teamname'];
$tlid1 = $_POST['teamlid1'];
$tlid2 = $_POST['teamlid2'];

$sql = "INSERT INTO `teamnames`(`team_ID`, `name`, `lid1`, `lid2`, `score`, `time`) VALUES ('$tnaam', '$tlid1', '$tlid2', '0', '0')";

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