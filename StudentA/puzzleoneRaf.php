<?php include 'teamnaamshow.php'; ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="rafspel.css">
</head>
<body>
    <p>Jouw team: <?php echo $_SESSION['team_name']; ?></p>

    <div class="container">
        <div class="box" onclick="checkBox(1)">1</div>
        <div class="box" onclick="checkBox(2)">2</div>
        <div class="box" onclick="checkBox(3)">3</div>
        <div class="box" onclick="checkBox(4)">4</div>
        <div class="box" onclick="checkBox(5)">5</div>
        <div class="box" onclick="checkBox(6)">6</div>
    </div>

    <script>
        function checkBox(number) {
            if (number === 5) {
                window.location.href = "https://voorbeeldpagina.nl";
            } else {
                alert("Kies de vijfde doos.");
            }
        }
    </script>
    
</body>
</html>