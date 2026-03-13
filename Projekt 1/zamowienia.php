<?php
include "polonczenie.php";
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Zamówienia</title>
</head>
<body>
    <nav>
        <a href="index.php">Strona Główna</a><br>
        <a href="koszyk.php">Koszyk</a><br>
        <a href="panel.php">Dodawanie Zamówienia</a>
    </nav>
    <h1>Zamówienia:</h1>
    <?php
    $select = " SELECT zamowienia.id, zamowienia.id_produktu, produkty.nazwa AS produkt_nazwa, zamowienia.ilosc FROM zamowienia JOIN produkty ON zamowienia.id_produktu = produkty.id";
    $executeS = mysqli_query($db, $select);

    if(mysqli_num_rows($executeS) == 0){
        echo "Nie masz aktualnie żadnych zamówień!";
    } else {
        while($zamowienie = mysqli_fetch_assoc($executeS)){
            echo "<div style='border: 1px solid #ccc; padding: 10px; margin: 10px;'>";
            echo "<h3>Produkt: {$zamowienie['produkt_nazwa']}</h3>";
            echo "<p>Ilość: {$zamowienie['ilosc']}</p>";
            echo "</div>";
        }
    }
    ?>
</body>
</html>
