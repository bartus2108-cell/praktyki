<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    

    <?php

    #Korzystając z pętli "for" wyświetl na ekranie liczby z zakresu od 1 do 100
    #których reszta z dzielenia przez 5 (modulo) jest równa 1, pozostałe wyniki pomiń z wykorzystaniem polecenia "continue".

    for($x = 1; $x <= 100; $x++){
        if($x % 5 != 1) continue;
        echo $x. " ";
    }

    echo "<br>";
    echo "<br>";

    #Przy pomocy pętli "while" zlicz liczby od 1 do n, przerwij proces gdy suma liczb będzie większa od 100. Wyświetl wynik na ekranie.
    $y = 1;
    $s = 0;
    while($s <= 100){
        $s += $y;
        $y++;
    }
    echo $s;

    echo "<br>";
    echo "<br>";

    #Przy pomocy pętli "while" wyświetl liczby od 1000 do 0, za każdym razem
    #zmniejszając liczbę o 7, zlicz ile razy została odjęta cyfra 7, wynik wyświetl kilka linijek niżej (oddziel treść <br>).

    $l = 0;
    $w = 1000;
    while($w >= 0){
        $w -= 7;
        $l++;
        echo $w. " ";
    }
    echo "<br>";
    echo "<br>";
    echo "powtórzenia - " .$l;

    echo "<br>";
    echo "<br>";

    #Korzystając z pętli "do while" zasymuluj rzut kostką (zakres 1-6). W przypadku, gdy wypadnie 6 wyświetl wszystkie losowania.
    #Wynik powinien być różny w zależności od wywołania.
    $kosc = 0;
    do{
    $kosc = rand(1, 6);
    echo $kosc. " ";
    } while($kosc != 6);

    
    ?>
</body>
</html>