const gridSize = 3;
const puzzle = document.getElementById('puzzle');
const message = document.getElementById('message');
const nextBtn = document.getElementById('nextBtn');
let pieces = [];

function createPuzzle() {
  for (let row = 0; row < gridSize; row++) {
    for (let col = 0; col < gridSize; col++) {
      const div = document.createElement('div');
      div.classList.add('tile');
      div.style.backgroundPosition = `-${col * 100}px -${row * 100}px`;

      let rotation = Math.floor(Math.random() * 4) * 90;
      div.dataset.correctRotation = "0";
      div.dataset.rotation = rotation;
      div.style.transform = `rotate(${rotation}deg)`;

      div.addEventListener('click', () => {
        rotation = (rotation + 90) % 360;
        div.dataset.rotation = rotation;
        div.style.transform = `rotate(${rotation}deg)`;
        checkWin();
      });

      puzzle.appendChild(div);
      pieces.push(div);
    }
  }
}

function checkWin() {
  const allCorrect = pieces.every(piece => piece.dataset.rotation === piece.dataset.correctRotation);
  if (allCorrect) {
    message.textContent = "Puzzle Solved!";
    nextBtn.style.display = 'inline-block';
  } else {
    message.textContent = "";
    nextBtn.style.display = 'none';
  }
}

function goToNextPage() {
  window.location.href = "resultaten.php";
}

createPuzzle();
