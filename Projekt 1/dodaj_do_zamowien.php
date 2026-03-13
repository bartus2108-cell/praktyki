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
    if(!isset($_POST['ilosc']) || !isset($_POST['produkt_nazwa'])){
        die("Błąd: Brakujące dane produktu!");
    }

    $ilosc = $_POST['ilosc'];
    $produkt_nazwa = $_POST['produkt_nazwa'];

    $id = "SELECT id FROM produkty WHERE nazwa = ?";
    $id_add = $db->prepare($id);

    if(!$id_add){
        die("Błąd przygotowania zapytania: " . $db->error);
    }

    $id_add->bind_param("s", $produkt_nazwa);
    $id_add->execute();
    $result_id = $id_add->get_result();

    if($result_id->num_rows == 0){
        die("Błąd: Produkt nie istnieje w bazie danych!");
    }

    $row = $result_id->fetch_assoc();
    $produkt_id = $row['id'];
    $id_add->close();

    $insert = "INSERT INTO zamowienia (id_produktu) VALUES (?)";
    $insert_add = $db->prepare($insert);
    if(!$insert_add){
        die("Błąd przygotowania zapytania: " . $db->error);
    }
    $insert_add->bind_param("i", $produkt_id);
    $insert_add->execute();
    $insert_add->close();

    $delete = "DELETE FROM koszyk WHERE produkt_nazwa = ?";
    $delete_add = $db->prepare($delete);
    if(!$delete_add){
        die("Błąd przygotowania zapytania: " . $db->error);
    }
    $delete_add->bind_param("s", $produkt_nazwa);
    $delete_add->execute();
    $delete_add->close();

    header("Location: zamowienia.php");
    exit();
    ?>
</body>
</html>
