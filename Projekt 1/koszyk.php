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
        <a href="index.php">Strona Główna</a><br>
        <a href="zamowienia.php">Lista Zamówień</a><br>
        <a href="panel.php">Dodawanie Zamówienia</a>
    </nav>
    <h1>Koszyk:</h1>
    <?php
    $select = "SELECT produkt_nazwa, ilosc FROM koszyk";
    $executeS = mysqli_query($db, $select);

    if(mysqli_num_rows($executeS) == 0){
        echo "Nie masz aktualnie nic w koszyku!";
    }else{
        while($product = mysqli_fetch_assoc($executeS)){
            echo "<div style='border: 1px solid #ccc; padding: 10px; margin: 10px;'>";
            echo "<h3>Produkt: {$product['produkt_nazwa']}</h3>";
            echo "<p>Ilość: {$product['ilosc']}</p>";
            echo "</div>";
        }
    }
    ?>
</body>
</html>