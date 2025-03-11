<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Vragenpagina</title>
  <style>
    body {
      font-family: Arial, sans-serif;
      background-color:rgb(142, 142, 147);
      margin: 0;
      padding: 20px;
      box-sizing: border-box;
    }

    .container {
      max-width: 600px;
      margin: 20px auto;
      background-color:rgb(255, 255, 255);
      padding: 20px;
      border-radius: 8px;
      box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
    }

    h2 {
      color: #333;
      text-align: center;
    }

    form {
      display: flex;
      flex-direction: column;
      gap: 15px;
    }

    label {
      font-weight: bold;
      color: #555;
    }

    input,
    textarea,
    button {
      width: 100%;
      padding: 10px;
      border: 1px solid #ccc;
      border-radius: 6px;
      font-size: 16px;
      box-sizing: border-box;
    }

    textarea {
      resize: none;
      height: 100px;
    }

    button {
      background-color:rgb(105, 116, 106);
      color: white;
      cursor: pointer;
      transition: background 0.3s ease;
    }

    button:hover {
      background-color:rgb(0, 0, 0);
    }

    .questions-list {
      margin-top: 30px;
    }

    .question-item {
      background-color: #f9f9f9;
      padding: 15px;
      border: 1px solid #ddd;
      border-radius: 6px;
      margin-bottom: 10px;
    }

    .question-item h3 {
      margin: 0 0 5px;
      color: #333;
      font-size: 18px;
    }

    .question-item p {
      margin: 0;
      color: #555;
    }
  </style>
</head>
<body>

<div class="container">
  <h2>Vragen-pagina</h2>
  <form id="questionForm">
    <label for="question">Vraag:</label>
    <input type="text" id="question" name="question" required />

    <label for="answer">Antwoord:</label>
    <textarea id="answer" name="answer" required></textarea>

    <button type="submit">Opslaan</button>
  </form>

  <!-- presets -->
  <div class="questions-list">
    <h2>Vragen en antwoorden</h2>
    <div class="question-item">
      <h3>Hoeveel zijn kamers in totaal?</h3>
      <p>3</p>
    </div>
    <div class="question-item">
      <h3>Waar kan Ik symbolene zien?</h3>
      <p>Ergens op het scherm</p>
    </div>
    <div class="question-item">
      <h3>Hoe kan ik verliezen?</h3>
      <p>Als het timer stopt!</p>
    </div>
  </div>
</div>

</body>
</html>
