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
    <?php
    if(!isset($_POST['produkt_id']) || !isset($_POST['produkt_nazwa'])){
    die("Błąd: Brakujące dane produktu!");
    }

    $produkt_id = $_POST['produkt_id'];
    $produkt_nazwa = $_POST['produkt_nazwa'];

    $check = "SELECT * FROM koszyk WHERE produkt_id = ?";
    $add = $db->prepare($check);
    if(!$add){
    die("Błąd przygotowania zapytania: " . $db->error);
    }
    $add->bind_param("i", $produkt_id);
    $add->execute();
    $result = $add->get_result();

    if($result->num_rows > 0){
        $update = "UPDATE koszyk SET ilosc = ilosc + 1 WHERE produkt_id = ?";
        $update_add = $db->prepare($update);
        $update_add->bind_param("i", $produkt_id);
        $update_add->execute();
        $update_add->close();
    }else{
        $insert = "INSERT INTO koszyk (produkt_id, produkt_nazwa) VALUES (?, ?)";
        $insert_add = $db->prepare($insert);
        $insert_add->bind_param("is", $produkt_id, $produkt_nazwa);
        $insert_add->execute();
        $insert_add->close();
    }
    $add->close();
    header("Location: index.php");
    exit();
?>
</body>
</html>