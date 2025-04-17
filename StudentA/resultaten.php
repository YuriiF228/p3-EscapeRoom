<!DOCTYPE html>
<html lang="nl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Resultaten</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            text-align: center;
            transition: background-color 1s ease-in-out;
            margin-top: 50px;
            background-color: lightblue; /* Eerste scene */
            color: black;
        }
        .scene2 {
            background: url('../images/homepagina/lose.png') no-repeat center center fixed;
            background-size: cover;
            color: white;
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

    <h1>Uw resultaat.</h1>
    <p>De scène verandert na 60 seconden!</p>
    <div id="timer">0</div>
    
    <button onclick="resetTimer()">Reset Timer</button>

    <script>
        let timerRunning = true;

        function updateTimer() {
            if (!timerRunning) return; // Stop de functie als de timer gestopt is

            fetch("timer.php")
                .then(response => response.json())
                .then(data => {
                    document.getElementById("timer").innerText = data.time + " seconden";

                    if (data.time >= 60) {
                        document.body.classList.add("scene2");
                        timerRunning = false; // Stop de updates
                    }
                })
                .catch(error => console.error("Fout bij ophalen timer:", error));
        }

        function resetTimer() {
            fetch("reset.php").then(() => {
                timerRunning = true; // Zet de timer weer aan
                updateTimer();
            });
        }

        // Update de timer elke seconde totdat hij stopt
        let interval = setInterval(() => {
            if (timerRunning) {
                updateTimer();
            } else {
                clearInterval(interval); // Stop de interval zodra de timer stopt
            }
        }, 1000);

        updateTimer();
    </script>

</body>
</html>