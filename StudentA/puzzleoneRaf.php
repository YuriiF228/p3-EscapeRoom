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

    <p>"Ik ben de tweede van links. We zitten allemaal in een cirkel.
        <br>
        Ik heb vrienden naast mij en zij hebben vrienden naast hun. Eén van ons heeft geen vrienden.
        <br>
        Wie is het?"
    </p>

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
                window.location.href = "puzzletwoRaf.php";
            } else {
                alert("Je vindt niets, het is de foute cask.");
            }
        }

        let timerRunning = true;

        function updateTimer() {
            if (!timerRunning) return;

            fetch("timer.php")
                .then(response => response.json())
                .then(data => {
                    document.getElementById("timer").innerText = data.time + " seconden";

                    if (data.time >= 60) {
                        document.body.classList.add("scene2");
                        timerRunning = false;
                    }
                })
                .catch(error => console.error("Fout bij ophalen timer:", error));
        }

        function resetTimer() {
            fetch("reset.php").then(() => {
                timerRunning = true;
                updateTimer();
            });
        }

        let interval = setInterval(() => {
            if (timerRunning) {
                updateTimer();
            } else {
                clearInterval(interval);
            }
        }, 1000);

        updateTimer();
    </script>
    
</body>
</html>