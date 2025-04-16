<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="rafspel.css">
    <style>
        .gray-box {
            width: 300px;
            height: 150px;
            background-color: gray;
            color: white;
            text-align: center;
            line-height: 150px;
            font-size: 20px;
            border-radius: 10px;
            position: absolute;
            top: 0; 
            left: 0;
            margin: 10px;
        }
    </style>
</head>
<body>
    <div class="background"></div>
    <div class="gray-box">
        <?php
            include "teamnaamshow.php";
        ?>
    </div>

    <div class="maze" id="maze"></div>

    <script src="maze.js">

        let timerRunning = true;

        function updateTimer() {
            if (!timerRunning) return; // Stop de functie als de timer gestopt is

            fetch("./timer.php")
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
            fetch("./reset.php").then(() => {
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