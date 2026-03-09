<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
    #Utwórzcie nową tablicę - produkty zawierającą jako klucz nazwę przedmiotu, a jako wartość - kwotę netto. Następnie utwórzcie drugą, pustą tablicę.
    #Korzystając z pętli foreach obliczcie cenę brutto każdego produktu i dodajcie do nowej tablicy zachowując te same klucze. Stawka VAT to 23% czyli
    #mnożycie cenę produktu netto przez 1.23 i zapisujecie w drugiej, nowej tablicy.
    #Na koniec wypiszcie wszystkie wartości z nowej tablicy w formie "Produkt XXX kosztuje ZZZ zł". XXX to nazwa produktu, ZZZ to wyliczona cena brutto.

    $produkty = ["laptop" => 4000, "słuchawki" => 200, "fotel" => 300];
    $z = [];
    foreach($produkty as $x => $y){
        $brutto = $y * 1.23;
        $z[$x] = $brutto;
    }
    foreach($z as $x => $b){
        echo "produkt: ". $x. " cena: ". $b. "zł, ";
    }

    echo "<br>";
    echo "<br>";

    #Utwórzcie dwie, zwykłe tablice z imionami, wyświetlcie ich dane na ekranie a następnie połączcie je w jedną tablicę operując tylko funkcjami na tablicach,
    #bez używania foreach do łączenia. Po wszystkim wyświetlcie tylko unikalne wartości alfabetycznie od A do Z.
    #Jednym z imion ma być "Łukasz" i nie może występować ani na początku, ani na końcu.

    $im1 = ["Katarzyna", "Łukasz", "Lena", "Mariusz"];
    $im2 = ["Karol", "Adrian", "Kazimierz", "Beata"];
    $pol = array_merge($im1, $im2);
    $unik = array_unique($pol);
    setlocale(LC_COLLATE, 'pl_PL.UTF-8', 'Polish_Poland.1250', 'pl_PL');
    sort($unik, SORT_LOCALE_STRING);
    foreach($unik as $imie){
        echo $imie. "<br>";
    }
    ?>
</body>
</html>