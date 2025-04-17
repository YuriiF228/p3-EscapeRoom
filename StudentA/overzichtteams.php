<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Teamlijst</title>
    <link rel="stylesheet" href="rafstyle.css">
</head>
<body>
    <?php
    require_once "dbconnectoverzicht.php";
        try{
            $sQuery = "SELECT * FROM teamnames";
            $oStmt = $db->prepare(query: $sQuery);
            $oStmt->execute();
        
            if ($oStmt->rowCount()> 0) {
                echo "<table>";
                echo "<thead>";
                echo "<td>team_ID</td>";
                echo "<td>name</td>";
                echo "<td>lid 1</td>";
                echo "<td>lid 2</td>";
                echo "<td>score</td>";
                echo "<td>tijd</td>";
                echo "</thead>";
                while($aRow = $oStmt->fetch(PDO::FETCH_ASSOC))
                {
                    echo '<tr>';
                    echo '<td>'.$aRow['team_ID'].'</td>';
                    echo '<td>'.$aRow['name'].'</td>';
                    echo '<td>'.$aRow['lid1'].'</td>';
                    echo '<td>'.$aRow['lid2'].'</td>';
                    echo '<td>'.$aRow['score'].'</td>';
                    echo '<td>'.$aRow['time'].'</td>';
                    echo '</tr>';
                }
                echo "</table>";
            } 
            else 
            {
                echo "Geen gegevens gevonden";
            }
        }
        catch(PDOException $e)
        {}
    ?>
</body>
</html>