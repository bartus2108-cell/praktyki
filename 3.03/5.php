<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
    #Utwórz tablicę 5 elementów, np. imion, gier, dowolnych wartości, a następnie wyświetl je na ekranie jedno pod drugim korzystając z pętli foreach.
    #Tablicę możesz utworzyć deklarując ją z gotowymi danymi, przypisując wartości jedna pod drugą lub korzystając z metody array_push.
    
    $tab = [1, 2, 3, 4, 5];
    foreach($tab as $tabDis){
        echo $tabDis. " ";
    }

    echo "<br>";
    echo "<br>";

    #Utwórz tablicę asocjacyjną (klucz => wartość) i przypisz jako klucze imiona, po prawej stronie (jako wartości)
    #wykonywany zawód. Wyświetl wszystkie elementy jeden pod drugim w formie "Imię - Zawód".

    $prace = array("Kazimierz" => "Informatyk", "Mariusz" => "Policjant", "Karol" => "Maszynista");
    foreach($prace as $x => $y){
        echo "$x - $y <br>"; 
    }

    echo "<br>";
    echo "<br>";

    #Korzystając z utworzonej w zadaniu 2 tablicy asocjacyjnej posortuj wartości od A do Z po kluczach, a następnie wyświetl je na ekranie.

    ksort($prace);
    foreach($prace as $z => $a){
        echo "$z - $a <br>";
    }

    echo "<br>";
    echo "<br>";

    #Korzystając z danych z zadania 3 posortuj elementy od A do Z po wartościach i również wyświetl je na ekranie.

    asort($prace);
    foreach($prace as $b => $c){
        echo "$b - $c <br>";
    }

    echo "<br>";
    echo "<br>";

    #Utwórz tablicę 7 różnych liczb z zakresu od 10 do 100, używając pętli foreach oblicz sumę i wyświetl ją na ekranie. Po uzyskaniu sumy,
    #w osobnej linii wyświetl średnią z podanych liczb korzystając z funkcji "count" oraz dzielenia. Sprawdź dokumentację funkcji tablic oraz znajdź
    #funkcję do sumowania bez używania pętli foreach.

    $liczby = [10, 20, 30, 40, 50, 60, 70];
    $suma = 0;
    foreach($liczby as $liczba){
        $suma += $liczba;
    }
    $d = count($liczby);
    $e = $suma / $d;
    echo "suma: ". $suma. "<br>";
    echo "średnia: ". $e. "<br>";
    ?>
</body>
</html>