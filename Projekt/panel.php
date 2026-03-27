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
    <link rel="stylesheet" href="panel_styl.css">
</head>
<body>
    <nav>
        <a href="index.php">Strona Główna</a><br>
        <a href="zamowienia.php">Lista Zamówień</a><br>
        <a href="koszyk.php">Koszyk</a>
    </nav>
    <form method="POST">
        <h1>Dodaj Produkt</h1>
        <label for="nazwa">Nazwa:</label>
        <input type="text" name="nazwa"><br>
        <label for="opis">Opis:</label>
        <textarea name="opis" id="opis"></textarea><br>
        <label for="cena" id="cena_label">Cena:</label>
        <input type="number" name="cena" min="1"><br>
        <label for="stan" id="stan_label">Stan:</label>
        <input type="number" name="stan" min="0"><br>
        <label for="zdjecie">Zdjęcie:</label>
        <input type="file" name="zdjecie"><br><br>
        <input type="submit" value="Dodaj Produkt">
    </form>
    <?php
    if($_SERVER["REQUEST_METHOD"] == "POST"){
        $nazwa = mysqli_real_escape_string($db, $_POST["nazwa"]);
        $opis = mysqli_real_escape_string($db, $_POST["opis"]);
        $cena = mysqli_real_escape_string($db, $_POST["cena"]);
        $stan = mysqli_real_escape_string($db, $_POST["stan"]);
        #$zdjecie = mysqli_real_escape_string($db, $_POST["zdjecie"]);

        $insert = "INSERT INTO produkty (nazwa, opis, cena, stan) VALUE (?, ?, ?, ?)";
        $add = $db->prepare($insert);
        $add->bind_param("ssdi", $nazwa, $opis, $cena, $stan);

        if($add->execute() == TRUE){
            echo "Produkt Został Dodany!";
        }else{
            echo "Produkt Nie Został Dodany, Wystąpił Błąd: ". $add->error;
        }
    }
    ?>
</body>
</html>