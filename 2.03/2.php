<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    
    <?php
    #Wypisz liczby od 1 do 50, obok każdej z liczb ma być napisane, czy jest parzysta czy nieparzysta. Każda liczba ma być w osobnej linii
    
    for($x = 1; $x <= 50; $x++){
        if($x % 2 != 0){
            echo $x, " - Nieparzysta", "<br>";
        }else{
            echo $x, " - Parzysta", "<br>";
        }
    }

    echo "<br>";
    echo "<br>";

    #Wypisywanie tekstu z uwzględnieniem reszty z dzielenia (modulo, znak "%") - dalej od 1 do 50

    for($y = 1; $y <= 50; $y++){
        $wysy = $y;
        if($y % 3 == 0){
            $wysy = $wysy. " Trójka";
        }
        if($y % 4 == 0){
            $wysy = $wysy. " Czwórka";
        }
        if($y % 5 == 0){
            $wysy = $wysy. " Piątka";
        }
        if($wysy != $y){
            echo $wysy;
            echo "<br>";
        }
    }

    echo "<br>";
    echo "<br>";
    ?>
</body>
</html>