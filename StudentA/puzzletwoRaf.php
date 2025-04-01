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
                window.location.href = "";
            } else {
                alert("Kies de vijfde doos.");
            }
        }

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