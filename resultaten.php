<!DOCTYPE html>
<html lang="nl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Live Timer met PHP</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            text-align: center;
            margin-top: 50px;
        }
        #timer {
            font-size: 2em;
            font-weight: bold;
        }
        button {
            margin-top: 20px;
            padding: 10px 15px;
            font-size: 1em;
            cursor: pointer;
        }
    </style>
</head>
<body>

    <h1>Live Timer</h1>
    <p>Deze timer toont hoeveel seconden verstreken zijn sinds de start.</p>
    <div id="timer">0</div>
    
    <button onclick="resetTimer()">Reset Timer</button>

    <script>
        function updateTimer() {
            fetch("timer.php")
                .then(response => response.json())
                .then(data => {
                    document.getElementById("timer").innerText = data.time + " seconden";
                })
                .catch(error => console.error("Fout bij ophalen timer:", error));
        }

        function resetTimer() {
            fetch("reset.php").then(() => {
                updateTimer(); // Direct updaten na reset
            });
        }

        // Update de timer elke seconde
        setInterval(updateTimer, 1000);
        updateTimer();
    </script>

</body>
</html>