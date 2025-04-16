const mazeLayout = [
    "WWWWWWWWWW",
    "W   W    W",
    "WWW W WW W",
    "W     W  W",
    "W WWWWW  W",
    "W   W    W",
    "WWW W WWWW",
    "W   W   WW",
    "W WWWWW  W",
    "W   P  W G",
];

const maze = document.getElementById('maze');
const rows = mazeLayout.length;
const cols = mazeLayout[0].length;
let playerPos = { x: 6, y: 9 };

function drawMaze() {
    maze.innerHTML = '';
    for (let y = 0; y < rows; y++) {
      for (let x = 0; x < cols; x++) {
        const cell = document.createElement('div');
        cell.classList.add('cell');

        if (mazeLayout[y][x] === 'W') {
          cell.classList.add('wall');
        } else if (mazeLayout[y][x] === 'G') {
          cell.classList.add('goal');
        } else {
          cell.classList.add('empty');
        }

        if (x === playerPos.x && y === playerPos.y) {
          cell.classList.add('player');
        }

        maze.appendChild(cell);
      }
    }
}

function canMove(x, y) {
    if (x < 0 || y < 0 || x >= cols || y >= rows) return false;
    return mazeLayout[y][x] !== 'W';
}

function movePlayer(dx, dy) {
    const newX = playerPos.x + dx;
    const newY = playerPos.y + dy;
    if (canMove(newX, newY)) {
      playerPos.x = newX;
      playerPos.y = newY;
      drawMaze();
      checkGoal();
    }
}

function checkGoal() {
    if (mazeLayout[playerPos.y][playerPos.x] === 'G') {
      setTimeout(() => {
        window.location.href = "puzzlethreeRaf.php";
      }, 200);
    }
}

document.addEventListener('keydown', (e) => {
    switch (e.key) {
      case 'ArrowUp': movePlayer(0, -1); break;
      case 'ArrowDown': movePlayer(0, 1); break;
      case 'ArrowLeft': movePlayer(-1, 0); break;
      case 'ArrowRight': movePlayer(1, 0); break;
    }
});

drawMaze();