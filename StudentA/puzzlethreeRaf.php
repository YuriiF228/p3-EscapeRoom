<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Room1</title>
    <link rel="stylesheet" href="rafspel.css">
    <style>
        body {
          font-family: sans-serif;
          display: flex;
          flex-direction: column;
          align-items: center;
          margin-top: 40px;
        }
        #puzzle {
          display: grid;
          grid-template-columns: repeat(3, 100px);
          grid-template-rows: repeat(3, 100px);
          gap: 2px;
        }
        .tile {
          width: 100px;
          height: 100px;
          background-image: url('../images/homepagina/barrel.png');
          background-size: 300px 300px;
          cursor: pointer;
          transition: transform 0.3s;
        }
        #message {
          margin-top: 20px;
          font-size: 1.2em;
          color: green;
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

    <h2>Rotating Puzzle</h2>
    <div id="puzzle"></div>
    <div id="message"></div>

    <button id="nextBtn" onclick="goToNextPage()">Next →</button>

    <script src="rotation.js">
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