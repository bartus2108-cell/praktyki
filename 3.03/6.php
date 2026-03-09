<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
    #Utwórz tablicę asocjacyjną 5 elementów - użytkowników. Każdemu użytkownikowi przypisz imię, nazwisko, wiek oraz status aktywności.
    #Korzystając z pętli "foreach" wyświetl je w formie "Użytkownik Imię Nazwisko ma X lat". Korzystając z warunku "if",
    #jeśli użytkownik ma aktywne konto (status aktywności na "1"), wyświetl obok niego komunikat "Konto aktywne". W przypadku,
    #gdy konto jest z wartością "0" - wyświetl "Konto nieaktywne".

    $uzytkownicy = array(
        [
        "imie" => "Mariusz",
        "nazwisko" => "Nowak",
        "wiek" => 16,
        "status" => "a"
        ],
        [
        "imie" => "Katol",
        "nazwisko" => "Kowalski",
        "wiek" => 20,
        "status" => "n"
        ],
        [
        "imie" => "Marysia",
        "nazwisko" => "Styczeń",
        "wiek" => 13,
        "status" => "a"
        ],
        [
        "imie" => "Jolanta",
        "nazwisko" => "Maj",
        "wiek" => 40,
        "status" => "n"
        ],
        [
        "imie" => "Katarzyna",
        "nazwisko" => "Bąk",
        "wiek" => 25,
        "status" => "n"
        ]
    );
    foreach($uzytkownicy as $uzy){
        echo "{$uzy['imie']} {$uzy['nazwisko']}, {$uzy['wiek']} lat, ";
        if($uzy['status'] == "a"){
            echo "Konto Aktywne <br>";
        }elseif($uzy['status'] == "n"){
            echo "Konto Nieaktywne <br>";
        }
    }

    echo "<br>";
    echo "<br>";

    #Utwórz tablicę cyfr z zakresu od 1 do 6 w różnej kolejności, w ilości 15 wpisów. Skorzystaj z funkcji "rand" oraz
    #pętli "for" do uzupełnienia tablicy. Za pomocą pętli (tutaj pozostawiam wam dowolny wybór) oraz warunku "if" wyświetl tylko oceny powyżej "3".
    #Policz, ile razy w tablicy występuje ocena "5" i wyświetl ilość w osobnej linii w formie "Ilość 5: Wartość".

    $y = [];
    for ($i = 0; $i < 15; $i++) {
        $y[] = rand(1, 6);
    }
    echo "Oceny powyżej 3:<br>";
    $z = 0;
    foreach ($y as $x) {
        if ($x > 3) {
            echo $x . "<br>";
        }
        if ($x == 5) {
            $z++;
        }
    }
    echo "<br>piątki: " . $z;
    ?>
</body>
</html>