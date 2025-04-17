<?php
session_start();
require 'db.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $user = $_POST['username'];
    $pass = $_POST['password'];

    $stmt = $conn->prepare("SELECT * FROM users WHERE username = ?");
    $stmt->execute([$user]);
    $row = $stmt->fetch(PDO::FETCH_ASSOC);

    if ($row && password_verify($pass, $row['password'])) {
        $_SESSION['user'] = $user;
        header("Location: room.php");
        exit;
    } else {
        $error = "Wrong password";
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Enter</title>
</head>
<body>
    <h2>Enter</h2>
    <?php if (!empty($error)) echo "<p style='color:red;'>$error</p>"; ?>
    <form method="POST">
        <input type="text" name="username" required placeholder="Имя пользователя"><br>
        <input type="password" name="password" required placeholder="Пароль"><br>
        <button type="submit">Log in</button>
        <a href="register.php">Sing Up</a>
    </form>
</body>
</html>
