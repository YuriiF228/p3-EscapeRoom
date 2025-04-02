<?php
try
{
    $db = new PDO(dsn: 'mysql:host=localhost;dbname=phpvoorbeelden', username: 'root', password: '');
}

catch(PDOException $e)
{
    $sMsg = '<p>
            Regelnummer: '.$e->getLine().'<br />
            Bestand: '.$e->getFile().'<br />
            Foutmelding: '.$e->getMessage().'
        </p>';

    trigger_error(message: $sMsg);
    die();
}

?>