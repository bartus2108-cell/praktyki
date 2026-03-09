<?php
include "polonczenie.php";
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <nav>
        <p>Nie masz jeszcze konta? <a href="rejestracja.php">Zarejestruj się!</a></p>
    </nav>
    <h1>Strona Logowania</h1>
    <form method="POST">
        <label for="email">Email:</label>
        <input type="email" require><br>
        <label for="password">Hasło:</label>
        <input type="password" require><br><br>
        <input type="submit">
    </form>
    <?php
    ?>
</body>
</html>