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
        <a href="panel.php">Dodawanie Zamówienia</a><br>
        <a href="zamowienia.php">Lista Zamówień</a>
    </nav>
    <h1>Produkty:</h1>
    <?php
    $command = "SELECT produkty.id, produkty.nazwa, produkty.opis, produkty.cena, produkty.stan, produkty.id AS produkt_nazwa FROM produkty";
    $execute = mysqli_query($db, $command);

    $amount = "SELECT produkty.stan FROM produkty WHERE id = ?";
    $add = $db->prepare($amount);
    $add->bind_param("i", $id);
    $add->execute();

    $result = $add->get_result();
    $fetch = $result->fetch_assoc();

    if(mysqli_num_rows($execute) == 0){
        echo "Nie ma aktualnie żadnego produktu!";
    }else{
        while($product = mysqli_fetch_assoc($execute)){
            echo "<div style='border: 1px solid #ccc; padding: 10px; margin: 10px;'>";
            echo "<h3>{$product['id']}: {$product['nazwa']}</h3>";
            echo "<p>{$product['cena']} zł<strong>;</strong> Ilość w Magazynie: {$product['stan']}</p>";
            echo "<p>Opis: {$product['opis']}</p>";
            echo "<button>Dodaj do koszyka</button>";
            echo "</div>";
        }
    }
    ?>
</body>
</html>