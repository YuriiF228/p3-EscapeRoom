<?php
// Databasegegevens
$host = 'localhost';
$dbname = 'vragenbeheer';
$username = 'root';
$password = '';

// Verbinding maken met de database
try {
    $conn = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // Vraag opslaan
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $vraag = $_POST['vraag'] ?? '';
        $antwoord = $_POST['antwoord'] ?? '';

        if (!empty($vraag) && !empty($antwoord)) {
            $stmt = $conn->prepare("INSERT INTO vragen (vraag, antwoord) VALUES (:vraag, :antwoord)");
            $stmt->bindParam(':vraag', $vraag);
            $stmt->bindParam(':antwoord', $antwoord);
            $stmt->execute();

            $message = "Vraag opgeslagen!";
        } else {
            $error = "Vul zowel vraag als antwoord in.";
        }
    }

    // Vragen ophalen
    $stmt = $conn->prepare("SELECT * FROM vragen ORDER BY aangemaakt_op DESC");
    $stmt->execute();
    $vragen = $stmt->fetchAll();

} catch(PDOException $e) {
    $error = "Fout: " . $e->getMessage();
}
?>

<!DOCTYPE html>
<html lang="nl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Vragenbeheer</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 20px;
            background-color: #f4f4f9;
        }
        form {
            background-color: #fff;
            padding: 20px;
            border: 1px solid #ccc;
            margin-bottom: 20px;
            border-radius: 8px;
            box-shadow: 2px 2px 12px rgba(0,0,0,0.1);
        }
        input, button {
            display: block;
            width: calc(100% - 20px);
            padding: 10px;
            margin-bottom: 10px;
            border-radius: 4px;
            border: 1px solid #ccc;
            font-size: 16px;
        }
        button {
            background-color: #28a745;
            color: white;
            cursor: pointer;
            border: none;
        }
        button:hover {
            background-color: #218838;
        }
        .message, .error {
            padding: 10px;
            margin-bottom: 10px;
            border-radius: 4px;
        }
        .message {
            background-color: #d4edda;
            color: #155724;
            border: 1px solid #c3e6cb;
        }
        .error {
            background-color: #f8d7da;
            color: #721c24;
            border: 1px solid #f5c6cb;
        }
        .vraag {
            background-color: #fff;
            padding: 15px;
            margin-bottom: 10px;
            border: 1px solid #ccc;
            border-radius: 4px;
            box-shadow: 2px 2px 8px rgba(0,0,0,0.1);
        }
        .vraag small {
            display: block;
            color: #777;
            margin-top: 5px;
        }
    </style>
</head>
<body>

<h2>Vragenbeheer</h2>

<!-- ✅ Succes- of foutmelding tonen -->
<?php if (!empty($message)): ?>
    <div class="message"><?= htmlspecialchars($message) ?></div>
<?php endif; ?>
<?php if (!empty($error)): ?>
    <div class="error"><?= htmlspecialchars($error) ?></div>
<?php endif; ?>

<!-- ✅ Formulier voor het opslaan van een vraag -->
<form action="" method="POST">
    <label for="vraag">Vraag:</label>
    <input type="text" id="vraag" name="vraag" required>

    <label for="antwoord">Antwoord:</label>
    <input type="text" id="antwoord" name="antwoord" required>

    <button type="submit">Opslaan</button>
</form>

<!-- ✅ Vragen tonen -->
<h3>Opgeslagen vragen:</h3>
<?php if ($vragen): ?>
    <?php foreach ($vragen as $vraag): ?>
        <div class="vraag">
            <strong>Vraag:</strong> <?= htmlspecialchars($vraag['vraag']) ?><br>
            <strong>Antwoord:</strong> <?= htmlspecialchars($vraag['antwoord']) ?><br>
            <small>Aangemaakt op: <?= $vraag['aangemaakt_op'] ?></small>
        </div>
    <?php endforeach; ?>
<?php else: ?>
    <p>Er zijn nog geen vragen opgeslagen.</p>
<?php endif; ?>

</body>
</html>
