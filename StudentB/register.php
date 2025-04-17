<?php
session_start();
require 'db.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $user = $_POST['username'];
    $pass = password_hash($_POST['password'], PASSWORD_DEFAULT);

    $stmt = $conn->prepare("INSERT INTO users (username, password) VALUES (?, ?)");

    try {
        $stmt->execute([$user, $pass]);
        header("Location: index.php");
        exit;
    } catch (PDOException $e) {
        $error = "User already exists!";
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Registration</title>
</head>
<body>
    <h2>Registration</h2>
    <?php if (!empty($error)) echo "<p style='color:red;'>$error</p>"; ?>
    <form method="POST">
        <input type="text" name="username" required placeholder="Имя пользователя"><br>
        <input type="password" name="password" required placeholder="Пароль"><br>
        <button type="submit">Register</button>
        <a href="index.php">LogIn</a>
    </form>
</body>
</html>
