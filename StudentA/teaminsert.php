<?php

require_once "dbconnect.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $tnaam = test_input(($_POST["teamname"]))

}

try
    {
        $sQuery = "INSERT INTO `teams`(`teamname`) 
                    VALUES (:tnm)";
        $oStmt = $db->prepare($sQuery);
        $oStmt->bindValue(":tnm", $tnaam);

        $oStmt->execute();
        
    }
    catch(PDOException $e) 
    { 
        $sMsg = '<p> 
                        Regelnummer: '.$e->getLine().'<br /> 
                        Bestand: '.$e->getFile().'<br /> 
                        Foutmelding: '.$e->getMessage().' 
                    </p>'; 
                 
        trigger_error($sMsg); 
        die();
    }

?>

<?php

function test_input($inpData)
{
    $inpData = trim($inpData);
    $inpData = stripslashes($inpData);
    $inpData = htmlspecialchars($inpData);
    return $inpData;
}

?>