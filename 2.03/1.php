<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <p></p>

    <?php
    #Zastosujcie pętlę for, wyświetlcie na ekranie liczby od 1 do 100 w jednej linii. Każdy element oddzielcie przecinkiem pamiętając o tym,
    #aby nie było go przy ostatniej pozycji.

    for ($x = 1; $x < 100; $x++){
        echo $x, ", ";
    }
    echo $x;
    
    echo "<br>";
    echo "<br>";

    #liczenie od 50 do 1, też z przecinkami.

    for($y = 50; $y > 1; $y--){
        echo $y, ", ";
    }
    echo $y;

    echo "<br>";
    echo "<br>";

    #obliczenie sumy liczb od 1 do 50, wyświetlenie tylko wyniku końcowego

    $suma = 0;
    for($z = 50; $z >= 1; $z--){
        $suma += $z;
    }
    echo $suma;
    ?>
</body>
</html>