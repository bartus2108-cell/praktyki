<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <nav>
        <a href="index.php">Strona Główna</a><br>
        <a href="wpisy.php">Dodaj Wpis</a>
    </nav>
    <h1>Stwórz Nowy Temat</h1>
    <form method="POST">
        <label for="nazwa">Nazwa:</label><br>
        <input type="text" name="nazwa" required><br>
        <label for="opis">Treść:</label><br>
        <textarea name="opis"></textarea><br><br>
        <input type="submit" value="Dodaj">
    </form>
    <?php
    $host = "127.0.0.1";
    $dbname = "blog";
    $username = "root";
    $password = "";

    $db = mysqli_connect($host, $username, $password, $dbname);
    if(!$db) error_log("Wystąpił Błąd: ". mysqli_connect_error());

    if($_SERVER["REQUEST_METHOD"] == "POST"){
        $name = mysqli_real_escape_string($db, $_POST['nazwa']);
        $description = mysqli_real_escape_string($db, $_POST['opis']);

        $command = "INSERT INTO tematy (nazwa, opis) VALUES ('$name', '$description')";
        if(mysqli_query($db, $command)){
            echo "Temat został dodany! Nazwa tematu: $name";
        }else{
            echo "Temat nie został dodany. Wystąpił błąd: ". mysqli_error($db);
        }
    }

    mysqli_close($db);
    ?>
</body>
</html>
