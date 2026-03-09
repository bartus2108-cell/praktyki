<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <nav>
        <a href="tematy.php">Dodaj Temat</a><br>
        <a href="wpisy.php">Dodaj Wpis</a>
    </nav>
    <h1>Witaj Na Stronie Głównej!</h1><br>
    <h2>Wpisy:</h2>
    <?php
    $host = "127.0.0.1";
    $dbname = "blog.sql";
    $username = "root";
    $password = "";

    $db = mysqli_connect($host, $username, $password, $dbname);
    if(!$db) error_log("Wystąpił Błąd: ". mysqli_connect_error());

    $command = "SELECT wpisy.id, wpisy.nazwa_wpisu, wpisy.tresc, wpisy.data_dodania, tematy.nazwa AS temat_nazwa FROM wpisy INNER JOIN tematy ON wpisy.id_tematu = tematy.id";
    $execute = mysqli_query($db, $command);

    if(mysqli_num_rows($execute) == 0){
        echo "Nie ma aktualnie żadnego wpisu, <a href='wpisy.php'>dodaj pierwszy wpis</a>";
    }else{
        while($entry = mysqli_fetch_assoc($execute)){
            echo "<div style='border: 1px solid #ccc; padding: 10px; margin: 10px;'>";
            echo "<h3>{$entry['nazwa_wpisu']}</h3>";
            echo "<p><strong>Temat:</strong> {$entry['temat_nazwa']}</p>";
            echo "<p>{$entry['tresc']}</p>";
            echo "<p><small>Data dodania: {$entry['data_dodania']}</small></p>";
            echo "</div>";
        }
    }

    mysqli_close($db);
    ?>
</body>
</html>
