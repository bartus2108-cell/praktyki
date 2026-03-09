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
        <a href="tematy.php">Dodaj Temat</a>
    </nav>
    <h1>Stwórz Nowy Wpis:</h1>
    <?php
    $host = "127.0.0.1";
    $dbname = "blog";
    $username = "root";
    $password = "";

    $db = mysqli_connect($host, $username, $password, $dbname);
    if(!$db) error_log("Wystąpił Błąd: ". mysqli_connect_error());

    $command = "SELECT id, nazwa FROM tematy";
    $execute = mysqli_query($db, $command);
    $topic = mysqli_fetch_all($execute, MYSQLI_ASSOC);

    if(empty($topic)){
        echo "Temat nie został jeszcze dodany, <a href='tematy.php'>dodaj temat</a>. Temat jest wymagany, aby móc dodać wpis!";
    }else{
        ?>
        <form method="POST">
            <label for="topic_id">Wybierz Temat:</label>
            <select name="topic_id" id="topic_id" required>
                <?php
                foreach($topic as $topics){
                    ?>
                    <option value="<?php echo $topics['id']; ?>">
                        <?php echo $topics['nazwa']; ?>
                    </option>
                    <?php
                }
                ?>
            </select><br><br>
            <label for="entry_name">Nazwa Wpisu:</label>
            <input type="text" name="entry_name" required><br><br>
            <label for="content">Treść Wpisu:</label>
            <textarea name="content" required></textarea><br><br>
            <input type="submit" value="Dodaj">
        </form>
        <?php
    }

    if($_SERVER["REQUEST_METHOD"] == "POST"){
        $topic_id = mysqli_real_escape_string($db, $_POST["topic_id"]);
        $entry_name = mysqli_real_escape_string($db, $_POST["entry_name"]);
        $content = mysqli_real_escape_string($db, $_POST["content"]);
        $date = date('Y-m-d');

        $command = "INSERT INTO wpisy (id_tematu, nazwa_wpisu, tresc, data_dodania) VALUES ('$topic_id', '$entry_name', '$content', '$date')";
        if(mysqli_query($db, $command)){
            echo "Wpis został dodany! Nazwa wpisu: $entry_name";
        }else{
            echo "Wpis nie został dodany. Wystąpił błąd: " . mysqli_error($db);
        }
    }
    mysqli_close($db);?>
</body>
</html>